<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
use App\Models\User;
use App\Models\Message;

class ChatController extends Controller
{
    public function index()
    {
        // get from chat table
        $chats = Chat::where('username_1', Auth::user()->name)->orWhere('username_2', Auth::user()->name)->get();
        // change all the chats created_at +7 hour
        foreach ($chats as $chat) {
            $chat->created_at = date("Y-m-d H:i:s", strtotime($chat->created_at . "+7 hours"));
            $chat->last_time = date("Y-m-d H:i:s", strtotime($chat->last_time . "+7 hours"));
        }
        // sort chat by last_time
        $chats = $chats->sortByDesc('last_time');
        $users = User::all();
        // remove current user from users
        $users = $users->reject(function ($user) {
            return $user->id == Auth::user()->id;
        });
        return view('pages.chat', compact('chats', 'users'));
    }
    public function send(){
        // check if chat already exist
        $chat = Chat::where('username_1', request()->username_1)->where('username_2', request()->username_1)->first();
        // if false check the revert username
        if (!$chat) {
            $chat = Chat::where('username_1', request()->username_1)->where('username_2', request()->username_1)->first();
        }
        // if still false create new chat
        if (!$chat) {
            $chat = new Chat();
            $chat->username_1 = request()->username_1;
            $chat->username_2 = request()->username_2;
            $chat->last_sender = request()->username_1;
            $chat->last_time = date("Y-m-d H:i:s");
            $chat->save();
            // create new pesan
            $message = new Message();
            $message->chat_id = $chat->id;
            $message->sender = request()->username_1;
            $message->message = request()->message;
            $message->save();
            return redirect()->intended('/chat');
        }else{
            // if chat exist
            // get the chat
            $chat = Chat::find($chat->id);
            $chat->last_sender = request()->username_1;
            $chat->last_time = date("Y-m-d H:i:s");
            $chat->save();
            $message = new Message();
            $message->chat_id = $chat->id;
            $message->sender = request()->username_1;
            $message->message = request()->message;
            $message->save();
            return redirect()->back();
        }
    }
    public function getChat($id)
    {
        $messages = Message::where('chat_id', $id)->get();
        return response()->json($messages);
    }
    public function message()
    {
        $chat = Chat::find(request()->chat_id);
        $chat->last_sender = request()->sender;
        $chat->last_time = date("Y-m-d H:i:s");
        $chat->save();
        $message = new Message();
        $message->chat_id = request()->chat_id;
        $message->sender = request()->sender;
        $message->message = request()->message;
        $message->save();
        return response()->json($message);
    }

    public function unreadChat()
    {
        $chats = Chat::where('username_2', Auth::user()->name)->orWhere('username_1', Auth::user()->name)->get();
        $unread = 0;
        foreach ($chats as $chat) {
            if($chat->last_sender != Auth::user()->name && $chat->last_sender != "null"){
                $unread++;
            }
        }
        return response()->json($unread);
    }
    public function readChat($id)
    {
        $chat = Chat::find($id);
        if (!$chat) {
            return response()->json(['error' => 'Chat not found'], 404);
        }
        if (Auth::user() && $chat->last_sender != Auth::user()->name) {
            $chat->last_sender = "null";
            if (!$chat->save()) {
                return response()->json(['error' => 'Failed to save chat'], 500);
            }
        }
        return response()->json($chat);
    }
}

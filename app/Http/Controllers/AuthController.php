<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Chat;
use App\Models\Message;

class AuthController extends Controller
{
    public function me(){
        return view("pages.me");
    }
    public function editform(){
        $roles = Role::all();
        return view("pages.editme", ["roles"=>$roles]);
    }
    public function edit(Request $request){
        // update all chat with this user
        $chats = Chat::where('username_1', Auth::user()->name)->orWhere('username_2', Auth::user()->name)->get();
        $messages = Message::where('sender', Auth::user()->name)->get();
        $biodata = $request->validate([
            "name" => "required",
            "email" => "required|unique:users,email,".Auth::user()->id,
            "phone" => "required",
            "role_id" => "required|exists:roles,id|integer",
        ]);
        foreach ($chats as $chat) {
            if ($chat->username_1 == Auth::user()->name) {
                $chat->username_2 = $biodata["name"];
            }else{
                $chat->username_2 = $biodata["name"];
            }
            $chat->save();
            if($chat->last_sender == Auth::user()->name){
                $chat->last_sender = $biodata["name"];
                $chat->save();
            }
        }
        Auth::user()->update($biodata);
        foreach ($messages as $message) {
            $message->sender = $biodata["name"];
            $message->save();
        }
        return redirect("/me");
    }
    public function registerform()
    {
        $roles = Role::all();
        return view("pages.register", ["roles" => $roles]);
    }

    public function register(Request $request)
    {
        $biodata = $request->validate([
            "name" => "required",
            "email" => "required|unique:users",
            "phone" => "required",
            "kota" => "required",
            "address"=>"required",
            "role_id" => "required|exists:roles,id|integer",
            "password" => "required"
        ]);
        $biodata["password"] = Hash::make($biodata["password"]);
        $user = new User($biodata);
        $user->save();
        Auth::login($user);
        return redirect()->intended();
    }

    public function loginform()
    {
        return view("pages.login");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|exists:users,email",
            "password" => "required"
        ]);
        if (Auth::attempt($credentials)) {
            Auth::login(Auth::user());
            return redirect()->intended();
        } else {
            return back()->withErrors(["password" => "Password wrong"]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended();
    }
}

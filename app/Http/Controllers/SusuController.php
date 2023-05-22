<?php

namespace App\Http\Controllers;

use App\Models\Susu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SusuController extends Controller
{
    public function list()
    {
        $susu = Susu::all();
        return view("pages.susu.index", ["susus" => $susu]);
    }

    public function addform()
    {
        return view("pages.susu.add");
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            "volume" => "required|regex:/^(\d){1,8}([\.](\d){0,2})?$/",
            "milk_at" => "required",
            "sold_at" => "required"
        ]);
        $data["user_id"] = Auth::user()->getAuthIdentifier();
        $susu = new Susu($data);
        $susu->save();
        return redirect("/susu");
    }

    public function editform($id)
    {
        $susu = Auth::user()->susu->find($id);
        if ($susu) {
            return view("pages.susu.edit", ["susu" => $susu]);
        }
        abort(404);
    }
    public function edit($id, Request $request){
        $data = $request->validate([
            "volume" => "required|regex:/^(\d){1,8}([\.](\d){0,2})?$/",
            "milk_at" => "required",
            "sold_at" => "required"
        ]);
        Auth::user()->susu->find($id)->update($data);
        return redirect("/susu");
    }
}

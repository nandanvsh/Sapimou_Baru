<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StokController extends Controller
{
    public function index()
    {
        if (Auth::user()->role->role_name === "peternak") {
            $stoks = Stok::all();
            return view("pages.stok.index", ["stoks" => $stoks]);
        }else if(Auth::user()->role->role_name === "supplier tahu") {
            $stoks = Auth::user()->stoks;
            return view("pages.stok.index", ["stoks" => $stoks]);
        }
    }

    public function stokdetail($id)
    {
        $stok = Stok::find($id);
        return view("pages.stok.detail", ["stok" => $stok]);
    }

    public function addform()
    {
        return view("pages.stok.add");
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "price" => "required",
            "description" => "required",
            "stok" => "required"
        ]);
        $data["user_id"] = Auth::user()->id;
        $stok = new Stok($data);
        $stok->save();
        return redirect("/stok");
    }

    public function editform($id)
    {
        $stok = Stok::find($id);
        return view("pages.stok.edit", ["stok" => $stok]);
    }

    public function edit($id, Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "price" => "required",
            "description" => "required",
            "stok" => "required"
        ]);
        Stok::find($id)->update($data);
        return redirect("/stok/" . $id);
    }
}

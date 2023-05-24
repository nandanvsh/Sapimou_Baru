<?php

namespace App\Http\Controllers;

use App\Models\keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeuanganController extends Controller
{
    public function keuangan()
    {
        $keuangan = keuangan::all();
        return view("pages.pembukuan.index", ["keuangans" => $keuangan]);
    }

    public function addform()
    {
        return view("pages.pembukuan.add");
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            "tanggal" => "required",
            "pemasukan" => "required",
            "pengeluaran" => "required"
        ]);
        $data["user_id"] = Auth::user()->getAuthIdentifier();
        $keuangan = new keuangan($data);
        $keuangan->save();
        return redirect("/keuangan");
    }

    public function editform($id)
    {
        $keuangan = keuangan::find($id); 
        if ($keuangan) {
            return view("pages.pembukuan.edit", ["keuangan" => $keuangan]);
        }
        abort(404);
    }
    public function edit($id, Request $request){
        $data = $request->validate([
            "tanggal" => "required",
            "pemasukan" => "required",
            "pengeluaran" => "required"
        ]);
        keuangan::find($id)->update($data);
        return redirect("/keuangan");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Models\waktu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function jadwal()
    {
        $jadwal = jadwal::all();
        return view("pages.jadwal.index",["jadwals" => $jadwal] );
    }
    public function addform()
    {
        return view("pages.jadwal.add_jadwal");
    }
    public function add(Request $request)
    {
        $dataWaktu = $request->validate([
            "tanggal_jadwal" => "required"
        ]);
        $waktu = new waktu($dataWaktu);
        $waktu->save();
        $data = $request->validate([
            "name" => "required",
            "jam" => "required",
            "stok_combor" => "required"
        ]);
        $data["user_id"] = Auth::user()->id;
        $data["waktu_id"] = $waktu->id;
        $data["status_perah"] = false;
        $data["status_pakan"] = false;
        $jadwal = new jadwal($data);
        $jadwal->save();
        return redirect("/jadwal");
    }
    public function editform($id)
    {
        $jadwal = jadwal::find($id);
        if ($jadwal) {
            return view("pages.jadwal.edit", ["jadwal" => $jadwal]);
        }
        abort(404);
    }
    public function edit($id, Request $request){
        $data = $request->validate([
            "name" => "required",
            "jam" => "required",
            "stok_combor" => "required"
        ]);
        jadwal::find($id)->update($data);
        return redirect("/jadwal");
    }
}

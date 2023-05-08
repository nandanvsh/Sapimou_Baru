<?php

namespace App\Http\Controllers;

use App\Models\jadwal;

class JadwalController extends Controller
{
    public function jadwal()
    {
        $jadwal = jadwal::all();
        return view("pages.jadwal.index",["jadwals" => $jadwal] );
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function beli($id, Request $request)
    {
        $data = $request->validate([
            "stok" => "required|gt:0"
        ]);
        $data["id"] = $id;
        $request->session()->forget("payloadpesan");
        $request->session()->put("payloadpesan", $data);
        $stok = Stok::find($id);
        return view("pages.order.pembayaran", ["stok" => $stok, "qty" => $data["stok"]]);
    }

    public function confirmform(Request $request)
    {
        $data = $request->session()->get("payloadpesan");
        if ($data) {
            return view("pages.order.confirm");
        }
        return back();
    }

    public function confirm(Request $request)
    {
        $request->validate([
            "bukti" => "required|image"
        ]);
        $file = $request->file("bukti");
        $filename = Storage::put("bukti", $file);
        $payload = $request->session()->get("payloadpesan");
        $request->session()->forget("payloadpesan");
        $data = [
            "user_id" => Auth::user()->id,
            "status" => "diproses",
            "qty" => $payload["stok"],
            "stok_id" => $payload["id"],
            "bukti" => $filename
        ];
        $pesanan = new Order($data);
        $pesanan->save();
        return redirect("/stok");
    }

    public function history()
    {
        if (Auth::user()->role->role_name === "peternak") {
            $orders = Auth::user()->orders;
            return view("pages.order.history", ["orders" => $orders]);
        } else if (Auth::user()->role->role_name === "supplier tahu") {
            $orders = Auth::user()->ordered;
            return view("pages.order.history", ["orders" => $orders]);
        }
    }

    public function payment($filename)
    {
        if (Storage::has("bukti/".$filename)) {
            return response()->file(storage_path("app/bukti/".$filename));
        }
        abort(404);
    }

    public function prosesorder($id){
        $order = Order::find($id);
        $order->status = "dikirim";
        $stok = Stok::find($order->stok->id);
        $stok->stok -= $order->qty;
        $stok->save();
        $order->save();
        return redirect("/riwayattransaksi");
    }
    public function batalorder($id){
        $order = Order::find($id);
        $order->status = "dibatalkan";
        $order->save();
        return redirect("/riwayattransaksi");
    }
    public function terimaorder($id){
        $order = Order::find($id);
        $order->status = "diterima";
        $order->save();
        return redirect("/riwayattransaksi");
    }
}

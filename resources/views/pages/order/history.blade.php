@extends('layouts.main')
@section('content')
    @include('components.navbar')
    <main class="min-h-[calc(100vh-4rem)] bg-bg3 p-8">
        <div class="flex justify-center gap-8 mb-8">
            <a href="/stok" class="text-2xl">Beranda</a>
            <a href="/riwayattransaksi" class="font-bold text-2xl">Riwayat</a>
        </div>
        <div class=" flex flex-col gap-2 items-center">
            @foreach($orders as $order)
                <div class="flex justify-between w-1/2 bg-white p-8">
                    <div class="flex flex-col gap-2">
                        <h1 class="font-bold text-2xl">{{$order->stok->name}} <span class="font-light text-lg">x{{$order->qty}}</span>
                        </h1>
                        <p>Total: Rp. {{$order->qty * $order->stok->price}}</p>
                    </div>
                    <div class="flex flex-col items-end gap-2">
                        <h2 class="@if($order->status === 'diproses') text-blue-600 @elseif($order->status === 'dikirim') text-green-600 @elseif($order->status === 'dibatalkan') text-red-600 @elseif($order->status === 'diterima') text-green-600 @endif capitalize">{{$order->status}}</h2>
                        @if(auth()->user()->role->role_name === "peternak")
                            @if($order->status === "dikirim")
                                <a class="px-2 py-1 bg-green-600 text-white rounded" href="/terimaorder/{{$order->id}}">Terima</a>
                            @endif
                        @endif
                        @if(auth()->user()->role->role_name === "supplier tahu")
                            <div class="flex gap-2">
                                @if($order->status === "diproses")
                                    <a class="px-2 py-1 bg-green-600 text-white rounded" href="/prosesorder/{{$order->id}}">Terima</a>
                                @endif
                                @if($order->status != "diterima" && $order->status != "dibatalkan")
                                    <a class="px-2 py-1 bg-red-600 text-white rounded" href="/batalorder/{{$order->id}}">Batalkan</a>
                                @endif
                            </div>
                        @endif
                        <a href="/buktipembayaran/{{$order->bukti}}"
                           class="rounded px-2 py-1 bg-blue-500 text-white capitalize w-full" target="_blank">bukti
                            pembayaran</a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@stop

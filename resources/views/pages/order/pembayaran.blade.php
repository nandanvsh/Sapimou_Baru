@extends('layouts.main')
@section('content')
    @include('components.navbar')
    <main class="min-h-[calc(100vh-4rem)] bg-bg3 p-8 flex justify-center">
        <form class="w-1/2 flex flex-col bg-white gap-4 rounded-xl">
            <h1 class="bg-blue-700 py-2 px-8 font-bold text-xl rounded-xl text-center text-white py-4">Tambah Pesanan</h1>
            <div class="px-8 pb-8 w-full flex flex-col gap-4">
                <div class="flex items-start gap-2 bg-slate-300 p-4 rounded-xl">
                    <img src="/images/location.png" alt="">
                    <div class="flex flex-col">
                        <h1>Alamat Pengiriman</h1>
                        <h2>{{auth()->user()->name}} ({{auth()->user()->kota}}) {{auth()->user()->phone}}</h2>
                        <h3>{{auth()->user()->address}}</h3>
                    </div>
                </div>
                <div class="flex gap-8 w-full bg-slate-300">
                    <img src="/images/bg1.png" class="w-36 object-cover" alt="">
                    <div class="py-4 px-8 w-2/3 text-slate-600">
                        <h2>{{$stok->name}}</h2>
                        <h3>Karung / Kg</h3>
                        <p class="w-full flex justify-between">Rp. {{$stok->price}}<span>x{{$qty}}</span></p>
                    </div>
                </div>
                <h2 class="flex justify-between">Total Pesanan: <span>Rp. {{$stok->price * $qty}}</span></h2>
                <div class="p-4 flex flex-col gap-2 bg-slate-300 rounded-xl">
                    <h2 class="font-bold">Pilihan Pembayaran:</h2>
                    <table class="w-full">
                        <tr>
                            <td>BRI</td>
                            <td>034101000743xxx</td>
                        </tr>
                        <tr>
                            <td>BCA</td>
                            <td>0740078xxx</td>
                        </tr>
                        <tr>
                            <td>OVO,DANA,GOPAY</td>
                            <td>08123456789</td>
                        </tr>
                    </table>
                </div>
                <div class="flex justify-between gap-4">
                    <a href="/stok/{{$stok->id}}" class="w-1/2 text-center bg-red-500 text-white rounded-xl py-2">Batal</a>
                    <a href="/konfirmasipesanan" class="w-1/2 text-center bg-blue-500 text-white rounded-xl py-2">Lanjut</a>
                </div>
            </div>
        </form>
    </main>
@stop

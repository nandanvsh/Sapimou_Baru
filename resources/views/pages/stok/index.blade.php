@extends('layouts.main')
@section('content')
    @include('components.navbar')
    <main class="min-h-[calc(100vh-4rem)] bg-bg3 p-8">
        <div class="flex justify-center gap-8 mb-8">
            <a href="/stok" class="font-bold text-2xl">Beranda</a>
            <a href="/riwayattransaksi" class="text-2xl">Riwayat</a>
        </div>
        @if(auth()->user()->role->role_name === "peternak")
            <div class=" flex flex-wrap gap-2">
                @foreach($stoks as $stok)
                    <div class="w-[32.5%]">
                        <img src="/images/bg1.png" class="h-36 w-full object-cover object-top" alt="">
                        <div class="p-4 bg-white flex flex-col items-center">
                            <h1 class="font-bold text-xl text-center">{{$stok->user->name}}</h1>
                            <p class="text-center">{{$stok->user->address}}</p>
                            <div class="flex justify-between w-full mt-4">
                                <a href="/stok/{{$stok->id}}" class="px-2 py-1 bg-green-500 text-white rounded-md">Detail</a>
                                <p class="font-bold">Stok <span
                                        class="font-light bg-slate-300 px-4 py-1">{{$stok->stok}}</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @elseif(auth()->user()->role->role_name === "supplier tahu")
            <div class="flex flex-col items-center">
                <div class="flex flex-col w-2/3 gap-4">
                    <div class="w-full flex justify-end">
                        <a href="/addstok" class="text-2xl p-4 py-2 bg-primary rounded-xl text-white">Tambah Data</a>
                    </div>
                    <div class="flex flex-col items-center bg-white">
                        <img src="/images/bg1.png" class="h-56 w-full object-cover object-top" alt="">
                        <h1 class="text-3xl font-medium">{{auth()->user()->name}}</h1>
                        <p class="w-1/2 text-center">{{auth()->user()->address}}</p>
                        <div class="w-full px-8 mt-6 flex flex-col items-center">
                            @foreach($stoks as $stok)
                                <div class="flex w-full max-h-2/3 h-1/2 bg-red-500">
                                    <img src="/images/bg1.png" class="w-96 object-cover" alt="">
                                    <div class="bg-white p-8 flex flex-col gap-4 flex-grow">
                                        <div class="flex items-center gap-2">
                                            <h1 class="font-bold text-2xl">{{$stok->name}}</h1>
                                        </div>
                                        <h2 class="font-medium text-xl text-red-600">Rp. {{$stok->price}}</h2>
                                        <div>
                                            <h2 class="font-bold text-xl">Deskripsi</h2>
                                            <p class="font-light w-2/3 bg-slate-300 p-4 rounded-xl">
                                                {{$stok->description}}
                                            </p>
                                        </div>
                                        <div class="flex gap-8">
                                            <h2 class="font-bold text-xl">Stok</h2>
                                            <p class="bg-btn-red px-8">{{$stok->stok}}</p>
                                        </div>
                                    </div>
                                </div>
                                <a href="/editstok/{{$stok->id}}"
                                   class="my-4 w-2/3 text-center  px-2 py-1 bg-btn-red flex items-center justify-center gap-2 rounded-full"><img
                                        src="/images/edit.png" alt="">Edit</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </main>
@stop

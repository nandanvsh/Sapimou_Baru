@extends('layouts.main')
@section('content')
    @include('components.navbar')
    <main class="min-h-[calc(100vh-4rem)] bg-bg3 p-8 flex justify-center">
        <div class="flex w-5/6 max-h-2/3 h-1/2">
            <img src="/images/bg1.png" class="w-96 object-cover" alt="">
            <div class="bg-white p-8 flex flex-col gap-4 flex-grow">
                <div class="flex items-center gap-2">
                    <h1 class="font-bold text-2xl">{{$stok->name}}</h1>
                </div>
                <h2 class="font-medium text-xl text-red-600">Rp. {{$stok->price}}</h2>
                <div>
                    <h3 class="font-medium">{{$stok->user->name}}</h3>
                    <p class="font-light">{{$stok->user->address}}</p>
                </div>
                <div>
                    <h2 class="font-bold text-xl">Deskripsi</h2>
                    <p class="font-light w-2/3 bg-slate-300 p-4 rounded-xl">
                        {{$stok->description}}
                    </p>
                </div>
                @if(auth()->user()->role->role_name === "peternak")
                    <form method="post" action="/beli/{{$stok->id}}" class="flex justify-between items-center">
                        @csrf
                        <div class="flex items-center gap-2">
                            <label for="stok">Jumlah yang dibeli : </label>
                            <input class="w-14 text-center border" min="0" type="number" name="stok" id="stok"
                                   value="0">
                            <span>tersisa {{$stok->stok}} karung</span>
                        </div>
                        <button class="px-8 py-1 rounded-xl bg-red-500 text-white">Beli</button>
                    </form>
                @endif
            </div>
        </div>
    </main>
@stop

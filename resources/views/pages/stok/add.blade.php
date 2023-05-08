@extends('layouts.main')
@section('content')
    @include('components.navbar')
    <main class="min-h-[calc(100vh-4rem)] bg-bg3 p-8 flex justify-center">
        <form action="{{url("/addstok")}}" method="post" class=" w-1/3 flex flex-col bg-white gap-4 pb-4 rounded-xl">
            <h1 class="text-center font-semibold text-xl bg-primary text-white p-4 rounded-xl">Menambah data stok</h1>
            @csrf
            <div class="px-8 flex flex-col gap-4">
                <label for="name">Nama Barang</label>
                <input type="text" name="name" id="name" class="w-full border rounded-md p-2" placeholder="Nama Produk">
                <label for="name">Harga Barang</label>
                <input type="number" name="price" id="price" class="w-full border rounded-md p-2" placeholder="Harga">
                <label for="name">Jumlah Stok</label>
                <input type="number" name="stok" id="stok" class="w-full border rounded-md p-2" placeholder="Stok">
                <label for="name">Deskripsi</label>
                <textarea name="description" id="description" cols="30" rows="8"
                          class="resize-none w-full border rounded-md p-2" placeholder="Deskripsi..."></textarea>
                <div class="flex justify-center gap-4">
                    <a href="{{url("/stok")}}" class="bg-red-600 text-white p-2 rounded-full flex-grow text-center">Batal</a>
                    <button type="submit" class="bg-btn-blue text-white p-2 rounded-full flex-grow text-center">Simpan</button>
                </div>
            </div>
        </form>
    </main>
@stop

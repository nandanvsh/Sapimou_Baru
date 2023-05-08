@extends("layouts.main")
@section("content")
    @include("components.navbar")
    <main class="bg-bg2 h-[calc(100vh-4rem)] flex justify-center items-center">
        <form action="{{url("/addsusu")}}" method="post" class="flex flex-col bg-white gap-4 pb-4 rounded-xl w-1/3">
            <h1 class="text-center font-semibold text-xl bg-primary p-4 text-white rounded-xl">Tambah data susu</h1>
            @csrf
            <div class="px-8 flex flex-col gap-4">
                <label for="volume">Jumlah Volume Susu yang Dihasilkan</label>
                <input type="number" step=".0001" name="volume" id="volume"
                       placeholder="Volume susu" class="w-full border rounded-md p-2">
                <label for="milk_at">Tanggal Pengambilan Susu</label>
                <input type="datetime-local" name="milk_at" id="milk_at"
                       class="w-full border rounded-md p-2">
                <label for="sold_at">Tanggal Penjualan Susu</label>
                <input type="datetime-local" name="sold_at" id="sold_at"
                       class="w-full border rounded-md p-2">
                <div class="flex justify-center gap-4">
                    <button type="submit" class="bg-btn-blue text-white p-2 rounded-full flex-grow">Simpan</button>
                    <a href="{{url("/susu")}}"
                       class="bg-red-600 text-white p-2 rounded-full flex-grow text-center">Batal</a>
                </div>
            </div>
        </form>
    </main>
@stop

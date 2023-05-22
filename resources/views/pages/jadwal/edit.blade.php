@extends("layouts.main")
@section("content")
    @include("components.navbar")
    <main class="bg-bg2 h-[calc(100vh-4rem)] flex justify-center items-center">
        <form action="{{url("/edit/$jadwal->id")}}" method="post"
              class="flex flex-col bg-white gap-4 pb-4 rounded-xl w-1/3">
            <h1 class="text-center font-semibold text-xl bg-primary p-4 text-white rounded-xl">Edit Penjadwalan</h1>
            @csrf
            <div class="px-8 flex flex-col gap-4">
                <label for="tanggal_jadwal">Tanggal</label>
                <input type="datetime-local" name="tanggal_jadwal" id="tanggal_jadwal" value="{{$jadwal->tanggal}}"
                       class="w-full border rounded-md p-2">
                <label for="name">Nama Jadwal</label>
                <input type="text" step=".0001" name="name" id="name" value="{{$jadwal->name}}"
                       placeholder="Nama Jadwal" class="w-full border rounded-md p-2">
                <label for="jam">Waktu</label>
                <input type="time" name="jam" id="jam" value="{{$jadwal->waktu_id}} "
                    class="w-full border rounded-md p-2">
                <label for="stok_combor">Stok Combor</label>
                <input type="text" step=".0001" stok_combor="stok_combor" id="stok_combor" name="stok_combor" value="{{$jadwal->stok_combor}}"
                        placeholder="Nama Jadwal" class="w-full border rounded-md p-2">
                <div class="flex justify-center gap-4">
                    <button type="submit" class="bg-btn-blue text-white p-2 rounded-full flex-grow">Simpan</button>
                    <a href="{{url("/jadwal")}}"
                       class="bg-red-600 text-white p-2 rounded-full flex-grow text-center">Batal</a>
                </div>
            </div>
        </form>
    </main>
@stop

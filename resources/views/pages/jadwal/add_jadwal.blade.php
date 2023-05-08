@extends ('layouts.main')
@section('content')
    @include('components.navbar')
    <main class="bg-bg2 min-h-[calc(100vh-4rem)] flex justify-center items-center">
        <form action="{{url("/")}}" method="POST" class="flex flex-col bg-white gap-4 pb-4 rounded-xl w-1/3" >
            <h1 class="text-center font-semibold text-xl bg-primary p-4 text-white rounded-xl">Tambah Jadwal</h1>
            @csrf
            <div class="px-8 flex flex-col gap-4">
                <label for="tanggal_jadwal">Tanggal</label>
                <input type="date" name="tanggal_jadwal" id="tanggal_jadwal" class="w-full border rounded-md p-2">
                <label for="nama_jadwal">Nama Jadwal</label>
                <input type="text" name="nama_jadwal" id="nama_jadwal" placeholder="Nama Jadwal" class="w-full border rounded-md p-2" >
                <label for="time_jadwal">Waktu</label>
                <input type="time" name="time_jadwal" id="time_jadwal"  class="w-full border rounded-md p-2">
                <label for="status_perah">Status Pemerahan</label>
                <select name="status_perah" id="status_perah" class="w-full border rounded-md p-2" aria-label="Default select example" >
                    <option selected>Status Pemerahan </option>
                    <option value="done">Sudah Diperah</option>
                    <option value="notyet">Belum Diperah</option>
                </select>
                <label for="status_pakan">Status Pemberian Pakan</label>
                <select name="status_pakan" id="status_pakan" class="w-full border rounded-md p-2" aria-label="Default select example" >
                    <option selected>Status Pemberian Pakan </option>
                    <option value="done">Sudah Makan</option>
                    <option value="notyet">Belum Makan</option>
                </select>
                <div class="flex justify-center gap-4 ">
                    <button type="submit" class="bg-btn-blue text-white p-2 rounded-full flex-grow">Simpan</button>
                    <a href="{{url("/")}}"
                       class="bg-red-600 text-white p-2 rounded-full flex-grow text-center">Batal</a>
                </div>
            </div>
        </form>

    </main>
@stop

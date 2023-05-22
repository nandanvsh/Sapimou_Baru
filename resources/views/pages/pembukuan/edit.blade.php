@extends("layouts.main")
@section("content")
    @include("components.navbar")
    <main class="bg-bg2 h-[calc(100vh-4rem)] flex justify-center items-center">
        <form action="{{url("/edit/$keuangan->id")}}" method="post"
              class="flex flex-col bg-white gap-4 pb-4 rounded-xl w-1/3">
            <h1 class="text-center font-semibold text-xl bg-primary p-4 text-white rounded-xl">Edit data Keuangan</h1>
            @csrf
            <div class="px-8 flex flex-col gap-4">
                <label for="tanggal">Tanggal Pembukuan Keuangan</label>
                <input type="datetime-local" name="tanggal" id="tanggal" value="{{$keuangan->tanggal}}"
                       class="w-full border rounded-md p-2">
                <label for="pemasukan">Pemasukan</label>
                <input type="number" step=".0001" name="pemasukan" id="pemasukan" value="{{$keuangan->pemasukan}}"
                       placeholder="Pemasukan Keuangan" class="w-full border rounded-md p-2">
                <label for="pengeluaran">Pengeluaran</label>
                <input type="number" step=".0001" name="pengeluaran" id="pengeluaran" value="{{$keuangan->pengeluaran}}"
                       placeholder="Pengeluaran Keuangan" class="w-full border rounded-md p-2">
                <div class="flex justify-center gap-4">
                    <button type="submit" class="bg-btn-blue text-white p-2 rounded-full flex-grow">Simpan</button>
                    <a href="{{url("/keuangan")}}"
                       class="bg-red-600 text-white p-2 rounded-full flex-grow text-center">Batal</a>
                </div>
            </div>
        </form>
    </main>
@stop

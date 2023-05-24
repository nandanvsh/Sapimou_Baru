@extends("layouts.main")
@section("content")
    @include("components.navbar")
    <main class="bg-bg2 min-h-[calc(100vh-4rem)] flex justify-center items-center">
        <div class="bg-white flex flex-col items-center rounded-md p-2 h-[80vh] overflow-y-scroll w-full mx-20" >
            <h1 class="font-bold text-3xl text-center mb-12">Penjadwalan</h1>
            <table class="overflow-x-scroll">
                <tr class="border-b-4">
                    <th class="pb-5 pe-8">#</th>
                    <th class="pb-5 pe-8">Tanggal</th>
                    <th class="pb-5 pe-8">Nama Jadwal</th>
                    <th class="pb-5 pe-8">Waktu</th>
                    <th class="pb-5 pe-8">Status Pemerahan</th>
                    <th class="pb-5 pe-8">Status Pemberian Pakan</th>
                    <th class="pb-5 pe-8">Stok Combor</th>
                    <th class="pb-5 pe-8">ID peternak</th>
                    <th class="pb-6 pe-8"><a class="bg-primary text-white p-2 px-4 rounded-full" href="{{url("/add_jadwal")}}">Tambah</a></th>
                </tr>
                @foreach ($jadwals as $w=>$jadwal)
                    <tr>
                        <td>
                            {{$w+1}}
                        </td>
                            <td class="text-center pe-8 py-2">{{$jadwal->waktu->tanggal_jadwal}}</td>  
                        <td class="text-center pe-8">{{$jadwal->name}}</td>
                        <td class="text-center pe-8">{{$jadwal->jam}}</td>
                        <td class="text-center pe-8">
                            <select name="status_perah" id="status_perah" class="w-full border rounded-md p-2">
                                <option selected>Status Pemerahan </option>
                                <option value="done">Sudah Diperah</option>
                                <option value="notyet">Belum Diperah</option>
                            </select>
                        </td>
                        <td class="text-center pe-8">
                            <select name="status_pakan" id="status_pakan" class="w-full border rounded-md p-2" aria-label="Default select example" >
                                <option selected>Status Pemberian Pakan </option>
                                <option value="done">Sudah Makan</option>
                                <option value="notyet">Belum Makan</option>
                            </select>
                        </td>
                        <td class="text-center pe-8">{{$jadwal->stok_combor}}</td>
                        <td class="text-center pe-8">{{$jadwal->user_id}}</td>
                        <td class="text-center pe-8">
                            <a href="{{url("/jadwal/edit/$jadwal->id")}}" class="bg-btn-blue text-white p-2 rounded-md">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </main>
@extends("layouts.main")
@section("content")
    @include("components.navbar")
    <main class="bg-bg2 h-[calc(100vh-4rem)] flex justify-center items-center">
        <div class="w-2/3 bg-white flex flex-col items-center rounded-md p-8 h-[80vh] overflow-y-scroll">
            <h1 class="font-bold text-3xl text-center mb-12"> Pembukuan Keuangan</h1>
            <table>
                <tr class="border-b-4">
                    <th class="pb-6 pe-8">#</th>
                    <th class="pb-6 pe-8">Tanggal</th>
                    <th class="pb-6 pe-8">Pemasukkan</th>
                    <th class="pb-6 pe-8">Pengeluaran</th>
                    <th class="pb-6 pe-8">ID peternak</th>
                    <th class="pb-6 pe-8"><a class="bg-primary text-white p-2 px-4 rounded-full w-1" href="{{url("/add")}}">Tambah</a></th>
                </tr>
                @foreach($keuangans as $i=>$keuangan)
                    <tr>
                        <td>
                            {{$i+1}}
                        </td>
                        <td class="text-center pe-8 py-2">{{$keuangan->tanggal}}</td>
                        <td class="text-center pe-8">{{$keuangan->pemasukan}}</td>
                        <td class="text-center pe-8">{{$keuangan->pengeluaran}}</td>
                        <td class="text-center pe-8">{{$keuangan->user_id}}</td>
                        <td class="text-center pe-8">
                            <a href="{{url("/edit/$keuangan->id")}}" class="bg-btn-blue text-white p-2 rounded-md">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </main>
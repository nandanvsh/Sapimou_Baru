@extends("layouts.main")
@section("content")
    @include("components.navbar")
    <main class="bg-bg2 h-[calc(100vh-4rem)] flex justify-center items-center">
        <div class="w-2/3 bg-white flex flex-col items-center rounded-md p-8 h-[80vh] overflow-y-scroll">
            <h1 class="font-bold text-3xl text-center mb-12">Pencatatan Data Susu</h1>
            <table>
                <tr class="border-b-4">
                    <th class="pb-6 pe-8">#</th>
                    <th class="pb-6 pe-8">Volume</th>
                    <th class="pb-6 pe-8">Diperah tanggal</th>
                    <th class="pb-6 pe-8">Dijual tanggal</th>
                    <th class="pb-6 pe-8">ID peternak</th>
                    <th class="pb-6 pe-8"><a class="bg-primary text-white p-2 px-4 rounded-full" href="{{url("/addsusu")}}">Tambah data</a></th>
                </tr>
                @foreach($susus as $i=>$susu)
                    <tr>
                        <td>
                            {{$i+1}}
                        </td>
                        <td class="text-center pe-8 py-2">{{$susu->volume}}</td>
                        <td class="text-center pe-8">{{$susu->milk_at}}</td>
                        <td class="text-center pe-8">{{$susu->sold_at}}</td>
                        <td class="text-center pe-8">{{$susu->user_id}}</td>
                        <td class="text-center pe-8">
                            <a href="{{url("/editsusu/$susu->id")}}" class="bg-btn-blue text-white p-2 rounded-md">Edit</a>
                            <a href="{{url("/hapussusu/$susu->id")}}" class="bg-red-600 text-white p-2 rounded-md">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </main>
@stop

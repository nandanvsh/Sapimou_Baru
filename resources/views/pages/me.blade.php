@extends("layouts.main")
@section("content")
    @include("components.navbar")
    <main class="h-[calc(100vh-4rem)] flex items-center justify-center p-8">
        <div class="flex justify-center w-full">
            <img src="{{url("/images/ilustrasi2.svg")}}" class="w-1/2" alt="">
            <div class="w-1/3">
                <div class="bg-white flex flex-col justify-center py-12 px-24 rounded-xl gap-4">
                    <div>
                        <h2 class="text-2xl font-medium">Nama:</h2>
                        <p class="text-slate-700">{{auth()->user()->name}}</p>
                    </div>
                    <div>
                        <h2 class="text-2xl font-medium">Pekerjaan:</h2>
                        <p class="text-slate-700">{{auth()->user()->role->role_name}}</p>
                    </div>
                    <div>
                        <h2 class="text-2xl font-medium">No Telepon:</h2>
                        <p class="text-slate-700">{{auth()->user()->phone}}</p>
                    </div>
                    <div>
                        <h2 class="text-2xl font-medium">Email:</h2>
                        <p class="text-slate-700">{{auth()->user()->email}}</p>
                    </div>
                </div>
                <a href="{{url("/editme")}}"
                   class="bg-btn-red font-medium w-full py-2 mt-4 rounded-full text-center flex justify-center items-center gap-2"><img
                        src="/images/edit.png" alt="">Edit</a>
            </div>
        </div>
    </main>
    <main>
    </main>
@stop

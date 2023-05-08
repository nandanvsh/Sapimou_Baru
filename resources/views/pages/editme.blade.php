@extends("layouts.main")
@section("content")
    @include("components.navbar")
    <main class="h-[calc(100vh-4rem)] flex items-center justify-center p-8">
        <div class="flex justify-center w-full">
            <img src="{{url("images/ilustrasi2.svg")}}" class="w-1/2" alt="">
            <form action="{{url("/editme")}}" method="POST" class="w-1/3 flex flex-col justify-center py-8 rounded-md gap-4">
                @csrf
                <div>
                    <h2 class="text-xl font-medium">Nama:</h2>
                    <input type="text" name="name" id="name" class="w-full border rounded-md p-2" placeholder="Masukan nama" value="{{auth()->user()->name}}">
                </div>
                <div>
                    <h2 class="text-xl font-medium">Pekerjaan:</h2>
                    <select name="role_id" class="w-full p-2 rounded-md border bg-white">
                        <option disabled selected class="text-slate-400">Daftar sebagai</option>
                        @foreach($roles as $role)
                            <option class="capitalize" value="{{$role->id}}" @if(auth()->user()->role->id == $role->id) selected @endif>{{$role->role_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <h2 class="text-xl font-medium">No Telepon:</h2>
                    <input type="tel" name="phone" id="phone" class="w-full border rounded-md p-2" placeholder="Masukan nomor telepon" value="{{auth()->user()->phone}}">
                </div>
                <div>
                    <h2 class="text-xl font-medium">Email:</h2>
                    <input type="email" name="email" id="email" class="w-full border rounded-md p-2" placeholder="Masukan email" value="{{auth()->user()->email}}">
                </div>
                <div class="flex gap-4">
                    <button type="submit" class="bg-btn-blue text-white rounded-full w-full py-2 text-center">Simpan</button>
                    <a href="{{url("/me")}}" class="bg-red-500 text-white w-full rounded-full py-2 text-center">Batal</a>
                </div>
            </form>
        </div>
    </main>
    <main>
    </main>
@stop

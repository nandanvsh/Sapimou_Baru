@extends('layouts.main')
@section('content')
    <main class="relative h-screen flex justify-center items-center bg-bg1">
        <img src="{{url("/images/logo.svg")}}" class="absolute top-0 left-0 ms-8 mt-2 w-48" alt="">
        <form action="{{url("/register")}}" method="post" class=" w-1/3 flex flex-col rounded-lg gap-4 items-center bg-white py-10 px-8">
            <h1 class="text-3xl font-semibold mb-2">Daftarkan Diri Anda</h1>
            @csrf
            <input type="email" name="email" id="email" placeholder="Masukan email" class="w-full border rounded-md p-2">
            @if($errors->has("email"))
                <p class="text-sm text-red-600">{{$errors->first("email")}}</p>
            @endif
            <input type="text" name="name" id="name" placeholder="Masukan username" class="w-full border rounded-md p-2">
            <input type="tel" name="phone" id="phone" placeholder="Masukan nomor telepon" class="w-full border rounded-md p-2">
            <input type="text" name="kota" id="kota"  placeholder="Masukan kota" class="w-full border rounded-md p-2">
            <input type="text" name="address" id="address"  placeholder="Masukan alamat" class="w-full border rounded-md p-2">
            <select name="role_id" class="w-full p-2 rounded-md border bg-white">
                <option disabled selected class="text-slate-400">Daftar sebagai</option>
                @foreach($roles as $role)
                    <option class="capitalize" value="{{$role->id}}">{{$role->role_name}}</option>
                @endforeach
            </select>
            <input type="password" name="password" id="password" placeholder="Masukan password" class="w-full border rounded-md p-2">
            <button type="submit" class="w-full py-2 bg-blue-500 text-white rounded-md">Daftar</button>

            <div class="flex gap-2">
                <p>Sudah punya akun?</p>
                <a href="{{url("/login")}}" class="text-blue-600 underline">Masuk</a>
            </div>
        </form>
    </main>
@stop

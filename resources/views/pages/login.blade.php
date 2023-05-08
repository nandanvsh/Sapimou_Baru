@extends('layouts.main')
@section('content')
    <main class="relative h-screen flex justify-center items-center bg-bg1">
        <img src="{{url("/images/logo.svg")}}" class="absolute top-0 left-0 ms-8 mt-2 w-48" alt="">
        <form action="{{url("/login")}}" method="post" class=" w-1/3 flex flex-col rounded-lg gap-4 items-center bg-white py-16 px-8">
            <h1 class="text-3xl font-semibold mb-2">Selamat Datang Kembali</h1>
            @csrf
            <input type="email" name="email" id="email" placeholder="Masukan email" class="w-full border rounded-md p-2">
            @if($errors->has("email"))
                <p class="text-sm text-red-600">{{$errors->first("email")}}</p>
            @endif
            <input type="password" name="password" id="password" placeholder="Masukan password" class="w-full border rounded-md p-2">
            @if($errors->has("password"))
                <p class="text-sm text-red-600">{{$errors->first("password")}}</p>
            @endif
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md">Masuk</button>
            <div class="flex gap-2">
                <p>Belum punya akun?</p>
                <a href="{{url("/register")}}" class="text-blue-600 underline">Daftar</a>
            </div>
        </form>
    </main>
@stop

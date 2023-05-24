@extends('layouts.main')
@section('content')
    @include('components.navbar')
    {{-- @if ($message = Session::get('message'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ $message }}</strong>
</div>
@endif --}}
    <main class="h-[calc(100vh-4rem)] flex items-center justify-center p-8">
        <div class="flex items-center">
            <div class="flex flex-col gap-4">
                <h1 class="text-white text-3xl font-bold">
                    SELAMAT DATANG DI SISTEM INFORMASI “SAPI-MOU”
                </h1>
                <p class="text-white italic">
                    Pengelolaan dan Pembukuan Administrasi Peternakan Sapi Perah Berbasis Website
                </p>
            </div>
            <img src="{{url("/images/ilustrasi1.png")}}" class="w-3/4" alt="">
        </div>
    </main>
@stop

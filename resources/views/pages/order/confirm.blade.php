@extends('layouts.main')
@section('content')
    @include('components.navbar')
    <main class="min-h-[calc(100vh-4rem)] bg-bg3 p-8 flex justify-center">
        <form action="{{url("/konfirmasipesanan")}}" enctype="multipart/form-data" method="post"
              class="w-1/2 flex flex-col bg-white gap-4 rounded-xl">
            @csrf
            <h1 class="bg-blue-700 py-2 px-8 font-bold text-xl rounded-xl text-center text-white py-4">Tambah
                Pesanan</h1>
            <div class="flex flex-col px-8 h-2/3 gap-4">
                <h1>Upload bukti pembayaran</h1>
                <div class="flex items-center justify-center w-full h-full">
                    <label for="dropzone-file"
                           class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 relative">
                        <img src="" id="displaypic" class="hidden w-full h-full object-cover object-top" alt="">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6" id="dialogpic">
                            <img src="/images/camera.svg" alt="">
                            <span>Upload Foto</span>
                        </div>
                        <input onchange="readURL(this)" id="dropzone-file" type="file" name="bukti" class="opacity-0 h-full w-full absolute"/>
                    </label>
                </div>
                <button type="submit" class="bg-blue-600 text-white py-2 rounded-xl">Simpan</button>
            </div>
        </form>
    </main>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    $("#displaypic").removeClass("hidden");
                    $("#displaypic").attr('src', e.target.result);
                    $("#dialogpic").addClass("hidden");
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@stop

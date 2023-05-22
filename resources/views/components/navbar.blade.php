<header class="sticky top-0 w-full h-16 bg-primary bg-opacity-50 backdrop-blur-md flex sm:justify-between items-center py-8 px-8">
    <img class="w-48" src="{{url("/images/logo.svg")}}" alt="">

    @auth
        <div class="flex gap-8 text-white">
            <a href="{{url("/")}}">Beranda</a>
            <a href="{{url("/stok")}}">Stok</a>
            @if (auth () -> user() -> role -> role_name === 'peternak')
            <a href="{{url("/jadwal")}}">Penjadwalan</a>
            <a href="{{url("/keuangan")}}">Pembukuan</a>
            <a href="{{url("/susu")}}">Pencatatan</a>  
            @endif
        </div>
    @endauth

    <div class="flex items-center gap-4">
        @guest
            <a href="{{url("/login")}}" class="bg-white py-2 px-6 rounded-xl">Login</a>
            <a href="{{url("/register")}}" class="bg-white py-2 px-6 rounded-xl">Register</a>
        @endguest
        @auth
            <a href="{{url("/me")}}" class="bg-white p-2 rounded-full">
                <img src="{{url("/images/akun.svg")}}" alt="">
            </a>
            <a href="{{url("/logout")}}" class="bg-white py-2 px-6 rounded-xl">logout</a>
        @endauth
    </div>
</header>

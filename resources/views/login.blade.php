@extends('layouts.app')

@section('content')
<div class="flex min-h-screen">
    <section class="bg-linear-to-br from-blue-600 to-blue-900 text-white mx-auto p-8 max-w-3xl hidden md:block w-1/2">
        <a href="{{ route('home') }}">
            <img src="{{ asset('image/logo.webp') }}" alt="Logo" class="h-14">
            <h1 class="text-xl font-semibold">
                SP4N-LAPOR <br> Nusa Tenggara Barat
            </h1>
        </a>
        <div class="my-auto justify-center flex flex-col h-[50vh]">
            <h1 class="text-6xl font-bold mt-8 mb-4">Masuk Ke Akun Anda</h1>
            <p class="text-lg">
                Masuk sekarang untuk menyampaikan aspirasi dan pengaduan Anda secara langsung kepada Pemerintah Provinsi Nusa Tenggara Barat.
            </p>
        </div>
    </section>

    <section class="flex-1 flex items-center justify-center p-8 w-full bg-gray-100 relative overflow-hidden">
        <div class="absolute bg-linear-to-r h-80 w-100 from-blue-600 to-blue-900 -skew-y-6 sm:skew-y-0 sm:rotate-6 rounded-3xl shadow-lg"></div>
        
        <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-md text-center relative z-10">
            <h1 class="text-2xl font-bold mb-6 text-gray-800">Masuk</h1>
            
            <form method="POST" action="{{ url('/login') }}">
                @csrf
                <input type="email" name="email" class="w-full p-2 border rounded mb-4 border-gray-400 focus:outline-blue-600" placeholder="Email" required>
                
                <div class="relative w-full mb-6">
                    <input type="password" id="password" name="password" placeholder="Password" class="w-full p-2 border rounded border-gray-400 focus:outline-blue-600 pr-10" required>
                    <button type="button" id="toggleMain" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 cursor-pointer focus:outline-none">
                        <i class="fa-regular fa-eye-slash" id="eyeIconMain"></i>
                    </button>
                </div>

                <button class="bg-blue-600 text-white px-4 py-2 rounded font-bold hover:bg-blue-700 w-full transition-all active:scale-95" type="submit">
                    Masuk
                </button>
            </form>
            
            <p class="mt-5 text-gray-600">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-semibold">Daftar</a></p>
        </div>
    </section>
</div>

<script>
    const passInput = document.getElementById('password');
    const iconMain = document.getElementById('eyeIconMain');
    const toggleMain = document.getElementById('toggleMain');

    if (toggleMain) {
        toggleMain.addEventListener('click', function() {
            const isPassword = passInput.type === 'password';
            passInput.type = isPassword ? 'text' : 'password';
            
            if (passInput.type === 'text') {
                iconMain.classList.replace('fa-eye-slash', 'fa-eye');
            } else {
                iconMain.classList.replace('fa-eye', 'fa-eye-slash');
            }
        });
    }
</script>
@endsection
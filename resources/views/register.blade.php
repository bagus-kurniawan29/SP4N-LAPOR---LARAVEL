<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{asset('image/logo.ico')}}" type="image/x-icon">
</head>
<body class="flex min-h-screen">
    <section class="bg-linear-to-br from-blue-600 to-blue-900 text-white mx-auto p-8 max-w-3xl hidden md:block">
        <a href="{{ route('home') }}"><img src="{{ asset('image/logo.webp') }}" alt="" class="h-14 ">
        <h1 class="text-xl font-semibold">
            SP4N-LAPOR <br>
            Nusa Tenggara Barat
        </h1>
        </a>
        <div class="my-auto justify-center flex flex-col h-[50vh]">
            <h1 class="text-6xl font-bold mt-8 mb-4">
                Buat Akun Anda
            </h1>
            <p class="text-lg">
               Bergabunglah sekarang untuk ikut serta dalam perbaikan layanan publik. Buat akun Anda dalam beberapa langkah mudah!
            </p>
        </div>
    </section>
<section class="flex-1 flex items-center justify-center p-8 w-full h-screen bg-gray-100 relative overflow-hidden">
        <div class="absolute bg-linear-to-r h-110 w-100 from-blue-600 to-blue-900 skew-y-6 sm:skew-y-0 sm:-rotate-6 rounded-3xl shadow-lg"></div>
        <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-md text-center relative z-10">
            <h1 class="text-2xl font-bold mb-6">Daftar</h1>
            <form method="POST" action="{{ url('/register') }}">
                @csrf
                <input type="text" id="name" name="name" class="w-full p-2 border rounded mb-4 border-gray-400 focus:outline-blue-600" placeholder="Username" required>
                <input type="email" id="email" name="email" class="w-full p-2 border rounded mb-4 border-gray-400 focus:outline-blue-600" placeholder="Email" required>
                <div class="relative w-full mb-4">
                    <input type="password" id="password" name="password" placeholder="Password" class="w-full p-2 border rounded border-gray-400 focus:outline-blue-600 pr-10" required>
                    <button type="button" id="toggleMain" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 cursor-pointer focus:outline-none">
                        <i class="fa-regular fa-eye-slash" id="eyeIconMain"></i>
                    </button>
                </div>
                <button class="bg-blue-600 text-white px-4 py-2 rounded font-bold hover:bg-blue-700 w-full transition-colors" type="submit">
                    Buat Akun
                </button>
            </form>
            <p class="mt-5">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-semibold">Masuk</a></p>
        </div>
    </section>

    @if (session('success'))
        <div id="snackbar" class="fixed bottom-5 left-1/2 -translate-x-1/2 z-50 animate-bounce">
            <div class="bg-green-600 text-white px-6 py-3 rounded-lg shadow-2xl flex items-center gap-3">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('success') }}</span>
            </div>
        </div>
        <script>
            setTimeout(function() {
                const snack = document.getElementById('snackbar');
                if(snack) {
                    snack.style.transition = "opacity 0.5s ease";
                    snack.style.opacity = "0";
                    setTimeout(() => snack.remove(), 500);
                }
            }, 3000);
        </script>
    @endif

    @if (session('error'))
        <div class="fixed bottom-5 left-1/2 -translate-x-1/2 z-50">
            <div class="bg-red-600 text-white px-6 py-3 rounded-lg shadow-lg flex items-center gap-3">
                <i class="fa-solid fa-circle-xmark"></i>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <script>
        const passInput = document.getElementById('password');
        const confirmInput = document.getElementById('Confirmpassword');
        const iconMain = document.getElementById('eyeIconMain');
        const btnToggle = document.getElementById('toggleMain');

        if (btnToggle) {
            btnToggle.addEventListener('click', function() {
                const isPassword = passInput.type === 'password';
                const newType = isPassword ? 'text' : 'password';
                
                passInput.type = newType;
                if (confirmInput) confirmInput.type = newType;
                if (newType === 'text') {
                    iconMain.classList.replace('fa-eye-slash', 'fa-eye');
                } else {
                    iconMain.classList.replace('fa-eye', 'fa-eye-slash');
                }
            });
        }
    </script>
</body>
</html>
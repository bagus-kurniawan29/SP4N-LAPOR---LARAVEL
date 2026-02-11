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
    <section class="flex-1 flex items-center justify-center p-8 w-full h-screen bg-gray-100 relative overflow-hidden ">
    <div class="absolute  bg-linear-to-r h-110 w-100 from-blue-600 to-blue-900 skew-y-6 sm:skew-y-0 sm:-rotate-6 rounded-3xl shadow-lg"></div>
    <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-md text-center relative z-10">
        <h1 class="text-2xl font-bold mb-6">Daftar</h1>
        <input type="text" id="email" class="w-full p-2 border rounded mb-4 border-gray-400 focus:outline-blue-600" placeholder="Username">
        <input type="email" id="email" class="w-full p-2 border rounded mb-4 border-gray-400 focus:outline-blue-600" placeholder="Email">
        <input type="password" id="password" placeholder="Password" class="w-full p-2 border rounded border-gray-400 focus:outline-blue-600 pr-10 mb-4">
        <button type="button" id="toggleMain" class="absolute right-10 top-1/2 -translate-y-1/3 text-gray-500 cursor-pointer focus:outline-none">
        <i class="fa-regular fa-eye-slash" id="eyeIconMain"></i>
        </button>
        <input type="password" id="Confirmpassword" placeholder="Konfirmasi Password" class="w-full p-2 border rounded border-gray-400 focus:outline-blue-600 pr-10 mb-4">
        <button class="bg-blue-600 text-white px-4 py-2 rounded font-bold hover:bg-blue-700 w-full transition-colors">
            Buat Akun
        </button>
        <p class="mt-5">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-semibold">Masuk</a></p>
    </div>
</section>
</body>
</html>

<script>
    const passInput = document.getElementById('password');
    const confirmInput = document.getElementById('Confirmpassword');
    const iconMain = document.getElementById('eyeIconMain');

    function togglePasswords() {
        const isPassword = passInput.type === 'password';
        const newType = isPassword ? 'text' : 'password';

        passInput.type = newType;
        confirmInput.type = newType;
        if (newType === 'text') {
            iconMain.classList.replace('fa-eye-slash', 'fa-eye');
        } else {
            iconMain.classList.replace('fa-eye', 'fa-eye-slash');
        }
    }
    document.getElementById('toggleMain').addEventListener('click', togglePasswords);
    document.getElementById('toggleSub').addEventListener('click', togglePasswords);
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('image/logo.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>SP4N-LAPOR</title>
    @vite('resources/css/app.css')
</head>
<header class="sticky top-0 bg-white z-50">
    <nav class="flex justify-between items-center px-6 py-4">
        <div class="flex">
            <img src="{{asset('image/logo.webp')}}" alt="" class="h-16">
            <h2 class="ml-4 mt-4 text-xl font-bold text-blue-800">SP4N-LAPOR-NTB</h2>
        </div>
        <ul class="hidden md:flex gap-8 text-gray-600">
            <li><a href="#">Beranda</a></li>
            <li><a href="#">Fitur</a></li>
            <li><a href="#">Cara Kerja</a></li>
            <li><a href="#">Layanan</a></li>
        </ul>
        <button>
        @guest
            <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-bold transition">
                Masuk <i class="fa-sign-in-alt ml-3"></i>
            </a>
        @else
           <form action="{{ route('logout') }}" method="POST" class="inline">
        @csrf
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded font-bold hover:bg-blue-700 transition">
        Keluar <i class="fas fa-right-to-bracket ml-3"></i>
        </button>
        </form>
        @endauth
        </button>
    </nav>
</header>
<body>
    {{-- Hero --}}
    <section class="text-center mt-16 px-6 mx-auto items-center relative">
    <div class="absolute -top-10 left-5 md:left-10 h-64 w-64 rounded-full bg-yellow-500/20 blur-[80px]"></div>
    <div class="absolute bottom-0 right-5 md:right-10 h-80 w-80 rounded-full bg-blue-600/20 blur-[80px]"></div>
        <div class="max-w-4xl mx-auto space-y-11">
            <h1 class="text-6xl font-bold mb-4">
                Sistem Pengelolaan Pengaduan Pelayanan Publik Nasional (SP4N) - <span class="text-blue-800">Provinsi NTB</span>
            </h1>
            <p class="text-xl text-gray-600 mt-6">Sampaikan laporan Anda dengan mudah dan transparan. Kami memastikan setiap suara didengar dan di tindaklanjuti</p>
            <button>
                @guest
                <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-4 rounded-xl hover:bg-blue-600 font-bold">Sampaikan Laporan</a>
                @else
                @if(auth()->user()->role == 'admin')
                <a href="{{ route('admin.laporan') }}" class="bg-blue-600 text-white px-4 py-4 rounded-xl hover:bg-blue-600 font-bold">Sampaikan Laporan</a>
                @else
                <a href="{{ route('laporan') }}" class="bg-blue-600 text-white px-4 py-4 rounded-xl hover:bg-blue-600 font-bold">Sampaikan Laporan</a>
                @endif
                @endauth
            </button>
        </div>
    </section>
    {{-- statistik --}}
    <section class="grid grid-cols-2 md:flex justify-between bg-gray-50 mt-28 p-8">
        <div class="text-center p-8 mx-auto flex flex-col items-center">
            <h1 class="text-4xl font-bold text-blue-700">1.568</h1>
            <p class="text-gray-600">Laporan Diterima</p>
        </div>
        <div class="text-center p-8 mx-auto flex flex-col items-center">
            <h1 class="text-4xl font-bold text-blue-700">1.245</h1>
            <p class="text-gray-600">Laporan Ditindaklanjuti</p>
        </div>
        <div class="text-center p-8 mx-auto flex flex-col items-center">
            <h1 class="text-4xl font-bold text-blue-700">20</h1>
            <p class="text-gray-600">Instansi <br>Terlibat</p>
        </div>
        <div class="text-center p-8 mx-auto flex flex-col items-center">
            <h1 class="text-4xl font-bold text-blue-700">98%</h1>
            <p class="text-gray-600">tingkat Kepuasan</p>
        </div>
    </section>
    {{-- Keunggulan --}}
    <section class="justify-between p-8 text-center items-center">
        <h1 class="text-3xl font-bold">Keunggulan Kami</h1>
        <div class="max-w-2xl mx-auto">
            <p class="text-gray-600 mt-2">Platform yang dirancang khusus untuk memudahkan proses pelaporan dan memastikan tindak lanjut yang tepat</p>
        </div>
        <div class="flex flex-col md:grid grid-cols-3 gap-8 mt-20 mb-20">
            <div class="flex-col flex p-13 rounded-lg items-center shadow-xl">
                <div class="flex items-center justify-center bg-blue-600 rounded-full w-16 h-16 mb-6">
                <i class="fas fa-arrow-pointer text-white text-xl"></i>
                </div>
                <h1 class="text-xl font-bold ">Mudah Digunakan</h1>
                <p>Antarmuka yang intuitif untuk semua kalangan.</p>
            </div>
            <div class="flex-col flex p-13 rounded-lg items-center shadow-xl">
                <div class="flex items-center justify-center bg-yellow-600 rounded-full w-16 h-16  mb-6">
                <i class="fas fa-shield-alt text-white text-xl"></i>
                </div>
                <h1 class="text-xl font-bold ">Aman Dan Terpercaya</h1>
                <p>Data Anda dilindungi dengan standar keamanan terbaik.</p>
            </div>
            <div class="flex-col flex p-13 rounded-lg items-center shadow-xl">
                <div class="flex items-center justify-center bg-red-600 rounded-full w-16 h-16 mb-6">
                <i class="fas fa-bolt text-white text-xl"></i>
                </div>
                <h1 class="text-xl font-bold ">Responsif</h1>
                <p>Tindak lanjut cepat dari instansi terkait.</p>
            </div>
        </div>
    </section>
    {{-- Laporan terbaru --}}
    <section class="p-8 text-center items-center mb-32">
        <h1 class="text-3xl font-bold">Laporan Terbaru</h1>
        <p class="text-gray-600 mt-2">Lihat laporan terbaru yang telah disampaikan oleh masyarakat</p>
        <div class="flex justify-between">
            <button class="flex items-center w-12 h-12 rounded-full bg-gray-50 border border-gray-300 justify-center ">
                <i class="fas fa-chevron-left "></i>
            </button>
            <button class="flex items-center w-12 h-12 rounded-full bg-gray-50 border border-gray-300 justify-center ">
                <i class="fas fa-chevron-right "></i>
            </button>
        </div>
    </section>
    {{-- Cara Kerja --}}
    <section class="md:p-8 p-4 text-center bg-gray-50 mb-32 relative overflow-hidden">
    <h1 class="text-3xl font-bold">Cara Kerja</h1>
    <p class="text-gray-600 mt-2">Proses sederhana untuk menyampaikan pelaporan Anda</p>
    <div class="flex flex-col md:grid grid-cols-3 gap-12 md:gap-8 mt-20 mb-20 relative">
        <div class="hidden md:block absolute h-0.5 bg-blue-600 top-1/2 left-1/2 w-screen -translate-x-1/2 z-0"></div>

        <div class="flex flex-col p-9 rounded-lg items-center bg-white shadow-xl relative z-10">
            <div class="flex items-center justify-center bg-blue-600 rounded-full w-14 h-14 absolute -top-7 left-1/2 -translate-x-1/2 shadow-md">
                <span class="text-white font-bold text-xl">1</span>
            </div>
            <h2 class="mt-6 mb-2 text-xl font-semibold">Daftar Akun</h2>
            <p class="text-gray-600">Buat akun gratis untuk mulai menggunakan layanan kami</p>
        </div>
        <div class="flex flex-col p-9 rounded-lg items-center bg-white shadow-xl relative z-10">
            <div class="flex items-center justify-center bg-blue-600 rounded-full w-14 h-14 absolute -top-7 left-1/2 -translate-x-1/2 shadow-md">
                <span class="text-white font-bold text-xl">2</span>
            </div>
            <h2 class="mt-6 mb-2 text-xl font-semibold">Laporkan Masalah</h2>
            <p class="text-gray-600">Laporkan masalah yang Anda alami dengan detail dan jelas</p>
        </div>
        <div class="flex flex-col p-9 rounded-lg items-center bg-white shadow-xl relative z-10">
            <div class="flex items-center justify-center bg-blue-600 rounded-full w-14 h-14 absolute -top-7 left-1/2 -translate-x-1/2 shadow-md">
                <span class="text-white font-bold text-xl">3</span>
            </div>
            <h2 class="mt-6 mb-2 text-xl font-semibold">Tunggu Respons</h2>
            <p class="text-gray-600">Menunggu respons dari instansi terkait terkait laporan Anda</p>
        </div>
    </div>
</section>
{{-- Kata Sambutan --}}
<section class="p-8 text-center">
    <div class="bg-linear-to-b from-blue-600 to-blue-700 text-white rounded-lg p-16 mx-auto shadow-xl  items-center justify-center flex flex-col">
        <h1 class="text-4xl font-bold">Siap Menyampaikan Laporan?</h1>
        <div class="max-w-2xl mt-4">
            <p class="">Bergabunglah dengan ribuan warga yang telah menggunakan platform kami untuk membuat perubahan.</p>
        </div>
        <button class="mt-6 bg-white text-blue-600 font-bold py-3 px-8 rounded-full hover:bg-blue-50 transition duration-300 mt-6">
        @guest   
        <a href="{{ route ('login') }}">
            Mulai Sekarang
            </a>
        @else
        @if(auth()->user()->role == 'admin')
            <a href="{{ route ('admin.laporan') }}">
            Mulai Sekarang
            </a>
        @else
            <a href="{{ route ('laporan_saya') }}">
                Mulai Sekarang
            </a>
        @endif
        @endauth
        </button>
    </div>
</section>
{{-- Kerja Sama --}}
<section>
    <div class="p-8 text-center mb-16">
        <h1 class="text-3xl font-bold">Instansi Kerja Sama</h1>
        <div class="flex flex-wrap justify-center items-center gap-12 mt-12">
            <img src="{{asset('image/hailotim.webp')}}" class="h-14 saturate-0 contrast-50 hover:contrast-100 hover:saturate-100 transition duration-300">
            <img src="{{asset('image/inside lombok.webp')}}" class="h-14 saturate-0 contrast-50 hover:contrast-100 hover:saturate-100 transition duration-300">
            <img src="{{asset('image/pemprov ntb.webp')}}" class="h-14 saturate-0 contrast-50 hover:contrast-100 hover:saturate-100 transition duration-300">
            <img src="{{asset('image/dishub.webp')}}" class="h-14 saturate-0 contrast-50 hover:contrast-100 hover:saturate-100 transition duration-300">
            <img src="{{asset('image/inside sumbawa.webp')}}" class="h-14 saturate-0 contrast-50 hover:contrast-100 hover:saturate-100 transition duration-300">
        </div>
    </div>
</section>
{{-- Footer --}}
<footer class="grid md:grid-cols-4 p-8 mx-auto gap-6 md:justify-items-center items-start bg-gray-50">
    <div class="flex flex-col">
        <div class="flex">
            <img src="{{asset('image/logo.webp')}}" alt="" class="h-16">
            <h2 class="ml-4 mt-4 text-xl font-bold text-blue-800">SP4N-LAPOR-NTB</h2>
        </div>
        <p> Sistem Pengelolahan Pengaduan Pelayanan Publik Nasional</p>
    </div>
    <div>
        <h1 class="text-lg font-semibold">Layanan</h1>
        <ul class="space-y-2 mt-4 text-gray-600">
            <li><a href="#">Pelaporan</a></li>
            <li><a href="#">Tracking</a></li>
            <li><a href="#">Statistik</a></li>
    </div>
    <div>
        <h1 class="text-lg font-semibold">Hubungi Kami</h1>
        <p class="mt-4 text-gray-600">Jika Anda memiliki pertanyaan atau masukan, jangan ragu untuk menghubungi kami.</p>
        <p class="mt-4 text-gray-600">Email:sp4n-lapor@go.id</p>
        <p class="mt-2 text-gray-600">Telepon: (0365) 123-456</p>
    </div>
    <div>
        <h1 class="text-lg font-semibold">Ikuti Kami</h1>
        <div class="flex space-x-4 mt-4 text-gray-600">
            <a href="#"><i class="fab fa-facebook fa-2xl hover:text-blue-600"></i></a>
            <a href="#"><i class="fab fa-twitter fa-2xl hover:text-blue-400"></i></a>
            <a href="#"><i class="fab fa-instagram fa-2xl hover:text-pink-500"></i></a>
    </footer>
    <div class=" mx-auto bg-gray-50 py-4 border-t border-gray-200">
        <p class="text-center text-gray-500 text-sm mt-4 mb-4">© 2026 Sarana Pengelolaan Pengaduan Pelayanan Publik Nasional - Provinsi NTB.</p>
    </div>
</body>
</html>
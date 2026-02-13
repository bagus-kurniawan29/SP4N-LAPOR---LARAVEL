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
<header>
    <nav class="bg-white text-black p-4 shadow-md">
        <ul class="flex space-x-50 justify-between">
            <a href="{{ route('laporan_saya') }}" class="text-blue-500 hover:underline font-bold">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
            <h1 class="font-bold text-xl">Detail Laporan</h1>
            <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs uppercase tracking-wider">Menunggu</span>
        </ul>
    </nav>
</header>
<body class="bg-gray-50">
    <section class="max-w-3xl mx-auto mt-10  bg-white rounded-lg border border-l-4 border-blue-600 p-4">
        <h1 class="text-lg font-semibold mb-4 text-blue-600">
            ISI PENGADUAN     
        </h1>
        <div class="bg-gray-100 p-4 rounded-lg max-w-3xl mt-6 mx-auto">
            <p class="text-gray-800 leading-relaxed italic">
                "Halo min Izin melaporkan telah terjadi bencana dimana tiang listrik di daerah ***** (sebagai Contoh) roboh dan menimpa rumah warga sekitar. Akibat dari kejadian ini, beberapa rumah mengalami kerusakan parah dan beberapa warga terluka. Mohon segera ditindaklanjuti agar tidak terjadi korban lebih banyak lagi. Terima kasih."
            </p>
        </div>
    </section>
    <section class="max-w-3xl mx-auto mt-10 mb-10 flex space-x-4 items-start">
        <div class="max-w-xl bg-white border rounded-t-2xl rounded-br-2xl p-4 shadow-sm">
            <p class="text-[10px] opacity-70 font-bold mb-1 uppercase text-left">admin</p>
            <p class="text-sm">Halo, terima kasih sudah menghubungi kami. Laporan Anda akan segera kami tinjau.</p>       
        </div>
    </section>
    <section class="max-w-3xl mx-auto mt-10 mb-10 flex space-x-4 items-start">
        <div class="max-w-xl bg-blue-600 text-white border rounded-t-2xl rounded-bl-2xl p-4 shadow-sm ml-55 items-end">
            <p class="text-[10px]  font-bold mb-1 uppercase text-left">admin</p>
            <p class="text-sm">Halo, terima kasih sudah menghubungi kami. Laporan Anda akan segera kami tinjau.</p>       
        </div>
    </section>
    <section class="bottom-0 bg-gray-100 p-4 fixed w-full mx-auto">
        <form action="#" method="POST" class="flex space-x-4 max-w-3xl mx-auto">
            @csrf
            <input type="text" name="reply" placeholder="Tulis balasan..." class="grow p-2 rounded-lg border border-gray-300 focus:outline-blue-600">
            <button>
                <i class="fas fa-camera text-blue-600"></i>
            </button>
            <button type="submit" class="bg-white text-blue-600 font-bold px-4 py-2 rounded-full hover:bg-blue-100 transition duration-300">
                <i class="fas fa-paper-plane"></i>
            </button>
        </form>
    </section>
</body>
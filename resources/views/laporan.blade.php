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
<header >
    <nav class="bg-white text-black p-4 shadow-md">
        <ul class="flex space-x-50 justify-center">
            <li class="font-bold text-blue-400">Buat Laporan</li>
            <a href="{{ route('laporan_saya') }}"><li class="font-semibold text-gray-500">Laporan Saya</li></a>
        </ul>
    </nav>
</header>
<body class="bg-gray-100">
    <h1 class="text-2xl font-semibold text-center mt-15">
        Halo <span class="font-bold text-blue-600 uppercase">Nama Pengguna</span> Silahkan Laporkan Keluhkan anda
    </h1>
    <div class="bg-white max-w-6xl mx-auto mt-10 p-8 rounded-lg shadow-md mb-5">
        <form action="#" method="POST" class="space-y-6 max-w-3xl mx-auto">
            @csrf
            <div class="">
                <label for="date" class="block text-sm font-medium text-gray-700">Tanggal Laporan</label>
                <input type="datetime-local" id="date" name="date" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-blue-600" required>
            </div>
            <div>
            <label for="isi_laporan" class="block text-sm font-medium text-gray-700">Isi Laporan</label>
            <textarea id="isi_laporan" name="isi_laporan" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-blue-600" required placeholder="Tulis laporan anda"></textarea>
            <div class="mt-4">
                <label class="font-semibold text-gray-700 mb-2 pt-4">Unggah Gambar (Opsional)</label>
                <label for="file-upload" id="drop-zone" class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition duration-300 mt-4">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6" id="preview-container">
                        <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"></path>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 text-center"><span class="font-semibold">Klik untuk upload</span> atau drag and drop</p>
                    </div>
                    <img id="image-preview" class="hidden h-full w-full object-contain rounded-lg p-2">
                    <input id="file-upload" name="gambar_bukti" type="file" class="hidden" accept="image/*">
                </label>
            </div>
    </div>
</body>
</html>
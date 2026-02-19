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
    <div class="max-w-6xl mx-auto flex items-center justify-between">
        <a href="{{ route('home') }}" class="hover:opacity-70 transition-opacity">
            <i class="fa-solid fa-arrow-left text-xl text-blue-600"></i>
        </a>
        <ul class="flex items-center space-x-8 md:space-x-12">
            <li>
                <a href="{{ route('laporan') }}" class="font-semibold text-gray-500 hover:text-blue-400 transition-colors">
                    Buat Laporan
                </a>
            </li>
            <li>
                <a href="#" class="font-semibold text-blue-600 ">
                    Laporan Saya
                </a>
            </li>
        </ul>
        <div class="w-6 hidden md:block"></div>
    </div>
</nav>
</header>
<body class="bg-gray-100">
    <h1 class="text-6xl font-bold text-center mt-15">Lihat Laporan anda</h1>

    <div class="bg-white max-w-7.5xl mx-auto mt-10 p-8 rounded-lg shadow-md mb-5">
        <table class="min-w-full border-collapse block md:table">
            <thead>
                <tr class="border border-gray-300 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative">
                        <th class="bg-gray-200 p-2 text-gray-700 font-bold md:border md:border-gray-300 text-left block md:table-cell">Tanggal Pelaporan</th>
                        <th class="bg-gray-200 p-2 text-gray-700 font-bold md:border md:border-gray-300 text-left block md:table-cell">Alamat Pelaporan</th>
                        <th class="bg-gray-200 p-2 text-gray-700 font-bold md:border md:border-gray-300 text-left block md:table-cell w-1/3">Isi Laporan</th>
                        <th class="bg-gray-200 p-2 text-gray-700 font-bold md:border md:border-gray-300 text-left block md:table-cell">Status</th>
                        <th class="bg-gray-200 p-2 text-gray-700 font-bold md:border md:border-gray-300 text-left block md:table-cell">Gambar Bukti</th>
                        <th class="bg-gray-200 p-2 text-gray-700 font-bold md:border md:border-gray-300 text-left block md:table-cell">Aksi</th>
                    </tr>
            </thead>
            @foreach ($laporans as $item)
        <tbody class="block md:table-row-group">
                    <tr class="bg-white border border-gray-300 md:border-none block md:table-row hover:bg-gray-50 transition duration-150">
                        <td class="p-2 md:border md:border-gray-300 text-left block md:table-cell">
                            <span class="md:hidden font-bold text-blue-600">Tanggal: </span>
                            {{ \Carbon\Carbon::parse($item->date)->format('d M Y, H:i') }}
                        </td>
                        <td class="p-2 md:border md:border-gray-300 text-left block md:table-cell">
                            <span class="md:hidden font-bold text-blue-600">Alamat: </span>
                            {{$item->address}}
                        </td>

                        <td class="p-2 md:border md:border-gray-300 text-left block md:table-cell break-all">
                            <span class="md:hidden font-bold text-blue-600">Isi: </span>
                           <p class="overflow-clip line-clamp-2">
                            {{$item->isi_laporan}}
                           </p>
                        </td>

                        <td class="p-2 md:border md:border-gray-300 text-left block md:table-cell font-semibold">
                            <span class="md:hidden font-bold text-blue-600">Status: </span>
                                <span class="text-yellow-600 bg-yellow-100 px-3 py-1 rounded-full text-xs uppercase tracking-wider">Dalam Proses</span>
                        </td>

                        <td class="p-2 md:border md:border-gray-300 text-left block md:table-cell text-center">
                            <span class="md:hidden font-bold text-blue-600 block text-left">Bukti: </span>
                            
                                <a href="/media/bukti_laporan/{{$item->bukti_laporan}}" target="_blank" class="inline-block">
                                     <img src="/media/bukti_laporan/{{$item->bukti_laporan}}" alt="Bukti Laporan" class="w-16 h-16 object-cover rounded-lg border border-gray-200 hover:scale-110 transition-transform shadow-sm">
                               </a>
                        </td>
                        <td class="p-2 md:border md:border-gray-300 text-left block md:table-cell">
                            <span class="md:hidden font-bold text-blue-600">Progres: </span>
                            <a href="{{ route('laporan.detail', $item->id) }}" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold py-2 px-3 rounded-lg transition-colors">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                Lihat Chat
                            </a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
        </table>
    </div>
</body>
</html>
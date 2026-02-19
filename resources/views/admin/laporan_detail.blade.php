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
    <section class="max-w-3xl mx-auto mt-10 bg-white rounded-lg border border-l-4 border-blue-600 p-4">
    <h1 class="text-lg font-semibold mb-4 text-blue-600 text-center">ISI PENGADUAN</h1>
    <div class="bg-gray-100 p-4 rounded-lg">
        <p class="text-gray-800 leading-relaxed italic">
            "{{ $laporan->isi_laporan }}"
        </p>
    </div>
</section>

<div id="chat-box" class="pb-32 px-4"> 
    @foreach($laporan->messages as $msg)
        @php
            // Cek apakah pesan ini milik orang yang sedang buka halaman ini
            $isMe = $msg->user_id == auth()->id();
        @endphp

        <section class="max-w-3xl mx-auto mt-5 flex {{ $isMe ? 'justify-end' : 'justify-start' }}">
            <div class="max-w-[80%] md:max-w-xl p-4 shadow-sm 
                {{ $isMe 
                    ? 'bg-blue-600 text-white rounded-t-2xl rounded-bl-2xl' 
                    : 'bg-white border border-gray-200 text-gray-800 rounded-t-2xl rounded-br-2xl' 
                }}">
                
                <p class="text-[10px] font-bold mb-1 uppercase {{ $isMe ? 'text-blue-100' : 'text-blue-600' }}">
                    {{ $msg->user->role == 'admin' ? 'Admin' : $msg->user->name }}
                </p>
                
                <p class="text-sm leading-relaxed">{{ $msg->message }}</p>
                
                <p class="text-[9px] mt-2 text-right {{ $isMe ? 'text-blue-200' : 'text-gray-400' }}">
                    {{ $msg->created_at->format('H:i') }}
                </p>
            </div>
        </section>
    @endforeach
</div>
</div>
<section class="bottom-0 bg-gray-100 p-4 fixed w-full mx-auto">
    <form action="{{ route('chat.send', $laporan->id) }}" method="POST" class="flex space-x-4 max-w-3xl mx-auto">
        @csrf
        <input type="text" name="message" placeholder="Tulis balasan..." class="grow p-2 rounded-lg border border-gray-300 focus:outline-blue-600" required>
        <button type="button">
            <i class="fas fa-camera text-blue-600"></i>
        </button>
        <button type="submit" class="bg-white text-blue-600 font-bold px-4 py-2 rounded-full hover:bg-blue-100 transition duration-300">
            <i class="fas fa-paper-plane"></i>
        </button>
    </form>
</section>
</body>

<script type="module">
    Echo.private('laporan.{{ $laporan->id }}')
        .listen('MessageSent', (e) => {
            const chatBox = document.getElementById('chat-box');
            const isMe = e.user_id == {{ auth()->id() }};
            
            const newMessage = `
                <section class="max-w-3xl mx-auto mt-5 flex ${isMe ? 'justify-end' : 'justify-start'}">
                    <div class="max-w-xl p-4 shadow-sm ${isMe ? 'bg-blue-600 text-white rounded-t-2xl rounded-bl-2xl' : 'bg-white border rounded-t-2xl rounded-br-2xl'}">
                        <p class="text-[10px] font-bold mb-1 uppercase opacity-70">${e.user_name}</p>
                        <p class="text-sm">${e.message}</p>
                    </div>
                </section>`;
            
            chatBox.insertAdjacentHTML('beforeend', newMessage);
            window.scrollTo(0, document.body.scrollHeight);
        });
</script>
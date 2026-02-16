<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SP4N-LAPOR NTB</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
   @if (session('success'))
    <div id="msg" class="fixed bottom-10 left-1/2 -translate-x-1/2 z-999 animate-bounce">
        <div class="bg-green-600 text-white px-6 py-3 rounded-full shadow-2xl flex items-center gap-2">
            <i class="fa-solid fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    </div>
@endif

@if (session('error'))
    <div id="msg" class="fixed bottom-10 left-1/2 -translate-x-1/2 z-999">
        <div class="bg-red-600 text-white px-6 py-3 rounded-full shadow-2xl flex items-center gap-2">
            <i class="fa-solid fa-exclamation-triangle"></i>
            <span>{{ session('error') }}</span>
        </div>
    </div>
@endif

<script>
    // Script agar snackbar hilang otomatis setelah 3 detik
    setTimeout(() => {
        const snack = document.getElementById('msg');
        if (snack) {
            snack.style.opacity = '0';
            snack.style.transition = '0.5s';
            setTimeout(() => snack.remove(), 500);
        }
    }, 3000);
</script>
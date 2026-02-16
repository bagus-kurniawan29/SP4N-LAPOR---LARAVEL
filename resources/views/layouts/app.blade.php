<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SP4N-LAPOR NTB</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Animasi masuk dari kanan */
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        .animate-slide-in {
            animation: slideIn 0.5s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gray-100">
    <main>
        @yield('content')
    </main>

    <div id="alert-container" class="fixed top-5 right-5 z-[999] flex flex-col gap-3">
        
        {{-- Alert Sukses --}}
        @if (session('success'))
            <div class="alert-item bg-white border-l-4 border-green-500 shadow-2xl p-4 rounded-lg flex items-center gap-4 min-w-[320px] animate-slide-in">
                <div class="bg-green-100 p-2 rounded-full">
                    <i class="fa-solid fa-check text-green-600"></i>
                </div>
                <div class="text-left flex-1">
                    <p class="font-bold text-gray-800 text-sm">Berhasil!</p>
                    <p class="text-xs text-gray-600">{{ session('success') }}</p>
                </div>
                <button onclick="closeAlert(this)" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        @endif

        {{-- Alert Gagal --}}
        @if (session('error'))
            <div class="alert-item bg-white border-l-4 border-red-500 shadow-2xl p-4 rounded-lg flex items-center gap-4 min-w-[320px] animate-slide-in">
                <div class="bg-red-100 p-2 rounded-full">
                    <i class="fa-solid fa-triangle-exclamation text-red-600"></i>
                </div>
                <div class="text-left flex-1">
                    <p class="font-bold text-gray-800 text-sm">Gagal!</p>
                    <p class="text-xs text-gray-600">{{ session('error') }}</p>
                </div>
                <button onclick="closeAlert(this)" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        @endif
    </div>

    <script>
        // Fungsi untuk menutup alert secara manual
        function closeAlert(btn) {
            const alert = btn.closest('.alert-item');
            alert.style.transform = 'translateX(100%)';
            alert.style.opacity = '0';
            alert.style.transition = 'all 0.5s ease';
            setTimeout(() => alert.remove(), 500);
        }

        // Otomatis tutup alert setelah 4 detik
        document.addEventListener('DOMContentLoaded', () => {
            const activeAlerts = document.querySelectorAll('.alert-item');
            activeAlerts.forEach(alert => {
                setTimeout(() => {
                    if(alert) {
                        alert.style.transform = 'translateX(100%)';
                        alert.style.opacity = '0';
                        alert.style.transition = 'all 0.5s ease';
                        setTimeout(() => alert.remove(), 500);
                    }
                }, 4000);
            });
        });
    </script>

</body>
</html>
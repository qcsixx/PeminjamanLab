<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - Vokasi UB</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #0F4C81;
            --secondary: #707070;
            --bg-color: #F3F4F6;
            --card-bg: #F9FAFB;
            --button-hover: #fdb813;
        }
        .hidden-card {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .visible-card {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="bg-[var(--bg-color)]">

    <header class="w-full py-6 bg-[var(--primary)] shadow-md fixed top-0 z-50 animate__animated animate__fadeInDown">
        <div class="container mx-auto flex justify-between items-center px-6">
            <h1 class="text-3xl font-extrabold text-white">Lab IoT - Vokasi UB</h1>
            <nav class="hidden md:flex space-x-8">
            </nav>
        </div>
    </header>

    <section class="flex flex-col items-center justify-center h-screen text-center px-6">
        <h2 class="text-5xl font-extrabold text-[var(--primary)] animate__animated animate__fadeInDown animate__delay-1s">
            Sistem Peminjaman Barang Laboratorium IoT
        </h2>
        <p class="mt-4 text-gray-700 max-w-xl mx-auto animate__animated animate__fadeIn animate__delay-2s">
            Kelola peminjaman barang laboratorium dengan mudah, cepat, dan terstruktur.
        </p>
        <div class="mt-8 flex flex-wrap justify-center gap-6 animate__animated animate__fadeInUp animate__delay-3s">
            <a href="{{ url('/login') }}" 
                class="px-8 py-3 bg-[#0F4C81] text-white font-semibold rounded-lg shadow-lg transition-all duration-500 transform hover:bg-[var(--button-hover)] hover:scale-110">
                Login
            </a>
            <a href="{{ url('/register') }}" 
                class="px-8 py-3 bg-gray-700 text-white font-semibold rounded-lg shadow-lg transition-all duration-500 transform hover:bg-[var(--button-hover)] hover:scale-110">
                Register
            </a>
        </div>
    </section>
    
    <section id="features" class="py-20 bg-white text-center">
        <h3 class="text-4xl font-bold text-[var(--primary)]">Fitur Unggulan</h3>
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-12 px-6">
            <div class="p-8 bg-[var(--card-bg)] rounded-2xl shadow-xl hidden-card"> <h4 class="text-xl font-semibold text-[var(--primary)]">Manajemen Peminjaman</h4><p class="mt-3 text-gray-600">Memudahkan pencatatan dan pengelolaan peminjaman barang dengan sistem yang terintegrasi.</p></div>
            <div class="p-8 bg-[var(--card-bg)] rounded-2xl shadow-xl hidden-card"> <h4 class="text-xl font-semibold text-[var(--primary)]">Notifikasi Otomatis</h4><p class="mt-3 text-gray-600">Dapatkan pengingat otomatis saat alat tersedia atau kembali.</p></div>
            <div class="p-8 bg-[var(--card-bg)] rounded-2xl shadow-xl hidden-card"> <h4 class="text-xl font-semibold text-[var(--primary)]">Manajemen Inventaris</h4><p class="mt-3 text-gray-600">Monitoring status barang serta laporan riwayat peminjaman secara real-time.</p></div>
            <div class="p-8 bg-[var(--card-bg)] rounded-2xl shadow-xl hidden-card"> <h4 class="text-xl font-semibold text-[var(--primary)]">Sensor Monitoring</h4><p class="mt-3 text-gray-600">Pantau kondisi alat secara real-time.</p></div>
            <div class="p-8 bg-[var(--card-bg)] rounded-2xl shadow-xl hidden-card"> <h4 class="text-xl font-semibold text-[var(--primary)]">Sistem Pemantauan Pengguna</h4><p class="mt-3 text-gray-600">Mencatat siapa yang terakhir kali menggunakan alat untuk meningkatkan keamanan dan akuntabilitas.</p></div>
            <div class="p-8 bg-[var(--card-bg)] rounded-2xl shadow-xl hidden-card"> <h4 class="text-xl font-semibold text-[var(--primary)]">Data Real-time</h4><p class="mt-3 text-gray-600">Pantau status peminjaman dan penggunaan alat secara langsung melalui dashboard.</p></div>
        </div>
    </section>

    <section id="contact" class="py-12 bg-white text-center">
        <h3 class="text-4xl font-bold text-[var(--primary)] mb-6">Contact</h3>
        <div class="flex justify-center space-x-10 text-gray-700 text-lg">
            <a href="mailto:labiot@vokasi.ub.ac.id" class="flex items-center space-x-3 hover:text-[var(--primary)] transition">
                <img src="https://cdn-icons-png.flaticon.com/512/732/732200.png" class="h-8 w-8" alt="Email">
                <span>Email</span>
            </a>
            
            <a href="https://www.instagram.com/vokasiub" target="_blank" class="flex items-center space-x-3 hover:text-[var(--primary)] transition">
                <img src="https://cdn-icons-png.flaticon.com/512/174/174855.png" class="h-8 w-8" alt="Instagram">
                <span>Instagram</span>
            </a>
    
            <a href="https://wa.me/6281234567890" target="_blank" class="flex items-center space-x-3 hover:text-[var(--primary)] transition">
                <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" class="h-8 w-8" alt="WhatsApp">
                <span>WhatsApp</span>
            </a>
    
            <a href="https://goo.gl/maps/xT7hG5KqFgM2" target="_blank" class="flex items-center space-x-3 hover:text-[var(--primary)] transition">
                <img src="https://cdn-icons-png.flaticon.com/512/684/684809.png" class="h-8 w-8" alt="Alamat">
                <span>Alamat</span>
            </a>
        </div>
    </section>       

    <footer class="w-full py-6 bg-[var(--primary)] text-center text-white">
        <p>&copy; 2024 Vokasi UB. All Rights Reserved.</p>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("visible-card");
                    } else {
                        entry.target.classList.remove("visible-card"); // Reset animasi ketika keluar viewport
                    }
                });
            }, { threshold: 0.2 });
    
            document.querySelectorAll(".hidden-card").forEach(card => {
                observer.observe(card);
            });
        });
    </script>
</body>
</html>

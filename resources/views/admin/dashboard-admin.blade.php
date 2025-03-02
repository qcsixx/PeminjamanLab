<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kepala Lab - Lab IoT Vokasi UB</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --primary: #0F4C81;
            --secondary: #707070;
            --bg-color: #F3F4F6;
            --card-bg: #FFFFFF;
            --button-hover: #FDB813;
        }
    </style>
</head>
<body class="bg-[var(--bg-color)] font-sans text-[var(--secondary)]">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-[var(--primary)] text-white p-6 space-y-6">
            <h2 class="text-lg font-semibold text-[var(--button-hover)]">Lab IoT Vokasi UB</h2>
            <nav class="space-y-4">
                <a href="#" class="block hover:text-[var(--button-hover)] font-bold">Dashboard</a>
                <a href="{{ url('/admin/manajemen-barang') }}" class="block hover:text-[var(--button-hover)] transition">Manajemen Barang</a>
                <a href="{{ url('/admin/persetujuan-peminjaman') }}" class="block hover:text-[var(--button-hover)] transition">Persetujuan Peminjaman</a>
                <a href="{{ url('/admin/laporan-peminjaman') }}" class="block hover:text-[var(--button-hover)] transition">Laporan Peminjaman</a>
                <a href="{{ url('/admin/pelacakan-barang') }}" class="block hover:text-[var(--button-hover)] transition">Pelacakan Barang</a>
                <a href="{{ url('/admin/pengelolaan-user') }}" class="block hover:text-[var(--button-hover)] transition">Pengelolaan User</a>
                <a href="#" onclick="confirmLogout()" class="block hover:text-red-400 transition">Logout</a>
            </nav>
        </aside>


        <!-- Main Content -->
        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold text-[var(--primary)]">Dashboard Kepala Lab</h1>

            <div class="grid grid-cols-3 gap-6 mt-6">
                <div class="p-6 bg-white rounded-lg shadow-lg flex items-center hover:scale-105 transition duration-300">
                    <span class="text-yellow-500 text-4xl">🕒</span>
                    <div class="ml-4">
                        <p class="text-gray-600">Pending</p>
                        <p class="text-2xl font-bold">5</p>
                    </div>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-lg flex items-center hover:scale-105 transition duration-300">
                    <span class="text-green-500 text-4xl">✔️</span>
                    <div class="ml-4">
                        <p class="text-gray-600">Disetujui</p>
                        <p class="text-2xl font-bold">12</p>
                    </div>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-lg flex items-center hover:scale-105 transition duration-300">
                    <span class="text-red-500 text-4xl">❌</span>
                    <div class="ml-4">
                        <p class="text-gray-600">Ditolak</p>
                        <p class="text-2xl font-bold">2</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6 mt-6">
                <div class="p-6 bg-white rounded-lg shadow-lg hover:scale-105 transition duration-300">
                    <h2 class="font-bold text-lg">Barang Sedang Dipinjam</h2>
                    <p class="text-xl font-semibold">10 Barang</p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-lg hover:scale-105 transition duration-300">
                    <h2 class="font-bold text-lg">Stok Tersedia</h2>
                    <p class="text-xl font-semibold">35 Barang</p>
                </div>
            </div>

            <div class="mt-10 grid grid-cols-2 gap-6">
                <!-- Notifikasi Peminjaman -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:bg-gray-100 transition duration-300">
                    <h3 class="text-lg font-semibold text-[var(--primary)] mb-4">Notifikasi Peminjaman</h3>
                    <ul class="space-y-3">
                        <li class="p-3 bg-gray-200 rounded-lg cursor-pointer hover:bg-gray-300 transition duration-200" onclick="location.href='peminjaman.html'">Budi mengajukan peminjaman Laptop</li>
                        <li class="p-3 bg-gray-200 rounded-lg cursor-pointer hover:bg-gray-300 transition duration-200" onclick="location.href='peminjaman.html'">Ani mengajukan peminjaman Proyektor</li>
                        <li class="p-3 bg-gray-200 rounded-lg cursor-pointer hover:bg-gray-300 transition duration-200" onclick="location.href='peminjaman.html'">Siti mengajukan peminjaman Router</li>
                        <li class="p-3 bg-gray-200 rounded-lg cursor-pointer hover:bg-gray-300 transition duration-200" onclick="location.href='peminjaman.html'">Rudi mengajukan peminjaman Oscilloscope</li>
                    </ul>
                </div>
                
                <!-- Notifikasi Pelacakan Barang -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:bg-gray-100 transition duration-300">
                    <h3 class="text-lg font-semibold text-[var(--primary)] mb-4">Notifikasi Pelacakan Barang</h3>
                    <ul class="space-y-3">
                        <li class="p-3 bg-gray-200 rounded-lg cursor-pointer hover:bg-gray-300 transition duration-200" onclick="location.href='pelacakan.html'">Budi mengunggah foto barang Laptop</li>
                        <li class="p-3 bg-gray-200 rounded-lg cursor-pointer hover:bg-gray-300 transition duration-200" onclick="location.href='pelacakan.html'">Ani mengunggah foto barang Proyektor</li>
                        <li class="p-3 bg-gray-200 rounded-lg cursor-pointer hover:bg-gray-300 transition duration-200" onclick="location.href='pelacakan.html'">Siti mengunggah foto barang Router</li>
                        <li class="p-3 bg-gray-200 rounded-lg cursor-pointer hover:bg-gray-300 transition duration-200" onclick="location.href='pelacakan.html'">Rudi mengunggah foto barang Oscilloscope</li>
                    </ul>
                </div>
            </div>
        </main>
    </div>
    <script>
        function confirmLogout() {
            Swal.fire({
                title: "Logout?",
                text: "Anda yakin ingin keluar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, keluar",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/logout"; // Sesuaikan dengan URL logout Laravel
                }
            });
        }
    </script>
    
</body>
</html>
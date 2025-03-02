<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman - Lab IoT</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --primary: #0F4C81;
            --secondary: #707070;
            --bg-color: #F3F4F6;
            --card-bg: #FFFFFF;
            --button-hover: #FDB813;
            --danger: #d33;
        }
    </style>
</head>
<body class="bg-[var(--bg-color)] font-sans text-[var(--secondary)]">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-[var(--primary)] text-white p-6 space-y-6">
            <h2 class="text-lg font-semibold text-[var(--button-hover)]">Lab IoT Vokasi UB</h2>
            <nav class="space-y-4">
                <a href="{{ url('/admin/dashboard-admin') }}" class="block hover:text-[var(--button-hover)] transition">Dashboard</a>
                <a href="{{ url('/admin/manajemen-barang') }}" class="block hover:text-[var(--button-hover)] transition">Manajemen Barang</a>
                <a href="{{ url('/admin/persetujuan-peminjaman') }}" class="block hover:text-[var(--button-hover)] transition">Persetujuan Peminjaman</a>
                <a href="#" class="block hover:text-[var(--button-hover)] font-bold">Laporan Peminjaman</a>
                <a href="{{ url('/admin/pelacakan-barang') }}" class="block hover:text-[var(--button-hover)] transition">Pelacakan Barang</a>
                <a href="{{ url('/admin/pengelolaan-user') }}" class="block hover:text-[var(--button-hover)] transition">Pengelolaan User</a>
                <a href="#" onclick="confirmLogout()" class="block hover:text-red-400 transition">Logout</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold text-[var(--primary)]">Laporan Peminjaman</h1>
            
            <!-- Filter -->
            <div class="bg-[var(--card-bg)] shadow-lg rounded-lg p-4 my-4 flex space-x-4">
                <input type="date" class="border p-2 rounded w-1/3" placeholder="Tanggal">
                <select class="border p-2 rounded w-1/3">
                    <option>Status</option>
                    <option>Dipinjam</option>
                    <option>Dikembalikan</option>
                </select>
                <input type="text" class="border p-2 rounded w-1/3" placeholder="Cari Peminjam">
                <button class="bg-[var(--primary)] text-white px-4 py-2 rounded hover:bg-blue-700">Cari</button>
            </div>

            <!-- Tabel Laporan -->
            <div class="overflow-x-auto bg-[var(--card-bg)] shadow-lg rounded-lg p-4">
                <table class="w-full border border-gray-200">
                    <thead>
                        <tr class="bg-[var(--primary)] text-white">
                            <th class="border p-2">Nama Barang</th>
                            <th class="border p-2">Peminjam</th>
                            <th class="border p-2">Tanggal Peminjaman</th>
                            <th class="border p-2">Batas Pengembalian</th>
                            <th class="border p-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-100">
                            <td class="border p-2">Arduino Uno</td>
                            <td class="border p-2">Budi Santoso</td>
                            <td class="border p-2">10 Feb 2025</td>
                            <td class="border p-2">17 Feb 2025</td>
                            <td class="border p-2 text-green-500 font-semibold">Dipinjam</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Export Button -->
            <div class="mt-4">
                <button class="bg-[var(--button-hover)] text-[var(--primary)] font-semibold px-4 py-2 rounded hover:bg-yellow-500">Export PDF</button>
                <button class="bg-[var(--primary)] text-white px-4 py-2 rounded ml-2 hover:bg-blue-700">Export Excel</button>
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

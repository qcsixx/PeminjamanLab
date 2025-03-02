<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelacakan Barang - Lab IoT</title>
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
        <aside class="w-64 bg-[var(--primary)] text-white p-6 space-y-6">
            <h2 class="text-lg font-semibold text-[var(--button-hover)]">Lab IoT Vokasi UB</h2>
            <nav class="space-y-4">
                <a href="{{ url('/admin/dashboard-admin') }}" class="block hover:text-[var(--button-hover)] transition">Dashboard</a>
                <a href="{{ url('/admin/manajemen-barang') }}" class="block hover:text-[var(--button-hover)] transition">Manajemen Barang</a>
                <a href="{{ url('/admin/persetujuan-peminjaman') }}" class="block hover:text-[var(--button-hover)] transition">Persetujuan Peminjaman</a>
                <a href="{{ url('/admin/laporan-peminjaman') }}" class="block hover:text-[var(--button-hover)] transition">Laporan Peminjaman</a>
                <a href="#" class="block hover:text-[var(--button-hover)] font-bold">Pelacakan Barang</a>
                <a href="{{ url('/admin/pengelolaan-user') }}" class="block hover:text-[var(--button-hover)] transition">Pengelolaan User</a>
                <a href="#" onclick="confirmLogout()" class="block hover:text-red-400 transition">Logout</a>
            </nav>
        </aside>

        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold text-[var(--primary)]">Pelacakan Barang</h1>
            <div class="overflow-x-auto bg-[var(--card-bg)] shadow-lg rounded-lg p-4 mt-4">
                <table class="w-full border border-gray-200">
                    <thead>
                        <tr class="bg-[var(--primary)] text-white">
                            <th class="border p-2">Nama Barang</th>
                            <th class="border p-2">Peminjam</th>
                            <th class="border p-2">Lokasi Terkini</th>
                            <th class="border p-2">Foto</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-100">
                            <td class="border p-2">Raspberry Pi</td>
                            <td class="border p-2">John Doe</td>
                            <td class="border p-2">Gedung A, Lab IoT</td>
                            <td class="border p-2 text-center">
                                <img src="https://via.placeholder.com/100" alt="Barang" class="mx-auto rounded">
                            </td>
                            <td class="border p-2 text-center">
                                <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Verifikasi</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
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

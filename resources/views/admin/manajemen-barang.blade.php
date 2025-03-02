<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Barang - Lab IoT</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
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
                <a href="#" class="block hover:text-[var(--button-hover)] font-bold">Manajemen Barang</a>
                <a href="{{ url('/admin/persetujuan-peminjaman') }}" class="block hover:text-[var(--button-hover)] transition">Persetujuan Peminjaman</a>
                <a href="{{ url('/admin/laporan-peminjaman') }}" class="block hover:text-[var(--button-hover)] transition">Laporan Peminjaman</a>
                <a href="{{ url('/admin/pelacakan-barang') }}" class="block hover:text-[var(--button-hover)] transition">Pelacakan Barang</a>
                <a href="{{ url('/admin/pengelolaan-user') }}" class="block hover:text-[var(--button-hover)] transition">Pengelolaan User</a>
                <a href="#" onclick="confirmLogout()" class="block hover:text-red-400 transition">Logout</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold text-[var(--primary)]">Manajemen Barang</h1>
            <button class="my-4 bg-[var(--button-hover)] text-[var(--primary)] font-semibold px-4 py-2 rounded hover:bg-yellow-500" onclick="openModal('addItemModal')">Tambah Barang</button>
            
            <!-- Tabel Barang -->
            <div class="overflow-x-auto bg-[var(--card-bg)] shadow-lg rounded-lg p-4">
                <table class="w-full border border-gray-200">
                    <thead>
                        <tr class="bg-[var(--primary)] text-white">
                            <th class="border p-2">Nama Barang</th>
                            <th class="border p-2">Kategori</th>
                            <th class="border p-2">Jumlah</th>
                            <th class="border p-2">Lokasi</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-100">
                            <td class="border p-2">Raspberry Pi</td>
                            <td class="border p-2">Mikrokontroler</td>
                            <td class="border p-2">5</td>
                            <td class="border p-2">Rak 1</td>
                            <td class="border p-2 text-center">
                                <button class="bg-[var(--button-hover)] text-[var(--primary)] px-2 py-1 rounded hover:bg-yellow-500" onclick="openModal('editItemModal')">Edit</button>
                                <button class="bg-red-500 text-white px-2 py-1 rounded ml-2 hover:bg-red-600" onclick="confirmDelete('Raspberry Pi')">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Modal Tambah Barang -->
    <div id="addItemModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center opacity-0 invisible transition-opacity duration-300">
        <div class="bg-[var(--card-bg)] p-6 rounded-lg w-1/3">
            <h2 class="text-xl font-bold mb-4 text-[var(--primary)]">Tambah Barang</h2>
            <input type="text" placeholder="Nama Barang" class="w-full mb-2 p-2 border rounded">
            <input type="text" placeholder="Kategori" class="w-full mb-2 p-2 border rounded">
            <input type="number" placeholder="Jumlah" class="w-full mb-2 p-2 border rounded">
            <input type="text" placeholder="Lokasi" class="w-full mb-2 p-2 border rounded">
            <button class="bg-[var(--primary)] text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            <button class="bg-gray-400 text-white px-4 py-2 rounded ml-2 hover:bg-gray-500" onclick="closeModal('addItemModal')">Batal</button>
        </div>
    </div>

    <!-- Modal Edit Barang -->
    <div id="editItemModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center opacity-0 invisible transition-opacity duration-300">
        <div class="bg-[var(--card-bg)] p-6 rounded-lg w-1/3">
            <h2 class="text-xl font-bold mb-4 text-[var(--primary)]">Edit Barang</h2>
            <input type="text" value="Raspberry Pi" class="w-full mb-2 p-2 border rounded">
            <input type="text" value="Mikrokontroler" class="w-full mb-2 p-2 border rounded">
            <input type="number" value="5" class="w-full mb-2 p-2 border rounded">
            <input type="text" value="Rak 1" class="w-full mb-2 p-2 border rounded">
            <button class="bg-[var(--primary)] text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            <button class="bg-gray-400 text-white px-4 py-2 rounded ml-2 hover:bg-gray-500" onclick="closeModal('editItemModal')">Batal</button>
        </div>
    </div>

    <script>
        function openModal(id) {
            let modal = document.getElementById(id);
            modal.classList.remove('opacity-0', 'invisible');
        }
        function closeModal(id) {
            let modal = document.getElementById(id);
            modal.classList.add('opacity-0', 'invisible');
        }

        function confirmDelete(itemName) {
            Swal.fire({
                title: 'Hapus Barang?',
                text: "Apakah Anda yakin ingin menghapus " + itemName + "?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'var(--danger)',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Dihapus!',
                        itemName + ' telah dihapus.',
                        'success'
                    );
                }
            });
        }

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

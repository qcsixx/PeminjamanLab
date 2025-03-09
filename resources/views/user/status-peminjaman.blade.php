<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Peminjaman</title>
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
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-[var(--primary)] text-white p-4 flex justify-between items-center shadow-md w-full">
            <h1 class="text-lg font-bold">Lab IoT Vokasi UB</h1>
            <div class="space-x-4">
                <a href="{{ url('/user/dashboard-user') }}" class="hover:text-yellow-300">Dashboard</a>
                <a href="{{ url('/user/peminjaman') }}" class="hover:text-yellow-300">Peminjaman</a>
                <a href="{{ url('/user/status-peminjaman') }}" class="hover:text-yellow-300">Status</a>
                <a href="{{ url('/user/pelacakan') }}" class="hover:text-yellow-300">Pelacakan</a>
                <button class="bg-red-500 px-4 py-2 rounded hover:bg-red-600" onclick="confirmLogout()">Logout</button>
            </div>
        </nav>
        
        <!-- Main Content -->
        <main class="flex-1 pt-10 px-6">
            <div class="bg-[var(--card-bg)] shadow-lg p-6 rounded-xl">
                <h2 class="text-xl font-bold text-[var(--primary)] mb-4">Daftar Peminjaman</h2>
                <table class="w-full border-2 border-gray-300 shadow-sm rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-[var(--primary)] text-white text-left">
                            <th class="p-3 border-2 border-gray-300">Nama</th>
                            <th class="p-3 border-2 border-gray-300">Barang</th>
                            <th class="p-3 border-2 border-gray-300">Jumlah</th>
                            <th class="p-3 border-2 border-gray-300">Status</th>
                            <th class="p-3 border-2 border-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b-2 hover:bg-gray-100 transition">
                            <td class="p-3 border-2 border-gray-300">John Doe</td>
                            <td class="p-3 border-2 border-gray-300">Arduino Uno</td>
                            <td class="p-3 border-2 border-gray-300">1</td>
                            <td class="p-3 text-yellow-500 font-semibold border-2 border-gray-300">Pending</td>
                            <td class="p-3 text-center border-2 border-gray-300">-</td>
                        </tr>
                        <tr class="bg-gray-50 border-b-2 hover:bg-gray-100 transition">
                            <td class="p-3 border-2 border-gray-300">Jane Smith</td>
                            <td class="p-3 border-2 border-gray-300">Sensor DHT11</td>
                            <td class="p-3 border-2 border-gray-300">2</td>
                            <td class="p-3 text-green-500 font-semibold border-2 border-gray-300">Approved</td>
                            <td class="p-3 text-center border-2 border-gray-300">
                                <button class="bg-[var(--primary)] text-white px-4 py-2 rounded-md hover:bg-[var(--button-hover)] transition" onclick="openUploadModal()">Konfirmasi Pengembalian</button>
                            </td>
                        </tr>
                        <tr class="bg-white border-b-2 hover:bg-gray-100 transition">
                            <td class="p-3 border-2 border-gray-300">Alex Johnson</td>
                            <td class="p-3 border-2 border-gray-300">Multimeter</td>
                            <td class="p-3 border-2 border-gray-300">1</td>
                            <td class="p-3 text-red-500 font-semibold border-2 border-gray-300">Rejected</td>
                            <td class="p-3 text-center border-2 border-gray-300">Dokumen tidak lengkap</td>
                        </tr>
                    </tbody>
                </table>                
            </div>
        </main>
    </div>

    <!-- Modal Upload Bukti Pengembalian -->
    <div id="uploadModal" class="opacity-0 pointer-events-none fixed inset-0 bg-black bg-opacity-50 items-center justify-center transition-opacity duration-300">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-bold text-[var(--primary)] mb-4">Upload Bukti Pengembalian</h2>
            <input type="file" id="buktiPengembalian" class="w-full border p-2 rounded mb-4">
            <div class="flex justify-end space-x-2">
                <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600" onclick="closeUploadModal()">Batal</button>
                <button class="bg-[var(--primary)] text-white px-4 py-2 rounded hover:bg-[var(--button-hover)]" onclick="submitBukti()">Kirim</button>
            </div>
        </div>
    </div>

    <script>
        function openUploadModal() {
            let modal = document.getElementById('uploadModal');
            modal.classList.remove('opacity-0', 'pointer-events-none');
        }

        function closeUploadModal() {
            let modal = document.getElementById('uploadModal');
            modal.classList.add('opacity-0', 'pointer-events-none');
        }

        function submitBukti() {
            let file = document.getElementById('buktiPengembalian').files[0];
            if (!file) {
                Swal.fire('Error', 'Silakan unggah bukti pengembalian!', 'error');
                return;
            }
            Swal.fire('Berhasil', 'Bukti pengembalian telah dikirim!', 'success');
            closeUploadModal();
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
                    window.location.href = "/logout";
                }
            });
        }
    </script>
</body>
</html>

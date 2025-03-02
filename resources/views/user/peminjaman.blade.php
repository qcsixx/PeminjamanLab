<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Peminjaman</title>
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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Barang yang tersedia -->
                <div class="bg-[var(--card-bg)] shadow-lg p-6 rounded-xl">
                    <h2 class="text-xl font-bold text-[var(--primary)]">Arduino Uno</h2>
                    <p class="mt-2">Stok: 5</p>
                    <button class="bg-[var(--primary)] text-white px-4 py-2 mt-4 rounded hover:bg-[var(--button-hover)]" onclick="openForm('Arduino Uno')">Ajukan Peminjaman</button>
                </div>
                
                <div class="bg-[var(--card-bg)] shadow-lg p-6 rounded-xl">
                    <h2 class="text-xl font-bold text-[var(--primary)]">Sensor DHT11</h2>
                    <p class="mt-2">Stok: 2</p>
                    <button class="bg-[var(--primary)] text-white px-4 py-2 mt-4 rounded hover:bg-[var(--button-hover)]" onclick="openForm('Sensor DHT11')">Ajukan Peminjaman</button>
                </div>
            </div>
        </main>
    </div>

    <!-- Form Peminjaman -->
    <div id="peminjamanModal" class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-bold text-[var(--primary)] mb-4">Form Peminjaman</h2>
            <label class="block mb-2">Nama Peminjam</label>
            <input type="text" id="namaPeminjam" class="w-full border p-2 rounded mb-4" placeholder="Masukkan nama Anda">
            
            <label class="block mb-2">Barang</label>
            <input type="text" id="barang" class="w-full border p-2 rounded mb-4" readonly>
            
            <label class="block mb-2">Jumlah</label>
            <input type="number" id="jumlah" class="w-full border p-2 rounded mb-4" min="1">
            
            <label class="block mb-2">Tanggal Peminjaman</label>
            <input type="date" id="tglPinjam" class="w-full border p-2 rounded mb-4">
            
            <label class="block mb-2">Tanggal Pengembalian</label>
            <input type="date" id="tglKembali" class="w-full border p-2 rounded mb-4">
            
            <div class="flex justify-end space-x-2">
                <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600" onclick="closeForm()">Batal</button>
                <button class="bg-[var(--primary)] text-white px-4 py-2 rounded hover:bg-[var(--button-hover)]" onclick="submitPeminjaman()">Kirim Permintaan</button>
            </div>
        </div>
    </div>

    <script>
        function openForm(barang) {
            document.getElementById('barang').value = barang;
            let modal = document.getElementById('peminjamanModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeForm() {
            let modal = document.getElementById('peminjamanModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }

        function submitPeminjaman() {
            let nama = document.getElementById('namaPeminjam').value;
            let barang = document.getElementById('barang').value;
            let jumlah = document.getElementById('jumlah').value;
            let tglPinjam = document.getElementById('tglPinjam').value;
            let tglKembali = document.getElementById('tglKembali').value;

            if (!nama || !jumlah || !tglPinjam || !tglKembali) {
                Swal.fire('Error', 'Semua kolom harus diisi!', 'error');
                return;
            }

            Swal.fire('Berhasil', 'Permintaan peminjaman telah dikirim!', 'success');
            closeForm();
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

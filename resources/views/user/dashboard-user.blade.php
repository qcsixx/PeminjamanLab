<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Peminjam</title>
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
        html, body {
            height: 100vh;
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-[var(--bg-color)] font-sans text-[var(--secondary)]">
    <div class="h-screen flex flex-col">
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
        <main class="flex-1 flex px-6 py-4 space-x-6">
            <!-- Notifikasi -->
            <div class="w-1/3 space-y-4">
                <div class="bg-[var(--card-bg)] shadow-lg p-4 rounded-xl">
                    <h2 class="text-lg font-bold text-[var(--primary)]">Notifikasi</h2>
                    <ul class="mt-2 space-y-2">
                        <li class="bg-yellow-100 p-3 rounded shadow">Pengingat harian: Kembalikan barang tepat waktu.</li>
                        <li class="bg-red-100 p-3 rounded shadow">Peringatan: 7 hari lagi batas pengembalian!</li>
                        <li class="bg-green-100 p-3 rounded shadow">Status: Peminjaman Raspberry Pi disetujui.</li>
                    </ul>
                </div>
            </div>

            <!-- Statistik Barang Dipinjam & Status Peminjaman -->
            <div class="w-2/3 flex flex-col space-y-6">
                <div class="bg-[var(--card-bg)] shadow-lg p-6 rounded-xl flex items-center justify-between">
                    <h2 class="text-xl font-bold text-[var(--primary)]">Barang yang Dipinjam</h2>
                    <p class="text-5xl font-bold text-[var(--button-hover)]">3</p>
                </div>
                <div class="bg-[var(--card-bg)] shadow-lg p-6 rounded-xl">
                    <h2 class="text-xl font-bold text-[var(--primary)]">Status Peminjaman</h2>
                    <div class="mt-4 space-y-2">
                        <div class="flex justify-between p-3 bg-gray-100 rounded shadow">
                            <span>Arduino</span>
                            <span class="bg-yellow-500 text-white px-3 py-1 rounded">Pending</span>
                        </div>
                        <div class="flex justify-between p-3 bg-gray-100 rounded shadow">
                            <span>Sensor DHT11</span>
                            <span class="bg-green-500 text-white px-3 py-1 rounded">Approved</span>
                        </div>
                    </div>
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
                confirmButtonColor: "var(--danger)",
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
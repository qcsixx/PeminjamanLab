<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelacakan Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
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
        
        <main class="flex-1 pt-10 px-6">
            <div class="bg-[var(--card-bg)] shadow-lg p-6 rounded-xl">
                <h2 class="text-xl font-bold text-[var(--primary)] mb-4">Unggah Foto & Lokasi</h2>
                <input type="file" id="fotoBarang" class="w-full border p-2 rounded mb-4">
                <input type="text" id="lokasiBarang" class="w-full border p-2 rounded mb-4" placeholder="Masukkan lokasi barang">
                <button class="bg-[var(--primary)] text-white px-4 py-2 rounded hover:bg-[var(--button-hover)]" onclick="submitTracking()">Kirim</button>
            </div>
            
            <div class="bg-[var(--card-bg)] shadow-lg p-6 rounded-xl mt-6">
                <h2 class="text-xl font-bold text-[var(--primary)] mb-4">Riwayat Pelacakan</h2>
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-[var(--primary)] text-white">
                            <th class="p-2">Tanggal</th>
                            <th class="p-2">Barang</th>
                            <th class="p-2">Lokasi</th>
                            <th class="p-2">Foto</th>
                            <th class="p-2">QR Code</th>
                        </tr>
                    </thead>
                    <tbody id="trackingHistory">
                        <tr class="border-b">
                            <td class="p-2">20-02-2025</td>
                            <td class="p-2">Arduino Uno</td>
                            <td class="p-2">Lab IoT</td>
                            <td class="p-2"><img src="example.jpg" alt="Foto Barang" class="w-16 h-16 object-cover"></td>
                            <td class="p-2"><div id="qrcode-1"></div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    
    <script>
        function submitTracking() {
            let file = document.getElementById('fotoBarang').files[0];
            let lokasi = document.getElementById('lokasiBarang').value;
            if (!file || !lokasi) {
                Swal.fire('Error', 'Silakan unggah foto dan masukkan lokasi!', 'error');
                return;
            }
            Swal.fire('Berhasil', 'Data pelacakan telah dikirim!', 'success');
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

        // Generate QR Code Contoh
        new QRCode(document.getElementById("qrcode-1"), {
            text: "Arduino Uno - Lab IoT",
            width: 50,
            height: 50
        });
    </script>
</body>
</html>

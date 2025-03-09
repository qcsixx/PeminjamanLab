<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Lab IoT Vokasi UB</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-900 to-gray-800 flex items-center justify-center min-h-screen">
    <div id="register-card" class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg opacity-0 transform translate-y-10 transition-all duration-700">
        <h2 class="text-2xl font-bold text-center text-gray-900">Lab Peminjaman Barang IoT</h2>
        <p class="text-sm text-center text-gray-600">Silakan daftar untuk membuat akun</p>

        <!-- Error message -->
        @if(session('error'))
            <div class="text-red-500 text-sm text-center mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}" class="mt-6">
            @csrf

            <!-- Nama -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- NIM -->
            <div class="mt-4">
                <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                <input id="nim" type="text" name="nim" value="{{ old('nim') }}" required
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
                @error('nim')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="mt-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" type="password" name="password" required
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit"
                    class="w-full px-4 py-3 text-white bg-blue-900 rounded-lg transition duration-300 hover:bg-yellow-400 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    Register
                </button>
            </div>
        </form>

        <!-- Login Link -->
        <div class="mt-4 text-center text-sm text-gray-900">
            <span>Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-900 hover:text-yellow-400 transition duration-300">Login</a></span>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(() => {
                document.getElementById("register-card").classList.remove("opacity-0", "translate-y-10");
            }, 200);
        });
    </script>
</body>
</html>

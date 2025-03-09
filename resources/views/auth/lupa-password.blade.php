<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Lab IoT Vokasi UB</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-900 to-gray-800 flex items-center justify-center min-h-screen">
    <div id="forgot-password-card" class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg opacity-0 transform translate-y-10 transition-all duration-700">
        <h2 class="text-2xl font-bold text-center text-gray-900">Lupa Password</h2>
        <p class="text-sm text-center text-gray-600">Masukkan email Anda untuk mereset password</p>

        @if(session('status'))
            <div class="text-green-500 text-sm text-center mb-4">
                {{ session('status') }}
            </div>
        @endif

        <!-- Form Reset Password -->
        <form method="POST" action="{{ route('password.email') }}" class="mt-6">
            @csrf
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mt-6">
                <button type="submit"
                    class="w-full px-4 py-3 text-white bg-blue-900 rounded-lg transition duration-300 hover:bg-yellow-400 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    Kirim Tautan Reset
                </button>
            </div>
        </form>

        <!-- Kembali ke Login -->
        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-sm text-blue-900 transition duration-300 hover:text-yellow-400">
                Kembali ke Login
            </a>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(() => {
                document.getElementById("forgot-password-card").classList.remove("opacity-0", "translate-y-10");
            }, 200);
        });
    </script>
</body>
</html>

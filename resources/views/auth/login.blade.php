<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Lab IoT Vokasi UB</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-900 to-gray-800 flex items-center justify-center min-h-screen">
    <div id="login-card" class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg opacity-0 transform translate-y-10 transition-all duration-700">
        <h2 class="text-2xl font-bold text-center text-gray-900">Lab Peminjaman Barang IoT</h2>
        <p class="text-sm text-center text-gray-600">Silakan masuk untuk melanjutkan</p>

        <!-- Error message if login failed -->
        @if(session('error'))
            <div class="text-red-500 text-sm text-center mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="mt-6">
            @csrf

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" type="password" name="password" required autocomplete="off"
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit"
                    class="w-full px-4 py-3 text-white bg-blue-900 rounded-lg transition duration-300 hover:bg-yellow-400 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    Login
                </button>
            </div>

            <!-- Forgot Password Link -->
            <div class="mt-4 text-center">
                @if(Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-900 transition duration-300 hover:text-yellow-400 hover:underline">
                        Lupa Password?
                    </a>
                @endif
            </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(() => {
                document.getElementById("login-card").classList.remove("opacity-0", "translate-y-10");
            }, 200);
        });
    </script>
</body>
</html>

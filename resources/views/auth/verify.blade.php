<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
</head>
<body style="background-color: #f8fafc; padding: 20px; font-family: Arial, sans-serif;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <h2 style="text-align: center; color: #333;">Verifikasi Email Anda</h2>
        <p>Halo, <strong>{{ $user->name }}</strong></p>
        <p>Terima kasih telah mendaftar. Silakan klik tombol di bawah ini untuk memverifikasi email Anda:</p>
        
        <div style="text-align: center; margin: 20px 0;">
            <a href="{{ url('/verify-email/' . $user->email_verification_token) }}" 
                style="background-color: #3b82f6; color: #ffffff; padding: 12px 20px; text-decoration: none; border-radius: 5px; font-size: 16px;">
                 Verifikasi Email
             </a>
        </div>

        <p>Jika Anda tidak mendaftar di situs kami, silakan abaikan email ini.</p>
        <hr style="margin: 20px 0;">
        <p style="text-align: center; font-size: 14px; color: #666;">&copy; {{ date('Y') }} Lab IoT. Semua Hak Dilindungi.</p>
    </div>
</body>
</html>

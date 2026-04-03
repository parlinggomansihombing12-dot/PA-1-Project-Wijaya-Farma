<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Wijaya Farma</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(135deg, #e8f8f5 0%, #f4f7f6 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        .login-wrapper {
            width: 100%;
            max-width: 420px;
            padding: 15px;
        }

        .login-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(26, 188, 156, 0.1);
            padding: 40px 35px;
            border-top: 5px solid #1ABC9C;
            position: relative;
        }

        .logo-circle {
            width: 80px;
            height: 80px;
            background-color: #e8f8f5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin: 0 auto 20px auto;
            box-shadow: 0 5px 15px rgba(26, 188, 156, 0.2);
        }

        .form-control {
            border-radius: 10px;
            padding: 12px 18px;
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #1ABC9C;
            box-shadow: 0 0 0 0.25rem rgba(26, 188, 156, 0.15);
            background-color: #ffffff;
        }

        .btn-login {
            background-color: #1ABC9C;
            color: white;
            border-radius: 10px;
            padding: 12px;
            font-weight: bold;
            font-size: 1.1rem;
            border: none;
            transition: all 0.3s;
            margin-top: 10px;
        }

        .btn-login:hover {
            background-color: #16a085;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(26, 188, 156, 0.3);
            color: white;
        }
        
        .kembali-link {
            color: #7f8c8d;
            text-decoration: none;
            font-weight: 500;
            transition: 0.2s;
            display: inline-block;
            margin-top: 20px;
        }
        .kembali-link:hover { color: #1ABC9C; }
    </style>
</head>
<body>

    <div class="login-wrapper">
        
        <div class="text-center mb-4">
            <h3 class="fw-bold" style="color: #2c3e50; font-size: 1.8rem;">Wijaya Farma</h3>
            <p class="text-muted" style="font-weight: 500;">Apotek & Layanan Kesehatan</p>
        </div>

        <div class="login-card">
            
            <div class="logo-circle">💊</div>
            
            <h4 class="text-center fw-bold mb-4" style="color: #2c3e50;">Login Admin</h4>

            <!-- Tampilkan Pesan Error Jika Username/Password Salah -->
            @if ($errors->any())
                <div class="alert alert-danger rounded-3" style="font-size: 0.9rem;">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Mengarah ke rute bawaan Laravel -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Input Username / Email -->
                <div class="mb-3">
                    <label class="form-label fw-bold text-secondary small">Username / Email</label>
                    <!-- Saya ubah namanya jadi username (Biasanya teman Anda menggunakan username bukan email) -->
                    <input type="text" name="username" class="form-control" value="{{ old('username') }}" placeholder="Masukkan username" required autofocus>
                </div>

                <!-- Input Password -->
                <div class="mb-4">
                    <label class="form-label fw-bold text-secondary small">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>

                <!-- Remember Me (Tanpa Lupa Password agar aman) -->
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label text-muted small" for="remember">Ingat Saya</label>
                </div>

                <!-- Tombol Login -->
                <button type="submit" class="btn btn-login w-100">Masuk ke Sistem</button>
                
            </form>
            
        </div>
        
        <div class="text-center">
            <a href="/" class="kembali-link">&larr; Kembali ke Beranda</a>
            <p class="text-muted small mt-2" style="font-size: 0.8rem;">&copy; 2026 Wijaya Farma. All rights reserved.</p>
        </div>
        
    </div>

</body>
</html>
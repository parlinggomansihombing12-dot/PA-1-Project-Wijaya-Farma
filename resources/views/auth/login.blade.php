<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Wijaya Farma</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #1ABC9C;
            --primary-dark: #16a085;
            --primary-light: #d1fae5;
            --secondary: #2c3e50;
            --accent: #e67e22;
            --dark: #1e293b;
            --text-muted: #64748b;
            --white: #ffffff;
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.04);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.06);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f0fdfa 0%, #e6f4f0 100%);
            min-height: 100vh;
        }

        /* Login Container - LEBIH KECIL */
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 340px;
            margin: 0 auto;
        }

        /* Brand Section - LEBIH KECIL */
        .brand-section {
            text-align: center;
            margin-bottom: 18px;
        }

        .brand-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            box-shadow: 0 4px 10px rgba(26,188,156,0.2);
        }

        .brand-icon i {
            font-size: 1.4rem;
            color: white;
        }

        .brand-title {
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 2px;
            letter-spacing: -0.5px;
        }

        .brand-subtitle {
            font-size: 0.6rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* Login Card - LEBIH KECIL */
        .login-card {
            background: white;
            border-radius: 18px;
            padding: 22px;
            box-shadow: var(--shadow-md);
            border: 1px solid rgba(26,188,156,0.1);
        }

        .login-header {
            text-align: center;
            margin-bottom: 18px;
        }

        .login-header h4 {
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 3px;
        }

        .login-header p {
            font-size: 0.65rem;
            color: var(--text-muted);
            margin: 0;
        }

        /* Form Controls - LEBIH KECIL */
        .form-group {
            margin-bottom: 14px;
        }

        .form-label {
            font-size: 0.6rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
            display: block;
        }

        .input-group-custom {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 0.75rem;
            z-index: 2;
        }

        .form-control-custom {
            width: 100%;
            padding: 9px 12px 9px 36px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.75rem;
            transition: all 0.2s;
            background: white;
            font-family: 'Inter', sans-serif;
        }

        .form-control-custom:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(26,188,156,0.1);
        }

        /* Checkbox - LEBIH KECIL */
        .checkbox-custom {
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            margin-bottom: 16px;
        }

        .checkbox-custom input {
            width: 14px;
            height: 14px;
            cursor: pointer;
            accent-color: var(--primary);
        }

        .checkbox-custom span {
            font-size: 0.65rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* Button Login - LEBIH KECIL */
        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            padding: 9px;
            border-radius: 40px;
            font-weight: 800;
            font-size: 0.75rem;
            transition: all 0.2s;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(26,188,156,0.3);
            gap: 10px;
        }

        /* Alert Error - LEBIH KECIL */
        .alert-custom {
            background: #fee2e2;
            border-left: 3px solid #ef4444;
            border-radius: 8px;
            padding: 8px 12px;
            margin-bottom: 16px;
        }

        .alert-custom ul {
            margin: 0;
            padding-left: 16px;
            color: #991b1b;
            font-size: 0.65rem;
        }

        /* Footer Login - TOMBOL KEMBALI PREMIUM */
        .login-footer {
            text-align: center;
            margin-top: 18px;
        }

        /* Tombol Kembali ke Beranda - PREMIUM & BESAR */
        .btn-kembali {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: white;
            color: var(--primary);
            text-decoration: none;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 10px 16px;
            border-radius: 40px;
            transition: all 0.2s;
            border: 1.5px solid var(--primary);
            width: 100%;
            margin-bottom: 10px;
        }

        .btn-kembali i {
            font-size: 0.75rem;
            transition: transform 0.2s;
        }

        .btn-kembali:hover {
            background: var(--primary);
            color: white;
            gap: 14px;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(26,188,156,0.25);
        }

        .btn-kembali:hover i {
            transform: translateX(-3px);
        }

        .copyright {
            font-size: 0.55rem;
            color: var(--text-muted);
            text-align: center;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .login-container {
                padding: 10px;
            }
            .login-wrapper {
                max-width: 100%;
            }
            .login-card {
                padding: 18px;
            }
            .brand-title {
                font-size: 1.1rem;
            }
            .brand-icon {
                width: 45px;
                height: 45px;
            }
            .brand-icon i {
                font-size: 1.2rem;
            }
            .btn-kembali {
                padding: 8px 14px;
                font-size: 0.65rem;
            }
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="login-wrapper">
            
            <!-- Brand Section -->
            <div class="brand-section">
                <div class="brand-icon">
                    <i class="fas fa-capsules"></i>
                </div>
                <h1 class="brand-title">Wijaya Farma</h1>
                <p class="brand-subtitle">Apotek & Layanan Kesehatan</p>
            </div>

            <!-- Login Card -->
            <div class="login-card">
                <div class="login-header">
                    <h4>Login Admin</h4>
                    <p>Masuk ke panel administrasi</p>
                </div>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="alert-custom">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li><i class="fas fa-exclamation-circle me-1"></i>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Username Field -->
                    <div class="form-group">
                        <label class="form-label">Username / Email</label>
                        <div class="input-group-custom">
                            <div class="input-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <input type="text" 
                                   name="username" 
                                   class="form-control-custom" 
                                   value="{{ old('username') }}" 
                                   placeholder="Masukkan username" 
                                   required 
                                   autofocus>
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="input-group-custom">
                            <div class="input-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <input type="password" 
                                   name="password" 
                                   class="form-control-custom" 
                                   placeholder="Masukkan password" 
                                   required>
                        </div>
                    </div>

                    <!-- Remember Me Checkbox -->
                    <label class="checkbox-custom">
                        <input type="checkbox" name="remember" id="remember">
                        <span>Ingat Saya</span>
                    </label>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-login">
                        <i class="fas fa-sign-in-alt"></i> Masuk ke Sistem
                    </button>
                </form>
            </div>

            <!-- Footer dengan Tombol Kembali Premium -->
            <div class="login-footer">
                <a href="/" class="btn-kembali">
                    <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                    <i class="fas fa-home"></i>
                </a>
                <div class="copyright">
                    <i class="far fa-copyright"></i> {{ date('Y') }} Wijaya Farma
                </div>
            </div>

        </div>
    </div>

</body>
</html>
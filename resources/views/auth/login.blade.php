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
            --primary-soft: #e8f8f5;
            --secondary: #2c3e50;
            --secondary-dark: #1a2634;
            --accent: #e67e22;
            --dark: #1e293b;
            --text-muted: #64748b;
            --white: #ffffff;
            --shadow-sm: 0 4px 12px rgba(0,0,0,0.05);
            --shadow-md: 0 10px 25px rgba(0,0,0,0.08);
            --shadow-lg: 0 20px 40px rgba(0,0,0,0.12);
            --shadow-xl: 0 30px 60px rgba(0,0,0,0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #e0f2fe 0%, #f0fdf4 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Background Pattern */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><path fill="none" stroke="%231ABC9C" stroke-width="1" d="M10 10 L90 10 M10 20 L90 20 M10 30 L90 30 M10 40 L90 40 M10 50 L90 50 M10 60 L90 60 M10 70 L90 70 M10 80 L90 80 M10 90 L90 90 M20 10 L20 90 M30 10 L30 90 M40 10 L40 90 M50 10 L50 90 M60 10 L60 90 M70 10 L70 90 M80 10 L80 90"/><circle cx="25" cy="25" r="3" fill="%231ABC9C"/><circle cx="75" cy="75" r="3" fill="%231ABC9C"/><circle cx="50" cy="50" r="2" fill="%23e67e22"/></svg>');
            background-repeat: repeat;
            background-size: 50px;
            pointer-events: none;
        }

        /* Floating Orbs */
        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(60px);
            z-index: 0;
            pointer-events: none;
            animation: floatOrb 20s ease-in-out infinite;
        }

        .orb-1 {
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(26,188,156,0.15) 0%, transparent 70%);
            top: -100px;
            left: -100px;
            animation-delay: 0s;
        }

        .orb-2 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(230,126,34,0.08) 0%, transparent 70%);
            bottom: -150px;
            right: -150px;
            animation-delay: 5s;
        }

        .orb-3 {
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(44,62,80,0.06) 0%, transparent 70%);
            top: 50%;
            right: 10%;
            animation-delay: 10s;
        }

        @keyframes floatOrb {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(30px, 20px) scale(1.1); }
        }

        /* Login Container */
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            position: relative;
            z-index: 1;
        }

        .login-wrapper {
            width: 100%;
            max-width: 450px;
        }

        /* Brand Section */
        .brand-section {
            text-align: center;
            margin-bottom: 35px;
        }

        .brand-icon {
            width: 75px;
            height: 75px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 15px 30px rgba(26,188,156,0.3);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .brand-icon i {
            font-size: 2.2rem;
            color: white;
        }

        .brand-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--secondary);
            margin-bottom: 5px;
            letter-spacing: -0.5px;
        }

        .brand-subtitle {
            font-size: 0.85rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* Login Card */
        .login-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-radius: 32px;
            padding: 40px;
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(255,255,255,0.5);
            transition: all 0.3s;
        }

        .login-card:hover {
            transform: translateY(-5px);
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h4 {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .login-header p {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin: 0;
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
            display: block;
        }

        .input-group-custom {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 1rem;
            z-index: 2;
        }

        .form-control-custom {
            width: 100%;
            padding: 14px 16px 14px 48px;
            border: 1.5px solid #e2e8f0;
            border-radius: 16px;
            font-size: 0.9rem;
            transition: all 0.3s;
            background: white;
            font-family: 'Inter', sans-serif;
        }

        .form-control-custom:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(26,188,156,0.1);
        }

        /* Checkbox Custom */
        .checkbox-custom {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            margin-bottom: 25px;
        }

        .checkbox-custom input {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: var(--primary);
        }

        .checkbox-custom span {
            font-size: 0.85rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* Button Login */
        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            padding: 14px;
            border-radius: 50px;
            font-weight: 800;
            font-size: 1rem;
            transition: all 0.3s;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(26,188,156,0.4);
            gap: 15px;
        }

        /* Alert Error */
        .alert-custom {
            background: #fee2e2;
            border-left: 4px solid #ef4444;
            border-radius: 12px;
            padding: 12px 16px;
            margin-bottom: 25px;
        }

        .alert-custom ul {
            margin: 0;
            padding-left: 20px;
            color: #991b1b;
            font-size: 0.8rem;
        }

        /* Footer */
        .login-footer {
            text-align: center;
            margin-top: 25px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            transition: all 0.3s;
        }

        .back-link:hover {
            color: var(--primary);
            gap: 12px;
        }

        .copyright {
            font-size: 0.7rem;
            color: var(--text-muted);
            margin-top: 20px;
            text-align: center;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .login-container {
                padding: 20px;
            }
            .login-card {
                padding: 30px 25px;
            }
            .brand-title {
                font-size: 1.5rem;
            }
            .brand-icon {
                width: 60px;
                height: 60px;
            }
            .brand-icon i {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>

    <!-- Floating Orbs -->
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <div class="login-container">
        <div class="login-wrapper">
            
            <!-- Brand Section -->
            <div class="brand-section">
                <div class="brand-icon">
                    <i class="fas fa-hospital-user"></i>
                </div>
                <h1 class="brand-title">Wijaya Farma</h1>
                <p class="brand-subtitle">Apotek & Layanan Kesehatan</p>
            </div>

            <!-- Login Card -->
            <div class="login-card">
                <div class="login-header">
                    <h4>Login Admin</h4>
                    <p>Masuk ke panel administrasi Wijaya Farma</p>
                </div>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="alert-custom">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li><i class="fas fa-exclamation-circle me-2"></i>{{ $error }}</li>
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
                                   placeholder="••••••••" 
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

            <!-- Footer -->
            <div class="login-footer">
                <a href="/" class="back-link">
                    <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                </a>
                <div class="copyright">
                    <i class="far fa-copyright"></i> 2026 Wijaya Farma. All rights reserved.
                </div>
            </div>

        </div>
    </div>

</body>
</html>
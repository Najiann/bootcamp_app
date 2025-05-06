<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/logoYGINI.png">
    <title>Daftar Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #f8f9fc;
            --accent-color: #2e59d9;
            --text-color: #5a5c69;
            --success-color: #1cc88a;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
        
        .register-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            overflow: hidden;
            transition: all 0.3s;
            background: white;
        }
        
        .register-card:hover {
            box-shadow: 0 0.5rem 2rem 0 rgba(58, 59, 69, 0.2);
        }
        
        .register-header {
            background-color: var(--primary-color);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        
        .register-body {
            padding: 2rem;
        }
        
        .form-control {
            padding: 0.75rem 1rem;
            border-radius: 0.35rem;
            border: 1px solid #d1d3e2;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        
        .btn-register {
            background-color: var(--primary-color);
            border: none;
            padding: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }
        
        .btn-register:hover {
            background-color: var(--accent-color);
            transform: translateY(-2px);
        }
        
        .logo {
            width: 80px;
            height: 80px;
            margin-bottom: 1rem;
            object-fit: contain;
        }
        
        .input-group-text {
            background-color: #f8f9fc;
            transition: all 0.3s;
        }
        
        .password-toggle {
            cursor: pointer;
            background-color: #f8f9fc;
            border-left: 0;
            color: var(--text-color);
        }
        
        .password-toggle:hover {
            color: var(--primary-color);
        }
        
        .password-strength {
            height: 5px;
            margin-top: 5px;
            border-radius: 5px;
            transition: all 0.3s;
        }
        
        .strength-0 {
            width: 20%;
            background-color: #e74a3b;
        }
        
        .strength-1 {
            width: 40%;
            background-color: #f6c23e;
        }
        
        .strength-2 {
            width: 60%;
            background-color: #f6c23e;
        }
        
        .strength-3 {
            width: 80%;
            background-color: #1cc88a;
        }
        
        .strength-4 {
            width: 100%;
            background-color: #1cc88a;
        }
        
        .terms-text {
            font-size: 0.85rem;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="register-card">
                    <div class="register-header text-center">
                        <img src="images/logoYGINI.png" alt="Logo" class="logo">
                        <h4 class="mb-1">Buat Akun Baru</h4>
                        <small class="d-block">Isi form berikut untuk mendaftar</small>
                    </div>
                    <div class="register-body">
                        <form action="action_regist.php" method="POST" class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama lengkap" required>
                                        <div class="invalid-feedback">
                                            Harap masukkan nama lengkap Anda.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="no_telepon" class="form-label">Nomor Telepon</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        <input type="tel" class="form-control" id="no_telepon" name="no_telepon" placeholder="0812-3456-7890" required>
                                        <div class="invalid-feedback">
                                            Harap masukkan nomor telepon yang valid.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="nama@contoh.com" required>
                                    <div class="invalid-feedback">
                                        Harap masukkan email yang valid.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Minimal 8 karakter" required>
                                    <span class="input-group-text password-toggle" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                    
                            <button type="submit" class="btn btn-register text-white w-100 mt-4">
                                <i class="fas fa-user-plus me-2"></i> Daftar Sekarang
                            </button>
                            
                            <p class="text-center mt-2">Sudah punya akun? <a href="login.php" class="text-primary">Masuk disini</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ini biar bisa ngeliat isi pw nya
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | RuangBaca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{asset('template/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('template/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('template/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #000000;
            color: #ffffff;
        }

        .container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            display: flex;
            flex-direction: row;
            border: none;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
            max-width: 950px;
            width: 100%;
        }

        .side-info {
            background: linear-gradient(135deg, #121212, #1e1e1e);
            color: #9EC6F3;
            flex: 1;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }

        .side-info h1 {
            font-size: 2.2rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .side-info p {
            font-size: 1rem;
            line-height: 1.6;
            color: #cccccc;
        }

        .form-section {
            flex: 1;
            background-color: #1a1a1a;
            padding: 50px 40px;
        }

        .form-section .card-header {
            background-color: transparent;
            color: #9EC6F3;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-control {
        background-color: #2a2a2a !important;
        border: 1px solid #444444;
        border-radius: 10px;
        padding: 12px;
        font-size: 0.95rem;
        color: #ffffff !important;
        caret-color: #9EC6F3;
        }

        .form-control:focus {
            border-color: #9EC6F3;
            box-shadow: 0 0 0 0.15rem rgba(158, 198, 243, 0.25);
            background-color: #333333;
        }

        .btn-register {
            background-color: #9EC6F3;
            color: #000000;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .btn-register:hover {
            background-color: #7fb6e8;
        }

        .text-center a {
            color: #9EC6F3;
            text-decoration: none;
            font-weight: 500;
        }

        .text-center a:hover {
            text-decoration: underline;
        }

        .input-group .btn-show-hide {
            background: transparent;
            border: none;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="side-info">
                <h1>Selamat Datang di RuangBaca</h1>
                <p>Daftar untuk memulai perjalanan belajarmu bersama kami</p>
            </div>

            <div class="form-section">
                <div class="card-header">
                    Buat Akun Anda
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label text-white">Nama Lengkap</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control"
                            required
                            autofocus
                        />
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label text-white">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                        />
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label text-white">Password</label>
                        <div class="input-group">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control"
                                required
                            />
                            <button
                                type="button"
                                class="btn btn-show-hide"
                                onclick="togglePassword()"
                                style="background-color: #9EC6F3;"
                            >
                                <i id="password-icon" class="fas fa-eye" style="color: black;"></i>
                            </button>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label text-white">Konfirmasi Password</label>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="form-control"
                            required
                        />
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-register">Daftar</button>
                    </div>

                    <div class="text-center">
                        <p style="color: white;">Sudah punya akun? <a href="{{ route('login') }}">Masuk sekarang</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const passwordIcon = document.getElementById("password-icon");
            const isPasswordVisible = passwordInput.type === "password";
            passwordInput.type = isPasswordVisible ? "text" : "password";
            passwordIcon.classList.toggle("fa-eye", !isPasswordVisible);
            passwordIcon.classList.toggle("fa-eye-slash", isPasswordVisible);
        }
    </script>
</body>
</html>

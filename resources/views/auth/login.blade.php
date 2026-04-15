<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/esa-theme.css') }}" />
</head>

<body class="esa-theme">
    <div class="page-wrapper" id="main-wrapper">
        <div class="position-relative overflow-hidden min-vh-100 d-flex align-items-center justify-content-center esa-auth-bg">
            <div class="container py-5">
                <div class="row justify-content-center align-items-center g-4">
                    <div class="col-lg-5 d-none d-lg-block">
                        <div class="esa-auth-copy">
                            <h1>Masuk ke ESA E-Learning</h1>
                            <ul class="esa-auth-points">
                                <li>Akses materi, tugas, dan quiz lebih cepat</li>
                                <li>Tampilan modern dan konsisten</li>
                                <li>Siap dipakai admin, guru, dan siswa</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-5 col-xxl-4">
                        <div class="card border-0 shadow-lg esa-auth-card">
                            <div class="card-body p-4 p-md-5">
                                <a href="{{ route('welcome') }}" class="text-nowrap logo-img text-center d-block py-2 w-100">
                                    <img src="{{ asset('assets/images/logos/esa.png') }}" style="width: 132px; height: 132px;" alt="ESA Logo">
                                </a>

                                <div class="text-center mb-4">
                                    <h3 class="mb-2 fw-bold">Selamat Datang</h3>
                                    <p class="text-muted mb-0">Masuk dengan akun yang terdaftar di sistem e-learning.</p>
                                </div>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Email</label>
                                        <input
                                            type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            name="email"
                                            value="{{ old('email') }}"
                                            required
                                            autocomplete="email"
                                            autofocus
                                            placeholder="Masukkan email">
                                        @error('email')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Password</label>
                                        <input
                                            type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password"
                                            required
                                            autocomplete="current-password"
                                            placeholder="Masukkan password">
                                        @error('password')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
                                        <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" value="1" id="remember" name="remember">
                                            <label class="form-check-label text-dark" for="remember">
                                                Ingat perangkat ini
                                            </label>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <a class="text-primary fw-bold" href="{{ route('password.request') }}">Lupa password?</a>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-3 fs-5 mb-3">Sign In</button>
                                    <div class="text-center">
                                        <a href="{{ route('welcome') }}" class="text-decoration-none fw-semibold">Kembali ke beranda</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>

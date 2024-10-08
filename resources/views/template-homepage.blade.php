<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link href="{{ asset('themes/pulse/css') }}/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Daftar Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Daftar Akaun</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <h1 class="display-4">Selamat Datang ke {{ config('app.name') }}</h1>

                <p class="lead">Sistem Laporan Pegawai Bertugas 5:30</p>

                <img src="{{ asset('images/logo-lppkn-transparent.png') }}" alt="Logo LPPKN" class="img-fluid rounded shadow my-4">


                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="/register" class="btn btn-primary btn-lg px-4 gap-3">Daftar Akaun</a>
                    <a href="/login" class="btn btn-outline-secondary btn-lg px-4">Daftar Masuk</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    {{-- <div class="container my-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Feature 1</h5>
                        <p class="card-text">Experience amazing features that will enhance your journey with us.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Feature 2</h5>
                        <p class="card-text">Discover new possibilities with our innovative solutions.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Feature 3</h5>
                        <p class="card-text">Join thousands of satisfied users who love our platform.</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Footer -->
    <footer class="bg-dark text-light py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>{{ config('app.name') }}</h5>
                    <p>Sistem Laporan Pegawai Bertugas 5:30</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p>&copy; {{ date('Y') }} {{ config('app.name') }} v1.0.0.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

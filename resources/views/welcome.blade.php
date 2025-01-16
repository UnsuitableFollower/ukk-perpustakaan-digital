<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(to right, #4CAF50, #2E7D32);
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .feature-section {
            padding: 50px 0;
        }

        .footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .btn-login, .btn-register {
            margin: 10px;
            padding: 10px 25px;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Perpustakaan Digital</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
            <h1>Selamat Datang di Perpustakaan Digital</h1>
            <p>Manajemen Buku, Anggota, dan Transaksi dengan Mudah dan Cepat</p>
            <div>
                <a href="/login" class="btn btn-light btn-login">Login</a>
                <a href="/register" class="btn btn-outline-light btn-register">Daftar</a>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="feature-section">
        <div class="container text-center">
            <h2>Fitur Unggulan</h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Manajemen Buku</h5>
                            <p class="card-text">Kelola koleksi buku Anda secara terorganisir dengan fitur pencatatan lengkap.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Manajemen Anggota</h5>
                            <p class="card-text">Daftarkan anggota dan pantau aktivitas peminjaman mereka dengan mudah.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Transaksi Cepat</h5>
                            <p class="card-text">Lakukan peminjaman dan pengembalian buku dengan cepat dan efisien.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <p>Perpustakaan Digital &copy; 2025. Semua Hak Dilindungi.</p>
            <p>Email: info@perpustakaan.com | Telepon: 021-12345678</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<!-- filepath: resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column align-items-center justify-content-center" style="min-height: 90vh;">
    <!-- Welcome Message -->
    <div class="row w-100 justify-content-center mb-4">
        <div class="col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white fw-bold text-center">
                    <h4><i class="bi bi-speedometer2 me-2"></i>{{ __('Dashboard') }}</h4>
                </div>
                <div class="card-body text-center">
                    <h5>{{ __('Selamat datang, ') }} <span class="text-primary fw-bold">{{ Auth::user()->name }}</span>!</h5>
                    <p class="mt-2 text-muted">Kelola data perpustakaan dengan mudah dan cepat.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Cards -->
    <div class="row w-100 justify-content-center">
        <!-- Jumlah Buku -->
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-success shadow-lg border-0 h-100">
                <div class="card-header text-center fw-bold">
                    <i class="bi bi-book-half me-2"></i>Jumlah Buku
                </div>
                <div class="card-body text-center d-flex flex-column align-items-center justify-content-center">
                    <h1 class="display-4 fw-bold mb-0">{{ $totalBuku ?? 0 }}</h1>
                    <p class="card-text mt-2">Total koleksi buku di perpustakaan.</p>
                </div>
            </div>
        </div>

        <!-- Jumlah Anggota -->
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-info shadow-lg border-0 h-100">
                <div class="card-header text-center fw-bold">
                    <i class="bi bi-people-fill me-2"></i>Jumlah Anggota
                </div>
                <div class="card-body text-center d-flex flex-column align-items-center justify-content-center">
                    <h1 class="display-4 fw-bold mb-0">{{ $totalAnggota ?? 0 }}</h1>
                    <p class="card-text mt-2">Anggota aktif terdaftar.</p>
                </div>
            </div>
        </div>

        <!-- Peminjaman Aktif -->
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-warning shadow-lg border-0 h-100">
                <div class="card-header text-center fw-bold">
                    <i class="bi bi-check-lg me-2"></i>Peminjaman Aktif
                </div>
                <div class="card-body text-center d-flex flex-column align-items-center justify-content-center">
                    <h1 class="display-4 fw-bold mb-0">{{ $peminjamanAktif ?? 0 }}</h1>
                    <p class="card-text mt-2">Peminjaman buku yang sedang berlangsung.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

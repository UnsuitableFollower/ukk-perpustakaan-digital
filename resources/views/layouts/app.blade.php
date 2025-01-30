<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div id="app" class="d-flex">
        <!-- Sidebar -->
        <nav class="bg-dark text-white p-3 shadow-sm position-sticky" style="width: 250px; height: 100vh; top: 0;">
            <div class="text-center mb-4">
                <a class="navbar-brand text-white text-decoration-none fw-bold" href="{{ url('/') }}">
                    <h5 class="mb-0">Perpustakaan Digital</h5>
                </a>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link text-white {{ request()->is('dashboard') ? 'active bg-secondary' : '' }}"
                        href="{{ url('/dashboard') }}">
                        <i class="bi bi-house-door me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white {{ request()->is('pustaka') ? 'active bg-secondary' : '' }}"
                        href="{{ url('/pustaka') }}">
                        <i class="bi bi-book-fill me-2"></i> Pustaka
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white {{ request()->is('anggota') ? 'active bg-secondary' : '' }}"
                        href="{{ url('/anggota') }}">
                        <i class="bi bi-person-fill me-2"></i> Data Anggota
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white {{ request()->is('rak') ? 'active bg-secondary' : '' }}"
                        href="{{ url('/rak') }}">
                        <i class="bi bi-grid-3x3-gap me-2"></i> Rak
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white {{ request()->is('ddc') ? 'active bg-secondary' : '' }}"
                        href="{{ url('/ddc') }}">
                        <i class="bi bi-bookmarks-fill me-2"></i> DDC
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white {{ request()->is('penerbit') ? 'active bg-secondary' : '' }}"
                        href="{{ url('/penerbit') }}">
                        <i class="bi bi-printer me-2"></i> Penerbit
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white {{ request()->is('pengarang') ? 'active bg-secondary' : '' }}"
                        href="{{ url('/pengarang') }}">
                        <i class="bi bi-person-lines-fill me-2"></i> Pengarang
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white {{ request()->is('format') ? 'active bg-secondary' : '' }}"
                        href="{{ url('/format') }}">
                        <i class="bi bi-book me-2"></i> Format
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white {{ request()->is('transaksi') ? 'active bg-secondary' : '' }}"
                        href="{{ url('/transaksi') }}">
                        <i class="bi bi-list-check me-2"></i> Transaksi
                    </a>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right me-2"></i> {{ __('Login') }}
                            </a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">
                                <i class="bi bi-person-plus me-2"></i> {{ __('Register') }}
                            </a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-person-circle me-2"></i>{{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-left me-2"></i> {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="flex-grow-1 bg-light">
            <main class="py-4 px-3">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
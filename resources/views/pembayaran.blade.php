@extends('layouts.app') {{-- Pastikan ini mengarah ke layout dasar Anda --}}

@section('content')
<div class="container-fluid p-0" style="background-color: #e0f2f1; min-height: 100vh;"> {{-- Latar belakang hijau muda --}}

    {{-- Navbar (Sesuaikan link 'Pembayaran' agar active) --}}
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #0d47a1;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="max-height: 40px; margin-right: 10px;">
                <span class="fw-bold text-white">HI-NET</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('paket.index') }}">Paket Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white active" aria-current="page" href="{{ route('pembayaran.index') }}">Pembayaran</a> {{-- Ini diubah jadi active --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('gangguan.index') }}">Lapor Gangguan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('jadwal.index') }}">Jadwal Pemasangan</a>
                    </li>
                     {{-- Logout link --}}
                     <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Hero Section untuk Pembayaran --}}
    <div class="jumbotron jumbotron-fluid text-center text-white py-5" style="background: linear-gradient(to right, #0d47a1, #42a5f5); padding: 80px 0;">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">Konfirmasi Pesanan Anda</h1>
            <p class="lead mb-4">Pastikan detail pesanan Anda sudah benar sebelum melanjutkan pembayaran.</p>
        </div>
    </div>

    {{-- Section Detail Pembayaran --}}
    <section id="detail-pembayaran" class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg border-0" style="border-radius: 15px; background-color: #ffffff;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="card-title text-center mb-4" style="color: #0d47a1; font-weight: bold;">Detail Pesanan</h3>

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="row mb-3">
                                <div class="col-md-5 text-md-end text-secondary">Paket Dipilih:</div>
                                <div class="col-md-7">
                                    <h4 class="mb-0" style="color: #4caf50; font-weight: bold;">{{ $speed ?? 'N/A' }} Mbps</h4>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-5 text-md-end text-secondary">Harga Per Bulan:</div>
                                <div class="col-md-7">
                                    <h4 class="mb-0" style="color: #0d47a1; font-weight: bold;">Rp {{ number_format($price ?? 0, 0, ',', '.') }}</h4>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-5 text-md-end text-secondary">Nama Pelanggan:</div>
                                <div class="col-md-7">
                                    <p class="mb-0 fs-5 text-dark">{{ Auth::user()->name }}</p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-5 text-md-end text-secondary">Email Pelanggan:</div>
                                <div class="col-md-7">
                                    <p class="mb-0 fs-5 text-dark">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            {{-- Anda bisa menambahkan lebih banyak detail di sini, seperti alamat, nomor telepon, dll --}}

                            <hr class="my-4">

                            <h4 class="text-center mb-4" style="color: #0d47a1; font-weight: bold;">Lanjutkan Proses Pembayaran</h4>
                            <p class="text-center text-secondary mb-4">Setelah menekan tombol "Lanjutkan Pembayaran", Anda akan diarahkan ke halaman detail pembayaran.</p>

                            <div class="d-grid gap-2">
                                <a href="{{ route('pembayaran.process', ['speed' => $speed ?? 0, 'price' => $price ?? 0]) }}" class="btn btn-lg" style="background-color: #4caf50; border-color: #4caf50; color: white; font-weight: bold;">Lanjutkan Pembayaran</a>
                                <a href="{{ route('paket.index') }}" class="btn btn-outline-secondary btn-lg">Kembali Pilih Paket</a>
                            </div>

                            <div class="mt-4 text-center">
                                <small class="text-muted">Dengan melanjutkan, Anda menyetujui <a href="#" style="color: #0d47a1;">Syarat dan Ketentuan</a> kami.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer (Bisa disalin dari home.blade.php) --}}
    <footer class="text-center py-4" style="background-color: #0d47a1; color: white;">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} HI-NET. Semua Hak Dilindungi.</p>
            <p class="mb-0">Dibuat dengan <svg class="w-5 h-5 inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle; margin-top: -3px; height: 1em; width: 1em;"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.657l1.172-1.172a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg> Laravel & Bootstrap</p>
        </div>
    </footer>

</div>
@endsection
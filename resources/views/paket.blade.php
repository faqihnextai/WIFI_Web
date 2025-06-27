@extends('layouts.app') {{-- Pastikan ini mengarah ke layout dasar Anda --}}

@section('content')
<div class="container-fluid p-0" style="background-color: #e0f2f1; min-height: 100vh;"> {{-- Latar belakang hijau muda --}}

    {{-- Navbar (Bisa disalin dari home.blade.php atau dibuat komponen terpisah) --}}
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
                        <a class="nav-link text-white" href="{{ route('tagihan.index') }}">Pembayaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('gangguan.index') }}">Lapor Gangguan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#jadwal">Jadwal Pemasangan</a>
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

    {{-- Hero Section untuk Paket Layanan --}}
    <div class="jumbotron jumbotron-fluid text-center text-white py-5" style="background: linear-gradient(to right, #0d47a1, #42a5f5); padding: 80px 0;">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">Pilih Paket WiFi Sesuai Kebutuhan Anda!</h1>
            <p class="lead mb-4">Nikmati koneksi super cepat dengan harga terbaik.</p>
        </div>
    </div>

    {{-- Section Detail Paket Layanan --}}
    <section id="detail-paket" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" style="color: #0d47a1; font-weight: bold;">Daftar Paket Wi-Fi Kami</h2>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 justify-content-center">

                {{-- Card Paket 25 Mbps --}}
                <div class="col">
                    <div class="card h-100 shadow-sm border-0" style="border-radius: 10px; background-color: #ffffff;">
                        <div class="card-body p-4 text-center">
                            <h4 class="card-title mb-3" style="color: #0d47a1;">Paket Hemat</h4>
                            <h3 class="mb-4" style="color: #4caf50; font-weight: bold;">25 Mbps</h3>
                            <p class="fs-4 fw-bold mb-4" style="color: #0d47a1;">Rp 50.000 <span class="fs-6 text-secondary">/bulan</span></p>
                            <ul class="list-unstyled text-secondary mb-4">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Ideal untuk 1-3 perangkat</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Streaming HD lancar</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Browse & media sosial</li>
                                <li><i class="bi bi-x-circle-fill text-danger me-2"></i> Tidak untuk game online berat</li>
                            </ul>
                            <a href="{{ route('pembayaran.index') }}" class="btn btn-lg w-100" style="background-color: #4caf50; border-color: #4caf50; color: white;">Pilih Paket Ini</a>
                        </div>
                    </div>
                </div>

                {{-- Card Paket 50 Mbps --}}
                <div class="col">
                    <div class="card h-100 shadow-sm border-0" style="border-radius: 10px; background-color: #ffffff;">
                        <div class="card-body p-4 text-center">
                            <h4 class="card-title mb-3" style="color: #0d47a1;">Paket Keluarga</h4>
                            <h3 class="mb-4" style="color: #4caf50; font-weight: bold;">50 Mbps</h3>
                            <p class="fs-4 fw-bold mb-4" style="color: #0d47a1;">Rp 100.000 <span class="fs-6 text-secondary">/bulan</span></p>
                            <ul class="list-unstyled text-secondary mb-4">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Ideal untuk 4-6 perangkat</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Streaming 4K & Zoom call</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Game online ringan</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Download cepat</li>
                            </ul>
                            <a href="{{ route('pembayaran.index') }}" class="btn btn-lg w-100" style="background-color: #0d47a1; border-color: #0d47a1; color: white;">Pilih Paket Ini</a>
                        </div>
                    </div>
                </div>

                {{-- Card Paket 75 Mbps --}}
                <div class="col">
                    <div class="card h-100 shadow-sm border-0" style="border-radius: 10px; background-color: #ffffff;">
                        <div class="card-body p-4 text-center">
                            <h4 class="card-title mb-3" style="color: #0d47a1;">Paket Pro</h4>
                            <h3 class="mb-4" style="color: #4caf50; font-weight: bold;">75 Mbps</h3>
                            <p class="fs-4 fw-bold mb-4" style="color: #0d47a1;">Rp 150.000 <span class="fs-6 text-secondary">/bulan</span></p>
                            <ul class="list-unstyled text-secondary mb-4">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Ideal untuk 7+ perangkat</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Streaming banyak 4K</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Game online & WFH lancar</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Prioritas dukungan teknis</li>
                            </ul>
                            <a href="{{ route('pembayaran.index') }}" class="btn btn-lg w-100" style="background-color: #4caf50; border-color: #4caf50; color: white;">Pilih Paket Ini</a>
                        </div>
                    </div>
                </div>

                {{-- Card Paket 100 Mbps (Contoh lanjutan) --}}
                <div class="col">
                    <div class="card h-100 shadow-sm border-0" style="border-radius: 10px; background-color: #ffffff;">
                        <div class="card-body p-4 text-center">
                            <h4 class="card-title mb-3" style="color: #0d47a1;">Paket Ultimate</h4>
                            <h3 class="mb-4" style="color: #4caf50; font-weight: bold;">100 Mbps</h3>
                            <p class="fs-4 fw-bold mb-4" style="color: #0d47a1;">Rp 200.000 <span class="fs-6 text-secondary">/bulan</span></p>
                            <ul class="list-unstyled text-secondary mb-4">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Untuk penggunaan intensif</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Multi-streaming & download besar</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Pengalaman gaming terbaik</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Prioritas tertinggi support</li>
                            </ul>
                            <a href="{{ route('pembayaran.index') }}" class="btn btn-lg w-100" style="background-color: #0d47a1; border-color: #0d47a1; color: white;">Pilih Paket Ini</a>
                        </div>
                    </div>
                </div>

                {{-- Tambahkan kartu lain jika ada kelipatan selanjutnya --}}
                <div class="col-12 text-center mt-5">
                    <p class="lead text-secondary">Untuk informasi paket kustom atau kecepatan lebih tinggi, silakan <a href="{{ route('home') }}#faq" style="color: #0d47a1; font-weight: bold; text-decoration: none;">hubungi kami</a>.</p>
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
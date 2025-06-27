@extends('layouts.app') {{-- Pastikan ini mengarah ke layout dasar Anda --}}

@section('content')
<div class="container-fluid p-0" style="background-color: #e0f2f1; min-height: 100vh;"> {{-- Latar belakang hijau muda --}}

    {{-- Navbar --}}
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
                        <a class="nav-link text-white active" aria-current="page" href="{{ route('gangguan.index') }}">Lapor Gangguan</a> {{-- Ini diubah jadi active --}}
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

    {{-- Hero Section untuk Lapor Gangguan --}}
    <div class="jumbotron jumbotron-fluid text-center text-white py-5" style="background: linear-gradient(to right, #dc3545, #fd7e14); padding: 80px 0;"> {{-- Warna merah-oranye untuk tema gangguan --}}
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">Laporkan Gangguan Layanan</h1>
            <p class="lead mb-4">Kami siap membantu mengatasi masalah koneksi Anda dengan cepat.</p>
        </div>
    </div>

    {{-- Section Form Lapor Gangguan --}}
    <section id="form-gangguan" class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg border-0" style="border-radius: 15px; background-color: #ffffff;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="card-title text-center mb-4" style="color: #dc3545; font-weight: bold;">Form Laporan Gangguan</h3>

                            @if(session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ route('gangguan.submit') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="nama_pelapor" class="form-label">Nama Pelapor</label>
                                    <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" value="{{ Auth::user()->name }}" readonly style="background-color: #f8f9fa;">
                                </div>

                                <div class="mb-3">
                                    <label for="email_pelapor" class="form-label">Email Pelapor</label>
                                    <input type="email" class="form-control" id="email_pelapor" name="email_pelapor" value="{{ Auth::user()->email }}" readonly style="background-color: #f8f9fa;">
                                </div>

                                <div class="mb-3">
                                    <label for="paket_terakhir" class="form-label">Paket Terakhir yang Dipilih</label>
                                    {{-- Mengambil data paket terakhir. Ini idealnya dari database, tapi untuk demo pakai dummy. --}}
                                    {{-- $last_package berasal dari controller --}}
                                    <input type="text" class="form-control" id="paket_terakhir" name="paket_terakhir" value="{{ $last_package ?? 'Tidak Diketahui' }}" readonly style="background-color: #f8f9fa;">
                                </div>

                                <div class="mb-3">
                                    <label for="alamat_user" class="form-label">Alamat Pemasangan</label>
                                    {{-- Ini perlu disesuaikan jika alamat disimpan di profil user --}}
                                    {{-- Contoh: Auth::user()->address ?? 'Alamat Belum Terisi' --}}
                                    <textarea class="form-control" id="alamat_user" name="alamat_user" rows="3" readonly style="background-color: #f8f9fa;">{{ $address ?? 'Alamat belum tersedia di profil Anda. Mohon lengkapi data.' }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="waktu_laporan" class="form-label">Waktu Laporan</label>
                                    <input type="text" class="form-control" id="waktu_laporan" name="waktu_laporan" value="{{ \Carbon\Carbon::now()->translatedFormat('d F Y, H:i') }} WIB" readonly style="background-color: #f8f9fa;">
                                </div>

                                <div class="mb-4">
                                    <label for="jenis_gangguan" class="form-label">Jenis Gangguan</label>
                                    <select class="form-select" id="jenis_gangguan" name="jenis_gangguan" required style="border-color: #dc3545;"> {{-- Border merah --}}
                                        <option value="">Pilih Jenis Gangguan</option>
                                        <option value="Internet Tidak Berjalan">Internet Tidak Berjalan</option>
                                        <option value="Koneksi Lambat/Tidak Stabil">Koneksi Lambat/Tidak Stabil</option>
                                        <option value="Wi-Fi Tidak Terdeteksi">Wi-Fi Tidak Terdeteksi</option>
                                        <option value="Perangkat Rusak (Router/Kabel)">Perangkat Rusak (Router/Kabel)</option>
                                        <option value="Tidak Bisa Akses Situs Tertentu">Tidak Bisa Akses Situs Tertentu</option>
                                        <option value="Lainnya">Lainnya (Jelaskan di detail masalah)</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="detail_masalah" class="form-label">Detail Masalah (Opsional)</label>
                                    <textarea class="form-control" id="detail_masalah" name="detail_masalah" rows="5" placeholder="Jelaskan lebih lanjut mengenai masalah yang Anda alami..." style="border-color: #90caf9;"></textarea>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-lg" style="background-color: #dc3545; border-color: #dc3545; color: white; font-weight: bold;">Kirim Laporan Gangguan</button> {{-- Tombol merah --}}
                                    <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg">Batalkan</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="text-center py-4" style="background-color: #0d47a1; color: white;">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} HI-NET. Semua Hak Dilindungi.</p>
            <p class="mb-0">Dibuat dengan <svg class="w-5 h-5 inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle; margin-top: -3px; height: 1em; width: 1em;"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.657l1.172-1.172a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg> Laravel & Bootstrap</p>
        </div>
    </footer>

</div>
@endsection
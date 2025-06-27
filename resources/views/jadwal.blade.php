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
                        <a class="nav-link text-white" href="{{ route('gangguan.index') }}">Lapor Gangguan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white active" aria-current="page" href="{{ route('jadwal.index') }}">Jadwal Pemasangan</a> {{-- Ini diubah jadi active --}}
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

    {{-- Hero Section untuk Jadwal Pemasangan --}}
    <div class="jumbotron jumbotron-fluid text-center text-white py-5" style="background: linear-gradient(to right, #28a745, #8bc34a); padding: 80px 0;"> {{-- Warna hijau untuk tema jadwal --}}
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">Jadwal Pemasangan Layanan Anda</h1>
            <p class="lead mb-4">Lihat status dan detail jadwal instalasi koneksi internet Anda.</p>
        </div>
    </div>

    {{-- Section Detail Jadwal Pemasangan --}}
    <section id="detail-jadwal" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" style="color: #28a745; font-weight: bold;">Status Pemasangan Anda</h2>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg border-0" style="border-radius: 15px; background-color: #ffffff;">
                        <div class="card-body p-4 p-md-5">

                            @if(session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            {{-- Contoh data jadwal (ini akan diganti dengan data dari database) --}}
                            @php
                                // Dummy data jadwal. Idealnya, ini dari database berdasarkan user_id.
                                // Anda perlu membuat model InstallationSchedule dengan kolom seperti:
                                // user_id, order_id (opsional), package, address, scheduled_date, scheduled_time, status (pending, confirmed, completed, cancelled)
                                $installationSchedule = [
                                    'package' => '50 Mbps',
                                    'address' => Auth::user()->address ?? 'Jalan Contoh No. 123, Kel. Suka Maju, Kec. Jaya Raya, Jakarta Selatan', // Ambil dari user atau dummy
                                    'scheduled_date' => '2025-07-10', // Contoh tanggal
                                    'scheduled_time' => '10:00 - 12:00 WIB', // Contoh jam
                                    'status' => 'Menunggu Konfirmasi', // Contoh status
                                    'technician_name' => 'Belum Ditentukan',
                                    'technician_contact' => '-',
                                    'notes' => 'Pemasangan standar.',
                                ];

                                // Jika tidak ada jadwal (misal user belum pernah order)
                                // $installationSchedule = null;
                            @endphp

                            @if($installationSchedule)
                                <h4 class="mb-4 text-center" style="color: #0d47a1;">Informasi Jadwal Terbaru</h4>
                                <div class="row mb-3">
                                    <div class="col-md-5 text-md-end text-secondary">Paket:</div>
                                    <div class="col-md-7">
                                        <p class="mb-0 fs-5 text-dark">{{ $installationSchedule['package'] }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-5 text-md-end text-secondary">Alamat Pemasangan:</div>
                                    <div class="col-md-7">
                                        <p class="mb-0 fs-5 text-dark">{{ $installationSchedule['address'] }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-5 text-md-end text-secondary">Tanggal Jadwal:</div>
                                    <div class="col-md-7">
                                        <p class="mb-0 fs-5 text-dark">{{ \Carbon\Carbon::parse($installationSchedule['scheduled_date'])->translatedFormat('d F Y') }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-5 text-md-end text-secondary">Waktu Jadwal:</div>
                                    <div class="col-md-7">
                                        <p class="mb-0 fs-5 text-dark">{{ $installationSchedule['scheduled_time'] }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-5 text-md-end text-secondary">Status:</div>
                                    <div class="col-md-7">
                                        @if($installationSchedule['status'] == 'Menunggu Konfirmasi')
                                            <span class="badge bg-warning text-dark fs-6">{{ $installationSchedule['status'] }}</span>
                                        @elseif($installationSchedule['status'] == 'Dijadwalkan')
                                            <span class="badge bg-info fs-6">{{ $installationSchedule['status'] }}</span>
                                        @elseif($installationSchedule['status'] == 'Selesai')
                                            <span class="badge bg-success fs-6">{{ $installationSchedule['status'] }}</span>
                                        @elseif($installationSchedule['status'] == 'Dibatalkan')
                                            <span class="badge bg-danger fs-6">{{ $installationSchedule['status'] }}</span>
                                        @else
                                            <span class="badge bg-secondary fs-6">{{ $installationSchedule['status'] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-5 text-md-end text-secondary">Nama Teknisi:</div>
                                    <div class="col-md-7">
                                        <p class="mb-0 fs-5 text-dark">{{ $installationSchedule['technician_name'] }}</p>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-5 text-md-end text-secondary">Kontak Teknisi:</div>
                                    <div class="col-md-7">
                                        <p class="mb-0 fs-5 text-dark">{{ $installationSchedule['technician_contact'] }}</p>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <p class="text-center text-muted">Kami akan mengirimkan notifikasi melalui email/SMS jika ada perubahan jadwal atau detail teknisi.</p>
                            @else
                                <div class="alert alert-info text-center" role="alert">
                                    <h4 class="alert-heading">Belum Ada Jadwal Pemasangan</h4>
                                    <p>Sepertinya Anda belum memiliki jadwal pemasangan yang aktif.</p>
                                    <hr>
                                    <p class="mb-0">Silakan <a href="{{ route('paket.index') }}" style="color: #0d47a1; font-weight: bold;">pilih paket</a> terlebih dahulu untuk memulai proses pemasangan.</p>
                                </div>
                            @endif

                            <div class="text-center mt-5">
                                <a href="{{ route('home') }}#faq" class="btn btn-outline-info btn-lg" style="color: #0d47a1; border-color: #0d47a1;">Pertanyaan Umum Tentang Pemasangan</a>
                            </div>
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
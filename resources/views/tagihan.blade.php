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
                        <a class="nav-link text-white active" aria-current="page" href="{{ route('tagihan.index') }}">Pembayaran</a> {{-- Ini diubah jadi active --}}
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

    {{-- Hero Section untuk Halaman Tagihan --}}
    <div class="jumbotron jumbotron-fluid text-center text-white py-5" style="background: linear-gradient(to right, #0d47a1, #42a5f5); padding: 80px 0;">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">Manajemen Pembayaran & Tagihan</h1>
            <p class="lead mb-4">Lihat riwayat tagihan, status pembayaran, dan lakukan pelunasan.</p>
        </div>
    </div>

    {{-- Section Daftar Tagihan --}}
    <section id="daftar-tagihan" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" style="color: #0d47a1; font-weight: bold;">Daftar Tagihan Anda</h2>

            @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-lg border-0" style="border-radius: 15px; background-color: #ffffff;">
                <div class="card-body p-4 p-md-5">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead style="background-color: #f0f8ff;">
                                <tr>
                                    <th scope="col" style="color: #0d47a1;">#</th>
                                    <th scope="col" style="color: #0d47a1;">Paket</th>
                                    <th scope="col" style="color: #0d47a1;">Periode Tagihan</th>
                                    <th scope="col" style="color: #0d47a1;">Jumlah Tagihan</th>
                                    <th scope="col" style="color: #0d47a1;">Status</th>
                                    <th scope="col" style="color: #0d47a1;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Contoh data tagihan (ini akan diganti dengan data dari database) --}}
                                @php
                                    // Contoh dummy data tagihan. Di aplikasi nyata, ambil dari database
                                    $bills = [
                                        ['id' => 1, 'package' => '50 Mbps', 'period' => 'Juni 2025', 'amount' => 100000, 'status' => 'Belum Dibayar'],
                                        ['id' => 2, 'package' => '50 Mbps', 'period' => 'Mei 2025', 'amount' => 100000, 'status' => 'Sudah Dibayar'],
                                        ['id' => 3, 'package' => '25 Mbps', 'period' => 'April 2025', 'amount' => 50000, 'status' => 'Sudah Dibayar'],
                                    ];

                                    // Jika ada parameter dari proses pembelian sebelumnya, tambahkan sebagai tagihan baru
                                    if (session('new_bill')) {
                                        $newBill = session('new_bill');
                                        array_unshift($bills, $newBill); // Tambahkan di paling atas
                                    }
                                @endphp

                                @forelse($bills as $bill)
                                    <tr>
                                        <th scope="row">{{ $bill['id'] }}</th>
                                        <td>{{ $bill['package'] }}</td>
                                        <td>{{ $bill['period'] }}</td>
                                        <td>Rp {{ number_format($bill['amount'], 0, ',', '.') }}</td>
                                        <td>
                                            @if($bill['status'] == 'Belum Dibayar')
                                                <span class="badge bg-warning text-dark">{{ $bill['status'] }}</span>
                                            @elseif($bill['status'] == 'Sudah Dibayar')
                                                <span class="badge bg-success">{{ $bill['status'] }}</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $bill['status'] }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($bill['status'] == 'Belum Dibayar')
                                                <a href="{{ route('pembayaran.index', ['bill_id' => $bill['id']]) }}" class="btn btn-sm btn-success" style="background-color: #4caf50; border-color: #4caf50;">Bayar Sekarang</a>
                                            @else
                                                <button class="btn btn-sm btn-secondary" disabled>Lihat Detail</button>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">Belum ada tagihan tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-4">
                        <p class="text-secondary">Butuh bantuan terkait tagihan? <a href="{{ route('home') }}#faq" style="color: #0d47a1; font-weight: bold; text-decoration: none;">Hubungi Customer Service</a>.</p>
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
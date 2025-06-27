@extends('layouts.app')

@section('content')
<div class="container-fluid p-0" style="background-color: #e0f2f1; min-height: 100vh;"> {{-- Hijau muda untuk latar belakang seluruh halaman --}}

    {{-- Navbar untuk navigasi (tetap sama) --}}
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #0d47a1;"> {{-- Navbar biru tua --}}
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="max-height: 40px; margin-right: 10px;">
                <span class="fw-bold text-white">HI-NET</span> {{-- Sesuaikan dengan nama perusahaan Anda --}}
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

    {{-- Jumbotron / Hero Section --}}
    <div class="jumbotron jumbotron-fluid text-center text-white py-5" style="background: linear-gradient(to right, #0d47a1, #42a5f5); padding: 80px 0;"> {{-- Gradien biru --}}
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">Internet Cepat, Kebutuhan Terpenuhi!</h1>
            <p class="lead mb-4">Nikmati koneksi tanpa batas dengan layanan WiFi terbaik dari kami.</p>
            <p>Selamat Datang, **{{ Auth::user()->name }}**!</p> {{-- Menampilkan nama pengguna --}}
            <a href="#paket-layanan" class="btn btn-lg mt-3" style="background-color: #4caf50; border-color: #4caf50; color: white;">Lihat Paket Sekarang</a> {{-- Tombol hijau --}}
        </div>
    </div>

    {{-- Section 1: Paket Layanan & Pricelist --}}
    <section id="paket-layanan" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" style="color: #0d47a1; font-weight: bold;">Pilihan Paket Layanan & Harga</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-sm border-0" style="border-radius: 10px; background-color: #ffffff;">
                        <img src="{{ asset('images/gambarcard1.png') }}" class="card-img-top img-fluid" alt="Paket Layanan" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                        <div class="card-body p-4">
                            <h5 class="card-title text-center mb-3" style="color: #0d47a1;">Kecepatan & Harga Paket WiFi</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: #f5f5f5;">
                                    Kecepatan 25 Mbps
                                    <span class="badge bg-success" style="background-color: #4caf50 !important;">Rp 50.000 /bulan</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: #ffffff;">
                                    Kecepatan 50 Mbps
                                    <span class="badge bg-success" style="background-color: #4caf50 !important;">Rp 100.000 /bulan</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: #f5f5f5;">
                                    Kecepatan 75 Mbps
                                    <span class="badge bg-success" style="background-color: #4caf50 !important;">Rp 150.000 /bulan</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: #ffffff;">
                                    Kecepatan 100 Mbps
                                    <span class="badge bg-success" style="background-color: #4caf50 !important;">Rp 200.000 /bulan</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: #f5f5f5;">
                                    Dan seterusnya, kelipatan 25 Mbps bertambah Rp 50.000
                                    <span class="badge bg-info" style="background-color: #0d47a1 !important;">Info Lanjut</span>
                                </li>
                            </ul>
                            <div class="text-center mt-4">
                                <a href="#" class="btn btn-lg" style="background-color: #0d47a1; border-color: #0d47a1; color: white;">Pesan Sekarang</a> {{-- Tombol biru tua --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Section 2: Keunggulan WiFi --}}
    <section id="keunggulan" class="py-5" style="background-color: #f5f5f5;"> {{-- Latar belakang abu-abu muda --}}
        <div class="container">
            <h2 class="text-center mb-5" style="color: #0d47a1; font-weight: bold;">Mengapa Memilih Kami?</h2>
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="{{ asset('images/gambarcard2.png') }}" class="img-fluid rounded shadow-sm" alt="Keunggulan WiFi" style="border-radius: 10px;">
                </div>
                <div class="col-md-6">
                    <h4 style="color: #4caf50;">Koneksi Stabil dan Cepat</h4> {{-- Judul hijau --}}
                    <p class="text-secondary">Kami menggunakan teknologi terkini untuk memastikan Anda mendapatkan koneksi internet yang stabil dan kecepatan unduh/unggah maksimal di setiap saat.</p>
                    <h4 class="mt-4" style="color: #4caf50;">Dukungan Teknis 24/7</h4>
                    <p class="text-secondary">Tim support kami siap membantu Anda kapan saja. Ada masalah? Langsung hubungi kami, dan kami akan segera menanganinya.</p>
                    <h4 class="mt-4" style="color: #4caf50;">Harga Terjangkau & Transparan</h4>
                    <p class="text-secondary">Dapatkan paket internet berkualitas tinggi dengan harga yang bersahabat. Tidak ada biaya tersembunyi, semua transparan di awal.</p>
                    <h4 class="mt-4" style="color: #4caf50;">Pemasangan Cepat dan Profesional</h4>
                    <p class="text-secondary">Tim teknisi kami terlatih untuk melakukan pemasangan dengan cepat, rapi, dan sesuai standar keamanan. Anda bisa langsung menikmati internet tanpa menunggu lama.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Section 3: Jangkauan Internet --}}
    <section id="jangkauan" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" style="color: #0d47a1; font-weight: bold;">Jangkauan Layanan Kami</h2>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm border-0" style="border-radius: 10px; background-color: #ffffff;">
                        <div class="card-body p-4 text-center">
                            <h5 class="card-title mb-3" style="color: #0d47a1;">Wilayah JABODETABEK & Sekitarnya</h5>
                            <p class="card-text text-secondary mb-4">Jaringan internet kami telah menjangkau sebagian besar area di Jakarta, Bogor, Depok, Tangerang, dan Bekasi. Kami terus memperluas jangkauan untuk melayani Anda lebih baik.</p>
                            <img src="{{ asset('images/gambarcard3.png') }}" class="img-fluid rounded shadow-sm" alt="Peta Jangkauan" style="max-height: 400px; width: 100%; object-fit: cover; border-radius: 10px;">
                            <p class="mt-4 text-secondary">Untuk memastikan ketersediaan layanan di lokasi Anda, silakan hubungi customer service kami.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Section 4: Pertanyaan User (Form Kontak) --}}
    <section id="faq" class="py-5" style="background-color: #f5f5f5;"> {{-- Latar belakang abu-abu muda --}}
        <div class="container">
            <h2 class="text-center mb-5" style="color: #0d47a1; font-weight: bold;">Punya Pertanyaan? Kami Siap Membantu!</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-sm border-0" style="border-radius: 10px; background-color: #ffffff;">
                        <div class="card-body p-4">
                            <p class="text-center text-secondary mb-4">Isi formulir di bawah ini dan kami akan segera merespon pertanyaan atau masukan Anda.</p>
                            <form action="{{ route('contact.submit') }}" method="POST"> {{-- Nanti kita buat route ini --}}
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" name="name" required style="border-color: #90caf9;">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Alamat Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required style="border-color: #90caf9;">
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subjek</label>
                                    <input type="text" class="form-control" id="subject" name="subject" required style="border-color: #90caf9;">
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Pesan Anda</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" required style="border-color: #90caf9;"></textarea>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-lg" style="background-color: #4caf50; border-color: #4caf50; color: white;">Kirim Pertanyaan</button> {{-- Tombol hijau --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="text-center py-4" style="background-color: #0d47a1; color: white;"> {{-- Footer biru tua --}}
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} HI-NET. Semua Hak Dilindungi.</p>
            <p class="mb-0">Dibuat dengan <svg class="w-5 h-5 inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle; margin-top: -3px; height: 1em; width: 1em;"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.657l1.172-1.172a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg> Laravel & Bootstrap</p>
        </div>
    </footer>

</div>
@endsection
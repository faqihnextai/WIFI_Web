@extends('layouts.app')

@section('content')
<div class="container py-5" style="min-height: 100vh; background-color: #f0f4f8;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0" style="border-radius: 15px;">
                <div class="card-header text-center py-3" style="background-color: #1a237e; color: white; border-top-left-radius: 15px; border-top-right-radius: 15px; font-weight: bold; font-size: 1.8rem;">
                    Dashboard Admin
                </div>
                <div class="card-body p-5">
                    <p class="lead text-center mb-4">Selamat datang, {{ Auth::user()->name }} (Admin)!</p>
                    <p class="text-center text-muted">Anda memiliki akses penuh ke fitur administrasi sistem.</p>
                    <div class="d-grid gap-3 col-md-8 mx-auto">
                        <a href="#" class="btn btn-primary btn-lg">Kelola Pengguna</a>
                        <a href="#" class="btn btn-info btn-lg">Kelola Paket Layanan</a>
                        <a href="#" class="btn btn-warning btn-lg">Lihat Laporan Gangguan</a>
                        <a href="#" class="btn btn-success btn-lg">Manajemen Jadwal Pemasangan</a>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="btn btn-outline-danger btn-lg mt-4">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
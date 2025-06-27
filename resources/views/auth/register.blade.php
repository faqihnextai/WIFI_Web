@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100" style="background-color: #e0f2f1;"> {{-- Warna hijau muda untuk latar belakang --}}
    <div class="card p-4 shadow" style="border-radius: 15px; width: 400px;">
        <div class="card-header text-center pb-3" style="background-color: transparent; border-bottom: none;">
            {{-- Logo --}}
            <img src="{{ asset('logo.png') }}" alt="Logo" style="max-width: 150px; margin-bottom: 15px;">
            <h4 class="mb-0" style="color: #0d47a1;">Daftar Akun Baru</h4> {{-- Warna biru tua untuk judul --}}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label" style="color: #212121;">Nama Lengkap</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus style="border-color: #90caf9;"> {{-- Border biru muda --}}
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label" style="color: #212121;">Alamat Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" style="border-color: #90caf9;">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label" style="color: #212121;">Kata Sandi</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="border-color: #90caf9;">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password-confirm" class="form-label" style="color: #212121;">Konfirmasi Kata Sandi</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" style="border-color: #90caf9;">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary" style="background-color: #4caf50; border-color: #4caf50; font-weight: bold;"> {{-- Warna hijau untuk tombol --}}
                        Daftar
                    </button>
                </div>

                <div class="text-center mt-3">
                    <p class="mb-0" style="color: #616161;">Sudah punya akun? <a href="{{ route('login') }}" style="color: #0d47a1; text-decoration: none;">Masuk di sini</a></p> {{-- Link login warna biru tua --}}
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
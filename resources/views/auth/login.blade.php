@extends('layouts.app') {{-- Pastikan ini mengarah ke layout dasar yang benar --}}

@section('content')
<div class="container py-5" style="min-height: 100vh; background-color: #e0f2f1; display: flex; align-items: center; justify-content: center;"> {{-- Latar belakang hijau muda dan pusat konten --}}
    <div class="row justify-content-center w-100">
        <div class="col-md-7 col-lg-6"> {{-- Lebar kolom disesuaikan agar lebih proporsional --}}
            <div class="card shadow-lg border-0" style="border-radius: 15px;"> {{-- Kartu dengan shadow dan border radius --}}
                <div class="card-header text-center py-3" style="background-color: #0d47a1; color: white; border-top-left-radius: 15px; border-top-right-radius: 15px; font-weight: bold; font-size: 1.5rem;">
                    {{ __('Login ke Akun Anda') }} {{-- Judul login --}}
                </div>

                <div class="card-body p-4 p-md-5"> {{-- Padding disesuaikan --}}
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3 row"> {{-- margin-bottom-3 --}}
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-7"> {{-- Lebar kolom input --}}
                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="border-color: #90caf9;"> {{-- Input lebih besar dan border biru muda --}}

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="border-color: #90caf9;">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-7 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-secondary" for="remember"> {{-- Teks sekunder --}}
                                        {{ __('Ingat Saya') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-0 row">
                            <div class="col-md-7 offset-md-4">
                                <button type="submit" class="btn btn-lg w-100" style="background-color: #4caf50; border-color: #4caf50; color: white; font-weight: bold;"> {{-- Tombol hijau, lebih besar, full width --}}
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link mt-2 text-decoration-none" href="{{ route('password.request') }}" style="color: #0d47a1;"> {{-- Link biru tua tanpa underline default --}}
                                        {{ __('Lupa Kata Sandi?') }}
                                    </a>
                                @endif
                                <p class="text-center text-secondary mt-3">
                                    Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none" style="color: #0d47a1; font-weight: bold;">Daftar Sekarang</a> {{-- Link daftar --}}
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
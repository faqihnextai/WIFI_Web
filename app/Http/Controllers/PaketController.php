<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Menampilkan halaman daftar paket layanan.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('paket'); // Mengarahkan ke file paket.blade.php
    }
}
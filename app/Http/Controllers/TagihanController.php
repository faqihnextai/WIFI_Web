<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagihanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan daftar tagihan bulanan pengguna.
     * Di sini Anda akan mengambil data tagihan dari database.
     * Untuk demo ini, kita gunakan dummy data atau data dari session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // --- Implementasi nyata: Ambil data tagihan dari database ---
        // Misalnya:
        // $user = Auth::user();
        // $bills = $user->bills()->orderBy('period', 'desc')->get();
        // Anda perlu punya model Bill dan relasi dengan User

        // --- Untuk demo ini, kita gunakan dummy data di Blade ---
        // Kita bisa pakai session untuk "menambahkan" tagihan baru dari proses purchase
        // Tapi untuk tabel yang statis seperti ini, lebih mudah dummy data langsung di Blade.
        // Jika Anda ingin tagihan baru muncul dari proses pembelian,
        // PembayaranController@process harus menambahkan data ke session atau DB.

        return view('tagihan');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    // Pastikan user sudah login sebelum mengakses halaman ini
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan halaman konfirmasi pesanan/pembayaran.
     * Menerima parameter speed dan price dari URL.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $speed = $request->query('speed');
        $price = $request->query('price');

        return view('pembayaran', compact('speed', 'price'));
    }

    /**
     * Menangani proses "pembayaran" (simulasi atau redirect ke payment gateway).
     * Ini adalah halaman tujuan setelah user klik "Lanjutkan Pembayaran".
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function process(Request $request)
    {
        $speed = $request->query('speed');
        $price = $request->query('price');

        // Di sini Anda akan mengintegrasikan dengan payment gateway (misal Midtrans, Duitku, Xendit)
        // Atau, jika ini hanya simulasi, Anda bisa menyimpan order ke database
        // dan menampilkan pesan sukses.

        // Contoh: Simpan data pesanan ke database (dummy)
        // Ini hanyalah contoh, Anda perlu membuat model dan migrasi untuk Order/Transaction
        // Order::create([
        //     'user_id' => Auth::id(),
        //     'package_speed' => $speed,
        //     'amount' => $price,
        //     'status' => 'pending', // Atau 'menunggu pembayaran'
        //     'order_date' => now(),
        // ]);

        // Untuk demo ini, kita hanya redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Pesanan Anda untuk paket ' . $speed . ' Mbps berhasil dibuat! Silakan lanjutkan ke metode pembayaran.');

        // Atau, jika langsung ke halaman metode pembayaran (contoh):
        // return view('metode_pembayaran', compact('speed', 'price'));
    }
}
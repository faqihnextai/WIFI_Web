<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; // Pastikan Carbon sudah di-import

class GangguanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Hanya user terautentikasi yang bisa mengakses
    }

    /**
     * Menampilkan form lapor gangguan dengan data pre-filled.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        // --- Data Dummy atau Dari Database (Penting!) ---
        // Ini adalah bagian KRITIS.
        // Untuk demo, kita pakai dummy atau ambil dari User model jika sudah ada kolomnya.

        // Contoh: Mengambil paket terakhir dari sesi atau dummy
        // Idealnya, ini diambil dari database riwayat pembelian user
        $last_package = session('last_purchased_package', '50 Mbps (Contoh)'); // Ambil dari session atau default
        // Anda bisa menyimpan ini saat user purchase paket di PembayaranController@process

        // Contoh: Mengambil alamat dari user (jika kolom 'address' ada di tabel users)
        // Atau dari tabel 'profiles' jika ada
        $address = $user->address ?? 'Jalan Contoh No. 123, Kel. Suka Maju, Kec. Jaya Raya, Jakarta Selatan';
        // Jika Anda ingin alamat diisi dari Pembayaran.blade.php,
        // Anda perlu menyimpan alamat yang diinput user ke database terlebih dahulu.
        // Atau, tambahkan kolom `address` di tabel `users` via migrasi:
        // Schema::table('users', function (Blueprint $table) {
        //     $table->string('address')->nullable()->after('email');
        // });
        // Lalu jalankan `php artisan migrate`.

        return view('gangguan', compact('user', 'last_package', 'address'));
    }

    /**
     * Memproses submit laporan gangguan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(Request $request)
    {
        // 1. Validasi data
        $request->validate([
            'jenis_gangguan' => 'required|string',
            'detail_masalah' => 'nullable|string|max:1000',
        ]);

        // 2. Ambil data yang sudah ada atau dari request
        $nama_pelapor = Auth::user()->name;
        $email_pelapor = Auth::user()->email;
        $paket_terakhir = $request->input('paket_terakhir'); // Diambil dari hidden field/readonly input
        $alamat_user = $request->input('alamat_user'); // Diambil dari hidden field/readonly input
        $waktu_laporan = Carbon::now()->toDateTimeString(); // Format untuk database

        // 3. Simpan laporan ke database (contoh)
        // Anda perlu membuat migrasi untuk tabel 'gangguan_reports' atau sejenisnya
        // Schema::create('gangguan_reports', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('user_id')->constrained();
        //     $table->string('nama_pelapor');
        //     $table->string('email_pelapor');
        //     $table->string('paket_terakhir')->nullable();
        //     $table->text('alamat_user')->nullable();
        //     $table->string('jenis_gangguan');
        //     $table->text('detail_masalah')->nullable();
        //     $table->string('status')->default('Baru'); // Ex: Baru, Dalam Proses, Selesai
        //     $table->timestamps();
        // });
        // Kemudian jalankan `php artisan make:model GangguanReport` dan `php artisan migrate`.

        // Contoh menyimpan dummy data (simulasi):
        // LaporanGangguan::create([ // Jika Anda membuat model LaporanGangguan
        //     'user_id' => Auth::id(),
        //     'nama_pelapor' => $nama_pelapor,
        //     'email_pelapor' => $email_pelapor,
        //     'paket_terakhir' => $paket_terakhir,
        //     'alamat_user' => $alamat_user,
        //     'jenis_gangguan' => $request->jenis_gangguan,
        //     'detail_masalah' => $request->detail_masalah,
        //     'waktu_laporan' => $waktu_laporan, // Bisa disimpan juga
        // ]);

        // Untuk demo, kita redirect dengan pesan sukses
        return redirect()->route('gangguan.index')->with('status', 'Laporan gangguan Anda telah berhasil kami terima. Kami akan segera memprosesnya. Terima kasih!');
    }
}
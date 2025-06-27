<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; // Untuk format tanggal

class JadwalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Hanya user terautentikasi yang bisa mengakses
    }

    /**
     * Menampilkan halaman jadwal pemasangan.
     * Di sini Anda akan mengambil data jadwal dari database.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        // --- Implementasi nyata: Ambil jadwal dari database ---
        // Idealnya, Anda memiliki model InstallationSchedule dan user_id di dalamnya.
        // $installationSchedule = $user->installationSchedules()->latest()->first(); // Ambil jadwal terbaru user

        // --- Untuk demo ini, kita pakai dummy data ---
        // Simulasikan jika user memiliki jadwal aktif.
        // Anda bisa mengubahnya menjadi null untuk mensimulasikan tidak ada jadwal.
        $installationSchedule = [
            'package' => '50 Mbps',
            'address' => $user->address ?? 'Jalan Contoh No. 123, Kel. Suka Maju, Kec. Jaya Raya, Jakarta Selatan',
            'scheduled_date' => '2025-07-10', // Contoh tanggal
            'scheduled_time' => '10:00 - 12:00 WIB', // Contoh jam
            'status' => 'Dijadwalkan', // Bisa juga 'Menunggu Konfirmasi', 'Selesai', 'Dibatalkan'
            'technician_name' => 'Budi Santoso',
            'technician_contact' => '0812-3456-7890',
            'notes' => 'Mohon siapkan area pemasangan.',
        ];

        // Jika tidak ada jadwal yang ditemukan untuk user ini (misal baru daftar atau belum order)
        // $installationSchedule = null;

        return view('jadwal', compact('installationSchedule'));
    }
}
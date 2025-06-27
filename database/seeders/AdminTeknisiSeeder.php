<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Penting untuk mengenkripsi password
use App\Models\User; // Pastikan model User di-import

class AdminTeknisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat user Admin
        User::create([
            'name' => 'Faqih Baidowi (Admin)', // Nama lengkap + role agar mudah dikenali
            'email' => 'faqih.admin@gmail.com', // Email unik untuk admin
            'password' => Hash::make('masuk123'), // Enkripsi password
            'role' => 'admin', // Set role sebagai admin
        ]);

        // Buat user Teknisi
        User::create([
            'name' => 'Faqih Baidowi (Teknisi)', // Nama lengkap + role
            'email' => 'faqih.teknisi@gmail.com', // Email unik untuk teknisi
            'password' => Hash::make('masuk123'), // Enkripsi password
            'role' => 'teknisi', // Set role sebagai teknisi
        ]);

        // Opsional: Buat satu user biasa jika belum ada
        if (!User::where('email', 'user@example.com')->exists()) {
            User::create([
                'name' => 'User Biasa',
                'email' => 'user@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
            ]);
        }
    }
}
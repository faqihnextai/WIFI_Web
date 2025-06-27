<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // Jika kamu ingin kirim email
use App\Mail\ContactFormMail; // Jika kamu ingin kirim email

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // 1. Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // 2. Simpan data (opsional, ke database) atau langsung kirim email
        // Contoh: Kirim email
        // Mail::to('admin@namaperusahaan.com')->send(new ContactFormMail($request->all()));

        // Untuk sementara, kita hanya akan menampilkan pesan sukses
        return redirect()->back()->with('success', 'Terima kasih! Pesan Anda telah terkirim.');
    }
}
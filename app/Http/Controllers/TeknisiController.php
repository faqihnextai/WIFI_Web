<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeknisiController extends Controller
{
    public function dashboard()
    {
        return view('teknisi.dashboard'); // Buat file teknisi/dashboard.blade.php
    }
}
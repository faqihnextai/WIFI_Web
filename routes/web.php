<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController; 
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\GangguanController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController; // Pastikan ini ada
use App\Http\Controllers\TeknisiController; // Pastikan ini ada

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// --- Route Lama ---
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/paket', [PaketController::class, 'index'])->name('paket.index');
Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
Route::get('/pembayaran/process', [PembayaranController::class, 'process'])->name('pembayaran.process');
Route::get('/tagihan', [TagihanController::class, 'index'])->name('tagihan.index');
Route::get('/lapor-gangguan', [GangguanController::class, 'index'])->name('gangguan.index');
Route::post('/lapor-gangguan', [GangguanController::class, 'submit'])->name('gangguan.submit');
Route::get('/jadwal-pemasangan', [JadwalController::class, 'index'])->name('jadwal.index');

// --- Route Baru Sesuai Permintaan (tidak menghapus yang lama) ---

// --- Route Umum (User Biasa) ---
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return redirect()->route('home');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/paket', [PaketController::class, 'index'])->name('paket.index');
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('/pembayaran/process', [PembayaranController::class, 'process'])->name('pembayaran.process');
    Route::get('/tagihan', [TagihanController::class, 'index'])->name('tagihan.index');
    Route::get('/lapor-gangguan', [GangguanController::class, 'index'])->name('gangguan.index');
    Route::post('/lapor-gangguan', [GangguanController::class, 'submit'])->name('gangguan.submit');
    Route::get('/jadwal-pemasangan', [JadwalController::class, 'index'])->name('jadwal.index');
});

// --- Route untuk Admin ---
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    // Tambahkan route-route lain khusus admin di sini
});

// --- Route untuk Teknisi ---
Route::middleware(['auth', 'role:teknisi'])->prefix('teknisi')->name('teknisi.')->group(function () {
    Route::get('/dashboard', [TeknisiController::class, 'dashboard'])->name('dashboard');
    // Tambahkan route-route lain khusus teknisi di sini
});
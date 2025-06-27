<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect('/login'); // Redirect ke login jika belum login
        }

        $user = Auth::user();

        // Periksa apakah peran user ada di daftar peran yang diizinkan
        if (!in_array($user->role, $roles)) {
            // Jika tidak diizinkan, redirect ke halaman yang sesuai atau error 403
            if ($user->role === 'admin') {
                return redirect('/admin/dashboard'); // Contoh redirect untuk admin
            } elseif ($user->role === 'teknisi') {
                return redirect('/teknisi/dashboard'); // Contoh redirect untuk teknisi
            } else {
                // Untuk user biasa atau role lain yang tidak punya akses ke halaman ini
                return redirect('/home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
            }
        }

        return $next($request);
    }
}
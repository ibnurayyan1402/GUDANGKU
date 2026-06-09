<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Cek apakah user sudah login dan apakah rolenya sesuai
        if (!Auth::check() || Auth::user()->role !== $role) {
            // Jika bukan admin (misal toko nyasar ke dashboard admin), lempar error 403 (Forbidden)
            abort(403, 'Anda tidak memiliki hak akses ke halaman ini.');
        }

        return $next($request);
    }
}
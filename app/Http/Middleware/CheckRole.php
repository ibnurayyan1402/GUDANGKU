<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Jika belum login atau role-nya tidak sesuai, tendang ke halaman login
        if (!Auth::check() || Auth::user()->role !== $role) {
            return redirect('/')->with('error', 'Anda tidak memiliki hak akses ke halaman tersebut!');
        }

        return $next($request);
    }
}
<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        } else {
            // Periksa apakah pengguna adalah tamu (belum login)
            if (!$request->user()) {
                // Jika pengguna tamu, arahkan ke halaman login
                return route('auth');
            }
            // Jika pengguna sudah login, lanjutkan dengan route yang diharapkan
            return null;
        }
    }
}

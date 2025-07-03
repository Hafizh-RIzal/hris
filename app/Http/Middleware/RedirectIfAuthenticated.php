<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            switch ($user->role) {
                case 'admin':
                case 'hrd':
                case 'manager':
                    return redirect()->route('dashboard.index');
                case 'karyawan':
                    return redirect()->route('absensi.presensi');
                default:
                    Auth::logout();
                    return redirect()->route('login')->withErrors([
                        'email' => 'Role tidak dikenali.',
                    ]);
            }
        }

        return $next($request);
    }
}

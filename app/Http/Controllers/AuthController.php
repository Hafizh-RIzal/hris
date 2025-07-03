<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email'    => ['required', 'email'],
        'password' => ['required'],
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors([
            'email' => 'Akun tidak ditemukan. Mungkin sudah dihapus.',
        ])->onlyInput('email');
    }

    if (Auth::attempt($credentials, $request->remember)) {
        $request->session()->regenerate();
        $user = Auth::user();

        if (!$user->is_approved) {
            Auth::logout();
            return back()->withErrors([
                'email' => 'Akun Anda belum disetujui oleh admin.',
            ])->onlyInput('email');
        }

        switch ($user->role) {
    case 'admin':
    case 'hrd':
    case 'manager':
        return redirect()->route('dashboard.index');

    case 'karyawan':
        return redirect()->route('absensi.presensi');

    default:
        Auth::logout();
        return redirect('/login')->withErrors([
            'email' => 'Role tidak dikenali.',
        ]);
}

    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->onlyInput('email');
}


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

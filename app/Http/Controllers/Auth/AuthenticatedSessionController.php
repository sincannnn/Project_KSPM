<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Memproses login pengguna.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Validasi dan autentikasi akun.
        $request->authenticate();

        // Memperbarui session setelah login.
        $request->session()->regenerate();

        // Login berhasil: arahkan langsung ke dashboard admin.
        return redirect()->route('admin.dashboard');
    }

    /**
     * Memproses logout pengguna.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Setelah logout, kembali ke halaman login.
        return redirect()->route('login');
    }
}
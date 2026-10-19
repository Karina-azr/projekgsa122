<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthentikasiController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        return view('login');
    }

    // Memproses login
    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'name.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if (Auth::attempt(
            $credentials,
            $request->boolean('remember')
        )) {
            $request->session()->regenerate();

            return redirect()
                ->route('dashboard')
                ->with('success', 'Selamat datang kembali!');
        }

        return back()
            ->withErrors([
                'name' => 'Username atau password salah.',
            ])
            ->onlyInput('name');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Kamu berhasil keluar dari akun.');
    }

    // Menampilkan halaman register
    public function register()
    {
        return view('register');
    }

    // Memproses register
    public function registerProcess(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('login')
            ->with(
                'success',
                'Akun berhasil dibuat! Silakan login.'
            );
    }

    // Menampilkan halaman Home beserta berita dari database
    public function home()
    {
        $beritas = Berita::latest('tanggal_berita')->get();

        return view('home', compact('beritas'));
    }

    // Menampilkan halaman donasi
    public function donation()
    {
        return view('donation');
    }
}

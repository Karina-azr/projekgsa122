<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    /**
     * Menampilkan halaman donasi
     */
    public function index()
    {
        return view('donation');
    }

    /**
     * Memproses donasi
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'amount' => 'required|numeric|min:10000',
            'payment' => 'required|in:qris,bank,ewallet',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'amount.required' => 'Nominal donasi wajib diisi.',
            'amount.numeric' => 'Nominal donasi harus berupa angka.',
            'amount.min' => 'Minimal donasi adalah Rp10.000.',
            'payment.required' => 'Metode pembayaran wajib dipilih.',
            'payment.in' => 'Metode pembayaran tidak valid.',
        ]);

        // Simpan data donasi
        $donation = Donation::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'amount' => $validated['amount'],
            'payment_method' => $validated['payment'],
            'status' => 'pending',
        ]);

        // Redirect setelah berhasil
        return redirect()
            ->route('donation.success', $donation->id)
            ->with('success', 'Donasi berhasil dibuat dan siap diproses.');
    }

    /**
     * Menampilkan halaman sukses
     */
    public function success($id)
    {
        $donation = Donation::findOrFail($id);

        return view('donation-success', compact('donation'));
    }
}
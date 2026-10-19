<?php

namespace App\Http\Controllers;

use App\Models\Bibit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    /**
     * Halaman checkout.
     */
    public function create($id)
    {
        // Ambil data bibit langsung dari database
        $bibit = Bibit::findOrFail($id);

        return view('checkout.create', compact('bibit'));
    }

    /**
     * Menyimpan checkout sementara.
     */
    public function store(Request $request, $id)
    {
        // Ambil bibit dari database
        $bibit = Bibit::findOrFail($id);

        $validated = $request->validate([
            'jumlah' => 'required|integer|min:1|max:100',
        ]);

        $jumlah = $validated['jumlah'];
        $total = $bibit->harga * $jumlah;

        $transaksi = [
            'kode' => 'HK-' . strtoupper(Str::random(8)),
            'bibit_id' => $bibit->id,
            'nama_bibit' => $bibit->nama,
            'harga' => $bibit->harga,
            'jumlah' => $jumlah,
            'total' => $total,
            'status' => 'Menunggu Pembayaran',
            'tanggal' => now()->format('d-m-Y H:i'),
        ];

        session([
            'transaksi' => $transaksi,
        ]);

        return redirect()
            ->route('checkout.payment', $transaksi['kode']);
    }

    /**
     * Halaman pembayaran dummy.
     */
    public function payment($kode)
    {
        $transaksi = session('transaksi');

        if (!$transaksi || $transaksi['kode'] !== $kode) {
            abort(404);
        }

        return view('checkout.payment', compact('transaksi'));
    }

    /**
     * Simulasi pembayaran berhasil.
     */
    public function paymentSuccess($kode)
    {
        $transaksi = session('transaksi');

        if (!$transaksi || $transaksi['kode'] !== $kode) {
            abort(404);
        }

        $transaksi['status'] = 'Pembayaran Berhasil';
        $transaksi['dibayar_pada'] = now()->format('d-m-Y H:i');

        session([
            'transaksi' => $transaksi,
        ]);

        return redirect()
            ->route('checkout.receipt', $kode);
    }

    /**
     * Menampilkan struk.
     */
    public function receipt($kode)
    {
        $transaksi = session('transaksi');

        if (!$transaksi || $transaksi['kode'] !== $kode) {
            abort(404);
        }

        return view('checkout.receipt', compact('transaksi'));
    }

    /**
     * Menampilkan QR dummy.
     */
    public function qr($kode)
    {
        $transaksi = session('transaksi');

        if (!$transaksi || $transaksi['kode'] !== $kode) {
            abort(404);
        }

        return view('checkout.qr', compact('transaksi'));
    }
}

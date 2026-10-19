<?php

namespace App\Http\Controllers;

use App\Models\Bibit;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PenanamanPohonController extends Controller
{
    /**
     * Menampilkan katalog bibit.
     */
    public function index()
    {
        $bibit = Bibit::where('aktif', true)
            ->where('stok', '>', 0)
            ->get();

        $cart = session('cart', []);
        $cartCount = collect($cart)->sum('jumlah');

        $cartTotal = collect($cart)->sum(
            fn ($item) => (float) $item['harga']
                * (int) $item['jumlah']
        );

        return view('penanaman-pohon.index', compact(
            'bibit',
            'cart',
            'cartCount',
            'cartTotal'
        ));
    }

    /**
     * Menambahkan bibit ke keranjang.
     */
    public function addToCart(Request $request, $id)
    {
        $request->validate([
            'jumlah' => ['required', 'integer', 'min:1'],
        ]);

        $bibit = Bibit::where('aktif', true)->findOrFail($id);

        $cart = session()->get('cart', []);

        $jumlahLama = (int) ($cart[$bibit->id]['jumlah'] ?? 0);
        $jumlahBaru = $jumlahLama + (int) $request->jumlah;

        if ($jumlahBaru > $bibit->stok) {
            return back()->with(
                'error',
                'Jumlah bibit melebihi stok yang tersedia.'
            );
        }

        $cart[$bibit->id] = [
            'id' => $bibit->id,
            'nama' => $bibit->nama,
            'harga' => (float) $bibit->harga,
            'gambar' => $bibit->gambar,
            'jumlah' => $jumlahBaru,
        ];

        session()->put('cart', $cart);

        return back()->with(
            'success',
            'Bibit berhasil ditambahkan ke keranjang.'
        );
    }

    /**
     * Menampilkan keranjang.
     */
    public function cart()
    {
        $cart = session('cart', []);

        $cartCount = collect($cart)->sum('jumlah');

        $cartTotal = collect($cart)->sum(
            fn ($item) => (float) $item['harga']
                * (int) $item['jumlah']
        );

        return view('penanaman-pohon.cart', compact(
            'cart',
            'cartCount',
            'cartTotal'
        ));
    }

    /**
     * Mengubah jumlah bibit di keranjang.
     */
    public function updateCart(Request $request, $id)
    {
        $request->validate([
            'jumlah' => ['required', 'integer', 'min:1'],
        ]);

        $cart = session()->get('cart', []);
        $bibit = Bibit::find($id);

        if (!$bibit || !isset($cart[$id])) {
            return redirect()
                ->route('penanaman-pohon.cart')
                ->with(
                    'error',
                    'Bibit tidak ditemukan. Silakan tambahkan kembali.'
                );
        }

        $jumlah = (int) $request->jumlah;

        if ($jumlah > $bibit->stok) {
            return back()->with(
                'error',
                'Jumlah melebihi stok bibit.'
            );
        }

        $cart[$id]['jumlah'] = $jumlah;
        $cart[$id]['gambar'] = $bibit->gambar;

        session()->put('cart', $cart);

        return back()->with(
            'success',
            'Keranjang berhasil diperbarui.'
        );
    }

    /**
     * Menghapus satu bibit dari keranjang.
     */
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        unset($cart[$id]);

        session()->put('cart', $cart);

        return back()->with(
            'success',
            'Bibit dihapus dari keranjang.'
        );
    }

    /**
     * Mengosongkan keranjang.
     */
    public function clearCart()
    {
        session()->forget('cart');

        return redirect()
            ->route('penanaman-pohon.cart')
            ->with('success', 'Keranjang berhasil dikosongkan.');
    }

    /**
     * Menampilkan halaman checkout.
     */
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('penanaman-pohon.cart')
                ->with('error', 'Keranjang kamu masih kosong.');
        }

        foreach ($cart as $id => $item) {
            $bibit = Bibit::find($id);

            if (!$bibit) {
                unset($cart[$id]);
                continue;
            }

            $cart[$id]['id'] = $bibit->id;
            $cart[$id]['nama'] = $bibit->nama;
            $cart[$id]['harga'] = (float) $bibit->harga;
            $cart[$id]['gambar'] = $bibit->gambar;
        }

        session()->put('cart', $cart);

        if (empty($cart)) {
            return redirect()
                ->route('penanaman-pohon.cart')
                ->with(
                    'error',
                    'Data bibit sudah tidak tersedia. Silakan pilih bibit kembali.'
                );
        }

        $cartCount = collect($cart)->sum('jumlah');

        $cartTotal = collect($cart)->sum(
            fn ($item) => (float) $item['harga']
                * (int) $item['jumlah']
        );

        return view('penanaman-pohon.checkout', compact(
            'cart',
            'cartCount',
            'cartTotal'
        ));
    }

    /**
     * Memproses checkout dan membuat pesanan.
     */
    public function processCheckout(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'alamat' => ['required', 'string', 'max:2000'],
            'metode_pembayaran' => ['required', 'string', 'max:100'],
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('penanaman-pohon.cart')
                ->with('error', 'Keranjang kamu masih kosong.');
        }

        try {
            $order = DB::transaction(function () use ($request, $cart) {
                $itemsValid = [];
                $total = 0;

                foreach ($cart as $id => $item) {
                    $bibit = Bibit::whereKey($id)
                        ->lockForUpdate()
                        ->first();

                    if (!$bibit) {
                        throw new \RuntimeException(
                            'Salah satu bibit sudah tidak tersedia. Muat ulang keranjang.'
                        );
                    }

                    $jumlah = (int) ($item['jumlah'] ?? 0);

                    if ($jumlah < 1 || $jumlah > $bibit->stok) {
                        throw new \RuntimeException(
                            'Stok bibit ' . $bibit->nama
                            . ' tidak mencukupi.'
                        );
                    }

                    $harga = (float) $bibit->harga;
                    $subtotal = $harga * $jumlah;
                    $total += $subtotal;

                    $itemsValid[] = [
                        'bibit' => $bibit,
                        'jumlah' => $jumlah,
                        'harga' => $harga,
                        'subtotal' => $subtotal,
                    ];
                }

                $order = Order::create([
                    'kode_pesanan' => 'HK-' . strtoupper(
                        Str::random(10)
                    ),
                    'user_id' => auth()->id(),
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'alamat' => $request->alamat,
                    'total' => $total,
                    'metode_pembayaran' => $request->metode_pembayaran,
                    'status_pembayaran' => 'menunggu',
                    'status_donasi' => 'menunggu',
                ]);

                foreach ($itemsValid as $item) {
                    $bibit = $item['bibit'];

                    OrderItem::create([
                        'order_id' => $order->id,
                        'bibit_id' => $bibit->id,
                        'nama_bibit' => $bibit->nama,
                        'harga' => $item['harga'],
                        'jumlah' => $item['jumlah'],
                        'subtotal' => $item['subtotal'],
                    ]);

                    $bibit->decrement('stok', $item['jumlah']);
                }

                return $order;
            });

            session()->forget('cart');

            return redirect()
                ->route('penanaman-pohon.payment', $order->id)
                ->with(
                    'success',
                    'Pesanan berhasil dibuat. Silakan lanjutkan pembayaran.'
                );

        } catch (\RuntimeException $e) {
            return redirect()
                ->route('penanaman-pohon.cart')
                ->with('error', $e->getMessage());

        } catch (\Throwable $e) {
            report($e);

            return redirect()
                ->route('penanaman-pohon.cart')
                ->with(
                    'error',
                    'Pesanan gagal dibuat. Periksa data bibit dan coba kembali.'
                );
        }
    }

    /**
     * Menampilkan halaman pembayaran.
     */
    public function payment($id)
    {
        $order = Order::with('items')->findOrFail($id);

        // QR ini hanya berisi teks pesanan, bukan QRIS resmi.
        $payload = 'PEMBAYARAN|'
            . $order->kode_pesanan . '|'
            . $order->total . '|'
            . $order->email;

        $qrCode = 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data='
            . urlencode($payload);

        return view(
            'penanaman-pohon.payment',
            compact('order', 'qrCode')
        );
    }

    /**
     * Menyelesaikan pembayaran untuk simulasi.
     */
    public function confirmPayment(Request $request, $id)
    {
        $order = Order::with('items')->findOrFail($id);

        if ($order->status_pembayaran !== 'berhasil') {
            $order->update([
                'status_pembayaran' => 'berhasil',
            ]);
        }

        // Langsung menuju halaman struk.
        return redirect()
            ->route('penanaman-pohon.receipt', $order->id)
            ->with(
                'success',
                'Pembayaran selesai! Struk pesanan kamu sudah tersedia.'
            );
    }

    /**
     * Menampilkan halaman sukses.
     */
    public function success($id)
    {
        $order = Order::with('items')->findOrFail($id);

        return view(
            'penanaman-pohon.success',
            compact('order')
        );
    }

    /**
     * Menampilkan struk pesanan.
     */
    public function receipt($id)
    {
        $order = Order::with('items')->findOrFail($id);

        return view(
            'penanaman-pohon.receipt',
            compact('order')
        );
    }
}

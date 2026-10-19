
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthentikasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProgramPenghijauanController;
use App\Http\Controllers\PenanamanPohonController;
use App\Http\Controllers\BeritaController;

/*
|--------------------------------------------------------------------------
| Autentikasi
|--------------------------------------------------------------------------
*/

Route::get('/', [AuthentikasiController::class, 'login'])
    ->name('login');

Route::post('/login', [AuthentikasiController::class, 'loginProcess'])
    ->name('login.process');

Route::get('/register', [AuthentikasiController::class, 'register'])
    ->name('register');

Route::post('/register', [AuthentikasiController::class, 'registerProcess'])
    ->name('register.process');


/*
|--------------------------------------------------------------------------
| Halaman yang Membutuhkan Login
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Halaman utama
    Route::get('/home', [AuthentikasiController::class, 'home'])
        ->name('home');

    Route::get('/donation', [AuthentikasiController::class, 'donation'])
        ->name('donation');


    /*
    |--------------------------------------------------------------------------
    | Manajemen Berita Karhutla
    |--------------------------------------------------------------------------
    */

    // Daftar berita
    Route::get('/berita', [BeritaController::class, 'index'])
        ->name('berita.index');

    // Form tambah berita
    Route::get('/berita/tambah', [BeritaController::class, 'create'])
        ->name('berita.create');

    // Simpan berita baru
    Route::post('/berita', [BeritaController::class, 'store'])
        ->name('berita.store');

    // Form edit berita
    Route::get('/berita/{berita:slug}/edit', [BeritaController::class, 'edit'])
        ->name('berita.edit');

    // Simpan perubahan berita
    Route::put('/berita/{berita}', [BeritaController::class, 'update'])
        ->name('berita.update');

    // Hapus berita
    Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])
        ->name('berita.destroy');

    // Halaman artikel lengkap
    Route::get('/artikel/{berita:slug}', [BeritaController::class, 'show'])
        ->name('berita.show');


    /*
    |--------------------------------------------------------------------------
    | Program Penghijauan
    |--------------------------------------------------------------------------
    */

    Route::get('/program-penghijauan', [
        ProgramPenghijauanController::class, 'index'
    ])->name('program-penghijauan.index');

    Route::get('/program-penghijauan/create', [
        ProgramPenghijauanController::class, 'create'
    ])->name('program-penghijauan.create');

    Route::post('/program-penghijauan', [
        ProgramPenghijauanController::class, 'store'
    ])->name('program-penghijauan.store');

    Route::get('/program-penghijauan/{id}/edit', [
        ProgramPenghijauanController::class, 'edit'
    ])->name('program-penghijauan.edit');

    Route::put('/program-penghijauan/{id}', [
        ProgramPenghijauanController::class, 'update'
    ])->name('program-penghijauan.update');

    Route::delete('/program-penghijauan/{id}', [
        ProgramPenghijauanController::class, 'destroy'
    ])->name('program-penghijauan.destroy');

    Route::get('/program-penghijauan/{id}/progress', [
        ProgramPenghijauanController::class, 'progress'
    ])->name('program-penghijauan.progress');


    /*
    |--------------------------------------------------------------------------
    | Penanaman Pohon
    |--------------------------------------------------------------------------
    */

    Route::get('/penanaman-pohon', [
        PenanamanPohonController::class, 'index'
    ])->name('penanaman-pohon.index');


    /*
    |--------------------------------------------------------------------------
    | Keranjang Belanja
    |--------------------------------------------------------------------------
    */

    Route::post('/penanaman-pohon/cart/add/{id}', [
        PenanamanPohonController::class, 'addToCart'
    ])->name('penanaman-pohon.cart.add');

    Route::get('/penanaman-pohon/cart', [
        PenanamanPohonController::class, 'cart'
    ])->name('penanaman-pohon.cart');

    Route::put('/penanaman-pohon/cart/{id}', [
        PenanamanPohonController::class, 'updateCart'
    ])->name('penanaman-pohon.cart.update');

    Route::delete('/penanaman-pohon/cart/{id}', [
        PenanamanPohonController::class, 'removeFromCart'
    ])->name('penanaman-pohon.cart.remove');

    Route::delete('/penanaman-pohon/cart', [
        PenanamanPohonController::class, 'clearCart'
    ])->name('penanaman-pohon.cart.clear');


    /*
    |--------------------------------------------------------------------------
    | Checkout
    |--------------------------------------------------------------------------
    */

    Route::get('/penanaman-pohon/checkout', [
        PenanamanPohonController::class, 'checkout'
    ])->name('penanaman-pohon.checkout');

    Route::post('/penanaman-pohon/checkout', [
        PenanamanPohonController::class, 'processCheckout'
    ])->name('penanaman-pohon.process');


    /*
    |--------------------------------------------------------------------------
    | Pembayaran
    |--------------------------------------------------------------------------
    */

    Route::get('/penanaman-pohon/payment/{id}', [
        PenanamanPohonController::class, 'payment'
    ])->name('penanaman-pohon.payment');

    Route::post('/penanaman-pohon/payment/{id}/confirm', [
        PenanamanPohonController::class, 'confirmPayment'
    ])->name('penanaman-pohon.payment.confirm');


    /*
    |--------------------------------------------------------------------------
    | Pesanan Berhasil dan Struk
    |--------------------------------------------------------------------------
    */

    Route::get('/penanaman-pohon/success/{id}', [
        PenanamanPohonController::class, 'success'
    ])->name('penanaman-pohon.success');

    Route::get('/penanaman-pohon/receipt/{id}', [
        PenanamanPohonController::class, 'receipt'
    ])->name('penanaman-pohon.receipt');


    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', [
        AuthentikasiController::class, 'logout'
    ])->name('logout');

});

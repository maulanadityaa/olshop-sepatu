<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/', \App\Http\Livewire\Home::class)->middleware(['verified']);
Route::get('/tambah-produk', \App\Http\Livewire\TambahProduk::class);
Route::get('/admin/dashboard', \App\Http\Livewire\DashboardAdmin::class)->name('dashboard');
Route::get('/admin/pesanan/', \App\Http\Livewire\AdminPesanan::class)->name('admin-pesanan');
Route::get('/edit-produk/{id}', \App\Http\Livewire\EditProduk::class)->name('edit-produk');
Route::get('/keranjang', \App\Http\Livewire\BelanjaUser::class)->name('keranjang');
Route::get('/tambah-ongkir/{id}', \App\Http\Livewire\TambahOngkir::class)->name('tambah-ongkir');
Route::get('/keranjang/checkout/{id}', \App\Http\Livewire\Checkout::class)->name('checkout');
Route::get('/akun/profile/{id}', \App\Http\Livewire\UserProfile::class)->name('profile');

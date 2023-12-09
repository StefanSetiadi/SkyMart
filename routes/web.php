<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SidebarController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\RiwayatTransaksiController;

/*
|--------------------------------------------------------------------------
| Identitas Diri
|--------------------------------------------------------------------------
|


| NIM   : 10121204
| Nama  : Stefan Setiadi Dwitama Putra
| Kelas : IF-5
|
*/

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('home', [TransaksiController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//REGISTER
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

//SIDEBAR
Route::get('riwayat_transaksi', [RiwayatTransaksiController::class, 'riwayat_transaksi'])->name('riwayat_transaksi')->middleware('auth');
Route::get('/hapusriwayat{id_riwayat}',[RiwayatTransaksiController::class, 'hapusriwayat'])->name('hapusriwayat')->middleware('auth');

Route::get('barang', [BarangController::class, 'barang'])->name('barang')->middleware('auth');
Route::get('/hapusbarang{id_barang}',[BarangController::class, 'hapusbarang'])->name('hapusbarang')->middleware('auth');
Route::get('/tambahbarang',[BarangController::class, 'tambahbarang'])->name('tambahbarang')->middleware('auth');
Route::post('/tambahdatabarang',[BarangController::class, 'tambahdatabarang'])->name('tambahdatabarang')->middleware('auth');
Route::get('/editbarang{id_barang}', [BarangController::class, 'editbarang'])->name('editbarang')->middleware('auth');
Route::post('/editdatabarang{id_barang}', [BarangController::class, 'editdatabarang'])->name('editdatabarang')->middleware('auth');


Route::post('/tambahbrgtransaksistore', [TransaksiController::class, 'tambahbrgtransaksistore'])->name('tambahbrgtransaksistore')->middleware('auth');
Route::get('/hapusbrgtransaksi{id_barang}',[TransaksiController::class, 'hapusbrgtransaksi'])->name('hapusbrgtransaksi')->middleware('auth');
Route::get('/bayartransaksi',[TransaksiController::class, 'bayartransaksi'])->name('bayartransaksi')->middleware('auth');

Route::get('datakaryawan', [SidebarController::class, 'datakaryawan'])->name('datakaryawan')->middleware('auth');

Route::get('tentang', [SidebarController::class, 'tentang'])->name('tentang')->middleware('auth');

Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');
Route::post('/editdatauser{id_user}', [UserController::class, 'editdatauser'])->name('editdatauser')->middleware('auth');
Route::get('/hapuskaryawan{id_karyawan}',[UserController::class, 'hapuskaryawan'])->name('hapuskaryawan')->middleware('auth');


Route::post('/tambahdatatugas',[SidebarController::class, 'tambahdatatugas'])->name('tambahdatatugas')->middleware('auth');
Route::get('/hapusdatatugas{id_tugas}',[SidebarController::class, 'hapusdatatugas'])->name('hapusdatatugas')->middleware('auth');

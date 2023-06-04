<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataHarianController;
use App\Http\Controllers\DataPemasukanController;
use App\Http\Controllers\DataPengeluaranController;
use App\Http\Controllers\KandangController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataMedisController;
use App\Http\Controllers\HargaHarianController;
use App\Http\Controllers\PenyakitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
route::get('/session', function () {
  // Session::put('auth', 'mikli');
  return view('session');
});

// KANDANG VIEW ROUTES
Route::get('/kandang', [KandangController::class, 'index'])->name('all_kandang')->middleware('auth');
Route::get('/kandang/detail/{id_kandang}', [KandangController::class, 'detail_kandang'])->name('detail_kandang')->middleware('auth');
Route::get('/kandang/edit/{id_kandang}', [KandangController::class, 'edit_kandang'])->name('edit_kandang')->middleware('auth');
Route::get('/kandang/add', [KandangController::class, 'add_kandang'])->name('add_kandang')->middleware('auth');
Route::get('/kandang/{username}', [KandangController::class, 'get_kandang_peternak'])->name('kandang_peternak')->middleware('auth');

// KANDANG ACTION ROUTES
Route::post('/kandang/add', [KandangController::class, 'store'])->name('post_add_kandang')->middleware('auth');
Route::post('/kandang/edit/{id_kandang}', [KandangController::class, 'edit'])->name('post_edit_kandang')->middleware('auth');
Route::get('/kandang/delete/{id_kandang}', [KandangController::class, 'delete'])->name('post_delete_kandang')->middleware('auth');

// KANDANG -> DATA HARIAN VIEW ROUTES
Route::get('/kandang/data_harian/detail/{id_harian}', [DataHarianController::class, 'detail_data_harian'])->name('detail_data_harian')->middleware('auth');
Route::get('/kandang/data_harian/edit/{id_harian}', [DataHarianController::class, 'edit_data_harian'])->name('edit_data_harian')->middleware('auth');
Route::get('/kandang/data_harian/add/{id_kandang}', [DataHarianController::class, 'add_data_harian'])->name('tambah_data_harian')->middleware('auth');


// KANDANG -> DATA HARIAN ACTION ROUTES
Route::post('/kandang/data_harian/edit/{id_harian}', [DataHarianController::class, 'edit'])->name('post_edit_data_harian')->middleware('auth');
Route::get('/kandang/data_harian/delete/{id_harian}', [DataHarianController::class, 'delete'])->name('post_delete_data_harian')->middleware('auth');
Route::post('/kandang/data_harian/add/{id_kandang}', [DataHarianController::class, 'store'])->name('post_tambah_data_harian')->middleware('auth');


// KANDANG -> DATA PEMASUKAN VIEW ROUTES
Route::get('/kandang/data_pemasukan/{id_kandang}', [DataPemasukanController::class, 'list_data_pemasukan'])->name('list_pemasukan_kandang')->middleware('auth');
Route::get('/kandang/data_pemasukan/detail/{id_pemasukan}', [DataPemasukanController::class, 'detail_data_pemasukan'])->name('detail_pemasukan_kandang')->middleware('auth');
Route::get('/kandang/data_pemasukan/edit/{id_pemasukan}', [DataPemasukanController::class, 'edit_data_pemasukan'])->name('edit_pemasukan_kandang')->middleware('auth');
Route::get('/kandang/data_pemasukan/add/{id_kandang}', [DataPemasukanController::class, 'add_data_pemasukan'])->name('add_pemasukan_kandang')->middleware('auth');

// KANDANG -> DATA PEMASUKAN ACTION ROUTES
Route::post('/kandang/data_pemasukan/edit/{id_pemasukan}', [DataPemasukanController::class, 'edit'])->name('post_edit_data_pemasukan')->middleware('auth');
Route::get('/kandang/data_pemasukan/delete/{id_pemasukan}', [DataPemasukanController::class, 'delete'])->name('post_delete_data_pemasukan')->middleware('auth');
Route::post('/kandang/data_pemasukan/add/{id_kandang}', [DataPemasukanController::class, 'store'])->name('post_tambah_data_pemasukan')->middleware('auth');


// KANDANG -> DATA PEMASUKAN ROUTES
Route::get('/kandang/data_pengeluaran/{id_kandang}', [DataPengeluaranController::class, 'list__data_pengeluaran'])->name('list_pengeluaran_kandang')->middleware('auth');
Route::get('/kandang/data_pengeluaran/detail/{id_pengeluaran}', [DataPengeluaranController::class, 'detail_data_pengeluaran'])->name('detail_pengeluaran_kandang')->middleware('auth');
Route::get('/kandang/data_pengeluaran/edit/{id_pengeluaran}', [DataPengeluaranController::class, 'edit_data_pengeluaran'])->name('edit_pengeluaran_kandang')->middleware('auth');
Route::get('/kandang/data_pengeluaran/add/{id_kandang}', [DataPengeluaranController::class, 'add_data_pengeluaran'])->name('add_pengeluaran_kandang')->middleware('auth');

// KANDANG -> DATA PENGELUARAN ACTION ROUTES
Route::post('/kandang/data_pengeluaran/edit/{id_pengeluaran}', [DataPengeluaranController::class, 'edit'])->name('post_edit_data_pengeluaran')->middleware('auth');
Route::get('/kandang/data_pengeluaran/delete/{id_pengeluaran}', [DataPengeluaranController::class, 'delete'])->name('post_delete_data_pengeluaran')->middleware('auth');
Route::post('/kandang/data_pengeluaran/add/{id_kandang}', [DataPengeluaranController::class, 'store'])->name('post_tambah_data_pengeluaran')->middleware('auth');

// DATA MEDIS VIEW ROUTES
Route::get('/medis/index', [DataMedisController::class, 'index'])->name('all_penyakit')->middleware('auth');

// DATA MEDIS DETAILED ROUTES

// HARGA HARIAN VIEW ROUTES


// Autentikasi
Route::get('/register', [AuthController::class, 'register_view']);
Route::post('/registrasi', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'login_view'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// AKUN VIEW
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');
Route::get('/cara-upgrade-vip', [UserController::class, 'cara_upgrade_vip'])->name('cara_vip');
// AKUN EDIT
Route::post('/user/edit', [UserController::class, 'edit'])->middleware('auth')->name('user.edit');

// ADMIN
Route::get('/dashboard', [UserController::class, 'dashboard_admin'])->middleware('admin')->name('dashboard');
// ADMIN EDIT
Route::post('/admin/edit', [UserController::class, 'edit_admin'])->middleware('admin')->name('admin.edit');
// Route::get()


// ARTIKEL
Route::get('/artikel', [ArtikelController::class, 'daftar_artikel']);
Route::get('/admin/artikel', [ArtikelController::class, 'admin_daftar_artikel'])->middleware('admin');
Route::get('/artikel/tambah', [ArtikelController::class, 'tambah_artikel'])->middleware('admin');
Route::get('/artikel/edit/{id_artikel}', [ArtikelController::class, 'edit_artikel'])->middleware('admin');
Route::get('/admin/artikel/{id_artikel}', [ArtikelController::class, 'admin_detail_artikel'])->middleware('admin');
Route::get('/artikel/{id_artikel}', [ArtikelController::class, 'detail_artikel']);


// ARTIKEL POST
Route::post('/artikel/edit/{id_artikel}', [ArtikelController::class, 'edit_artikel_post'])->middleware('admin');
Route::post('/artikel/tambah', [ArtikelController::class, 'tambah_artikel_post'])->middleware('admin');
Route::get('/artikel/hapus/{id_artikel}', [ArtikelController::class, 'hapus_artikel'])->middleware('admin');

Route::post('/komentar/tambah/{id_artikel}', [KomentarController::class, 'komentar_tambah']);
Route::get('/komentar/hapus/{id_komentar}', [KomentarController::class, 'komentar_hapus'])->middleware('admin');

// PENYAKIT VIEW
Route::get('/penyakit', [PenyakitController::class, 'daftar_penyakit']);
Route::get('/penyakit/{id_penyakit}', [PenyakitController::class, 'detail_penyakit']);

// HARGA HARIAN VIEW
Route::get('/harga-harian', [HargaHarianController::class, 'daftar_harga_harian']);
Route::get('/harga-harian/tambah', [HargaHarianController::class, 'tambah_harga_harian'])->middleware('admin');
Route::get('/harga-harian/edit/{id_harga_harian}', [HargaHarianController::class, 'edit_harga_harian'])->middleware('admin');

// HARGA HARIAN ACTION
Route::post('/harga-harian/tambah', [HargaHarianController::class, 'tambah_harga_harian_post'])->middleware('admin');
Route::post('/harga-harian/edit/{id_harga_harian}', [HargaHarianController::class, 'edit_harga_harian_post'])->middleware('admin');
Route::get('/harga-harian/hapus/{id_harga_harian}', [HargaHarianController::class, 'hapus_harga_harian'])->middleware('admin');

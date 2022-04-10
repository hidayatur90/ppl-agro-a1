<?php
  
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\Auth\LoginController;

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
    return view('main');
});
  
Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/logout','Auth\LoginController@logout')->name('logout');
});

// Auth Owner
Route::middleware(['auth', 'user-access:owner'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
// Auth Produksi
Route::middleware(['auth', 'user-access:produksi'])->group(function () {
    Route::get('/produksi/home', [HomeController::class, 'produksiHome'])->name('produksi.home');
});
  
// Auth Kedai
Route::middleware(['auth', 'user-access:kedai'])->group(function () {
    Route::get('/kedai/home', [HomeController::class, 'kedaiHome'])->name('kedai.home');
});

// Owner Home 
Route::get('/ownerMitra', function () {
    return view('ownerMitra');
});

Route::get('/editOwner', function () {
    return view('editOwner');
});

// CRU KARYAWAN KEDAI
Route::get('/karyawanKedai', [KaryawanController::class, 'indexKedai']);
Route::get('/karyawanKedai/tambah', [KaryawanController::class, 'createKedai']);
Route::patch('/karyawanKedai/store', [KaryawanController::class, 'storeKedai']);
Route::get('/karyawanKedai/edit/{id}', [KaryawanController::class, 'editKedai']);
Route::patch('/karyawanKedai/update/{id}', [KaryawanController::class, 'updateKedai']);
// Route::get('/karyawanKedai/delete/{id}', [KaryawanController::class, 'destroy']);

// CRU KARYAWAN PRODUKSI
Route::get('/karyawanProduksi', [KaryawanController::class, 'indexProduksi']);
Route::get('/karyawanProduksi/tambah', [KaryawanController::class, 'createProduksi']);
Route::patch('/karyawanProduksi/store', [KaryawanController::class, 'storeProduksi']);
Route::get('/karyawanProduksi/edit/{id}', [KaryawanController::class, 'editProduksi']);
Route::patch('/karyawanProduksi/update/{id}', [KaryawanController::class, 'updateProduksi']);

// RU OWNER
Route::get('/ownerMitra', [OwnerController::class, 'index']);
Route::get('/ownerMitra/edit/{id}', [OwnerController::class, 'edit']);
Route::patch('/ownerMitra/update/{id}', [OwnerController::class, 'update']);

// Kedai Home
Route::get('/profilKaryawanKedai', [KaryawanController::class, 'indexKedaiHome']);
Route::get('/karyawanProduksi/detail/{id}', [KaryawanController::class, 'indexProduksiDetail']);

// Produksi Home
Route::get('/karyawanKedai/detail/{id}', [KaryawanController::class, 'indexKedaiDetail']);
Route::get('/profilKaryawanProduksi', [KaryawanController::class, 'indexProduksiHome']);

// Produksi Produk
Route::get('/produksiStockKopi', [ProdukController::class, 'indexProduksiStockKopi']);
Route::get('/ownerStockKopi', [ProdukController::class, 'indexOwnerStockKopi']);
Route::get('/kedaiStockKopi', [ProdukController::class, 'indexKedaiStockKopi']);
Route::get('/stockKopi/tambah', [ProdukController::class, 'createStockKopi']);
Route::patch('/stockKopi/store', [ProdukController::class, 'storeStockKopi']);
Route::get('/produksiStockKopi/detail/{namaProduk}', [ProdukController::class, 'indexProduksiStockKopiDetail']);
Route::get('/ownerStockKopi/detail/{namaProduk}', [ProdukController::class, 'indexOwnerStockKopiDetail']);
Route::get('/kedaiStockKopi/detail/{namaProduk}', [ProdukController::class, 'indexKedaiStockKopiDetail']);
Route::get('/stockKopi/edit/{namaProduk}/{kategori}', [ProdukController::class, 'editStockKopi']);
Route::patch('/stockKopi/update/{namaProduk}/{kategori}', [ProdukController::class, 'updateStockKopi']);

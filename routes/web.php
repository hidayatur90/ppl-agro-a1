<?php
  
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\OwnerController;

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
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:owner'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:produksi'])->group(function () {
  
    Route::get('/produksi/home', [HomeController::class, 'produksiHome'])->name('produksi.home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:kedai'])->group(function () {
  
    Route::get('/kedai/home', [HomeController::class, 'kedaiHome'])->name('kedai.home');
});

Route::get('/ownerMitra', function () {
    return view('ownerMitra');
});

Route::get('/editOwner', function () {
    return view('editOwner');
});

Route::get('/karyawanKedai', [KaryawanController::class, 'indexKedai']);
Route::get('/karyawanKedai/tambah', [KaryawanController::class, 'createKedai']);
Route::post('/karyawanKedai/store', [KaryawanController::class, 'storeKedai']);
Route::get('/karyawanKedai/edit/{id}', [KaryawanController::class, 'editKedai']);
Route::put('/karyawanKedai/update/{id}', [KaryawanController::class, 'updateKedai']);
// Route::get('/karyawanKedai/delete/{id}', [KaryawanController::class, 'destroy']);
Route::get('/karyawanProduksi', [KaryawanController::class, 'indexProduksi']);
Route::get('/karyawanProduksi/tambah', [KaryawanController::class, 'createProduksi']);
Route::post('/karyawanProduksi/store', [KaryawanController::class, 'storeProduksi']);
Route::get('/karyawanProduksi/edit/{id}', [KaryawanController::class, 'editProduksi']);
Route::put('/karyawanProduksi/update/{id}', [KaryawanController::class, 'updateProduksi']);

Route::get('/profilKaryawanKedai', [KaryawanController::class, 'indexKedaiHome']);
Route::get('/profilKaryawanProduksi', [KaryawanController::class, 'indexProduksiHome']);

Route::get('/ownerMitra', [OwnerController::class, 'index']);


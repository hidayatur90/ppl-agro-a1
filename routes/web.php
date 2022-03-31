<?php
  
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
  
use App\Http\Controllers\HomeController;
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 2d6825f6ec52fc4053be9a305209bb0f2a68cdb6
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\OwnerController;
  
=======
use App\Http\Controllers\ProduksiController;

>>>>>>> f292cea0fd4cd4b29ef9cd5d04e5e2c43f9c17db
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

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 2d6825f6ec52fc4053be9a305209bb0f2a68cdb6
Route::get('/ownerMitra', function () {
    return view('ownerMitra');
});

Route::get('/editOwner', function () {
    return view('editOwner');
});

Route::get('/karyawanKedai', [KaryawanController::class, 'index']);
Route::get('/karyawanKedai/tambah', [KaryawanController::class, 'create']);
Route::post('/karyawanKedai/store', [KaryawanController::class, 'store']);
Route::get('/karyawanKedai/edit/{id}', [KaryawanController::class, 'edit']);
Route::put('/karyawanKedai/update/{id}', [KaryawanController::class, 'update']);
<<<<<<< HEAD
Route::get('/karyawanKedai/delete/{id}', [KaryawanController::class, 'destroy']);
=======
Route::get('/karyawanKedai/delete/{id}', [KaryawanController::class, 'destroy']);
=======
Route::resource('/karyawanProduksi', ProduksiController::class);
>>>>>>> f292cea0fd4cd4b29ef9cd5d04e5e2c43f9c17db
>>>>>>> 2d6825f6ec52fc4053be9a305209bb0f2a68cdb6

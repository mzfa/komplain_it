<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HakAksesController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Action\UbahSupplierController;
use App\Http\Controllers\Action\KunjunganController;
use App\Imports\PesanImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('/', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('login.store');
// Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'index'])->name('register');
// Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'store'])->name('register.store');
Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    
    return redirect('/');
})->name('logout');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // route::group()->middleware();
    Route::controller(HakAksesController::class)->middleware('cek_login:hakakses.index')->group(function () {
        Route::get('/hakakses', 'index')->name('hakakses.index');
        Route::get('/hakakses/edit/{id}', 'edit');
        Route::get('/hakakses/delete/{id}', 'delete');
        Route::get('/hakakses/modul_akses/{id}', 'modul_akses');
        Route::post('/hakakses/modul_akses', 'modul_akses_store');
        Route::post('/hakakses/store', 'store');
        Route::post('/hakakses/update', 'update');
    });
    Route::controller(MenuController::class)->middleware('cek_login:menu.index')->group(function () {
        Route::get('/menu', 'index')->name('menu.index');
        Route::get('/menu/edit/{id}', 'edit');
        Route::get('/menu/status/{id}', 'status');
        Route::get('/menu/delete/{id}', 'delete');
        Route::post('/menu/store', 'store');
        Route::post('/menu/update', 'update');
    });
    Route::controller(StrukturController::class)->middleware('cek_login:struktur.index')->group(function () {
        Route::get('/struktur', 'index')->name('struktur.index');
        Route::get('/struktur/edit/{id}', 'edit');
        Route::get('/struktur/status/{id}', 'status');
        Route::get('/struktur/delete/{id}', 'delete');
        Route::post('/struktur/store', 'store');
        Route::post('/struktur/update', 'update');
    });
    Route::controller(UserController::class)->middleware('cek_login:user.index')->group(function () {
        Route::get('/user', 'index')->name('user.index');
        Route::get('/user/sync', 'sync');
        Route::get('/user/edit/{id}', 'edit');
        Route::post('/user/update', 'update');
    });
    Route::controller(ListAkunController::class)->middleware('cek_login:struktur.index')->group(function () {
        Route::get('/list_akun', 'index')->name('list_akun.index');
        Route::get('/list_akun/edit/{id}', 'edit');
        Route::get('/list_akun/qr/{id}', 'qr');
        Route::get('/list_akun/status/{id}', 'status');
        Route::get('/list_akun/delete/{id}', 'delete');
        Route::post('/list_akun/store', 'store');
        Route::post('/list_akun/update', 'update');
    });
    Route::controller(UbahSupplierController::class)->middleware('cek_login:ubah_supplier.index')->group(function () {
        Route::get('/ubah_supplier', 'index')->name('ubah_supplier.index');
        Route::post('/ubah_supplier', 'detail');
        Route::post('/ubah_supplier/batal_terima/{id}', 'batal_terima');
        Route::post('/ubah_supplier/store', 'store');
    });
    Route::controller(KunjunganController::class)->middleware('cek_login:kunjungan.index')->group(function () {
        Route::get('/kunjungan', 'index')->name('kunjungan.index');
        Route::post('/kunjungan', 'detail');
        Route::get('/kunjungan/{status}/{id}', 'action');
        // Route::post('/kunjungan/store', 'store');
    });
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\AddUserController;
use App\Http\Controllers\KerajangContoller;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RestockController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TransaksiController;



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

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::post('/notification', [TransaksiController::class ,'notification'])->name('notification');
Route::middleware('loggedin')->group(function() {
    Route::get('login', [AuthController::class, 'loginView'])->name('login-view');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'registerView'])->name('register-view');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'CheckRole:admin'], function() {
        Route::resource('adduser', App\Http\Controllers\AddUserController::class);
        Route::prefix('/setting')->group(function(){
            // Route::get('/settingAplication',[SettingController::class,'index'])->name('settingAplication');
            Route::prefix('/settingAplication')->group(function(){
                Route::resource('settingsAplication', App\Http\Controllers\SettingController::class);
                Route::get('/settingMidtrans',[SettingController::class,'indexMidtrans'])->name('settingMidtrans');
                Route::put('/updateMidtrans/{id}',[SettingController::class,'updateMidtrans'])->name('updateMidtrans');
            });
        });
    });

    Route::group(['middleware' => 'CheckRole:admin,manager'], function() {
        Route::get('/', [PageController::class, 'dashboardOverview1'])->name('dashboard-overview-1');
        Route::resource('activity', App\Http\Controllers\ActivityController::class);
        Route::prefix('/report')->group(function(){
            Route::get('/',[ReportController::class,'index'])->name('indexReport');
            Route::post('/custom',[ReportController::class,'custom'])->name('customReport');
            Route::post('/laporanBarangKeluar',[ReportController::class,'barangKeluar'])->name('laporanBarangKeluar');

        });
    });



    // manager
    Route::group(['middleware' => 'CheckRole:manager'], function() {
        Route::prefix('/product')->group(function () {
            Route::prefix('/addProduct')->group(function () {
                Route::resource('menu', App\Http\Controllers\MenuController::class);
            });
            Route::prefix('/restockProduct')->group(function () {
                Route::resource('restock', App\Http\Controllers\RestockController::class);
                Route::post('/report_barang_masuk',[MenuController::class,'report_barang_masuk'])->name('reportBarangMasuk');
            });
            
            Route::get('/export-data', [App\Http\Controllers\MenuController::class, 'export'])->name('reportStock');
            Route::prefix('/kategoriProduct')->group(function () {
                Route::resource('kategori', App\Http\Controllers\KategoriController::class);
            });
        });
        Route::prefix('/catatan')->group(function () {
            Route::resource('catatan', App\Http\Controllers\CatatanController::class);
            Route::get('/mutation',[CatatanController::class,'catatanMutation'])->name('catatanMutation');
            Route::get('/mutation/report',[CatatanController::class,'catatanMutationReport'])->name('mutationreport');
            
            Route::get('/laporan',[CatatanController::class,'laporan'])->name('laporan');
            Route::get('/pendapatanBulanIni',[CatatanController::class,'pendapatanBulanIni'])->name('pendapatanBulanIni');

        
        });
        Route::get('/destroyCode/{id}', [OrderController::class,'destroyCode'])->name('destroyCode2');
        Route::prefix('/customer')->group(function () {
            Route::resource('customer', App\Http\Controllers\CustomerController::class);
        });
        Route::prefix('/supplier')->group(function () {
            Route::resource('supplier', App\Http\Controllers\SupplierController::class);
            
        });
    });



    // kasir
    Route::get('/invoice/{id}',[CatatanController::class,'invoice'])->name('invoice');
    Route::prefix('/order')->group(function () {
        Route::get('/', [OrderController::class,'index'])->name('historyOrder');
        Route::get('/invoice/{id}', [OrderController::class,'cetakInv'])->name('cetakInv');
        Route::get('/destroyCode/{id}', [OrderController::class,'destroyCode'])->name('destroyCode');
        Route::get('/laporanKasir',[OrderController::class,'laporanKasir'])->name('laporanKasir');
    });
    Route::group(['middleware' => 'CheckRole:kasir'], function() {
        Route::resource('transaksi', App\Http\Controllers\TransaksiController::class);
        Route::put('addKeranjang/{id}',[KerajangContoller::class ,'store'])->name('addKeranjang');
        Route::put('updateKeranjang/{id}',[KerajangContoller::class ,'updateKeranjang'])->name('updateKeranjang');
        Route::get('destroyAll/{id}',[KerajangContoller::class ,'destroyAll'])->name('destroyAll');
        Route::delete('destroy/{id}',[KerajangContoller::class,'destroy'])->name('destroy');
        // order
        Route::post('addOrder',[KerajangContoller::class,'addOrder'])->name('addOrder');
        //
    });


});

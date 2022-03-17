<?php

use App\Http\Controllers\AreaPerubahanController;
use App\Http\Controllers\LaporanEvaluasiController;
use App\Http\Controllers\RencanaKerjaController;
use App\Http\Controllers\UnitKerjaController;
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

Route::middleware(['checkauth'])->group(function(){
    Route::get('/', function () {
        return view('contents.dashboard');
    });
    Route::prefix('unit-kerja')->group(function(){
        Route::name('unitkerja.')->group(function(){
            Route::get('/',[UnitKerjaController::class,'index'])->name('index');
            Route::post('/',[UnitKerjaController::class,'store'])->name('store');
            Route::get('/create',[UnitKerjaController::class,'create'])->name('create');
            Route::get('/{id}',[UnitKerjaController::class,'edit'])->name('edit');
            Route::post('/all-unitkerja',[UnitKerjaController::class,'getAllUnitKerja'])->name('getall');
        });
    });
    Route::prefix('area-perubahan')->group(function(){
        Route::name('areaperubahan.')->group(function(){
            Route::get('/',[AreaPerubahanController::class,'index'])->name('index');            
        });
    });
    Route::prefix('rencana-kerja')->group(function(){
        Route::name('rencanakerja.')->group(function(){
            Route::get('/',[RencanaKerjaController::class,'index'])->name('index');            
        });
    });
    Route::prefix('laporan-evaluasi')->group(function(){
        Route::name('laporanevaluasi.')->group(function(){
            Route::get('/',[LaporanEvaluasiController::class,'index'])->name('index');            
        });
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

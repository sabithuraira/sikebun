<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SurveiController;
use App\Http\Controllers\PerusahaanController;

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

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', function () { return view('dashboard'); });
    Route::get('/user/edit', [UserController::class, 'edit']);
    Route::post('/user/update', [UserController::class, 'update']);
    
    Route::get('/survei/sawit', [SurveiController::class, 'sawit']);
    Route::post('/survei/sawit', [SurveiController::class, 'sawit_store']);
    Route::get('/survei/sawit/{tahun}/{triwulan}/show', [SurveiController::class, 'show_sawit']);

    Route::get('/survei/karet', [SurveiController::class, 'karet']);
    Route::post('/survei/karet', [SurveiController::class, 'karet_store']);
    Route::get('/survei/karet/{tahun}/{triwulan}/show', [SurveiController::class, 'show_karet']);
    
    Route::get('/survei/tahunan', [SurveiController::class, 'tahunan']);
    Route::post('/survei/tahunan', [SurveiController::class, 'tahunan_store']);

    Route::post('/survei/get_kab', [SurveiController::class, 'getKab']);
    Route::post('/survei/get_kec', [SurveiController::class, 'getKec']);
    Route::post('/survei/get_desa', [SurveiController::class, 'getDesa']);
    
    Route::resource('perusahaan', PerusahaanController::class)->except(['show']);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SurveiController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserRoleController;

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
    Route::get('/infografis', function () { return view('infografis'); });
    
    Route::get('/survei/index_sawit', [SurveiController::class, 'index_sawit']);
    Route::get('/survei/sawit/{tahun}/{triwulan}/show', [SurveiController::class, 'show_sawit']);

    Route::get('/survei/index_karet', [SurveiController::class, 'index_karet']);
    Route::get('/survei/karet/{tahun}/{triwulan}/show', [SurveiController::class, 'show_karet']);
    
    Route::get('/survei/index_tahunan', [SurveiController::class, 'index_tahunan']);
    Route::get('/survei/tahunan/{tahun}/show', [SurveiController::class, 'show_tahunan']);
    
    Route::get('/survei/{id}/watch_karet', [SurveiController::class, 'watch_karet']);
    Route::get('/survei/{id}/watch_sawit', [SurveiController::class, 'watch_sawit']);
    Route::get('/survei/{id}/watch_tahunan', [SurveiController::class, 'watch_tahunan']);

    Route::post('/survei/get_kab', [SurveiController::class, 'getKab']);
    Route::post('/survei/get_kec', [SurveiController::class, 'getKec']);
    Route::post('/survei/get_desa', [SurveiController::class, 'getDesa']);
    
    Route::resource('perusahaan', PerusahaanController::class);
    
    Route::get('/user/change_password', [UserController::class, 'change_password']);
    Route::post('/user/change_password', [UserController::class, 'change_password_store']);
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {   
    Route::resource('role', RoleController::class);
    Route::resource('user_role', UserRoleController::class);
    
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/create', [UserController::class, 'create']);
    Route::post('/user', [UserController::class, 'store']);
    
});

Route::group(['middleware' => ['auth', 'role:operator']], function () {   
    Route::get('/user/edit', [UserController::class, 'edit']);
    Route::post('/user/update', [UserController::class, 'update']);

    Route::get('/survei/sawit', [SurveiController::class, 'sawit']);
    Route::post('/survei/sawit', [SurveiController::class, 'sawit_store']);
    Route::post('/survei/{id}/sawit_send', [SurveiController::class, 'sawit_send_store']);
    Route::post('/survei/sawit_clean', [SurveiController::class, 'sawit_clean_store']);
    
    Route::get('/survei/karet', [SurveiController::class, 'karet']);
    Route::post('/survei/karet', [SurveiController::class, 'karet_store']);
    Route::post('/survei/{id}/karet_send', [SurveiController::class, 'karet_send_store']);
    Route::post('/survei/karet_clean', [SurveiController::class, 'karet_clean_store']);
    
    Route::get('/survei/tahunan', [SurveiController::class, 'tahunan']);
    Route::post('/survei/tahunan', [SurveiController::class, 'tahunan_store']);
    Route::post('/survei/tahunan_clean', [SurveiController::class, 'tahunan_clean_store']);
    Route::post('/survei/{id}/tahunan_send', [SurveiController::class, 'tahunan_send_store']);
}); 

Route::group(['middleware' => ['role:admin|approval']], function () {   
    Route::get('/survei/{id}/karet', [SurveiController::class, 'detail_karet']);
    Route::get('/survei/{id}/sawit', [SurveiController::class, 'detail_sawit']);
    Route::get('/survei/{id}/tahunan', [SurveiController::class, 'detail_tahunan']);
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

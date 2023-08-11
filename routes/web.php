<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\sesiController;
use App\Models\Dosen;
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
Route::middleware(['guest'])->group(function(){
    Route::get('/',[sesiController::class,'index'])->name('login');
    Route::post('/',[sesiController::class,'login']);
});

Route::get('/home', function () {
    return redirect('/dosen');
});
//untuk role

Route::middleware(['auth'])->group(function() {
    Route::get('/dosen',[DosenController::class,'index'])->middleware('UserAkses:admin');
    Route::get('/jurusan',[JurusanController::class, 'index'])->middleware('UserAkses:operator');
    Route::post('/logout',[sesiController::class, 'logout'])->name('logout');
});



//dosen
Route::get('dosen', [DosenController::class, 'index'])->name('dosen.index');
Route::get('dosen/create', [DosenController::class, 'create'])->name('dosen.create');
Route::post('dosen', [DosenController::class, 'store'])->name('dosen.store');
Route::get('dosen/{dosen}', [DosenController::class, 'edit'])->name('dosen.edit');
Route::put('dosen/{dosen}', [DosenController::class, 'update'])->name('dosen.update');
Route::delete('dosen/{dosen}', [DosenController::class, 'destroy'])->name('dosen.destroy');

//jurusan
Route::get('jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
Route::get('jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
Route::post('jurusan', [JurusanController::class, 'store'])->name('jurusan.store');
Route::get('jurusan/{jurusan}', [JurusanController::class, 'edit'])->name('jurusan.edit');
Route::put('jurusan/{jurusan}', [JurusanController::class, 'update'])->name('jurusan.update');
Route::delete('jurusan/{jurusan}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');





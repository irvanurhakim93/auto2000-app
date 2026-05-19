<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\AuthenticateController;



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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('document')->group(function () {
    Route::get('/', [DocumentController::class, 'index'])->name('document.index');
    Route::post('/store', [DocumentController::class, 'storeDoc'])->name('document.store');
    // Route::get('/download/{docId}', [DocumentController::class, 'downloadDoc'])->name('document.downloadAll');
    Route::get('/document/download-excel', [DocumentController::class, 'downloadExcel'])
    ->name('document.downloadExcel');
    Route::get('/document/download-csv', [DocumentController::class, 'downloadCsv'])
    ->name('document.downloadCsv');
    Route::get('/document/download-json', [DocumentController::class, 'downloadJson'])
    ->name('document.downloadJson');
});


require __DIR__.'/auth.php';

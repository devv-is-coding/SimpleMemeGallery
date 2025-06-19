<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemeController;
use App\Http\Controllers\MemeViewer;
use App\Http\Middleware\AuthCheck;


Route::get('/', [AuthController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/loginUser', [AuthController::class, 'loginUser'])->name('loginUser');

Route::middleware([AuthCheck::class])->group(function () {
    Route::get('/dashboard', [MemeViewer::class, 'dashboard'])->name('dashboard');
    Route::get('/createMeme', [MemeController::class, 'create'])->name('createMeme');
    Route::post('/storeMeme', [MemeController::class, 'store'])->name('storeMeme');
    Route::get('/editMeme/{meme}', [MemeController::class, 'edit'])->name('editMeme');
    Route::put('/updateMeme/{meme}', [MemeController::class, 'update'])->name('updateMeme');
    Route::delete('/deleteMeme/{meme}', [MemeController::class, 'destroy'])->name('deleteMeme');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

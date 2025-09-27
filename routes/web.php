<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


Route::get('/profile/{Nama}/{NPM}/{Kelas}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile');
Route::post('/profile/upload', [App\Http\Controllers\ProfileController::class, 'upload'])->name('profile.upload');

Route::get('/', function () {
    return view(view: 'welcome');
});

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');

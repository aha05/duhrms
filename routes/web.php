<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/login', [App\Http\Controllers\auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\auth\LoginController::class, 'logInto'])->name('login');
Route::get('/register', [App\Http\Controllers\auth\RegistrationController::class, 'index'])->name('register');
Route::post('/register', [App\Http\Controllers\auth\RegistrationController::class, 'registrationPost'])->name('register');
Route::get('/logout', [App\Http\Controllers\auth\LoginController::class, 'logout'])->name('logout');
Route::post('/logout', [App\Http\Controllers\auth\LoginController::class, 'logout'])->name('logout');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', function(){
    return view('admin.admin');
})->middleware('auth')->name('admin');
Route::get('/applyjob', [App\Http\Controllers\ApplyJobController::class, 'index'])->name('applyjob');

Route::post('/applyjob', [App\Http\Controllers\ApplyJobController::class, 'applyJob'])->name('applyjob');


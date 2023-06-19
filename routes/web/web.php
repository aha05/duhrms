<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Person;
use App\Models\Department;

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


Route::get('/applyjob', [App\Http\Controllers\JobController::class, 'applyJobGet'])->name('applyjob');
Route::post('/applyjob', [App\Http\Controllers\JobController::class, 'applyJobPost'])->name('applyjob');
Route::get('/applyPage', [App\Http\Controllers\JobController::class, 'index'])->name('applypage');
Route::post('/postjob', [App\Http\Controllers\JobController::class, 'postjobPost'])->name('postjob');


Route::get('/temps', [App\Http\Controllers\RoleController::class, 'temp'])->name('temps');

Route::get('/index', function(){
    return view('index');
})->name('index');

Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'feedback'])->name('contact');
Route::post('/feedback', [App\Http\Controllers\HomeController::class, 'feedbackPost'])->name('feedback');
Route::get('/apply', [App\Http\Controllers\HomeController::class, 'apply'])->name('apply');

Route::get('/applytemp', function(){
    return view('applyjoptemp');
})->name('applytemp');


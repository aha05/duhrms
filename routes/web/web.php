<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Person;
use App\Models\Department;
use App\Http\Controllers\TempController;

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


Route::get('/applyjob/{id}', [App\Http\Controllers\JobController::class, 'applyJobGet'])->name('apply.job');
Route::post('/applyjob', [App\Http\Controllers\JobController::class, 'applyJobPost'])->name('applyjobs');
Route::get('/applyPage', [App\Http\Controllers\JobController::class, 'index'])->name('applypage');






Route::get('/temps', [App\Http\Controllers\TempController::class, 'index'])->name('filter');
Route::get('/temps', [App\Http\Controllers\TempController::class, 'filter'])->name('filter');

Route::post('/tempJs', [TempController::class, 'tempJs'])->name('tempJs');


Route::get('/index', function(){
    return view('index');
})->name('index');

Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('notice', [App\Http\Controllers\HomeController::class, 'Notices'])->name('notice');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'feedback'])->name('contact');
Route::post('/feedback', [App\Http\Controllers\HomeController::class, 'feedbackPost'])->name('feedback');
Route::get('/apply', [App\Http\Controllers\HomeController::class, 'apply'])->name('apply');


Route::get('/search',  [App\Http\Controllers\HomeController::class, 'search'])->name('search.job');


// Route::get('/applytemp', function(){
//     return view('applyjoptemp');
// })->name('applytemp');



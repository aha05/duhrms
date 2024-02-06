<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth')->name('admin');
Route::get('/markAsRead/{id}', function($id){
    auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
    return back();
})->name('markAsRead');

// Route::post('/markAsRead', [AdminController::class, 'markAsRead'])->name('markAsRead');

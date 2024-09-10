<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', [FrontendController::class, 'index'])->name('root');


// dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


// profile
Route::get('/home/profile',[ProfileController::class,'index'])->name('home.profile');


// name update
Route::post('/home/profile/name/update',[ProfileController::class,'name_update'])->name('home.profile.name.update');


// email update
Route::post('/home/profile/email/update',[ProfileController::class,'email_update'])->name('home.profile.email.update');

// password update
Route::post('/home/profile/password/update', [ProfileController::class,'password_update'])->name('home.profile.password.update');

// image update
Route::post('/home/profile/image/update', [ProfileController::class,'image_update'])->name('home.profile.image.update');

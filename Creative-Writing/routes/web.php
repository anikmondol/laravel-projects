<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => false]);



Route::get('/', [FrontendController::class, 'index'])->name('root');


// dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


// management
Route::middleware(['roleCheck'])->group(function () {
    Route::get('/management', [ManagementController::class, 'index'])->name('management.index');
    // management role
    Route::post('/management/user/register', [ManagementController::class, 'store_register'])->name('management.store');
    // management user down
    Route::get('/management/user/manager/down/{id}', [ManagementController::class, 'manager_down'])->name('management.down');


    // role
    Route::get('/management/role', [ManagementController::class, 'role_index'])->name('management.role.index');
    Route::post('/management/role/assign', [ManagementController::class, 'role_assign'])->name('management.role.assign');
    Route::post('/management/role/blogger/manager/down/{id}', [ManagementController::class, 'blogger_down'])->name('blogger.down');
    Route::get('/management/role/user/manager/down/{id}', [ManagementController::class, 'user_down'])->name('user.down');
     // user block list
     Route::get('/management/block/list', [ManagementController::class, 'block_list'])->name('management.block.list');
});




// profile
Route::get('/home/profile', [ProfileController::class, 'index'])->name('home.profile');
// name update
Route::post('/home/profile/name/update', [ProfileController::class, 'name_update'])->name('home.profile.name.update');
// email update
Route::post('/home/profile/email/update', [ProfileController::class, 'email_update'])->name('home.profile.email.update');
// password update
Route::post('/home/profile/password/update', [ProfileController::class, 'password_update'])->name('home.profile.password.update');
// image update
Route::post('/home/profile/image/update', [ProfileController::class, 'image_update'])->name('home.profile.image.update');


// categories
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
// Category Insert
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
// Category edit
Route::get('/category/edit{id}', [CategoryController::class, 'edit'])->name('category.edit');
// Category update
Route::post('/category/update{id}', [CategoryController::class, 'update'])->name('category.update');
// Category delete
Route::get('/category/delete{id}', [CategoryController::class, 'delete'])->name('category.delete');
// Category status
Route::get('/category/status{id}', [CategoryController::class, 'status'])->name('category.status');

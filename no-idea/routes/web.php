<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Auth::routes(['register' => false]);
Auth::routes(['register' => false]);



Route::get('/', [FrontendController::class, 'index'])->name('root');


// dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');




// Route::prefix("anik/mondal")->middleware(['rolecheck'])->group(function()
Route::prefix(env('HOST_NAME'))->middleware(['rolecheck'])->group(function () {

    // management
    Route::get('/management', [ManagementController::class, 'index'])->name('management.index');
    // management user register
    Route::post('/management/user/register', [ManagementController::class, 'store_register'])->name('management.store');
    // management user down
    Route::post('/management/user/manager/down/{id}', [ManagementController::class, 'manager_down'])->name('management.down');


    // manager edit
    Route::get('/management/user/manager/edit/{id}', [ManagementController::class, 'manager_edit'])->name('manager.edit');
    // manager update
    Route::post('/management/user/manager/update/{id}', [ManagementController::class, 'manager_update'])->name('manager.update');
    // manager delete
    Route::get('/management/user/manager/delete/{id}', [ManagementController::class, 'manager_delete'])->name('manager.delete');

    // blogger edit
    Route::get('/management/blogger/edit/{id}', [ManagementController::class, 'blogger_edit'])->name('blogger.edit');
    // blogger update
    Route::post('/management/blogger/update/{id}', [ManagementController::class, 'blogger_update'])->name('blogger.update');
    // blogger delete
    Route::get('/management/blogger/delete/{id}', [ManagementController::class, 'blogger_delete'])->name('blogger.delete');



    // user edit
    Route::get('/management/user/edit/{id}', [ManagementController::class, 'user_edit'])->name('user.edit');
    // user update
    Route::post('/management/user/update/{id}', [ManagementController::class, 'user_update'])->name('user.update');
    // user delete
    Route::get('/management/user/delete/{id}', [ManagementController::class, 'user_delete'])->name('user.delete');




    // role
    Route::get('/management/role', [ManagementController::class, 'role_index'])->name('management.role.index');
    // role assign
    Route::post('/management/role/assign', [ManagementController::class, 'role_assign'])->name('management.role.assign');
    // blogger grade down
    Route::post('/management/role/undo/blogger/{id}', [ManagementController::class, 'blogger_grade_down'])->name('management.role.blogger.down');
    // user grade down
    Route::post('/management/role/undo/user/{id}', [ManagementController::class, 'user_grade_down'])->name('management.role.user.down');

    // user block list
    Route::get('/management/block/list', [ManagementController::class, 'block_list'])->name('management.block.list');
     // delete block user
     Route::get('/management/block/delete/{id}', [ManagementController::class, 'block_delete'])->name('block.delete');

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


// category
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
// category insert
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
// category edit
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
// category update
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
// category delete
Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
// category status
Route::post('/category/status/{category}', [CategoryController::class, 'status'])->name('category.status');



// blog
Route::resource('/blog', BlogController::class);
Route::post('/blog/status/{blog}', [BlogController::class, "status"])->name('blog.change_status');

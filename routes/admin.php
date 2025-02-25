<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ManageUsersController;

Route::prefix('admin')->middleware(['auth','admin'])->group(function(){
//Route::prefix('admin')->group(function(){
    Route::get('login',[AdminController::class,'login']);
    Route::get('logout',action: [AdminController::class,'login']);


    //Manage Users
    Route::get('/users',[ManageUsersController::class,'users'])->name('list-users'); //View user details
    Route::get('/users/{id}',[ManageUsersController::class,'get_user'])->name('fetch-user');
    Route::post('/create-user',[ManageUsersController::class,'create'])->name('create-user');
    Route::put('/edit-user/{id}',[ManageUsersController::class,'update'])->name('update-user');
    Route::delete('/delete-user/{id}',[ManageUsersController::class,'destroy'])->name('delete-user');
    Route::patch('users/{id}/status',[ManageUsersController::class,'enable'])->name('');
    Route::get('users/{id}/jobs',[ManageUsersController::class,'job'])->name('fetch-user-job');
    Route::post('user/{id}/reset',[ManageUsersController::class,'password_reset'])->name('password-reset');

    Route::get('/clients',[ManageUsersController::class,'get_clients'])->name('list-clients');
    Route::get('/clients/{id}',[ManageUsersController::class,'get_client'])->name('client');



//    GET    /api/admin/users List all users
//GET  /api/admin/users/{id}

//POST ///api/admin/users  Create a new user
//PUT /api/admin/users/{id} //Update user details
//DELETE //api/admin/users/{id} Delete or suspend a user
//PATCH  /api/admin/users/{id}/status  //Enable/Disable a user
//GET  /api/admin/users/{id}/jobs   Get jobs posted by a user
//GET /api/admin/users/{id}/applications  Get jobs applied for by a user
//POST   /api/admin/users/{id}/reset-password  //Reset a user’s password



});

require __DIR__.'/auth.php';

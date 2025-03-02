<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ManageJobsController;
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
    Route::get('/agents',[ManageUsersController::class,'get_agents'])->name('get-agents');
    Route::get('/agents/{id}',[ManageUsersController::class,'get_agent'])->name('get-agent');

    // Manage Jobs
    Route::get('/pending-contracts',[ManageJobsController::class,'pending_contracts'])->name('pending-contracts');
    Route::get('/ongoing-contracts',[ManageJobsController::class,'ongoing_contracts'])->name('ongoing-contracts');
    Route::get('/ongoing-contracts-staging',[ManageJobsController::class,'ongoing_contracts_staging'])->name('ongoing-contracts-staging');

    Route::get('/completed-contracts',[ManageJobsController::class,'completed_contracts'])->name('completed-contracts');

    Route::get('/pending-contracts/{id}/more',[ManageJobsController::class,'pending_contracts_more_section'])->name('pending-contracts-more-section');

    Route::get('/ongoing-contracts-staging/{id}',[ManageJobsController::class, 'ongoing_contracts_staging']);

    Route::post('/moved-to-ongoing/{id}',[ManageJobsController::class, 'moved_to_ongoing']);

    Route::post('/mark-as-completed/{id}',[ManageJobsController::class,'markAsCompleted'])->name('mark-as-completed');




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

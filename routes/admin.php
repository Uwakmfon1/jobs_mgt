<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\AdminController;

Route::prefix('admin')->middleware(['auth','admin'])->group(function(){

    Route::get('login',[AdminController::class,'login']);
    Route::get('logout',action: [AdminController::class,'login']);

});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/get-help');

Route::get('/admin-header',[AdminController::class, 'index']);
Route::get('/admin-sidebar',[AdminController::class,'sidebar']);

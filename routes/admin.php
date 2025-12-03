<?php

use  Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;

Route::get('/', function () {
    return view('Admin.dashboard');
})->name('dashboard');

//Gestion de roles
Route::resource('roles',RoleController::class);
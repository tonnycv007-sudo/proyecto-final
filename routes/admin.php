<?php 

use  Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PetController;

Route::get('/', function () {
    return view('Admin.dashboard');
})->name('dashboard');

//Gestion de roles
Route::resource('roles',RoleController::class);

Route::resource('users',UserController::class);

Route::resource('pets', PetController::class);
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;

Route::get('', [HomeController::class, 'index'])->name('home');

Route::resource('roles', RoleController::class)->names('roles');

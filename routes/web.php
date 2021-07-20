<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\QueryController::class, 'index'])->name('home');

Route::post('/check', [\App\Http\Controllers\QueryController::class, 'check'])->name('check');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashBoardController;

Route::get('/', [DashBoardController::class, 'index']);
Route::get('/dashboard', [DashBoardController::class, 'dashboard']);

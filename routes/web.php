<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/', [PostController::class, 'index']);
Route::inertia('/about', 'About');
Route::get('/author', [AuthorController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/list', [ListController::class, 'index']);

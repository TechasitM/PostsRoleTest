<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;

Route::get('/',[HomeController::class,'index']);
Route::get('/aboute',[HomeController::class,'aboute']);

Route::get('/posts',[PostsController::class,'index']);
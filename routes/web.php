<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;

Route::get('/',[HomeController::class,'index']);
Route::get('/aboute',[HomeController::class,'aboute']);

Route::get('/posts',[PostsController::class,'index']);

Route::get('create',[PostsController::class,'create'])->name('create');
Route::post('store',[PostsController::class,'store'])->name('store');
Route::get('post/edit/{id}',[PostsController::class,'edit'])->name('edit');
Route::post('post/update/{id}',[PostsController::class,'update'])->name('update');
Route::get('post/destroy/{id}',[PostsController::class,'destroy'])->name('destroy');
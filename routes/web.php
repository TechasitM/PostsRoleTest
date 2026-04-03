<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StudentsController;

use App\Http\Controllers\ProductsController;

use App\Models\Order ;
use App\Models\Product ;

Route::get('products',[ProductsController::class,'index']) ; 
Route::get('products/create',[ProductsController::class,'create'])->name('products.create') ; 
Route::post('products/store',[ProductsController::class,'store'])->name('products.store') ; 
Route::get('products/edit/{id}',[ProductsController::class,'edit'])->name('products.edit') ; 
Route::post('products/update/{id}',[ProductsController::class,'update'])->name('products.update') ; 
Route::delete('products/destroy/{id}',[ProductsController::class,'destroy'])->name('products.destroy'); 

Route::get('/order/{id}',function($id){
    $order = Order::find($id) ;
    return $order->rProduct()->orderBy('name','desc')->get();
});

Route::get('/order/product/{id}',function($id){
    $order = Product::find($id) ;
    return $order->rOrder()->orderBy('id','desc')->get();
});


Route::get('student/all',[StudentsController::class,'index'])->name('student') ;

Route::get('/',[HomeController::class,'index']);
Route::get('/aboute',[HomeController::class,'aboute']);

Route::get('/posts',[PostsController::class,'index']);
Route::get('create',[PostsController::class,'create'])->name('create');
Route::post('store',[PostsController::class,'store'])->name('store');
Route::get('post/edit/{id}',[PostsController::class,'edit'])->name('edit');
Route::post('post/update/{id}',[PostsController::class,'update'])->name('update');
Route::get('post/destroy/{id}',[PostsController::class,'destroy'])->name('destroy');

Route::get('post/show/{id}',[PostsController::class,'show'])->name('show');

Route::get('/category',[CategoryController::class,'index']);
Route::get('category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('categorystore',[CategoryController::class,'store'])->name('category.store');
Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('category/update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('category/destroy/{id}',[CategoryController::class,'destroy'])->name('category.destroy');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\EmailController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Models\Order ;
use App\Models\Product ;

Route::get('send-email',[EmailController::class,'send_email']);

//Soft Delete and Restore
Route::get('posts/trashed',[PostsController::class,'trashed'])->name('posts.trashed');
Route::get('posts/restore/{id}',[PostsController::class,'restore'])->name('posts.restore');
Route::get('posts/restore-all',[PostsController::class,'restoreAll'])->name('posts.restoreAll');

//products
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

//เส้นทางสำหรับหน้าแรกและเกี่ยวกับเรา
Route::get('/',[HomeController::class,'index']);
Route::get('/aboute',[HomeController::class,'aboute']);

//เส้นทางสำหรับ Post
Route::get('/posts',[PostsController::class,'index'])->name('posts.index');
Route::get('posts/create',[PostsController::class,'create'])->name('create');
Route::post('store',[PostsController::class,'store'])->name('store');
Route::get('posts/edit/{id}',[PostsController::class,'edit'])->name('edit');
Route::post('posts/update/{id}',[PostsController::class,'update'])->name('update');
Route::get('posts/destroy/{id}',[PostsController::class,'destroy'])->name('destroy');
Route::get('posts/show/{id}',[PostsController::class,'show'])->name('show');

//เส้นทางสำหรับ Category
Route::get('/category',[CategoryController::class,'index']);
Route::get('category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('categorystore',[CategoryController::class,'store'])->name('category.store');
Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('category/update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('category/destroy/{id}',[CategoryController::class,'destroy'])->name('category.destroy');
Auth::routes();

Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

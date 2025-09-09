<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/about',function(){
    return view('/about');
});
Route::get('/register',function(){
    return view('/register');
});
Route::get('/login',function(){
    return view('/login');
});
Route::get('/contact',function(){
    return view('/contact');
});
Route::get('/dashboard',function(){
    return view('/dashboard');
});
Route::get('/profile',function(){
    return view('/profile');
});
Route::post('/create_post',[PostController::class,'create_post']);
Route::post('/logout',[AuthController::class,'logout']);    
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard',[PostController::class,'index']);
    Route::post('/create_post',[PostController::class,'store']);
    Route::delete('/delete_post/{post_id}',[PostController::class,'destroy']);
});
?>
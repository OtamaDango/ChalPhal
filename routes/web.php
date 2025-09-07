<?php

use App\Http\Controllers\AuthController;
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
Route::post('/logout',[AuthController::class,'logout']);    
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
?>
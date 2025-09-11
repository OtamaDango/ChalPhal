<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    $posts=Post::with('user')->latest()->get();
    return view('home',compact('posts'));
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
//authentication routes
Route::post('/create_post',[PostController::class,'create_post']);
Route::post('/logout',[AuthController::class,'logout']);    
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
//post routes
Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard',[PostController::class,'index']);
    Route::post('/create_post',[PostController::class,'store']);
    Route::delete('/delete_post/{post_id}',[PostController::class,'destroy']);
});
//comment routes
Route::post('/post/{post_id}/comment', [CommentController::class, 'store'])->middleware('auth');
Route::delete('/delete_comment/{comment_id}', [CommentController::class, 'destroy'])->middleware('auth');
?>
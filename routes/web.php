<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

// --------------------
// Public Pages
// --------------------
Route::get('/', function () {
    $posts = Post::with('user', 'comments.user')->latest()->get();
    return view('home', compact('posts'));
})->name('home');

Route::view('/about', 'about')->name('about');

// --------------------
// Authentication
// --------------------

// Show forms
Route::get('/register', function () {
    return view('register');
})->name('register.form');

Route::get('/login', function () {
    return view('login');
})->name('login.form');

// Handle form submissions
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// --------------------
// Protected Pages (requires login)
// --------------------
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');

    // Create Post
    Route::get('/create_post', function () {
        return view('create');
    })->name('create.post.form');

    Route::post('/create_post', [PostController::class, 'store'])->name('create.post.submit');

    // Delete Post
    Route::delete('/delete_post/{post_id}', [PostController::class, 'destroy'])->name('delete.post');

});

// --------------------
// Comments (requires login)
// --------------------
Route::middleware(['auth'])->group(function () {
    Route::post('/post/{post_id}/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('/delete_comment/{comment_id}', [CommentController::class, 'destroy'])->name('comment.delete');
});
?>

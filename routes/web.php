<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PostController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/post/create', [PostController::class, 'create']);
    Route::post('/dashboard/post/store', [PostController::class, 'store'])->name('storePost');

    Route::post('/dashboard/post/edit/{post}', [PostController::class, 'edit'])->name('edit');
    Route::put('/dashboard/post/update/{post}', [PostController::class, 'update'])->name('update');
    Route::delete('/dashboard/post/delete/{post}', [PostController::class, 'destroy'])->name('delete');

    Route::get('/dashboard/tag/create', [TagController::class, 'create']);
    Route::post('/dashboard/tag/store', [TagController::class, 'store'])->name('storeTag');

    Route::get('/dashboard/category/create', [CategoryController::class, 'create']);
    Route::post('/dashboard/category/store', [CategoryController::class, 'store'])->name('storeCat');
});
Route::get('/', [PostController::class, 'index'])->name('welcome');
Route::get('/post/{post}', [PostController::class, 'show'])->name('showPost');

Route::get('/posts/tags/{tag}', [TagController::class, 'index']);

Route::get('/posts/category/{category}', [CategoryController::class, 'index']);

Route::post('/post/{id}/comments', [CommentController::class, 'store'])->name('store');
Route::post('/comment/edit/{comment}', [CommentController::class, 'edit'])->name('editComment');
Route::put('/post/{post}/comment/{comment}', [CommentController::class, 'update'])->name('updateComment');
Route::delete('/comment/delete/{comment}', [CommentController::class, 'destroy'])->name('deleteComment');

require __DIR__ . '/auth.php';

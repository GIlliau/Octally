<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/login', );
Route::get('/', [BlogController::class, 'index']);
Route::get('/post/open/{postId}', [BlogController::class, 'post']);

Route::middleware('auth')->group(function () {
    Route::get('/post', [HomeController::class, 'index']);
    Route::get('/post/create', [HomeController::class, 'create']);
    Route::post('/post/store', [HomeController::class, 'store']);
    Route::get('/post/edit/{postId}', [HomeController::class, 'edit']);
    Route::put('/post/update/{postId}', [HomeController::class, 'update']);
    Route::delete('/post/delete/{postId}', [HomeController::class, 'delete']);

    Route::post('/post/comment/store', [BlogController::class, 'leftComment']);
    Route::delete('/comment/delete/{commentId}', [BlogController::class, 'deleteComment']);

    Route::middleware('role:admin')->group(function () {
        Route::get('/users', [UserController::class, 'index']);
        Route::delete('/user/delete/{commentId}', [UserController::class, 'delete']);
    });
});


require __DIR__.'/auth.php';

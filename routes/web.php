<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
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
Route::get('/post/{postId}', [BlogController::class, 'post']);
Route::get('/user/{userId}/post', [BlogController::class, 'post']);
Route::middleware('auth')->group(function () {
    Route::get('/post', [HomeController::class, 'index']);
    Route::get('/post/create', [HomeController::class, 'create']);
    Route::post('/post/store', [HomeController::class, 'store']);
    Route::get('/post/edit/{postId}', [HomeController::class, 'edit']);
    Route::put('/post/update/{postId}', [HomeController::class, 'update']);
    Route::delete('/post/delete/{postId}', [HomeController::class, 'delete']);

    Route::post('/post/{postId}/comment/store', [BlogController::class, 'leftComment']);
    Route::delete('/comment/{commentId}/delete', [BlogController::class, 'deleteComment']);
});


require __DIR__.'/auth.php';

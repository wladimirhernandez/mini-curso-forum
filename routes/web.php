<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get(
    '/',
    function () {
        if (Auth::check()) {
            return view('home');
        } else {
            return view('auth.login');
        }
    }
);

Auth::routes();

Route::group(["middleware" => ["auth"]], function () {
    Route::group(["prefix" => "blogs"], function () {
        Route::get("/", [BlogController::class, 'index'])->name("blogs.index");
        Route::get("/create",  [BlogController::class, 'create'])->name("blogs.create");
        Route::post("/",  [BlogController::class, 'store'])->name("blogs.store");
        Route::get("/{id}",  [BlogController::class, 'show'])->name("blogs.show");
        Route::delete("/{id}",  [BlogController::class, 'destroy'])->name("blogs.destroy");
    });

    // http://127.0.0.1:8000/posts/{blogId}/create
    Route::group(["prefix" => "posts/{blogId}"], function () {
        Route::get("/", [PostController::class, 'index'])->name("posts.index");
        Route::get("/create", [PostController::class, 'create'])->name("posts.create");
        Route::post("/", [PostController::class, 'store'])->name("posts.store");
        Route::get("/{id}", [PostController::class, 'show'])->name("posts.show");
        Route::delete("/{id}",  [PostController::class, 'destroy'])->name("posts.destroy");
    });
});

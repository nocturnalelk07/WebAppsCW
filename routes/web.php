<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});
//here are the comment routes
Route::get("/comments", [CommentController::class, "index"])->name("comments.index");
Route::get("/comments/create/{id}/{type}", [CommentController::class, "create"])->name("comments.create");
Route::post("/comments", [CommentController::class, "store"])->name("comments.store");
Route::get("/comments/{id}", [CommentController::class, "show"])->name("comments.show");
Route::get("/comments/{id}/edit", [CommentController::class, "edit"])->name("comments.edit");
Route::put("/comments/{id}", [CommentController::class, "update"])->name("comments.update");
Route::delete("/comments/{id}", [CommentController::class, "destroy"])->name("comments.destroy");

//here are the post routes
Route::get("/posts", [PostController::class, "index"])->name("posts.index");
Route::get("/posts/create", [PostController::class, "create"])->name("posts.create");
Route::post("/posts", [PostController::class, "store"])->name("posts.store");
Route::get("/posts/{id}", [PostController::class, "show"])->name("posts.show");
Route::get("/posts/{id}/edit", [PostController::class, "edit"])->name("posts.edit");
Route::put("/posts/{id}", [PostController::class, "update"])->name("posts.update");
Route::delete("/posts/{id}", [PostController::class, "destroy"])->name("posts.destroy");

//here are the tag routes
Route::get("/tags", [TagController::class, "index"])->name("tags.index");
Route::get("/tags/create", [TagController::class, "create"])->name("tags.create");
Route::post("/tags", [TagController::class, "store"])->name("tags.store");
Route::get("/tags/{id}", [TagController::class, "show"])->name("tags.show");
Route::get("/tags/{id}/edit", [TagController::class, "edit"])->name("tags.edit");
Route::put("/tags/{id}", [TagController::class, "update"])->name("tags.update");
Route::delete("/tags/{id}", [TagController::class, "destroy"])->name("tags.destroy");

//here are the user routes
Route::get("/users", [UserController::class, "index"])->name("users.index");
Route::get("/users/create", [UserController::class, "create"])->name("users.create");
Route::post("/users", [UserController::class, "store"])->name("users.store");
Route::get("/users/{id}", [UserController::class, "show"])->name("users.show");
Route::get("/users/{id}/edit", [UserController::class, "edit"])->name("users.edit");
Route::put("/users/{id}", [UserController::class, "update"])->name("users.update");
Route::delete("/users/{id}", [UserController::class, "destroy"])->name("users.destroy");


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('index');
})->name('index');

Route::get("/", [PostController::class, "Home"]) -> middleware("auth") -> name("home");
Route::get("/profile", [PostController::class, "Profile"]) -> middleware("auth") -> name("profile");
Route::get("/user-post-profile/{id}", [UserController::class, "UserPostProfile"]) -> middleware("auth") -> name("user.post.profile");
Route::get("/edit", [PostController::class, "Edit"]) -> middleware("auth") -> name("edit");
Route::post("/edit", [UserController::class, "UpdateProfile"]) -> middleware("auth") -> name("update.profile");
Route::put("/edit", [UserController::class, "UpdateProfileImage"]) -> middleware("auth") -> name("update.profile.image");
/* Route::put("/edit", [UserController::class, "RemoveProfileImage"]) -> middleware("auth") -> name("remove.profile.image"); */

/* Route::put('/edit' ,[UserController::class, "findAction"]) -> middleware("auth"); */

Route::post("/", [PostController::class, "Post"]) -> middleware("auth") -> name("post");
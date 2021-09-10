<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/');
})->name('index');

Route::get("/home", function(){
    return redirect("/");
});

Route::get("/index", function(){
    return redirect("/");
});

Route::group(["middleware" => "auth"], function(){
    Route::get("/", [PostController::class, "Home"]) -> name("home");
    Route::get("/profile", [PostController::class, "Profile"]) -> name("profile");
    Route::get("/user-post-profile/{id}", [UserController::class, "UserPostProfile"]) -> name("user.post.profile");
    Route::get("/edit", [PostController::class, "Edit"]) -> name("edit");

    Route::post("/edit", [UserController::class, "UpdateProfile"]) -> name("update.profile");
    Route::post("/", [PostController::class, "Post"]) -> name("post");
    Route::get("/search", [PostController::class, "Search"]) -> name("search.user.profile");

    Route::put("/edit/update-profile-image", [UserController::class, "UpdateProfileImage"]) -> name("update.profile.image");
    Route::put("/edit/remove-profile-image", [UserController::class, "RemoveProfileImage"]) -> name("remove.profile.image");
});
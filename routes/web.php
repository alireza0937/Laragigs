<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;

Route::get('/',[ListingController::class, "index"]);
Route::get("/listings/create", [ListingController::class, "create"])->middleware("auth");
Route::post("/listings/done",[ListingController::class, "store"])->middleware("auth");
Route::delete("/listings/{listing}/delete", [ListingController::class, "destroy"])->middleware("auth");
Route::get("/listings/manage", [ListingController::class, "manage"]);
Route::get("/listings/{listing}/edit", [ListingController::class, "edit"])->middleware("auth");
Route::put("/listings/{listing}", [ListingController::class, "update"])->middleware("auth");
Route::get("/listings/{listing}",[ListingController::class, "show"]);
Route::get("/user/register", [UserController::class, "create"])->middleware("guest");
Route::post("/user/register/done", [UserController::class, "store"]);
Route::post("/logout", [UserController::class, "logout"])->middleware("auth");
Route::get("/user/login", [UserController::class, "login"])->name("login")->middleware("guest");
Route::post("/user/login/auth", [UserController::class, "authenticate"]);







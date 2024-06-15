<?php

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

Route::group(["namespace" => "App\Http\Controllers"], function() {
    Route::get("/", "HomeController@welcome")->name("/");
    Route::get("/browse", "HomeController@browse")->name("browse");
    Route::get("/denied", "HomeController@denied")->name("denied");

    Route::group(["middleware" => ["auth"]], function() {
        Route::get("/logout", "LogoutController@perform")->name("logout");

        Route::get("/home", "HomeController@home")->name("home");
        Route::get("/me", "HomeController@me")->name("users.me");

        Route::post("/books/{id}/rate", "BookController@rate")->name("books.rate");
    });

    Route::group(["middleware" => ["guest"]], function() {
        Route::get("/register", "RegisterController@show")->name("register.show");
        Route::post("/register", "RegisterController@register")->name("register");

        Route::get("/login", "LoginController@show")->name("login.show");
        Route::post("/login", "LoginController@login")->name("login");
    });

    Route::group(["prefix" => "/manage", "middleware" => ["auth", "check.level"]], function() {
        Route::get("/books/select", "BookController@select")->name("books.select");
        Route::get("/books/multi-select", "BookController@multiSelect")->name("books.multi-select");
        
        Route::get("/authors/authored/{id}", "AuthorController@authored")->name("authors.authored");
        Route::get("/orders/items/{id}", "OrderController@items")->name("orders.items");

        Route::get("/books/filter", "BookController@filter")->name("books.filter");
        Route::get("/orders/filter", "OrderController@filter")->name("orders.filter");
        Route::get("/authors/filter", "AuthorController@filter")->name("authors.filter");
        Route::get("/genres/filter", "GenreController@filter")->name("genres.filter");
        
        Route::resource("/books", "BookController")->names("books");
        Route::resource("/orders", "OrderController")->names("orders");
        Route::resource("/authors", "AuthorController")->names("authors");
        Route::resource("/genres", "GenreController")->names("genres");
        
        Route::middleware("check.admin")->group(function() {
            Route::get("/users/filter", "UserController@filter")->name("users.filter");
            Route::resource("/users", "UserController")->names("users");
        });
    });
});

Route::redirect("/manage", "/manage/orders");

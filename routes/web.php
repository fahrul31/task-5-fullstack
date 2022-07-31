<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles', function () {
    return view('articles');
});

Route::get('/categories', function () {
    return view('categories');
});

Route::get('/add_articles', function () {
    return view('/addArticles');
});

Route::get('/edit_articles/{id}', function () {
    return view('/editArticles');
});

Route::get('/add_categories', function () {
    return view('/addCategories');
});

Route::get('/edit_Categories/{id}', function () {
    return view('/editCategories');
});



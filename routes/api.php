<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ArticlesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'create']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('account', [UserController::class, 'getMyProfile']);
    Route::put('user/update', [UserController::class, 'updateUser']);
    Route::get('/logout', [UserController::class, 'logout']);

    Route::get('/all_categories', [CategoriesController::class,'getAllCategories']);
    Route::post('/insert_categories', [CategoriesController::class,'insertCategories']);
    Route::get('/detail_categories/{id_categories}', [CategoriesController::class,'detailCategories']);
    Route::put('/update_categories/{id_categories}', [CategoriesController::class,'updateCategories']);
    Route::delete('/delete_categories/{id_categories}', [CategoriesController::class,'deleteCategories']);

    Route::get('/all_articles', [ArticlesController::class,'getAllArticles']);
    Route::post('/insert_articles/{id_categories}', [ArticlesController::class,'insertArticles']);
    Route::get('/detail_articles/{id_articles}', [ArticlesController::class,'detailArticles']);
    Route::put('/update_articles/{id_articles}', [ArticlesController::class,'updateArticles']);
    Route::delete('/delete_articles/{id_articles}', [ArticlesController::class,'deleteArticles']);
});



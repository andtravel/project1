<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CommentController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('article-json', [ArticleController::class, 'show']);

Route::put('article-views-increment', [ArticleController::class, 'viewsIncrement']);
Route::put('article-likes-increment', [ArticleController::class, 'likesIncrement']);

Route::post('article-add-comment', [CommentController::class, 'store']);

Route::fallback(function() {
    abort(404);
});


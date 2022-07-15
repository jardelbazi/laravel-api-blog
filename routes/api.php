<?php

use App\Blog\Category\Infra\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('categories')->group(function () {
	Route::post('/', [CategoryController::class, 'store']);
	Route::put('/{id}', [CategoryController::class, 'update'])->whereNumber('id');
	Route::delete('/{id}', [CategoryController::class, 'destroy'])->whereNumber('id');

	Route::get('/{id}', [CategoryController::class, 'show'])->whereNumber('id');
	Route::get('/', [CategoryController::class, 'index']);
});

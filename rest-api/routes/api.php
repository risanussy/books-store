<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rest API Books
Route::get('/list', [BookController::class, 'index']);
Route::get('/detail/{id}', [BookController::class, 'show']);
Route::post('/add', [BookController::class, 'store']);
Route::put('/edit/{id}', [BookController::class, 'edit']);
Route::delete('/delete/{id}', [BookController::class, 'delete']);
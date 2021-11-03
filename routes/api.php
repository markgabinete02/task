<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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
Route::prefix('task')->group(function() {
  Route::get('/', [TaskController::class, 'index']);
  Route::get('/{id}', [TaskController::class, 'show']);
  Route::post('/', [TaskController::class, 'store']);
  Route::delete('/{id}', [TaskController::class, 'destroy']);
  Route::patch('/{id}', [TaskController::class, 'update']);
  Route::get('/status/{id}', [TaskController::class, 'edit']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

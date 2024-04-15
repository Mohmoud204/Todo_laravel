<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TodoController;
use App\Http\Controllers\Api\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware("auth:sanctum")->get("/user", function (Request $request) {
  return $request->user();
});

Route::get("/getAll", [TodoController::class, "getAll"]);
Route::get("/findById/{id}", [TodoController::class, "findById"]);
Route::post("/addTodo", [TodoController::class, "addTodo"]);
Route::delete("/delectTodo/{id}", [TodoController::class, "delectTodo"]);

Route::group(
  [
    "middleware" => "api",
    "prefix" => "auth",
  ],
  function ($router) {
    Route::post("login", "AuthController@login");
    Route::post("sign", "AuthController@sign");
    Route::post("logout", "AuthController@logout");
    Route::post("refresh", "AuthController@refresh");
    Route::post("me", "AuthController@me");
  }
);

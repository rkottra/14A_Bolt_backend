<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\TermekController;
Route::resource("termek", TermekController::class)->except("create", "edit");


use App\Http\Controllers\LoginController;
Route::post("register", [LoginController::class, 'Registration']);
Route::post("login", [LoginController::class, 'Login']);
Route::middleware('auth:sanctum')
    ->post("logout", [LoginController::class, 'Logout']);


Route::middleware('auth:sanctum')
    ->get("vedett", [LoginController::class, 'VedettAdatok']);
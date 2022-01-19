<?php

use App\Http\Controllers\API\ContributorController;
use App\Http\Controllers\API\CoverageController;
use App\Http\Controllers\API\CreatorController;
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

Route::apiResource('creator', CreatorController::class);
Route::apiResource('contributor', ContributorController::class);
Route::apiResource('coverage', CoverageController::class);

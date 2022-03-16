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

Route::get('teams', [TeamsController::class, 'index']);
Route::get('teams/{team}', [TeamsController::class, 'show']);
Route::post('teams/store', [TeamsController::class, 'store']);
Route::post('teams/update/{team}', [TeamsController::class, 'update']);
Route::delete('teams/destroy/{team}', [TeamsController::class, 'destroy']);

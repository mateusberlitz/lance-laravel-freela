<?php

use App\Http\Controllers\Api\ContractsController;
use App\Http\Controllers\Api\CommissionParcelsController;
use App\Http\Controllers\Api\CompanyCommissionsController;
use App\Http\Controllers\Api\CustomersController;
use App\Http\Controllers\Api\QuotasController;
use App\Http\Controllers\Api\TeamsController;
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

Route::resource('customers', CustomersController::class)->except(['create', 'edit']);
Route::resource('contracts', ContractsController::class)->except(['create', 'edit']);
Route::resource('quotas', QuotasController::class)->except(['create', 'edit']);
Route::resource('commission-parcels', CommissionParcelsController::class)->except(['create', 'edit']);
Route::resource('company-commissions', CompanyCommissionsController::class)->except(['create', 'edit']);

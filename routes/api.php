<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\CommandStatusController;
use App\Http\Controllers\CreateCommandController;
use App\Http\Controllers\CustomerController;
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

Route::apiResource('customers', CustomerController::class);

Route::apiResource('addresses', AddressController::class);

Route::apiResource('commands', CommandController::class);

Route::post('create_command', CreateCommandController::class);

Route::get('command_status', [CommandStatusController::class, 'index']);

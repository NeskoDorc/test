<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PartController;

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

Route::prefix('v1')->group(function(){

Route::apiResource('suppliers', SupplierController::class);
    Route::apiResource('parts', PartController::class);
    Route::get('suppliers/{id}/parts', [SupplierController::class, 'getParts']);
    Route::get('part/by-suppliers/{supplier}', [PartController::class, 'getBySupplier']);

});


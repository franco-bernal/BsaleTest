<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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


Route::get('category', [ApiController::class, 'category']);
Route::get('product', [ApiController::class, 'product']);
Route::get('bycategory/{name}/{category}/{orden}', [ApiController::class, 'productByCategory']);

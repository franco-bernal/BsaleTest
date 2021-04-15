<?php

use App\Http\Controllers\FullController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FullController::class, 'index']);


// Route::get('/', function () {

//     // $category = Category::select('name');
//     // $category = json_encode($category);
//     return view('welcome', compact('category'));
// });

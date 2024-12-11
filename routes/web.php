<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.top');
});

use App\Http\Controllers\Guest\MentalController;
Route::controller(MentalController::class)->middleware('auth')->group(function() {
    Route::get('mental/create', 'add');
    Route::get('mental_list','index');
});

Auth::routes();

Route::get('/mental_list', [App\Http\Controllers\TopController::class, 'index']);

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
    // もしログイン状態だったら /mental_list に移動する
    $user = auth()->user();
    if (is_null($user) == false) {
        return redirect()->route('mental.list.index');// リダイレクト＝別画面（ＵＲＬ）に遷移する
    }
    return view('top');
});

use App\Http\Controllers\Guest\MentalController;
Route::controller(MentalController::class)->middleware('auth')->group(function() {
    Route::get('mental/create', 'add')->name('mental.add');
    Route::post('mental/create', 'create')->name('mental.create');
    Route::get('mental_list','index')->name('mental.list.index');
    Route::get('mental/edit','edit')->name('mental.edit');
    Route::post('mental/edit','update')->name('mental.update');
}); 

Auth::routes();

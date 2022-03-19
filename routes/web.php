<?php

use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\CityController;
use \App\Http\Controllers\ClientController;
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
    return view('welcome');
});

Auth::routes(
    [
        Route::resource('/cities', CityController::class),
        Route::resource('/clients', ClientController::class),
        Route::get('/clients/export/excel', ClientController::class.'@exportExcel')->name('clients.export.excel'),
        Route::post('/clients/import/excel', ClientController::class.'@importExcel')->name('users.import.excel'),
    ]
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use App\Http\Controllers\CountryController;
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


Route::controller(CountryController::class)
    ->prefix('country')
    ->as('country/')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('/remove/{id}', 'delete');
        // Route::get('/bills', 'bills')->name('bills');
        // Route::get('/bills/{bill}/invoice/pdf', 'invoice')->name('pdf.invoice');
    });

// Route::get('country', [CountryController::class,'index']);

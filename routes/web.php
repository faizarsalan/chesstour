<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TourneyController;
use App\Http\Controllers\TimeController;
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
    return view('home');
});


Route::controller(CountryController::class)
    ->prefix('country')
    ->as('country/')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('/remove/{id}', 'delete');
        Route::get('/add', 'add');
        Route::post('/update/{id}', 'update');
        Route::post('/insert', 'insert');
    });

    Route::controller(PlayerController::class)
    ->prefix('player')
    ->as('player/')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('/remove/{id}', 'delete');
        Route::get('/add', 'add');
        Route::post('/update/{id}', 'update');
        Route::post('/insert', 'insert');
    });

    Route::controller(CategoryController::class)
    ->prefix('category')
    ->as('category/')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/add', 'add');
        Route::post('/remove/{id}', 'delete');
        Route::post('/update/{id}', 'update');
        Route::post('/insert', 'insert');
    });

    Route::controller(TourneyController::class)
    ->prefix('tourney')
    ->as('tourney/')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/add', 'add');
        Route::post('/remove/{id}', 'delete');
        Route::post('/update/{id}', 'update');
        Route::post('/insert', 'insert');
    });

    Route::controller(TimeController::class)
    ->prefix('time')
    ->as('time/')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/add', 'add');
        Route::post('/remove/{id}', 'delete');
        Route::post('/update/{id}', 'update');
        Route::post('/insert', 'insert');
    });
// Route::get('country', [CountryController::class,'index']);

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

use App\Http\Controllers\HController;
use App\Http\Controllers\MessageController;

Route::get('/posts', [ HController::class, 'dash' ]);

Route::post('/create', [ MessageController::class, 'create' ]);


Route::get('/message/{id}', [ MessageController::class, 'view' ]);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



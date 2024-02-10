<?php

use App\Http\Controllers\SitesController;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SitesController::class, 'index']);

// single listing 
Route::get('site/{site}', ['as' => 'site', SitesController::class, 'show']);


// show Cerate form
Route::get('site/create', [SitesController::class, 'create']);

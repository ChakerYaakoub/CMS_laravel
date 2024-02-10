<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\SitesController;
use App\Http\Controllers\UserController;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing 

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



// show register form
Route::get('/register', [UserController::class, 'create']);


// store user
Route::post('/users', [UserController::class, 'store']);

// logout user 
Route::post('/logout', [UserController::class, 'logout']);


// login from 
Route::get('/login', [UserController::class, 'login']);

// login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// manage blog
Route::get('/sites/manager/dashboard', [ManagerController::class, 'show']);

// create new blog form 
Route::get('/sites/manager/newBlog', [ManagerController::class, 'showForm']);



Route::post('/upload/image', [ImageController::class, 'upload'])->name('upload.image');

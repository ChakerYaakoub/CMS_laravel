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


Route::middleware(['auth'])->group(function () {
    // Routes that require authentication

    // Manage blog
    Route::get('/sites/manager/dashboard', [ManagerController::class, 'show']);

    // Show new blog form 
    Route::get('/sites/manager/newBlog', [ManagerController::class, 'showForm']);

    // Show new articles form 
    Route::get('/sites/manager/newBlog/articles/{site_id}', [ManagerController::class, 'showFormArticles']);



    // Store new blog general information 
    Route::post('/siteGeneral/store', [ManagerController::class, 'storeGeneral']);

    // Store new blog articles
    // Route::post('/siteArticles/store?site_id={site_id}&addNew={addNew}&article_nb={article_nb}', [ManagerController::class, 'storeArticles']);

    Route::post('/siteArticles/store/{site_id}/{addNew}/{article_nb}', [ManagerController::class, 'storeArticles']);

    // /upload_image/articles 
    Route::post('/upload_image/articles', [ManagerController::class, 'upload_imageArticles']);

    // fro edit 
    Route::post('/upload_image/editArticles', [ManagerController::class, 'upload_imageArticles_edit']);




    // image_delete / articles
    Route::post('/image_delete/articles', [ManagerController::class, 'remove_imageArticles']);

    // All blogs  view 

    Route::get('/sites/manager/allBlogs', [ManagerController::class, 'myBlogs']);


    // All blogs  view 

    Route::get('/sites/manager/edit/site/{site_id}', [ManagerController::class, 'editBlogForm']);


    // Update blog general information
    Route::post('/site/manager/update/{site_id}', [ManagerController::class, 'updateSite']);

    // add new comment 
    Route::post('/site/comment/store', [SitesController::class, 'storeComment']);

    Route::post('/site/reply/store', [SitesController::class, 'storeReply']);



    Route::delete('/site/comment/remove/{id}', [SitesController::class, 'remove'])->name('comment.remove');

    Route::delete('/site/remove/{id}', [SitesController::class, 'removeSite'])->name('site.remove');
});

// Auth routes
Route::get('/register', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout']);

// Public routes
Route::get('/', [SitesController::class, 'index']);
Route::get('site/{site}', ['as' => 'site', SitesController::class, 'show']);
Route::get('site/create', [SitesController::class, 'create']);
//Route::post('/upload/image', [ImageController::class, 'upload'])->name('upload.image');
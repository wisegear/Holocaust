<?php

// Routes used throughout the site.

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\QuotesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\GalleryComments;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\GalleryController;
use App\Http\Middleware\IsMember;
use App\Http\Middleware\IsAdmin;

// Route relating to the admin section.

use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminSupportController;
use App\Http\Controllers\Admin\BlogCategoriesController;
use App\Http\Controllers\Admin\GalleryCategoriesController;
use App\Http\Controllers\Admin\GalleryAlbumsController;
use App\Http\Controllers\Admin\AdminQuotesController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminGalleryController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AdminTimelineController;

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

// Individual routes used.

Route::get('/', [PagesController::class, 'home']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/contact', [PagesController::class, 'contact']);
Route::get('/important', [PagesController::class, 'important']);
Route::resource('/quotes', QuotesController::class);
Route::resource('/blog', BlogController::class);
Route::resource('/timeline', TimelineController::class);


Route::resource('/gallery', GalleryController::class);
Route::get('/gallery/category/{category}', [GalleryController::class, 'category']);
Route::get('/gallery/album/{album}', [GalleryController::class, 'album']);
Route::get('/gallery/image/{image}', [GalleryController::class, 'image']);
Route::get('/gallery/search/tags/{tag}', [GalleryController::class, 'tag_search']);

// Protected routes only accessible by member group.

Route::middleware([IsMember::class])->group(function() {

    Route::resource('profile', UserProfileController::class);
    Route::resource('support', SupportController::class);
    Route::resource('comments', CommentsController::class)->only(['destroy', 'update']);
    Route::resource('gallery-comments', GalleryComments::class)->only(['destroy', 'update']);

});

// Protected Admin routes only accessible by admin.

Route::middleware([IsAdmin::class])->group(function() {
    
    Route::get('admin', [AdminController::class, 'index']);
    Route::resource('/media', ImagesController::class);
    Route::resource('/admin/users', UsersController::class)->only(['index', 'destroy']);
	Route::resource('/admin/blog', AdminBlogController::class);
    Route::get('/admin/quotes', [AdminQuotesController::class, 'index']);
    Route::get('/admin/timeline', [AdminTimelineController::class, 'index']);
    Route::resource('/admin/gallery', AdminGalleryController::class);
	Route::resource('/admin/support', AdminSupportController::class);
	route::resource('/admin/blog-categories', BlogCategoriesController::class)->except(['create', 'show', 'edit']);
    route::resource('/admin/gallery-categories', GalleryCategoriesController::class)->except(['create', 'show', 'edit']);
    route::resource('/admin/gallery-albums', GalleryAlbumsController::class);

});

require __DIR__.'/auth.php';

// Logout route.

Route::get('/logout', function(){
    Session::flush();
    Auth::logout();
    return Redirect::to("/");
});





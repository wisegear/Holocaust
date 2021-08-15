<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserProfileController;
use App\Http\Middleware\IsMember;
use App\Http\Middleware\IsAdmin;

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

Route::get('/', [PagesController::class, 'home']);

Route::middleware([IsMember::class])->group(function() {

    Route::resource('profile', UserProfileController::class);

});

require __DIR__.'/auth.php';

// Logout route.

Route::get('/logout', function(){
    Session::flush();
    Auth::logout();
    return Redirect::to("/");
});
<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::view( 'mail-vertify', 'mails.mail-vertify' );
Route::post( 'mail-vertify', [ AdminDashboardController::class, 'vertifyEmail' ])->name( 'mail-vertify' );

Route::group(['prefix' => 'admin', 'middleware' => [ 'auth', 'isAdmin' ] ], function () {

    Route::get('users/export/', [ AdminDashboardController::class, 'export' ])->name( 'users.export' );
    Route::post( 'import/category',[ AdminDashboardController::class, 'importCategory' ] )->name( 'import.category' );

    Route::controller(AdminDashboardController::class)->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'home'])->name('home');
    });

    Route::resource( 'category', CategoryController::class );
    Route::resource( 'post', PostController::class );

    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});

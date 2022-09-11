<?php

use App\Http\Controllers\api\v1\ExportController;
use App\Http\Controllers\GoogleSocialiteController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebpageController;
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

/**
 *
 * Authentication/Login/Users
 *
 */

Route::get('/', function () {
    return redirect('/login');
});


Route::get('/login', [WebpageController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'signUp']);

Route::get('/register', [WebpageController::class, 'register']);
Route::post('/register', [UserController::class, 'registerUser']);

Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);

Route::get('/logout', [UserController::class, 'logout']);





Route::middleware(['auth'])->group(function () {

    Route::get('/home', [WebpageController::class, 'index']);

    Route::get('/test', [TestController::class, 'test']);
    Route::post('/test', [TestController::class, 'makeTest']);

    Route::get('/create-test/tinder', [WebpageController::class, 'setupTest']);
    Route::post('/create-test/tinder', [TestController::class, 'createTinderTest']);

    Route::get('/create-test', [WebpageController::class, 'test']);

});

Route::get('/test-landing', [WebpageController::class, 'testLanding']);


Route::group(['prefix' => 'api/v1'], function () {

    Route::get('header-menu', [ExportController::class, 'exportMenu']);
    Route::get('image-uploads', [ExportController::class, 'exportImageUpload']);
});

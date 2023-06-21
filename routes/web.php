<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\HomeController;

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


Route::get('/', [HomeController::class , 'index'])->name('web.home');
Route::post('/', [HomeController::class , 'index'])->name('web.home-post');

/** START ADMIN ROUTE SECTION */
Route::get('/sign-in', [\App\Http\Controllers\Auth\AuthController::class, 'login'])->name("login");

Route::group(['namespace' => 'Admin', 'prefix' => "admin"], function () {
    
    Route::post('/sign-in', [\App\Http\Controllers\Auth\AuthController::class, 'login']);
    Route::get('/sign-out', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name("logout");
});
/** END ADMIN ROUTE SECTION */


Route::get('/counter', [HomeController::class , 'counter'])->name('web.counter');
Route::get('/{slug}', [HomeController::class , 'openLink'])->name('web.open-link');
/*
    Route::get('/', function () {
        return view('welcome');
    });
*/

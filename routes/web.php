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




/** START ADMIN ROUTE SECTION */

Route::group(['namespace' => 'Admin', 'prefix' => "admin"], function () {
    
    Route::get('/sign-in', [\App\Http\Controllers\Auth\AuthController::class, 'login'])->name("admin.login");
    Route::post('/sign-in', [\App\Http\Controllers\Auth\AuthController::class, 'login']);
    Route::get('/sign-out', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name("admin.logout");
    
    Route::get('/register', [\App\Http\Controllers\Auth\AuthController::class, 'register'])->name("admin.register");
    Route::post('/register', [\App\Http\Controllers\Auth\AuthController::class, 'register'])->name("admin.register");

    Route::get('/recuperar-contraseña', [\App\Http\Controllers\Auth\AuthController::class, 'passwordRecovery'])->name("admin.passwordRecovery");
    Route::post('/recuperar-contraseña', [\App\Http\Controllers\Auth\AuthController::class, 'passwordRecovery'])->name("admin.passwordRecovery");

    Route::post('/confirmar-recuperar-contraseña', [\App\Http\Controllers\Auth\AuthController::class, 'passwordRecover'])->name("admin.confirmPasswordRecovery");
    Route::get('/confirmar-recuperar-contraseña', [\App\Http\Controllers\Auth\AuthController::class, 'passwordRecover'])->name("admin.confirmPasswordRecovery");

    Route::post('/codigo-recuperar-contraseña', [\App\Http\Controllers\Auth\AuthController::class, 'passwordVerificationCode'])->name("admin.passwordVerificationCode");
    
    Route::group(['middleware' => 'admin.user'], function(){
        Route::get('/', [\App\Http\Controllers\Auth\HomeController::class, 'index'])->name("admin.home");
    });
    
    
});
/** END ADMIN ROUTE SECTION */


Route::get('/', [HomeController::class , 'index'])->name('web.home');
Route::post('/', [HomeController::class , 'index'])->name('web.home-post');
Route::get('/counter', [HomeController::class , 'counter'])->name('web.counter');
Route::get('/{slug}', [HomeController::class , 'openLink'])->name('web.open-link');
Route::post('/contact-us', [HomeController::class , 'contactUs'])->name('web.contact-us');
/*
    Route::get('/', function () {
        return view('welcome');
    });
*/

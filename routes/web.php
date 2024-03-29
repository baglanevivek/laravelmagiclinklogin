<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::group(['middleware' => ['guest']], function() {
  	Route::get('login', [AuthController::class, 'showLogin'])->name('login.show');
  	// Login with database verification
  	//Route::post('login', [AuthController::class, 'login'])->name('login');
  	
  	// Login without database verification
  	Route::post('login', [AuthController::class, 'publicLogin'])->name('login');
	Route::get('verify-login/{token}', [AuthController::class, 'verifyLogin'])->name('verify-login');
});

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
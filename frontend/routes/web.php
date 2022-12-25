<?php

use App\Http\Controllers\Agama32Controller;
use App\Http\Controllers\Auth32Controller;
use App\Http\Controllers\User32Controller;
use App\Http\Controllers\Detaildata32Controller;
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

Route::get('/', function () {
    return view('welcome', [
        'page' => "Home"
    ]);
})->middleware('auth');


// auth
Route::get('/login32', [Auth32Controller::class, 'login'])->name('login');
Route::get('/register32', [Auth32Controller::class, 'register'])->name('auth32.register');
Route::get('/logout32', [Auth32Controller::class, 'logout'])->name('auth32.logout');

Route::post('/login32', [Auth32Controller::class, 'loginP'])->name('auth32.loginP');
Route::post('/register32', [Auth32Controller::class, 'registerP'])->name('auth32.registerP');

Route::middleware('auth')->group(function () {
    // agama
    Route::resource('/agama32', Agama32Controller::class)->middleware('admin');

    // my
    Route::get('/profile32', [User32Controller::class, 'profile'])->name('user32.profile');
    Route::put('/profile32/edit/image/{id}', [User32Controller::class, 'editimage'])->name('user32.editimage');
    Route::put('/profile32/edit/password/{id}', [User32Controller::class, 'editpassword'])->name('user32.editpassword');

    // user
    Route::resource('/user32', User32Controller::class)->middleware('admin');

    // detail
    Route::resource('/detaildata32', Detaildata32Controller::class);
});
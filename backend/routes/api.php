<?php

use App\Http\Controllers\Api\Agama32Controller;
use App\Http\Controllers\api\Detaildata32Controller;
use App\Http\Controllers\api\User32Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

route::resource('/agama32', Agama32Controller::class);

route::resource('/detaildata32', DetailData32Controller::class);

route::resource('/user32', User32Controller::class);
Route::put('/user32/update/image/{id}', [User32Controller::class, 'editimage'])->name('user32.editimage');
Route::put('/user32/update/password/{id}', [User32Controller::class, 'editpassword'])->name('user32.editpassword');

// detail
route::resource('/detaildata32', Detaildata32Controller::class);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiverController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReceiverController;
use App\Http\Controllers\JobController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['prefix' => 'v1/giver'], function ($router) {
    Route::put('/account/update-profile/{giver}', [GiverController::class, 'update'])->name('update');
    Route::put('/account/upload-document', [GiverController::class, 'upload'])->name('upload');

});

Route::group(['prefix' => 'v1/admin'], function ($router) {
    Route::post('/auth/login', [AdminController::class, 'login'])->name('admin.login');
    // Route::put('/auth/upload-document', [GiverController::class, 'upload'])->name('upload');

});

Route::group(['prefix' => 'v1/receiver'], function ($router) {
    Route::post('/auth/login', [ReceiverController::class, 'login'])->name('receiver.login');
    // Route::put('/auth/upload-document', [GiverController::class, 'upload'])->name('upload');
    Route::post('/jobs/create', [JobController::class, 'create'])->name('create_job');

});
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

Route::get('/unauthorized', function (Request $request) {
    return response()->json(['error' => 'Unauthorized'], 401);
})->name('unauthorized');



Route::group(['prefix' => 'v1/giver'], function ($router) {
    Route::post('/auth/login', [GiverController::class, 'login'])->name('giver.login');
    Route::post('/auth/register', [GiverController::class, 'register'])->name('giver.register');
    Route::post('/account/update-profile/{giver}', [GiverController::class, 'update'])->name('update');

});

Route::group(['prefix' => 'v1/admin'], function ($router) {
    Route::post('/auth/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/account/update-profile', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/account/profile', [AdminController::class, 'userProfile'])->name('admin.profile');

});

Route::group(['prefix' => 'v1/receiver'], function ($router) {
    Route::post('/auth/login', [ReceiverController::class, 'login'])->name('receiver.login');
    Route::post('/jobs/create', [JobController::class, 'create'])->name('create.job');
    Route::get('/jobs/{job}/show', [JobController::class, 'show'])->name('show.job');
    Route::get('/jobs/list', [JobController::class, 'index'])->name('list.job');
    Route::post('/jobs/{job}/update', [JobController::class, 'update'])->name('update.job');
    Route::delete('/jobs/{job}/delete', [JobController::class, 'destroy'])->name('delete.job');
    Route::put('/jobs/{job}/update-status', [JobController::class, 'updateStatus'])->name('update-status');

});

Route::group(['prefix' => 'v1/agency'], function ($router) {
    Route::post('/auth/login', [AgencyController::class, 'login'])->name('agency.login');
    Route::post('/auth/register', [AgencyController::class, 'register'])->name('agency.register');
    Route::get('/account/profile', [AgencyController::class, 'userProfile'])->name('agency.profile');
    Route::post('/account/update-profile/{agency}', [AgencyController::class, 'update'])->name('agency.update');

});
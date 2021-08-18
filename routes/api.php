<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiverController;
use App\Http\Controllers\ReceiverController;


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
    Route::put('/account/upload-document/{giver}', [GiverController::class, 'upload'])->name('upload');

});





Route::group(['prefix' => 'v1/receiver'], function ($router) {
    Route::put('/account/update-profile/{receiver}', [ReceiverController::class, 'update'])->name('update');
    
    
    
    
    Route::get('/givers/list', [ReceiverController::class, 'giversList'])->name('giversList');
    Route::get('/givers/{giver}/show', [ReceiverController::class, 'showGiver'])->name('showGiver');

});



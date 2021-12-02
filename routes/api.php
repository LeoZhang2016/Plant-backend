<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PlantController;


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

// Add  Plant
Route::post('/store-plant',[PlantController::class,'store']);


// Add  Plant
Route::get('/view-plant',[PlantController::class,'index']);

// test purpose
Route::get('/users/{name?}',function($name=null){
    return 'hi '.$name;
});


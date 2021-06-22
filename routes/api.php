<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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


//Public Route
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
//Start of Route product
Route::resource('product',ProductController::class);
Route::get("/product/searchByName/{name}",[ProductController::class,'searchByName']);
//End of Route product

//Start of Route Place
Route::get("/places",[PlaceController::class,'index']);
Route::get("/places/{id}",[PlaceController::class,'show']);

Route::get("/places/searchByName/{name}",[PlaceController::class,'searchByName']);
//End of Route Place


//Protected Route with sanctum Authentication
Route::group(['middleware' => ['auth:sanctum']], function () {
//Start of Route Place
Route::post("/places",[PlaceController::class,'store']);
Route::put("/places/update/{id}",[PlaceController::class,'update']);
Route::delete("/places/{id}",[PlaceController::class,'destroy']);
Route::post("/logout",[AuthController::class,'logout']);
//End of Route Place
});
//End Protected Route with sanctum Authentication

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

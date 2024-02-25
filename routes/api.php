<?php

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
//use App\Http\Requests\LoginRequest;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
     return $request->user();
}); */

/* Route::middleware("guest")->get("/login", function (AuthController $auth){
    $request = new LoginRequest();
   // echo "herree";
   // print_r($request->data());
    return $auth->login($request);    
}); */

Route::middleware(["web"])->group(function () {
    Route::post("/login", [AuthController::class, "login"]);
    Route::get("/logout", [AuthController::class, "logout"])->middleware(["auth"]);

    Route::get("/dashboard/users/index", [UsersController::class, "index"]);
});




<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
//for AuthController
Route::post("register","App\Http\Controllers\AuthController@register");
Route::post("login","App\Http\Controllers\AuthController@login");

Route::middleware('auth:api')->group(function () {
    Route::resource("employees","App\Http\Controllers\EmployeeController");
    Route::resource("departments","App\Http\Controllers\DepartmentController");
    Route::get("departEmployee/{id}","App\Http\Controllers\DepartmentController@getEmployees");
    Route::get("empDepartment/{id}","App\Http\Controllers\EmployeeController@getdepartment");
     
});

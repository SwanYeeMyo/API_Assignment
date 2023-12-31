<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
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

Route::post('/register',[ApiController::class,'register']);
Route::post('/login',[ApiController::class,'login']);

Route::middleware(['auth:api',])->group(function () {
    // Route::get('employeeList',[ApiController::class,'index']);
   //CRUD of employee
   Route::get('employee/List',[EmployeeController::class,'index']);
   Route::post('employee/create',[EmployeeController::class,'create']);
   Route::post('employee/delete',[EmployeeController::class,'delete']);
   Route::post('employee/update',[EmployeeController::class,'update']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

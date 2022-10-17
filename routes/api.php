<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeControlle;

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
Route::get('/employe' , [App\Http\Controllers\EmployeeControlle::class, 'index']);
Route::post('/save' , [App\Http\Controllers\EmployeeControlle::class, 'store']);
Route::put('/update/{id}' , [App\Http\Controllers\EmployeeControlle::class, 'update']);
Route::delete('/delete/{id}' , [App\Http\Controllers\EmployeeControlle::class, 'delete']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

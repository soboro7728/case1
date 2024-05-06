<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TimeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('verified')->group(function () {
    Route::get('/', [TimeController::class, 'index']);
});
Route::post('/work/start', [TimeController::class, 'startwork']);
Route::post('/work/rest/start', [TimeController::class, 'startrest']);
Route::post('/work/rest/end', [TimeController::class, 'endrest']);
Route::post('/work/end', [TimeController::class, 'endwork']);
Route::get('/attendance', [AttendanceController::class, 'date_index']);
Route::get('/attendance/nextdate', [AttendanceController::class, 'date_nextdate']);
Route::get('/attendance/previousdate', [AttendanceController::class, 'date_previousdate']);

// 追加
Route::get('/test', [TimeController::class, 'test']);
Route::get('/userdate', [AttendanceController::class, 'userdate']);
Route::get('/userdate/select', [AttendanceController::class, 'user__select']);

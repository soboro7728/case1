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


Route::middleware('auth')->group(function () {
    Route::get('/', [TimeController::class, 'index']);
});
Route::post('/work/start', [TimeController::class, 'startwork']);
Route::post('/work/rest/start', [TimeController::class, 'startrest']);
Route::post('/work/rest/end', [TimeController::class, 'endrest']);
Route::post('/work/end', [TimeController::class, 'endwork']);
Route::get('/attendance', [AttendanceController::class, 'date_index']);

// postじゃなくていいの？
// Route::post('/attendance/nextdate', [AttendanceController::class, 'date_nextdate']);
// ページネーションのルート？
Route::get('/attendance/nextdate', [AttendanceController::class, 'date_nextdate']);
// Route::post('/attendance/previousdate', [AttendanceController::class, 'date_previousdate']);
Route::get('/attendance/previousdate', [AttendanceController::class, 'date_previousdate']);


// テスト
Route::get('/test',[AttendanceController::class, 'test']);
// Route::get('/todos/search', [AttendanceController::class, 'search']);
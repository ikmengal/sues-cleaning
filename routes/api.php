<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\TaskController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [LoginController::class, 'login']);
Route::post('forgot-password', [LoginController::class, 'forgotPassword']);
Route::post('verify-token', [LoginController::class, 'verifyToken']);
Route::post('change-password', [LoginController::class, 'changePassword']);
Route::get('user-edit',[LoginController::class,'edit']);
Route::post('user-update',[LoginController::class,'update']);
Route::post('user-dashboard', [LoginController::class, 'userDashboard']);

Route::get('get-user-tasks', [TaskController::class, 'getUserTasks']);
Route::post('get-task-services', [TaskController::class, 'getTaskServices']);
Route::post('store-task-services', [TaskController::class, 'storeTaskServices']);
Route::post('remove-room-image', [TaskController::class, 'removeRoomImage']);
Route::Post('mark-as-incompleted', [TaskController::class, 'markAsIncompleted']);

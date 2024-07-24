<?php

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('add_food', [MainController::class, 'add_food']);
Route::post('add_table', [MainController::class, 'add_table']);
Route::post('add_user', [MainController::class, 'add_user']);
Route::post('check_password', [MainController::class, 'check_password']);
Route::post('delete_food', [MainController::class, 'delete_food']);
Route::post('delete_table', [MainController::class, 'delete_table']);
Route::match(['get', 'post'], 'grab_res', [MainController::class, 'grab_res']);
Route::match(['get', 'post'], 'grab_table', [MainController::class, 'grab_table']);
Route::match(['get', 'post'], 'grabcount', [MainController::class, 'grabcount']);
Route::post('grabfood', [MainController::class, 'grabfood']);
Route::get('grabfoods', [MainController::class, 'grabfoods']);
Route::get('grabreservations', [MainController::class, 'grabreservations']);
Route::get('grabusers', [MainController::class, 'grabusers']);
Route::post('login', [MainController::class, 'loginapi']);
Route::match(['get', 'post'], 'products', [MainController::class, 'products']);
Route::match(['get', 'post'], 'reservation', [MainController::class, 'getReservation']);
Route::match(['get', 'post'], 'reserve', [MainController::class, 'reserve']);
Route::get('table', [MainController::class, 'table']);
Route::post('update_food', [MainController::class, 'updateFood']);
Route::post('update_res', [MainController::class, 'updateStatus']);
Route::post('update_table', [MainController::class, 'update_table']);
Route::post('update_user', [MainController::class, 'update_user']);
Route::post('userinfo', [MainController::class, 'userinfo']);


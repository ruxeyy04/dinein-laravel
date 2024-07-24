<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/login',[MainController::class, 'login'])->name('login');
// Client Pages
Route::group(['prefix' => '/'], function () {
    Route::get('/',[MainController::class, 'custIndex'])->name('mainhome');
    Route::get('/about',[MainController::class, 'custAbout'])->name('about');
    Route::get('/lproducts',[MainController::class, 'custlproducts'])->name('lproducts');
    Route::get('/order',[MainController::class, 'custOrder'])->name('order');
    Route::get('/prof',[MainController::class, 'custProf'])->name('profile');
    Route::get('/reserve',[MainController::class, 'custReserve'])->name('reserve');
    Route::get('/table',[MainController::class, 'custTable'])->name('table');
});

// Incharge Page
Route::group(['prefix' => 'incharge'], function () {
    Route::get('/',[MainController::class, 'inchIndex'])->name('inchIndex');
    Route::get('/foods',[MainController::class, 'inchFoods'])->name('inchFoods');
    Route::get('/profile',[MainController::class, 'inchProfile'])->name('inchProfile');
    Route::get('/reservation',[MainController::class, 'inchReservation'])->name('inchReservation');
    Route::get('/table',[MainController::class, 'inchTable'])->name('inchTable');
});

// Admin Page
Route::group(['prefix' => 'admin'], function () {
    Route::get('/',[MainController::class, 'adminIndex'])->name('adminmainhome');
    Route::get('/foods',[MainController::class, 'adminFoods'])->name('adminFoods');
    Route::get('/profile',[MainController::class, 'adminProfile'])->name('adminProfile');
    Route::get('/users',[MainController::class, 'adminUsers'])->name('adminUsers');
    Route::get('/table',[MainController::class, 'adminTable'])->name('adminTable');
});



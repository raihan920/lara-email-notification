<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('all-users', [UserController::class,'index'])->name('all-users');
Route::get('send-single-notification/{email}', [UserController::class,'sendIndividualEmailNotification'])->name('send-single-notification');
Route::get('send-all-notification', [UserController::class,'sendAllEmailNotification'])->name('send-all-notification');

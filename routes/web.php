<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\GamePasswordManagementController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PasswordManagementController;
use App\Http\Controllers\ProfileController;
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
    return view('login');
})->name('login');

Route::post('login', [AuthController::class, 'login']);

Route::get('forgot-password', [ForgotPasswordController::class, 'index']);

Route::group(['prefix'=>'admin','middleware' => 'auth'], function () {
    Route::get('logout',[AuthController::class,'logout']);
    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::get('customers',[CustomerController::class,'index']);
    Route::post('customers', [CustomerController::class, 'store']);
    Route::get('customers-view', [CustomerController::class, 'viewCustomerIndex']);
    Route::get('customers-view-data', [CustomerController::class, 'customerData']);

    Route::get('password-management',[PasswordManagementController::class,'index']);
    Route::post('password-management', [PasswordManagementController::class, 'store']);
    Route::get('password-management/{id}', [PasswordManagementController::class, 'destroy']);


    Route::get('game-password-management', [GamePasswordManagementController::class, 'index']);
    Route::post('game-password-management', [GamePasswordManagementController::class, 'store']);
    Route::get('game-password-management/{id}', [GamePasswordManagementController::class, 'destroy']);

    Route::get('notes',[NoteController::class,'index']);
    Route::post('notes', [NoteController::class, 'store']);
    Route::get('notes/{id}', [NoteController::class, 'destroy']);

    Route::get('profile',[ProfileController::class,'index']);


    Route::get('/chat/{userId}',[DashboardController::class,'show']);


    


});
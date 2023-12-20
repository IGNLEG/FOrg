<?php

use App\Http\Controllers\RequisiteController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ContractBillController;
use App\Http\Controllers\ContractBillPaymentController;
use App\Http\Controllers\UserController;

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



Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/login', [UserController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function(){
    Route::apiResource('/bills', BillController::class);
    Route::apiResource('/payments', PaymentController::class);
    Route::apiResource('/requisites', RequisiteController::class);

    Route::apiResource('/contracts', ContractController::class);
    Route::apiResource('/contracts.bills', ContractBillController::class);
    Route::apiResource('/contracts.bills.payments', ContractBillPaymentController::class);
    Route::post('/logout', [UserController::class, 'logout']);
});

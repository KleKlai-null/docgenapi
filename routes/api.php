<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Form\MemorandumController;
use App\Http\Controllers\Api\Public\DocumentVerificationController;
use App\Http\Controllers\Api\Form\ReturnSlip\ReturnSlipController;
use App\Http\Controllers\Api\Form\ServiceCallController;
use App\Http\Controllers\Api\Form\WithdrawalSlip\WsdmController;
use App\Http\Controllers\Api\Form\WithdrawalSlip\WsfaController;
use App\Http\Controllers\Api\Form\WithdrawalSlip\WsfgController;
use App\Http\Controllers\Api\Form\WithdrawalSlip\WsmaController;
use App\Http\Controllers\Api\Form\WithdrawalSlip\WsmiController;
use App\Http\Controllers\Api\Form\WithdrawalSlip\WsmroController;
use App\Models\Form\WithdrawalSlip\Wsma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/register', [AuthController::class, 'createUser']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/logout', [AuthController::class, 'logout'])->middleware('auth:api');

Route::prefix('create')->middleware('auth:api')->group(function () {

    /**
     * @Withdrawal Forms
     */
    Route::post('wsmi', [WsmiController::class, 'store']);
    Route::post('wsmro', [WsmroController::class, 'store']);
    Route::post('wsdm', [WsdmController::class, 'store']);
    Route::post('wsfg', [WsfgController::class, 'store']);
    Route::post('wsfa', [WsfaController::class, 'store']);
    Route::post('wsma', [WsmaController::class, 'store']);
    Route::post('servicecall', [ServiceCallController::class, 'store']);

    /**
     * Memorandum
     */
    Route::post('memorandum', [MemorandumController::class, 'store']);

    /**
     * @Return Slip
     */
    Route::post('returnslip', [ReturnSlipController::class, 'store']);
});

Route::prefix('get')->middleware('auth:api')->group(function () {

    /**
     * @Withdrawal Forms Index
     */
    Route::get('wsmi', [WsmiController::class, 'index']);
    Route::get('wsmro', [WsmroController::class, 'index']);
    Route::get('wsdm', [WsdmController::class, 'index']);
    Route::get('wsfg', [WsfgController::class, 'index']);
    Route::get('wsfa', [WsfaController::class, 'index']);
    Route::get('wsma', [WsmaController::class, 'index']);
    Route::get('servicecall', [ServiceCallController::class, 'index']);

    /**
     * @Memorandum
     */
    Route::get('memorandum', [MemorandumController::class, 'index']);

    /**
     * @Return Slip
     */
    Route::get('returnslip', [ReturnSlipController::class, 'index']);
});

Route::prefix('service')->group(function () {

    Route::get('verify', [DocumentVerificationController::class, 'verifyMI']);
});


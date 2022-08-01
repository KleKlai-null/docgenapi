<?php

use App\Http\Controllers\Container\DocVerificationController;
use App\Http\Controllers\Container\Form\Withdrawal\ShowForm;
use App\Models\Form\Memorandum;
use App\Models\Form\ReturnSlip\ReturnSlip;
use App\Models\Form\ServiceCall;
use App\Models\Form\WithdrawalSlip\Wsdm;
use App\Models\Form\WithdrawalSlip\Wsfa;
use App\Models\Form\WithdrawalSlip\Wsfg;
use App\Models\Form\WithdrawalSlip\Wsma;
use App\Models\Form\WithdrawalSlip\Wsmi;
use App\Models\Form\WithdrawalSlip\Wsmro;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::post('form/show', [ShowForm::class, 'show']);
Route::get('form/show', [ShowForm::class, 'show']);

// Public Access
Route::get('/verify/{key?}', [DocVerificationController::class, 'verifyDocument']);

// Route::get('/test', [ShowForm::class, 'generatePDF']);

Route::get('/userhasmodel', function () {
    $data = User::with('returnslips')->find(9);
    dd($data);
});

Route::get('/modelbelongsto', function () {
    $data = ReturnSlip::find(1)->user;
    dd($data);
});
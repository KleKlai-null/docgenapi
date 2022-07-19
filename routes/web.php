<?php

use App\Models\Form\Item\MiItem;
use App\Models\Form\WithdrawalSlip\Wsmi;
use App\Services\DocumentService;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return DocumentService::GenerateSeriesNo('GFI', 'MI');
});
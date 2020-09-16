<?php

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

/**
 * Some general REST API's
 */

Route::get('/recipients', 'RecipientController@getAll');
Route::get('/offers', 'OfferController@getAll');
Route::get('/vouchers', 'VoucherController@getAll');
/**
 * Required task functionalties
 */
Route::post('/add-offer', 'OfferController@addNewOffer');
Route::post('/apply-voucher', 'VoucherController@ValidateAndapplyVoucher');
Route::post('get-related-vouchers', 'VoucherController@getRelatedVouchers');



// Route::get('/recipients', \App\Controllers\RecipientController::class . ':getAll');

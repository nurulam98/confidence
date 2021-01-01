<?php

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
Route::get('/', 'PublicController@index')->name('homepage');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('dashboard');

Route::prefix('admin')->group(function(){
    Route::get('dashboard', 'AdminController@index')->name('adminDashboard');
    Route::get('user', 'AdminController@user')->name('userAdmin');
    Route::get('json', 'AdminController@json');

    Route::get('profile', 'AdminController@profile')->name('adminProfile');
    Route::post('profile', 'AdminController@profilePost')->name('adminProfilePost');

    Route::get('exportCouponMonth', 'AdminController@exportMonth')->name('exportCouponMonth');
    Route::get('exportCouponYear', 'AdminController@exportYear')->name('exportCouponYear');
    Route::post('exportCoupon', 'AdminController@exportPost')->name('exportCouponPost');

    Route::get('coupon', 'AdminController@coupon')->name('couponAdmin');
    Route::post('couponImport', 'AdminController@couponImport')->name('couponImportAdmin');

    Route::get('searchCoupon','AdminController@searchCoupon')->name('searchCoupon');
    Route::post('searchCoupon', 'AdminController@searchCouponPost')->name('searchCouponPost');

    Route::get('pointTertinggi', 'AdminController@pointTertinggi')->name('pointTertinggi');
    Route::post('pointTertinggi', 'AdminController@pointTertinggiPost')->name('pointTertinggiPost');

});

Route::prefix('it')->group(function(){
    Route::get('dashboard', 'ITController@index')->name('itDashboard');

    Route::get('user', 'ITController@user')->name('userIT');
    Route::get('userJson','ITController@userJson');
    Route::post('user/addUser', 'ITController@addUser');
    Route::get('user/edit/{id}', 'ITController@edit');
    Route::post('user/confirmUser/{id}', 'ITController@confirm');
    Route::post('user/deleteUser/{id}', 'ITController@delete');


    Route::get('profile', 'ITController@profile')->name('itProfile');
    Route::post('profile', 'ITController@profilePost')->name('itProfilePost');

    Route::get('coupon', 'ITController@coupon')->name('coupon');
    Route::get('couponJson', 'ITController@couponJson');
    Route::post('couponImport', 'ITController@couponImport')->name('couponImport');
});

Route::prefix('user')->group(function(){
    Route::get('dashboard', 'UserController@index')->name('userDashboard');

    Route::get('profile', 'UserController@profile')->name('userProfile');
    Route::post('profile', 'UserController@profilePost')->name('userProfilePost');

    Route::get('inputCode', 'UserController@inputCode')->name('inputCode');
    Route::post('inputCode', 'UserController@inputCodePost')->name('inputCodePost');

    Route::get('historyCoupon', 'UserController@historyCoupon')->name('historyCoupon');
    Route::get('historyJson', 'UserController@historyCouponJson');
});

<?php

use App\Mail\UserCreationMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('clear-all', function () {
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('clear-compiled');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    dd('Project Cache Clear');
});
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/', 'HomeController@index');
Route::Resource( 'application','ApplicationController');
Route::get('/application/{id}/print','ApplicationController@printView');

Route::get('/application/{id}/store_declined','ApplicationController@storeDeclined');

Route::post('/application/forward_all', 'ApplicationController@forwardAll');
Route::get('/application/{id}/forward', 'ApplicationController@forward');
Route::post('/application/{id}/forward', 'ApplicationController@forwardStore');
Route::get('/application/{id}/{action}/forward', 'ApplicationController@forward');
Route::post('/application/{id}/{action}/forward', 'ApplicationController@forwardStore');

Route::get('/application/{id}/associate-rm', 'ApplicationController@associateRmCreate');
Route::post('/application/{id}/associate-rm', 'ApplicationController@associateRmStore');
Route::get('/application/{id}/associate-bank-acc', 'ApplicationController@associateBankAccCreate');
Route::post('/application/{id}/associate-bank-acc', 'ApplicationController@associateBankAccStore');


Route::post('/getDistricts', 'ApplicationController@getDistricts');




//Route::Resource( 'registration','App\Http\Controllers\UserController');
Route::get('/user-list', 'UserController@index')->name('user-list');
Route::get('/registration/{id}/edit', 'UserController@edit');
Route::patch('/user/{id}/', 'UserController@update');

Route::Resource( 'role','RoleController');

Route::Resource('incentive_category','IncentiveCategoryController');

Route::Resource('claim_incentive','ClaimIncentiveController');
Route::get('claim_incentive/{id}/print','ClaimIncentiveController@printView');

/*** Incentive Forward and Data */
Route::post('claim_incentive/forward_all','ClaimIncentiveController@forwardAllClaim');
Route::get('claim_incentive/create/{id}','ClaimIncentiveController@createIncentiveData');
Route::post('paid-incentive-store/{claim_id}','ClaimIncentiveController@storeIncentiveData');


Route::get('incentive_calculation', 'IncentiveCalculator@index');
Route::post('incentive_calc'      , 'IncentiveCalculator@calc');
// Route::get('test'                 , 'IncentiveCalculator@test');


Route::get('/report', 'ReportController@index');
Route::post('/report', 'ReportController@index');
Route::post('/getBranchesByCluster', 'ReportController@getBranchesByClusterID');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/test', "ApplicationController@testMail" );




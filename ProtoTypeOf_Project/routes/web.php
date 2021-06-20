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
    return view('Employee.home');
});

Route::get('/reportList', 'ReportsController@reportList');
//ReportPart
Route::get('/reportList/{id}', 'ReportsController@userReports');

//Employee
Route::get('/emplpyee/add', 'EmployeeController@create');
Route::post('/emplpyee/add', 'EmployeeController@createSucess');

Route::get('/emplpyee/print', 'EmployeeController@createSucessPage');
Route::post('/emplpyee/print', 'EmployeeController@createSucessPrint');

Route::get('/emplpyee/edit', 'EmployeeController@edit');
Route::post('/emplpyee/edit', 'EmployeeController@editPage');

Route::get('/emplpyee/list', 'EmployeeController@list');


//Subscription
Route::get('/user/subscription', 'CustomerController@subscription');
Route::post('/user/subscription', 'CustomerController@subscriptionUpdate');

Route::get('/user/subscription/pieChart', 'CustomerController@pieChart');

//Route::get('/emplpyee/add', 'EmployeeController@create');
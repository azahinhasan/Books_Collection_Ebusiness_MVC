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
Route::get('/banAccount/{value}/{id}', 'ReportsController@banAccount');

//Employee
Route::get('/emplpyee/add', 'EmployeeController@create');
Route::post('/emplpyee/add', 'EmployeeController@createSucess');

Route::get('/emplpyee/print/{id}', 'EmployeeController@createSucessPage');
Route::post('/emplpyee/print/{id}', 'EmployeeController@createSucessPrint');

Route::get('/emplpyee/edit', 'EmployeeController@edit');
Route::post('/emplpyee/edit', 'EmployeeController@editPage');

Route::get('/emplpyee/list', 'EmployeeController@list');
Route::get('/emplpyee/update/{id}', 'EmployeeController@editPage2');
Route::get('/chnageEmployeeAccess/{value}/{id}', 'EmployeeController@chnageEmployeeAccess');
Route::post('/emplpyee/list', 'EmployeeController@listSearch');

Route::get('/emplpyee/updatePassword', 'EmployeeController@updatePassPage');
Route::post('/emplpyee/updatePassword', 'EmployeeController@updatePass');

Route::get('/emplpyee/salaryList', 'EmployeeV2Contorller@salaryList');
Route::get('/employee/giveSalary/{id}', 'EmployeeV2Contorller@giveSalaryOption');
Route::post('/employee/giveSalary/{id}', 'EmployeeV2Contorller@confirmSalary');

//Shop
Route::get('/shop/list', 'CustomerController@shopList');
Route::get('/shop/details/{id}/{licence}', 'CustomerController@shopVerify');
Route::post('/shop/details/{id}/{licence}', 'CustomerController@shopVerifyConfirm');
//Subscription
Route::get('/user/subscription', 'CustomerController@subscription');
Route::post('/user/subscription', 'CustomerController@subscriptionUpdate');

Route::get('/user/subscription/list/{value}', 'CustomerController@SubscriptionUsersList');
Route::get('/user/subscription/pieChart', 'CustomerController@pieChart');


//Book Search
Route::post('/bookSearch', 'BookZController@bookSearcWithResults');
Route::get('/bookSearch', 'BookZController@bookSearch');

//Route::get('/emplpyee/add', 'EmployeeController@create');
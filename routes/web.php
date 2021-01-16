<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//compamies--------
Route::get('add/company', 'CompanyController@create')->name('add.company');
Route::post('store/company', 'CompanyController@store')->name('store.copany');
Route::get('all/company', 'CompanyController@index')->name('all.company');
Route::get('delete/company/{id}','CompanyController@destroy');
Route::get('edit/company/{id}','CompanyController@edit');
Route::post('update/company/{id}','CompanyController@update');


//Employees--------
Route::get('add/employee', 'EmployeeController@create')->name('add.employee');
Route::post('store/employee', 'EmployeeController@store')->name('store.employee');
Route::get('all/employee', 'EmployeeController@index')->name('all.employee');
Route::get('delete/employee/{id}','EmployeeController@destroy');
Route::get('edit/employee/{id}','EmployeeController@edit');
Route::post('update/employee/{id}','EmployeeController@update');

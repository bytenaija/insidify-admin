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
    return redirect(route('company.index'));
});

//Auth routes
Auth::routes();


//Company routes

Route::get('/company', 'CompanyController@index')->name('company.index');

Route::get('/company/create', 'CompanyController@create')->name('company.create');

Route::post('/company/create', 'CompanyController@store')->name('company.store');

Route::get('/company/edit/{id}', 'CompanyController@edit')->name('company.edit');

Route::get('/company/show/{id}', 'CompanyController@show')->name('company.show');

Route::put('/company/update/{id}', 'CompanyController@update')->name('company.update');

Route::delete('/company/delete/{id}', 'CompanyController@destroy')->name('company.delete');



//Employee Routes

Route::get('/employee', 'EmployeeController@index')->name('employee.index');

Route::get('/employee/create', 'EmployeeController@create')->name('employee.create');

Route::post('/employee/create', 'EmployeeController@store')->name('employee.store');

Route::get('/employee/edit/{id}', 'EmployeeController@edit')->name('employee.edit');

Route::get('/employee/show/{id}', 'EmployeeController@show')->name('employee.show');

Route::put('/employee/update/{id}', 'EmployeeController@update')->name('employee.update');

Route::delete('/employee/delete/{id}', 'EmployeeController@destroy')->name('employee.delete');

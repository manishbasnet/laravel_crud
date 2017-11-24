<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// Form submit
Route::get('/','HomeController@index');

// Table view

Route::get('/read','HomeController@read');


// Route::post('insertdata','HomeController@insertdata');
// Route::post('updatedata','HomeController@updatedata');
// Route::post('deletedata','HomeController@deletedata');

// Export to csv file
Route::get('homeexport','HomeController@ExportClients');


Route::get('/excelindex','ExcelController@index');
Route::get('/excelread','ExcelController@read');

// Route::post('excelinsertdata','ExcelController@insertdata');
// Route::post('excelupdatedata','ExcelController@updatedata');
// Route::post('exceldeletedata','ExcelController@deletedata');



Route::get('ExportClients','ExcelController@ExportClients');

Route::post('ImportClients','ExcelController@ImportClients');

Route::get('upload','ExcelController@upload');




// Export products

// Route::get('/export_products','HomeController@export_products');
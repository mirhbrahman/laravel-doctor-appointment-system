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

//.........HOSPITAL AREA
Route::group(['middleware'=>['auth','hospital'],'prefix'=>'hospital'],function(){
    //............hospital basic info
    Route::get('basicinfo','Hospital\BasicInfoController@index')->name('hosBasicInfo.index');
    Route::get('basicinfo/edit','Hospital\BasicInfoController@edit')->name('hosBasicInfo.edit');
    Route::post('basicinfo/store','Hospital\BasicInfoController@store')->name('hosBasicInfo.store');
    //..........hospital branch
    Route::resource('branch','Hospital\BranchsController');
    //..........hospital department
    Route::resource('dept','Hospital\DeptsController');
    //.........find hospital doctor
    Route::get('doctor/search','Hospital\DoctorsController@search')->name('hosDoc.search');
    Route::get('doctor/find','Hospital\DoctorsController@search')->name('hosDoc.search2');
    Route::post('doctor/find','Hospital\DoctorsController@find')->name('hosDoc.find');
});

//.........DOCTOR AREA
Route::group(['middleware'=>['auth','doctor'],'prefix'=>'doctor'],function(){
    Route::get('basicinfo','Doctor\DoctorBasicInfoController@index')->name('docBasicInfo.index');
    Route::get('basicinfo/edit','Doctor\DoctorBasicInfoController@edit')->name('docBasicInfo.edit');
    Route::post('basicinfo/store','Doctor\DoctorBasicInfoController@store')->name('docBasicInfo.store');
});

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
    //.........hospital doctor..........
    //.........doctor adding system
    Route::get('doctor/search','Hospital\DoctorsController@search')->name('hosDoc.search');
    Route::get('doctor/find','Hospital\DoctorsController@search')->name('hosDoc.search2');
    Route::post('doctor/find','Hospital\DoctorsController@find')->name('hosDoc.find');
    Route::get('doctor/add/{doc_id}','Hospital\DoctorsController@add')->name('hosDoc.add');
    Route::post('doctor/request','Hospital\DoctorsController@sendDocRequest')->name('hosDoc.request.send');

    //...........doctor view system
    Route::get('doctor/list','Hospital\DoctorsController@docList')->name('hosDoc.list');
    Route::get('doctor/view/{id}','Hospital\DoctorsController@docShow')->name('hosDoc.show');

    //..........hospitals doctor fee
    Route::get('doctor/fee/{id}','Hospital\DocFeeController@add')->name('docFee.add');
    Route::post('doctor/fee/store','Hospital\DocFeeController@store')->name('docFee.store');

    //..........hospitals doctor visiting hours
    Route::get('doctor/visit/{id}','Hospital\DocVisitController@add')->name('docVisit.add');
    Route::post('doctor/visit/store','Hospital\DocVisitController@store')->name('docVisit.store');

});

//.........DOCTOR AREA
Route::group(['middleware'=>['auth','doctor'],'prefix'=>'doctor'],function(){
    Route::get('basicinfo','Doctor\DoctorBasicInfoController@index')->name('docBasicInfo.index');
    Route::get('basicinfo/edit','Doctor\DoctorBasicInfoController@edit')->name('docBasicInfo.edit');
    Route::post('basicinfo/store','Doctor\DoctorBasicInfoController@store')->name('docBasicInfo.store');

    //...........request from hospital
    Route::get('request/all','Doctor\RequestController@requestList')->name('request.all');
    Route::post('request/accept','Doctor\RequestController@accept')->name('request.accept');
    Route::post('request/reject','Doctor\RequestController@reject')->name('request.reject');

    //..........member hospital
    Route::get('hospital','Doctor\HospitalsController@index')->name('docHos.index');

});

//.........PATIENT AREA
Route::group(['middleware'=>['auth','patient'],'prefix'=>'patient'],function(){
    Route::get('basicinfo','Patient\PatientBasicInfoController@index')->name('patientBasicInfo.index');
    Route::get('basicinfo/edit','Patient\PatientBasicInfoController@edit')->name('patientBasicInfo.edit');
    Route::post('basicinfo/store','Patient\PatientBasicInfoController@store')->name('patientBasicInfo.store');



});

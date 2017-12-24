<?php

    Route::get('layout',function(){
       return view('layouts.admin_dashboard');
    });
    Route::get('home',function(){
       return view('admin.homeleader');
    });
	Route::get('test-create-request',function(){
    	return view('database_manager.request.new');  
	});

Route::get('/tao-yeu-cau-leader','Leader\CreateRequestController@index')->name('crequest_leader');
Route::post('/tao-yeu-cau-leader','Leader\CreateRequestController@save')->name('crequest_leader');
Route::get('/tao-yeu-cau-subleader','SubLeader\CreateRequestController@index')->name('crequest_subleader');
Route::post('/tao-yeu-cau-subleader','SubLeader\CreateRequestController@save')->name('crequest_subleader');
Route::get('/tao-yeu-cau-member','Member\CreateRequestController@index')->name('crequest_member');
Route::post('/tao-yeu-cau-member','Member\CreateRequestController@save')->name('crequest_member');

//show cong viec yeu cau
Route::get('/leader-cong-viec-yeu-cau','Leader\ShowIndividualRequestController@index')->name('srequest_indi_leader');
Route::get('/subleader-cong-viec-yeu-cau','SubLeader\ShowIndividualRequestController@index')->name('srequest_indi_subleader');
Route::get('/member-cong-viec-yeu-cau','Member\ShowIndividualRequestController@index')->name('srequest_indi_member');

//show cong viec lien quan
Route::get('/leader-cong-viec-yeu-cau','Leader\ShowRelevantRequestController@index')->name('srequest_rev_leader');
Route::get('/subleader-cong-viec-yeu-cau','SubLeader\ShowIndividualRequestController@index')->name('srequest_indi_subleader');
Route::get('/member-cong-viec-yeu-cau','Member\ShowIndividualRequestController@index')->name('srequest_indi_member');
//show cong viec cua team 
Route::get('/leader-cong-viec-yeu-cau','Leader\ShowIndividualRequestController@index')->name('srequest_indi_leader');
Route::get('/subleader-cong-viec-yeu-cau','SubLeader\ShowIndividualRequestController@index')->name('srequest_indi_subleader');
Route::get('/member-cong-viec-yeu-cau','Member\ShowIndividualRequestController@index')->name('srequest_indi_member');

//edit cac yeu cau
Route::get('/leader-sua-cong-viec/{id}','Leader\ShowEditRequestController@index')->name('srequest_edit_leader');
Route::post('/leader-sua-cong-viec/{id}','Leader\ShowEditRequestController@sua')->name('srequest_edit_leader');
Route::get('/leader-sua-cong-viec/{id}','Leader\ShowEditRequestController@index')->name('srequest_edit_leader');
Route::post('/leader-sua-cong-viec/{id}','Leader\ShowEditRequestController@sua')->name('srequest_edit_leader');

Route::get('/member-sua-cong-viec/{id}','Leader\ShowEditRequestController@index')->name('srequest_edit_member');

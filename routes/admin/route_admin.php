<?php

    Route::get('layout',function(){
       return view('layouts.admin_dashboard');
    });
    Route::get('home',function(){
       return view('admin.home');
    });
Route::get('test-create-request',function(){
    return view('database_manager.request.new');
});
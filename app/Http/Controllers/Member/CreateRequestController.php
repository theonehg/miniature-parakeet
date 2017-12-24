<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\priorities;
use App\departments;
use App\User;
use App\requests;


class CreateRequestController extends Controller
{
     public function index(){
    	$memdata_pr = priorities::get();
    	$memdata_dep = departments::get();
    	$memdata_user = User::get();
    	return view('database_manager.request.newmember')->with(['pr'=>$memdata_pr,'dep'=>$memdata_dep,'users'=>$memdata_user]);
    }
    public function save(Request $request){
    	



    	//  return lai trang create request (index)
    	
    	return Redirect::back();
    	
    }
}

<?php

namespace App\Http\Controllers\Leader;

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
    	$data_pr = priorities::get();
    	$data_dep = departments::get();
    	$data_user = User::get();
    	return view('database_manager.request.newleader')->with(['pr'=>$data_pr,'dep'=>$data_dep,'users'=>$data_user]);
    }
    public function save(Request $request){
    	$req = new requests();
    	$req->subject = $request->subject;
    	$req->priority_id = $request->priority_id;

    	$req->ave();



    	//  return lai trang create request (index)
    	
    	return Redirect::back();
    	
    }
}

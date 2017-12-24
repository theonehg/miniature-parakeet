<?php

namespace App\Http\Controllers\SubLeader;

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
    	$subdata_pr = priorities::get();
    	$subdata_dep = departments::get();
    	$subdata_user = User::get();
    	return view('database_manager.request.newsubleader')->with(['pr'=>$subdata_pr,'dep'=>$subdata_dep,'users'=>$subdata_user]);
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

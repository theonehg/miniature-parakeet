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
    	
         // lay du lieu input nhap de day vao request
        
        $req = new requests();
        $req->subject = $request->subject;
        $req->priority_id = $request->priority_id;
        $req->content = $request->content;
        $req->deadline_at=$request->deadline_at;
        $req->assigned_to=$request->relater;
        // lay du lieu input nhap de day vao departments
        $dep =new departments();
        $dep->id= $request->department_id;
        // fix cung du lieu vi là new request
        //$req->created_by =Auth::id;
        $req->status_id = 1; // new
        $req->rating_id=0; // chưa danh gia
        //dd($req);
        //luu vao database
        $req->save();
        $dep->save();



    	//  return lai trang create request (index)
    	
    	return Redirect::back();
    	
    }
}

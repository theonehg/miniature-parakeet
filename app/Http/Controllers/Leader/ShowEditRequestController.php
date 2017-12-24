<?php

namespace App\Http\Controllers\Leader;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class ShowEditRequestController extends Controller
{
    public function index($id){
    	//lấy dữ liệu của trường tìm kiếm đầu tiên trên bảng User lấy 
    	$data = User::select('a','b','id')->join('users as b','requests.assigned_to_id','=','b.id')->where('id','=',$id)->first();
    	return view('request.editleader')->with(['edit_data'=>$data]);
    }
    public function sua(Request $request,$id){
    	//sua du lieu
    	$edit = requests::find($id);
    	$edit->username = $request->name;
    	//.....
    	$edit->save();
    	//return view(......)
    }
}

<?php

namespace App\Http\Controllers\Leader;

use App\departments;
use App\priorities;
use App\requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\teams;
class ShowEditRequestController extends Controller
{
    public function index($id){

	//lấy dữ liệu của trường tìm kiếm đầu tiên trên bảng User lấy
	$data = requests::join('priorities','requests.priority_id','=','priorities.id')
			->join('departments','requests.department_id','=','departments.id')
			->join('users','requests.assigned_to','=','users.id')
			->join('users','requests.created_by','=','users.id')
			->join('teams','requests.team_id','=','teams.id')
			->select('requests.id as id','subject','priorities.name as priority','priority_id','deadline_at','created_at','departments.name as department','users.fullname as relater','content')
			->where('requests.id','=',$id)->get();
		$pr = priorities::get();
		$dep = departments::get();
		$rel = teams::get(); // select nguoi lien quan nhuwng chua duoc
	//dd($data);
 	return view('database_manager.request.editleader')->with(['edit_data'=>$data,'pr'=>$pr,'dep'=>$dep,'rel'=>$rel]);
		//join('priority','tickets.priority_id','=','priority.id')
		//->join('users as a','tickets.created_by','=','a.id')
		//->join('users as b','tickets.assigned_to_id','=','b.id')
		//->join('status','tickets.status_id','=','status.id')
		//->select('tickets.id as id','subject','created_at','priority.name_priority as priority',
		//'a.employee_name as employee_cre','b.employee_name as employee_assi','deadline','status.name_status as status')ưhe
		//->where('a.id','=',$id)->where('tickets.status_id','=',1)->orderBy('created_at','desc')->get();
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

<?php

namespace App\Http\Controllers\Leader;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\priorities;
use App\departments;
use App\User;
class ShowIndividualRequestController extends Controller
{
    public function index(){
    	//trên đây là 1 query builder lấy dữ liệu các cột của database của tôi các ông các bà tự viết lại query lấy dữ liệu
    	/*<th>Tên công việc</th>
                    <th>Mức độ ưu tiên</th>
                    <th>Người yêu cầu</th>
                    <th>Người thực hiện</th>
                    <th>Ngày tạo</th>
                    <th>Ngày hết hạn</th>
                    <th>Trạng thái</th>
                    */
    	//$data = tickets::join('priority','tickets.priority_id','=','priority.id')->join('users as a','tickets.created_by','=','a.id')->join('users as b','tickets.assigned_to_id','=','b.id')->join('status','tickets.status_id','=','status.id')->select('tickets.id as id','subject','created_at','priority.name_priority as priority','a.employee_name as employee_cre','b.employee_name as employee_assi','deadline','status.name_status as status')->where('a.id','=',$id)->orderBy('created_at','desc')->get(); 
         $data = User::get();//code nay lay vi du cac record cua bang users           
    	return view('database_manager.show_list_congviecyeucau.show_leader')->with([
            'indi_data' => $data
        ]);
    }
}

<?php

namespace App\Http\Controllers\Leader;

use App\departments;
use App\Http\Controllers\Controller;
use App\priorities;
use App\requests;
use App\statuses;
use App\User;
use Illuminate\Http\Request;

class ShowEditRequestController extends Controller
{
    public function index($id)
    {

        //lấy dữ liệu của trường tìm kiếm đầu tiên trên bảng User lấy
        $data = requests::join('priorities', 'requests.priority_id', '=', 'priorities.id')
            ->join('departments', 'requests.department_id', '=', 'departments.id')
            ->join('users as a', 'requests.assigned_to', '=', 'a.id')
            ->join('users as b', 'requests.created_by', '=', 'b.id')
            ->join('statuses', 'requests.status_id', '=', 'statuses.id')
            ->select('requests.id as id', 'subject', 'statuses.name as status','priorities.name as priority','a.fullname as assigned_to','b.fullname as created_by', 'deadline_at', 'created_at', 'departments.name as department', 'content')
            ->where('requests.id', '=', $id)->first();
        //Đoạn này : ban đầu em dùng get() thì nó có thể là 1 mảng các data mà em chỉ cần 1 data thôi.nên em cần hạn chế số lượng lấy ra
        //Bằng cách:
        /// first() :: lấy phần tử đầu tiên
        //take(1)->get() : lấy 1 phần tử (nhưng mà nó trả về colection .nên ['edit_data' => $data cần sửa.sửa thế nào em tự tìm hiểu :))
        // dùng limit(1) để lấy 1 phần tử.chắc cũng ok :)) a chưa thử.em có thể thử :v

        $pr = priorities::get();
        $dep = departments::get();
        $stu = statuses::get();
        $rel = User::get(); // select nguoi lien quan nhuwng chua duoc
//    dd($data);
        return view('database_manager.request.editleader')->with(['edit_data' => $data, 'pr' => $pr, 'dep' => $dep, 'rel' => $rel,'stu' => $stu]);
        //join('priority','tickets.priority_id','=','priority.id')
        //->join('users as a','tickets.created_by','=','a.id')
        //->join('users as b','tickets.assigned_to_id','=','b.id')
        //->join('status','tickets.status_id','=','status.id')
        //->select('tickets.id as id','subject','created_at','priority.name_priority as priority',
        //'a.employee_name as employee_cre','b.employee_name as employee_assi','deadline','status.name_status as status')ưhe
        //->where('a.id','=',$id)->where('tickets.status_id','=',1)->orderBy('created_at','desc')->get();
    }

    public function sua(Request $request, $id)
    {
        //sua du lieu
        $edit = requests::find($id);
        $edit->username = $request->name;
        //.....
        $edit->save();
        //return view(......)
    }
}

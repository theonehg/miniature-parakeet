<?php

namespace App\Http\Controllers\Leader;

use App\Department;
use App\Http\Controllers\Controller;
use App\Priority;
use App\Request;
use App\Status;
use App\User;

class ShowEditRequestController extends Controller
{
    public function index($id)
    {

        //lấy dữ liệu của trường tìm kiếm đầu tiên trên bảng User lấy
        $data = Request::join('priorities', 'requests.priority_id', '=', 'priorities.id')->join('departments', 'requests.department_id', '=', 'departments.id')->join('users as a', 'requests.assigned_to', '=', 'a.id')->join('users as b', 'requests.created_by', '=', 'b.id')->join('statuses', 'requests.status_id', '=', 'statuses.id')->select('requests.id as id', 'subject', 'statuses.name as status', 'priorities.name as priority', 'a.fullname as assigned_to', 'b.fullname as created_by', 'deadline_at', 'created_at', 'departments.name as department', 'content', 'statuses.id as status_id')->where('requests.id', '=', $id)->first();
        //Đoạn này : ban đầu em dùng get() thì nó có thể là 1 mảng các data mà em chỉ cần 1 data thôi.nên em cần hạn chế số lượng lấy ra
        //Bằng cách:
        /// first() :: lấy phần tử đầu tiên
        //take(1)->get() : lấy 1 phần tử (nhưng mà nó trả về colection .nên ['edit_data' => $data cần sửa.sửa thế nào em tự tìm hiểu :))
        // dùng limit(1) để lấy 1 phần tử.chắc cũng ok :)) a chưa thử.em có thể thử :v

        $pr = Priority::get();
        $dep = Department::get();
        $stu = Status::get();
        $rel = User::get(); // TODO: select nguoi lien quan nhuwng chua duoc
//    dd($data);
        return view('database_manager.request.editleader')->with(['edit_data' => $data, 'pr' => $pr, 'dep' => $dep, 'rel' => $rel, 'stu' => $stu]);

    }

    public function edit(Request $request, $id)
    {
        //sua du lieu
        $edit = Request::find($id);
//     dd ($id);
        $edit->subject = $request->subject;
        $edit->priority_id = $request->priority;
        $edit->deadline_at = $request->deadline;
        $edit->department_id = $request->department;
        $edit->assigned_to = $request->assigned_to;
        $edit->status_id = $request->status;
        //$edit->content = $request->content;
        //dd($edit);
        $edit->save();

        $data = Request::join('priorities', 'requests.priority_id', '=', 'priorities.id')->join('departments', 'requests.department_id', '=', 'departments.id')->join('users as a', 'requests.assigned_to', '=', 'a.id')->join('users as b', 'requests.created_by', '=', 'b.id')->join('statuses', 'requests.status_id', '=', 'statuses.id')->select('requests.id as id', 'subject', 'statuses.name as status', 'priorities.name as priority', 'a.fullname as assigned_to', 'b.fullname as created_by', 'deadline_at', 'created_at', 'departments.name as department', 'content', 'statuses.id as status_id')->where('requests.id', '=', $id)->first();
        $pr = Priority::get();
        $dep = Department::get();
        $stu = Status::get();
        $rel = User::get();

        //dd($data);

        return view('database_manager.request.editleader')->with(['edit_data' => $data, 'pr' => $pr, 'dep' => $dep, 'rel' => $rel, 'stu' => $stu]);

    }
}

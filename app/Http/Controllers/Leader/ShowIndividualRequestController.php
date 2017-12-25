<?php

namespace App\Http\Controllers\Leader;

use App\Http\Controllers\Controller;
use App\requests;
use Illuminate\Support\Facades\Auth;
use App\statuses;
use App\User;

use App\priorities;


class ShowIndividualRequestController extends Controller
{
    public function index()
    {
        $id = Auth::id();

        $indi_data = requests::join('priorities','requests.priority_id','=','priorities.id')
            ->join('users as a','requests.created_by','=','a.id')
            ->join('users as b','requests.assigned_to','=','b.id')
            ->join('statuses','requests.status_id','=','statuses.id')
            ->select('requests.id as id','subject','priorities.name as priority','a.fullname as create_by','b.fullname as assigned_to','deadline_at','statuses.name as status')
            ->where('a.id','=',$id)->get();
        //$data = tickets::join('priority','tickets.priority_id','=','priority.id')->join('users as a','tickets.created_by','=','a.id')->join('users as b','tickets.assigned_to_id','=','b.id')->join('status','tickets.status_id','=','status.id')->select('tickets.id as id','subject','created_at','priority.name_priority as priority','a.employee_name as employee_cre','b.employee_name as employee_assi','deadline','status.name_status as status')->where('a.id','=',$id)->orderBy('created_at','desc')->get();
//        $data = requests::get();
        dd($indi_data);
        return view('database_manager.show_list_congviecyeucau.show_leader')->with([
            'data' => $indi_data
        ]);
    }
}

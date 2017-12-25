<?php

namespace App\Http\Controllers\Leader;

use App\Http\Controllers\Controller;
use App\Status;
use App\Team;
use Carbon\Carbon;
use App\Request;
use Illuminate\Support\Facades\Auth;

class ShowDepartmentRequestController extends Controller
{
    public function index()
    {
        $department_id = Team::find(Auth::user()->team_id)->department_id;

        $data = Request::join('priorities', 'requests.priority_id', '=', 'priorities.id')
            ->join('users as created_by', 'requests.created_by', '=', 'created_by.id')
            ->join('users as assigned_to', 'requests.assigned_to', '=', 'assigned_to.id')
            ->join('statuses', 'requests.status_id', '=', 'statuses.id')
            ->select('requests.id', 'subject', 'priorities.name as priority',
                'created_by.fullname as created_by', 'assigned_to.fullname as assigned_to', 'deadline_at', 'statuses.name as status')
            ->where('department_id', '=', $department_id)
            ->get();

        return view('database_manager.CongviecbophanIT.show_leader')->with(['indi_data' => $data]);
    }

    public function new()
    {
        $department_id = Team::find(Auth::user()->team_id)->department_id;

        $data = Request::join('priorities', 'requests.priority_id', '=', 'priorities.id')
            ->join('users as created_by', 'requests.created_by', '=', 'created_by.id')
            ->join('users as assigned_to', 'requests.assigned_to', '=', 'assigned_to.id')
            ->join('statuses', 'requests.status_id', '=', 'statuses.id')
            ->select('requests.id', 'subject', 'priorities.name as priority',
                'created_by.fullname as created_by', 'assigned_to.fullname as assigned_to', 'deadline_at', 'statuses.name as status')
            ->where('department_id', '=', $department_id)
            ->where('requests.status_id', '=', Status::NEW)
            ->get();

        return view('database_manager.CongviecbophanIT.show_leader')->with(['indi_data' => $data]);
    }

    public function inprogress()
    {
        $department_id = Team::find(Auth::user()->team_id)->department_id;

        $data = Request::join('priorities', 'requests.priority_id', '=', 'priorities.id')
            ->join('users as created_by', 'requests.created_by', '=', 'created_by.id')
            ->join('users as assigned_to', 'requests.assigned_to', '=', 'assigned_to.id')
            ->join('statuses', 'requests.status_id', '=', 'statuses.id')
            ->select('requests.id', 'subject', 'priorities.name as priority',
                'created_by.fullname as created_by', 'assigned_to.fullname as assigned_to', 'deadline_at', 'statuses.name as status')
            ->where('department_id', '=', $department_id)
            ->where('requests.status_id', '=', Status::IN_PROGRESS)
            ->get();

        return view('database_manager.CongviecbophanIT.show_leader')->with(['indi_data' => $data]);
    }

    public function resolved()
    {
        $department_id = Team::find(Auth::user()->team_id)->department_id;

        $data = Request::join('priorities', 'requests.priority_id', '=', 'priorities.id')
            ->join('users as created_by', 'requests.created_by', '=', 'created_by.id')
            ->join('users as assigned_to', 'requests.assigned_to', '=', 'assigned_to.id')
            ->join('statuses', 'requests.status_id', '=', 'statuses.id')
            ->select('requests.id', 'subject', 'priorities.name as priority',
                'created_by.fullname as created_by', 'assigned_to.fullname as assigned_to', 'deadline_at', 'statuses.name as status')
            ->where('department_id', '=', $department_id)
            ->where('requests.status_id', '=', Status::RESOLVED)
            ->get();

        return view('database_manager.CongviecbophanIT.show_leader')->with(['indi_data' => $data]);
    }

    public function feedback()
    {
        $department_id = Team::find(Auth::user()->team_id)->department_id;

        $data = Request::join('priorities', 'requests.priority_id', '=', 'priorities.id')
            ->join('users as created_by', 'requests.created_by', '=', 'created_by.id')
            ->join('users as assigned_to', 'requests.assigned_to', '=', 'assigned_to.id')
            ->join('statuses', 'requests.status_id', '=', 'statuses.id')
            ->select('requests.id', 'subject', 'priorities.name as priority',
                'created_by.fullname as created_by', 'assigned_to.fullname as assigned_to', 'deadline_at', 'statuses.name as status')
            ->where('department_id', '=', $department_id)
            ->where('requests.status_id', '=', Status::FEEDBACK)
            ->get();

        return view('database_manager.CongviecbophanIT.show_leader')->with(['indi_data' => $data]);
    }

    public function closed()
    {
        $department_id = Team::find(Auth::user()->team_id)->department_id;

        $data = Request::join('priorities', 'requests.priority_id', '=', 'priorities.id')
            ->join('users as created_by', 'requests.created_by', '=', 'created_by.id')
            ->join('users as assigned_to', 'requests.assigned_to', '=', 'assigned_to.id')
            ->join('statuses', 'requests.status_id', '=', 'statuses.id')
            ->select('requests.id', 'subject', 'priorities.name as priority',
                'created_by.fullname as created_by', 'assigned_to.fullname as assigned_to', 'deadline_at', 'statuses.name as status')
            ->where('department_id', '=', $department_id)
            ->where('requests.status_id', '=', Status::CLOSED)
            ->get();

        return view('database_manager.CongviecbophanIT.show_leader')->with(['indi_data' => $data]);
    }

    public function outofdate()
    {
        $now = Carbon::now();

        $department_id = Team::find(Auth::user()->team_id)->department_id;

        $data = Request::join('priorities', 'requests.priority_id', '=', 'priorities.id')
            ->join('users as created_by', 'requests.created_by', '=', 'created_by.id')
            ->join('users as assigned_to', 'requests.assigned_to', '=', 'assigned_to.id')
            ->join('statuses', 'requests.status_id', '=', 'statuses.id')
            ->select('requests.id', 'subject', 'priorities.name as priority',
                'created_by.fullname as created_by', 'assigned_to.fullname as assigned_to', 'deadline_at', 'statuses.name as status')
            ->where('department_id', '=', $department_id)
            ->where('requests.status_id', '<>', Status::CLOSED)
            ->where('requests.status_id', '<>', Status::CANCELLED)
            ->where('requests.deadline_at', '<', $now)
            ->get();

        return view('database_manager.CongviecbophanIT.show_leader')->with(['indi_data' => $data]);
    }
}

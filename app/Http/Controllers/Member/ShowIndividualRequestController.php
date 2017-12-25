<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ShowIndividualRequestController extends Controller
{
    public function index()
    {
        $id = Auth::id();

        $data = Request::join('priorities', 'requests.priority_id', '=', 'priorities.id')
            ->join('users as created_by', 'requests.created_by', '=', 'created_by.id')
            ->join('users as assigned_to', 'requests.assigned_to', '=', 'assigned_to.id')
            ->join('statuses', 'requests.status_id', '=', 'statuses.id')
            ->select('requests.id', 'subject', 'priorities.name as priority',
                'created_by.fullname as created_by', 'assigned_to.fullname as assigned_to', 'deadline_at', 'statuses.name as status')
            ->where('created_by.id', '=', $id)
            ->get();

        return view('database_manager.show_list_congviecyeucau.show_member')->with(['indi_data' => $data]);
    }

    public function new()
    {
        $id = Auth::id();

        $data = Request::join('priorities', 'requests.priority_id', '=', 'priorities.id')
            ->join('users as created_by', 'requests.created_by', '=', 'created_by.id')
            ->join('users as assigned_to', 'requests.assigned_to', '=', 'assigned_to.id')
            ->join('statuses', 'requests.status_id', '=', 'statuses.id')
            ->select('requests.id', 'subject', 'priorities.name as priority',
                'created_by.fullname as created_by', 'assigned_to.fullname as assigned_to', 'deadline_at', 'statuses.name as status')
            ->where('created_by.id', '=', $id)
            /**
             * Status New
             */
            ->where('requests.status_id', '=', 1)
            ->get();

        return view('database_manager.show_list_congviecyeucau.show_leader')->with(['indi_data' => $data]);
    }

    public function inprogress()
    {
        $id = Auth::id();

        $data = Request::join('priorities', 'requests.priority_id', '=', 'priorities.id')
            ->join('users as created_by', 'requests.created_by', '=', 'created_by.id')
            ->join('users as assigned_to', 'requests.assigned_to', '=', 'assigned_to.id')
            ->join('statuses', 'requests.status_id', '=', 'statuses.id')
            ->select('requests.id', 'subject', 'priorities.name as priority',
                'created_by.fullname as created_by', 'assigned_to.fullname as assigned_to', 'deadline_at', 'statuses.name as status')
            ->where('created_by.id', '=', $id)
            /**
             * Status In Progress
             */
            ->where('requests.status_id', '=', 2)
            ->get();

        return view('database_manager.show_list_congviecyeucau.show_leader')->with(['indi_data' => $data]);
    }

    public function resolved()
    {
        $id = Auth::id();

        $data = Request::join('priorities', 'requests.priority_id', '=', 'priorities.id')
            ->join('users as created_by', 'requests.created_by', '=', 'created_by.id')
            ->join('users as assigned_to', 'requests.assigned_to', '=', 'assigned_to.id')
            ->join('statuses', 'requests.status_id', '=', 'statuses.id')
            ->select('requests.id', 'subject', 'priorities.name as priority',
                'created_by.fullname as created_by', 'assigned_to.fullname as assigned_to', 'deadline_at', 'statuses.name as status')
            ->where('created_by.id', '=', $id)
            /**
             * Status Resolved
             */
            ->where('requests.status_id', '=', 3)
            ->get();

        return view('database_manager.show_list_congviecyeucau.show_leader')->with(['indi_data' => $data]);
    }

    public function feedback()
    {
        $id = Auth::id();

        $data = Request::join('priorities', 'requests.priority_id', '=', 'priorities.id')
            ->join('users as created_by', 'requests.created_by', '=', 'created_by.id')
            ->join('users as assigned_to', 'requests.assigned_to', '=', 'assigned_to.id')
            ->join('statuses', 'requests.status_id', '=', 'statuses.id')
            ->select('requests.id', 'subject', 'priorities.name as priority',
                'created_by.fullname as created_by', 'assigned_to.fullname as assigned_to', 'deadline_at', 'statuses.name as status')
            ->where('created_by.id', '=', $id)
            /**
             * Status Feedback
             */
            ->where('requests.status_id', '=', 4)
            ->get();

        return view('database_manager.show_list_congviecyeucau.show_leader')->with(['indi_data' => $data]);
    }

    public function closed()
    {
        $id = Auth::id();

        $data = Request::join('priorities', 'requests.priority_id', '=', 'priorities.id')
            ->join('users as created_by', 'requests.created_by', '=', 'created_by.id')
            ->join('users as assigned_to', 'requests.assigned_to', '=', 'assigned_to.id')
            ->join('statuses', 'requests.status_id', '=', 'statuses.id')
            ->select('requests.id', 'subject', 'priorities.name as priority',
                'created_by.fullname as created_by', 'assigned_to.fullname as assigned_to', 'deadline_at', 'statuses.name as status')
            ->where('created_by.id', '=', $id)
            /**
             * Status Closed
             */
            ->where('requests.status_id', '=', 5)
            ->get();

        return view('database_manager.show_list_congviecyeucau.show_leader')->with(['indi_data' => $data]);
    }

    public function outofdate()
    {
        $now = Carbon::now();

        $id = Auth::id();

        $data = Request::join('priorities', 'requests.priority_id', '=', 'priorities.id')
            ->join('users as created_by', 'requests.created_by', '=', 'created_by.id')
            ->join('users as assigned_to', 'requests.assigned_to', '=', 'assigned_to.id')
            ->join('statuses', 'requests.status_id', '=', 'statuses.id')
            ->select('requests.id', 'subject', 'priorities.name as priority',
                'created_by.fullname as created_by', 'assigned_to.fullname as assigned_to', 'deadline_at', 'statuses.name as status')
            ->where('created_by.id', '=', $id)
            /**
             * Status Closed
             */
            ->where('requests.status_id', '<>', 5)
            /**
             * Status Canceled
             */
            ->where('requests.status_id', '<>', 6)
            ->where('requests.deadline_at', '<', $now)
            ->get();

        return view('database_manager.show_list_congviecyeucau.show_leader')->with(['indi_data' => $data]);
    }
}

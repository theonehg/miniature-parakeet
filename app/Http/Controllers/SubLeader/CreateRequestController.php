<?php

namespace App\Http\Controllers\SubLeader;

use App\Department;
use App\Http\Controllers\Controller;
use App\Priority;
use App\Relater;
use App\Request;
use App\Status;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CreateRequestController extends Controller
{
    public function index()
    {
        $data_pr = Priority::get();
        $data_dep = Department::get();
        $data_user = User::select('id', 'fullname')->get();
        return view('database_manager.request.newsubleader')->with([
            'pr' => $data_pr,
            'dep' => $data_dep,
            'users' => $data_user
        ]);
    }

    public function save(HttpRequest $request)
    {
        /**
         * Validate input
         */
        $validator = Validator::make($request->all(), [
            'subject' => 'required|max:255',
            'content' => 'required',
            'priority_id' => 'required|integer|min:0',
            'department_id' => 'required|integer|min:0',
            'deadline_at' => 'required|date_format:Y-m-d H:i:s|after:now',
            'relaters.*' => 'required|integer|min:0',
        ]);

        if ($validator->fails()
            || Priority::find($request->input('priority_id')) == null
            || Department::find($request->input('department_id')) == null) {

            return Redirect::back();
        }

        foreach ($request->input('relaters') as $relater) {
            if (User::find($relater) == null) {
                return Redirect::back();
            }
        }

        /**
         * Create Request
         */
        $req = new Request();
        $req->subject = $request->input('subject');
        $req->content = $request->input('content');
        $req->created_by = Auth::id();
        $req->status_id = Status::NEW;
        $req->priority_id = $request->input('priority_id');
        $req->department_id = $request->input('department_id');
        $req->created_at = Carbon::now();
        $req->deadline_at = $request->input('deadline_at');
        $req->save();

        /**
         * Create Relaters
         */
        foreach ($request->input('relaters') as $relater) {
            $rel = new Relater();
            $rel->request_id = $req->id;
            $rel->user_id = $relater;
            $rel->save();
        }

        return redirect(route('srequest_view_subleader', ['id' => $req->id]));

    }
}

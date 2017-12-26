<?php

namespace App\Http\Controllers\Leader;

use App\Comment;
use App\Department;
use App\Http\Controllers\Controller;
use App\Priority;
use App\Relater;
use App\Request;
use App\Status;
use App\Type;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ShowEditRequestController extends Controller
{
    public function index($request_id)
    {
        $request = Request::find($request_id);
        if ($request == null) {
            return Redirect::back();
        }

        $priorities = Priority::get();
        $departments = Department::get();
        $statuses = Status::get();
        $users = User::select('id', 'fullname')->get();
        $relaters = Relater::select('user_id')->where('request_id', '=', $request_id)->get();
        $comments = Comment::where('request_id', '=', $request_id)->get();

        return view('database_manager.request.editleader')->with([
            'request' => $request,
            'priorities' => $priorities,
            'departments' => $departments,
            'users' => $users,
            'relaters' => $relaters,
            'statuses' => $statuses,
            'comments' => $comments
        ]);
    }

    public function edit(HttpRequest $request, $req_id)
    {
        /**
         * Validate input
         */
        $validator = Validator::make($request->all(), [
            'subject' => 'required|max:255',
            'content' => 'required',
            'status_id' => 'required|integer|min:0',
            'priority_id' => 'required|integer|min:0',
            'department_id' => 'required|integer|min:0',
            'deadline_at' => 'required|date_format:Y-m-d H:i:s|after:now',
            'relaters.*' => 'required|integer|min:0',
            'comment_content' => 'required'
        ]);

        if ($validator->fails()
            || Status::find($request->input('status_id')) == null
            || Priority::find($request->input('priority_id')) == null
            || Department::find($request->input('department_id')) == null) {

            return Redirect::back();
        }

        foreach ($request->input('relaters') as $relater) {
            if (User::find($relater) == null) {
                return Redirect::back();
            }
        }

        $req = Request::find($req_id);
        if ($req == null) {
            return Redirect::back();
        }

        /**
         * Update Request
         */
        $req->subject = $request->input('subject');
        $req->content = $request->input('content');
        $req->status_id = $request->input('status_id');
        $req->priority_id = $request->input('priority_id');
        $req->department_id = $request->input('department_id');
        $req->updated_at = Carbon::now();
        $req->deadline_at = $request->input('deadline_at');
        $req->save();

        /**
         * Update Relaters
         */
        Relater::where('request_id', '=', $req_id)->delete();
        foreach ($request->input('relaters') as $relater) {
            $rel = new Relater();
            $rel->request_id = $req->id;
            $rel->user_id = $relater;
            $rel->save();
        }

        /**
         * Create Comment
         */
        $cmt = new Comment();
        $cmt->request_id = $req_id;
        $cmt->user_id = Auth::id();
        $cmt->content = $request->input('comment_content');
        $cmt->created_at = Carbon::now();
        $cmt->save();

        return redirect(route('srequest_edit_leader', ['id' => $req->id]));
    }

    public function comment(HttpRequest $request, $req_id)
    {
        /**
         * Validate input
         */
        $validator = Validator::make($request->all(), [
            'comment_content' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::back();
        }

        $req = Request::find($req_id);
        if ($req == null) {
            return Redirect::back();
        }

        /**
         * Create Comment
         */
        $cmt = new Comment();
        $cmt->request_id = $req_id;
        $cmt->user_id = Auth::id();
        $cmt->content = $request->input('comment_content');
        $cmt->created_at = Carbon::now();
        $cmt->save();

        return redirect(route('srequest_edit_leader', ['id' => $req->id]));
    }
}

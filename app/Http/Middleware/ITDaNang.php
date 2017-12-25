<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Team;


class ITDaNang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
        $team_id = Auth::user()->team_id;
        //select department_id form teams where team_id = Auth::user()->team_id
        $dept_id = Team::select('department_id')->where('team_id','=',$team_id);
        if($dept_id != 2){
            return redirect()->route('login');
        }
        return $next($request);
    }
}

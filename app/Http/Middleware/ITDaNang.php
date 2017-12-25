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
        $teamm_id = Auth::user()->team_id;
        //select department_id form teams where team_id = Auth::user()->team_id
        $dept = Team::select('')->where()->first();
        if(Auth::user()->team_id){

        }
        return $next($request);
    }
}

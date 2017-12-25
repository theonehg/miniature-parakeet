<?php

namespace App\Http\Middleware;

use Closure;

class ITHaNoi
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
        if($dept_id != 1){
            return redirect()->route('login');
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Controllers\SubLeader;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubLeaderController extends Controller
{
    //
    public function index(){
        return view('homesubleader');
    }
}

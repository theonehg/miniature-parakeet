@extends('layouts.admin_dashboard')
@section('css')
    
@endsection
@section('sidebar')

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        
        
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
            <a class="bg-red" href="{{route('crequest_leader')}}">
                <i class="fa fa-pencil-square-o"></i>
                <span>Create Request</span>
            </a>
        </li>
            
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Công việc tôi yêu cầu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('show_indi_leader')}}"><i class="fa fa-circle-o"></i> All</a></li>
                    <li><a href="{{route('show_indi_leader_new')}}"><i class="fa fa-circle-o"></i> New</a></li>
                    <li><a href="{{route('show_indi_leader_inprogress')}}"><i class="fa fa-circle-o"></i> Inprogress</a></li>
                    <li><a href="{{route('show_indi_leader_resolved')}}"><i class="fa fa-circle-o"></i> Resolved</a></li>
                    <li><a href="{{route('show_indi_leader_outofdate')}}"><i class="fa fa-circle-o"></i> Out of Date</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Công việc liên quan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('show_rale_all')}}"><i class="fa fa-circle-o"></i> All</a></li>
                    <li><a href="{{route('show_rale_new')}}"><i class="fa fa-circle-o"></i> New</a></li>
                    <li><a href="{{route('show_rele_inprogress')}}"><i class="fa fa-circle-o"></i> Inprogress</a></li>
                    <li><a href="{{route('show_rele_resolved')}}"><i class="fa fa-circle-o"></i> Resolved</a></li>
                    <li><a href="{{route('show_rele_outofdate')}}"><i class="fa fa-circle-o"></i> Out of Date</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Công việc tôi được giao</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('show_assign_all')}}"><i class="fa fa-circle-o"></i> All</a></li>
                    <li><a href="{{route('show_assign_new')}}"><i class="fa fa-circle-o"></i> New</a></li>
                    <li><a href="{{route('show_assign_inprogress')}}"><i class="fa fa-circle-o"></i> Inprogress</a></li>
                    <li><a href="{{route('show_assign_feedback')}}"><i class="fa fa-circle-o"></i> Feedback</a></li>
                    <li><a href="{{route('show_assign_outofdate')}}"><i class="fa fa-circle-o"></i> Out of Date</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Công việc của team</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('show_team')}}"><i class="fa fa-circle-o"></i> All</a></li>
                    <li><a href="{{route('show_team_new')}}"><i class="fa fa-circle-o"></i> New</a></li>
                    <li><a href="{{route('show_team_inprogress')}}"><i class="fa fa-circle-o"></i> Inprogress</a></li>
                    <li><a href="{{route('show_team_feedback')}}"><i class="fa fa-circle-o"></i> Feedback</a></li>
                    <li><a href="{{route('show_team_outofdate')}}"><i class="fa fa-circle-o"></i> Out of Date</a></li>
                    <li><a href="{{route('show_team_close')}}"><i class="fa fa-circle-o"></i>Close</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Công việc của bộ phận IT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('show_dept')}}"><i class="fa fa-circle-o"></i> All</a></li>
                    <li><a href="{{route('show_dept_new')}}"><i class="fa fa-circle-o"></i> New</a></li>
                    <li><a href="{{route('show_dept_inprogress')}}"><i class="fa fa-circle-o"></i> Inprogress</a></li>
                    <li><a href="{{route('show_dept_feedback')}}"><i class="fa fa-circle-o"></i> Feedback</a></li>
                    <li><a href="{{route('show_dept_outofdate')}}"><i class="fa fa-circle-o"></i> Out of Date</a></li>
                    <li><a href="{{route('show_dept_close')}}"><i class="fa fa-circle-o"></i>Close</a></li>
                </ul>
            </li>
            
           
            
            
            
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
@endsection

@section('js')
    //extend custome link js here
@endsection
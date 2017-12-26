@extends('layouts.admin_dashboard')
@section('css')
     <style>
        div.form-group > label.required:after {
            content: " *";
            color: red;
        }
    </style>
    
@endsection
@section('sidebar')

< class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        
        
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
            <a class="bg-red" href="{{route('crequest_member')}}">
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
                    <li><a href="{{route('mem_show_indi')}}"><i class="fa fa-circle-o"></i> All</a></li>
                    <li><a href="{{route('mem_show_indi_new')}}"><i class="fa fa-circle-o"></i> New</a></li>
                    <li><a href="{{route('mem_show_indi_inprogress')}}"><i class="fa fa-circle-o"></i> Inprogress</a></li>
                    <li><a href="{{route('mem_show_indi_resolved')}}"><i class="fa fa-circle-o"></i> Resolved</a></li>
                    <li><a href="{{route('mem_show_indi_outofdate')}}"><i class="fa fa-circle-o"></i> Out of Date</a></li>
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
                    <li><a href="{{route('mem_show_rele')}}"><i class="fa fa-circle-o"></i> All</a></li>
                    <li><a href="{{route('mem_show_rele_new')}}"><i class="fa fa-circle-o"></i> New</a></li>
                    <li><a href="{{route('mem_show_rele_inprogress')}}"><i class="fa fa-circle-o"></i> Inprogress</a></li>
                    <li><a href="{{route('mem_show_rele_resolved')}}"><i class="fa fa-circle-o"></i> Resolved</a></li>
                    <li><a href="{{route('mem_show_rele_outofdate')}}"><i class="fa fa-circle-o"></i> Out of Date</a></li>
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
                    <li><a href="{{route('mem_show_assign')}}"><i class="fa fa-circle-o"></i> All</a></li>
                    <li><a href="{{route('mem_show_assign_new')}}"><i class="fa fa-circle-o"></i> New</a></li>
                    <li><a href="{{route('mem_show_assign_inprogress')}}"><i class="fa fa-circle-o"></i> Inprogress</a></li>
                    <li><a href="{{route('mem_show_assign_feedback')}}"><i class="fa fa-circle-o"></i> Resolved</a></li>
                    <li><a href="{{route('mem_show_assign_outofdate')}}"><i class="fa fa-circle-o"></i> Out of Date</a></li>
                </ul>
        </ul>
</section>
    <!-- /.sidebar -->
</aside>
@endsection
@section('js')
    //extend custome link js here
@endsection
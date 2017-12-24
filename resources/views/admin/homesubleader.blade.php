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
            <a class="bg-red" href="{{route('crequest_subleader')}}">
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
                    <li><a href="{{route('srequest_indi_subleader')}}"><i class="fa fa-circle-o"></i> All</a></li>
                    <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> New</a></li>
                    <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Improgress</a></li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Resolved</a></li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Out of Date</a></li>
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
                    <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> All</a></li>
                    <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> New</a></li>
                    <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Improgress</a></li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Resolved</a></li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Out of Date</a></li>
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
                    <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> All</a></li>
                    <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> New</a></li>
                    <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Improgress</a></li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Resolved</a></li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Out of Date</a></li>
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
                    <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> All</a></li>
                    <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> New</a></li>
                    <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Improgress</a></li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Resolved</a></li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Out of Date</a></li>
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
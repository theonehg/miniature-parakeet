<?php

/**
 * login
 * Show Login page
 */
Route::get('login', 'LoginController@index')->name('login');

/**
 * login_post
 * Receive Login information
 */
Route::post('login', 'LoginController@login')->name('login_post');


Route::get('logout', 'LoginController@logout')->name('logout');
/**
 * middleware Authentication
 */

Route::group(['middleware'=>'auth'], function(){
    /**
     * logout
     * Show Login page
     */



//    Route::get('/layout', function () {
//        return view('layouts.admin_dashboard');
//    })->name('dashboard');
//
//
//    Route::get('/home', function () {
//        return view('admin.homeleader');
//    });
//    Route::get('/test-create-request', function () {
//        return view('database_manager.request.new');
//    });


    Route::group(['prefix'=>'leader','middleware'=>'isleader'],function(){

        Route::get('/', 'Leader\LeaderController@index')->name('leader_after_login');
        //CREAT REQUEST
        Route::get('create', 'Leader\CreateRequestController@index')->name('crequest_leader');
        Route::post('create', 'Leader\CreateRequestController@save')->name('crequest_leader');

        //INDIVIDUAL REQUEST
        Route::get('individual', 'Leader\ShowIndividualRequestController@index')->name('show_indi_leader');
        Route::get('individual/new', 'Leader\ShowIndividualRequestController@new')->name('show_indi_leader_new');
        Route::get('individual/inprogress', 'Leader\ShowIndividualRequestController@inprogress')->name('show_indi_leader_inprogress');
        Route::get('individual/resolved', 'Leader\ShowIndividualRequestController@resolved')->name('show_indi_leader_resolved');
        Route::get('individual/outofdate', 'Leader\ShowIndividualRequestController@outofdate')->name('show_indi_leader_outofdate');

        // RELEVANT REQUEST
        Route::get('relevant', 'Leader\ShowRelevantRequestController@index')->name('show_rale_all');
        Route::get('relevant/new', 'Leader\ShowRelevantRequestController@new')->name('show_rale_new');
        Route::get('relevant/inprogress', 'Leader\ShowRelevantRequestController@inprogress')->name('show_rele_inprogress');
        Route::get('relevant/resolved', 'Leader\ShowRelevantRequestController@resolved')->name('show_rele_resolved');
        Route::get('relevant/outofdate', 'Leader\ShowRelevantRequestController@outofdate')->name('show_rele_outofdate');

       // //ASSIGN REQUEST
        Route::get('assign', 'Leader\ShowAssignRequestController@index')->name('show_assign_all');
        Route::get('assign/new', 'Leader\ShowAssignRequestController@new')->name('show_assign_new');
        Route::get('assign/inprogress', 'Leader\ShowAssignRequestController@inprogress')->name('show_assign_inprogress');
        Route::get('assign/feedback', 'Leader\ShowAssignRequestController@feedback')->name('show_assign_feedback');
        Route::get('assign/outofdate', 'Leader\ShowAssignRequestController@outofdate')->name('show_assign_outofdate');
      // TEAM REQUEST
        Route::get('team', 'Leader\ShowTeamRequestController@index')->name('show_team');
        Route::get('team/new', 'Leader\ShowTeamRequestController@new')->name('show_team_new');
        Route::get('team/inprogress', 'Leader\ShowTeamRequestController@inprogress')->name('show_team_inprogress');
        Route::get('team/feedback', 'Leader\ShowTeamRequestController@feedback')->name('show_team_feedback');
        Route::get('team/outofdate', 'Leader\ShowTeamRequestController@outofdate')->name('show_team_outofdate');
        Route::get('team/closed', 'Leader\ShowTeamRequestController@close')->name('show_team_close');
        //DEPARTMENT REQUEST
        Route::get('dept', 'Leader\ShowDepartmentRequestController@index')->name('show_dept');
        Route::get('dept/new', 'Leader\ShowDepartmentRequestController@new')->name('show_dept_new');
        Route::get('dept/inprogress', 'Leader\ShowDepartmentRequestController@inprogress')->name('show_dept_inprogress');
        Route::get('dept/feedback', 'Leader\ShowDepartmentRequestController@feedback')->name('show_dept_feedback');
        Route::get('dept/outofdate', 'Leader\ShowDepartmentRequestController@outofdate')->name('show_dept_outofdate');
        Route::get('dept/closed', 'Leader\ShowDepartmentRequestController@close')->name('show_dept_close');

        //EDIT
        Route::get('edit/{id}', 'Leader\ShowEditRequestController@index')->name('srequest_edit_leader');
        Route::post('edit/{id}', 'Leader\ShowEditRequestController@edit')->name('srequest_edit_leader');
        Route::post('comment/{id}', 'Leader\ShowEditRequestController@comment')->name('srequest_comment_leader');



    });
    Route::group(['prefix'=>'subleader','middleware'=>'is_subleader'],function(){

        Route::get('/', 'SubLeader\SubLeaderController@index')->name('sublead_after_login');

        //CREAT REQUEST
        Route::get('create', 'SubLeader\CreateRequestController@index')->name('crequest_subleader');
        Route::post('create', 'SubLeader\CreateRequestController@save')->name('crequest_subleader');

        //INDIVIDUAL REQUEST
        Route::get('individual', 'SubLeader\ShowIndividualRequestController@index')->name('show_indi_subleader');
        Route::get('individual/new', 'SubLeader\ShowIndividualRequestController@new')->name('show_indi_subleader_new');
        Route::get('individual/inprogress', 'SubLeader\ShowIndividualRequestController@inprogress')->name('show_indi_subleader_inprogress');
        Route::get('individual/resolved', 'SubLeader\ShowIndividualRequestController@resolved')->name('show_indi_subleader_resolved');
        Route::get('individual/outofdate', 'SubLeader\ShowIndividualRequestController@outofdate')->name('show_indi_subleader_outofdate');

        //RELEVANT REQUEST
        Route::get('relevant', 'SubLeader\ShowRelevantRequestController@index')->name('sublead_show_rale_all');
        Route::get('relevant/new', 'SubLeader\ShowRelevantRequestController@new')->name('sublead_show_rale_new');
        Route::get('relevant/inprogress', 'SubLeader\ShowRelevantRequestController@inprogress')->name('sublead_show_rele_inprogress');
        Route::get('relevant/resolved', 'SubLeader\ShowRelevantRequestController@resolved')->name('sublead_show_rele_resolved');
        Route::get('relevant/outofdate', 'SubLeader\ShowRelevantRequestController@outofdate')->name('sublead_show_rele_outofdate');

        //ASSIGN REQUEST
        Route::get('assign', 'SubLeader\ShowAssignRequestController@index')->name('sublead_show_assign');
        Route::get('assign/new', 'SubLeader\ShowAssignRequestController@new')->name('sublead_show_assign_new');
        Route::get('assign/inprogress', 'SubLeader\ShowAssignRequestController@inprogress')->name('sublead_show_assign_inprogress');
        Route::get('assign/feedback', 'SubLeader\ShowAssignRequestController@feedback')->name('sublead_show_assign_feedback');
        Route::get('assign/outofdate', 'SubLeader\ShowAssignRequestController@outofdate')->name('sublead_show_assign_outofdate');

        //TEAM REQUEST
        Route::get('team', 'SubLeader\ShowTeamRequestController@index')->name('sublead_show_team');
        Route::get('team/new', 'SubLeader\ShowTeamRequestController@new')->name('sublead_show_team_new');
        Route::get('team/inprogress', 'SubLeader\ShowTeamRequestController@inprogress')->name('sublead_show_team_inprogress');
        Route::get('team/feedback', 'SubLeader\ShowTeamRequestController@feedback')->name('sublead_show_team_feedback');
        Route::get('team/outofdate', 'SubLeader\ShowTeamRequestController@outofdate')->name('sublead_show_team_outofdate');
        Route::get('team/close', 'SubLeader\ShowTeamRequestController@close')->name('sublead_show_team_close');

        //VIEW REQUEST
        Route::get('view/{id}', 'SubLeader\ShowEditRequestController@index')->name('srequest_view_subleader');
        Route::post('view/{id}', 'SubLeader\ShowEditRequestController@edit')->name('srequest_view_subleader');
        Route::post('comment/{id}', 'SubLeader\ShowEditRequestController@comment')->name('srequest_comment_subleader');

    });

    Route::group(['prefix'=>'member','middleware'=>'is_member'],function(){

        Route::get('/', 'Member\MemberController@index')->name('member_after_login');

        //CREATE REQUEST
        Route::get('create-member', 'Member\CreateRequestController@index')->name('crequest_member');
        Route::post('create-member', 'Member\CreateRequestController@save')->name('crequest_member');

        //INDIVIDUAL REQUEST
        Route::get('individual', 'Member\ShowIndividualRequestController@index')->name('mem_show_indi');
        Route::get('individual/new', 'Member\ShowIndividualRequestController@new')->name('mem_show_indi_new');
        Route::get('individual/inprogress', 'Member\ShowIndividualRequestController@inprogress')->name('mem_show_indi_inprogress');
        Route::get('individual/resolved', 'Member\ShowIndividualRequestController@resolved')->name('mem_show_indi_resolved');
        Route::get('individual/outofdate', 'Member\ShowIndividualRequestController@outofdate')->name('mem_show_indi_outofdate');

        //RELEVANT REQUEST
        Route::get('relevant', 'Member\ShowRelevantRequestController@index')->name('mem_show_rele');
        Route::get('relevant/new', 'Member\ShowRelevantRequestController@new')->name('mem_show_rele_new');
        Route::get('relevant/inprogress', 'Member\ShowRelevantRequestController@inprogress')->name('mem_show_rele_inprogress');
        Route::get('relevant/resolved', 'Member\ShowRelevantRequestController@resolved')->name('mem_show_rele_resolved');
        Route::get('relevant/outofdate', 'Member\ShowRelevantRequestController@outofdate')->name('mem_show_rele_outofdate');
        //ASSIGN REQUEST
        Route::get('assign', 'Member\ShowAssignRequestController@index')->name('mem_show_assign');
        Route::get('assign/new', 'Member\ShowAssignRequestController@new')->name('mem_show_assign_new');
        Route::get('assign/inprogress', 'Member\ShowAssignRequestController@inprogress')->name('mem_show_assign_inprogress');
        Route::get('assign/feedback', 'Member\ShowAssignRequestController@feedback')->name('mem_show_assign_feedback');
        Route::get('assign/outofdate', 'Member\ShowAssignRequestController@outofdate')->name('mem_show_assign_outofdate');

        //VIEW
        Route::get('view/{id}', 'Member\ShowEditRequestController@index')->name('srequest_view_member');
        Route::post('view/{id}', 'Member\ShowEditRequestController@edit')->name('srequest_view_member');
        Route::post('comment/{id}', 'Member\ShowEditRequestController@comment')->name('srequest_comment_member');
    });


});
<?php

/**
 * login
 * Show Login page
 */
Route::get('/login', 'LoginController@index')->name('login');

/**
 * login_post
 * Receive Login information
 */
Route::post('/login', 'LoginController@login')->name('login_post');

/**
 * middleware Authentication
 */
Route::middleware('auth')->group(function () {
    /**
     * logout
     * Show Login page
     */
    Route::get('/logout', 'LoginController@logout')->name('logout');


    Route::get('/layout', function () {
        return view('layouts.admin_dashboard');
    })->name('dashboard');


    Route::get('/home', function () {
        return view('admin.homeleader');
    });
    Route::get('/test-create-request', function () {
        return view('database_manager.request.new');
    });


    Route::group(['prefix'=>'leader','middleware'=>'isleader'],function(){

        Route::get('/', 'Leader\LeaderController@index')->name('leader_after_login');
        //CREAT REQUEST
        Route::get('/create', 'Leader\CreateRequestController@index')->name('crequest_leader');
        Route::post('/create', 'Leader\CreateRequestController@save')->name('crequest_leader');

        //INDIVIDUAL REQUEST
        Route::get('/individual', 'Leader\ShowIndividualRequestController@index')->name('show_indi_leader');
        Route::get('/individual/new', 'Leader\ShowIndividualRequestController@new')->name('show_indi_leader_new');
        Route::get('/individual/inprogress', 'Leader\ShowIndividualRequestController@inprogress')->name('show_indi_leader_inrogress');
        Route::get('/individual/resolved', 'Leader\ShowIndividualRequestController@resolved')->name('show_indi_leader_resolved');
        Route::get('/individual/outofdate', 'Leader\ShowIndividualRequestController@outofdate')->name('show_indi_leader_outofdate');

        // RELEVANT REQUEST
        Route::get('/relevant', 'Leader\ShowRelevantRequestController@index')->name('show_rale_all');
        Route::get('/relevant/new', 'Leader\ShowRelevantRequestController@new')->name('show_rale_new');
        Route::get('/relevant/inprogress', 'Leader\ShowRelevantRequestController@inprogress')->name('show_rele_inprogress');
        Route::get('/relevant/resolved', 'Leader\ShowRelevantRequestController@resolved')->name('show_rele_resolved');
        Route::get('/relevant/outofdate', 'Leader\ShowRelevantRequestController@outofdate')->name('show_rele_outofdate');

       // //ASSIGN REQUEST
        Route::get('/assign', 'Leader\ShowAssignRequestController@index')->name('show_assign_all');
        Route::get('/assign/new', 'Leader\ShowAssignRequestController@new')->name('show_assign_new');
        Route::get('/assign/inprogress', 'Leader\ShowAssignRequestController@inprogress')->name('show_assign_inprogcess');
        Route::get('/assign/feedback', 'Leader\ShowAssignRequestController@feedback')->name('show_assign_feedback');
        Route::get('/assign/outofdate', 'Leader\ShowAssignRequestController@outofdate')->name('show_assign_outofdate');
      // TEAM REQUEST
        Route::get('/team', 'Leader\ShowTeamRequestController@index')->name('show_team');
        Route::get('/team/new', 'Leader\ShowTeamRequestController@new')->name('show_team_new');
        Route::get('/team/inprogress', 'Leader\ShowTeamRequestController@inprogress')->name('show_team_inprogress');
        Route::get('/team/feedback', 'Leader\ShowTeamRequestController@feedback')->name('show_team_feedback');
        Route::get('/team/outofdate', 'Leader\ShowTeamRequestController@outofdate')->name('show_team_outofdate');
        Route::get('/team/close', 'Leader\ShowTeamRequestController@close')->name('show_team_close');
        //DEPARTMENT REQUEST
        Route::get('/dept', 'Leader\ShowDepartmentRequestController@index')->name('show_dept');
        Route::get('/dept/new', 'Leader\ShowDepartmentRequestController@new')->name('show_dept_new');
        Route::get('/dept/inprogress', 'Leader\ShowDepartmentRequestController@inprogress')->name('show_dept_inprogress');
        Route::get('/dept/feedback', 'Leader\ShowDepartmentRequestController@feedback')->name('show_dept_feedback');
        Route::get('/dept/outofdate', 'Leader\ShowDepartmentRequestController@outofdate')->name('show_dept_outofdate');
        Route::get('/dept/close', 'Leader\ShowDepartmentRequestController@close')->name('show_dept_close');

        //EDIT
        Route::get('/edit/{id}', 'Leader\ShowEditRequestController@index')->name('srequest_edit_leader');
        Route::post('/edit/{id}', 'Leader\ShowEditRequestController@edit')->name('srequest_edit_leader');



    });
    Route::group(['prefix'=>'subleader','middleware'=>'is_subleader'],function(){

        Route::get('/', 'SubLeader\SubLeaderController@index')->name('sublead_after_login');

        //CREAT REQUEST
        Route::get('/create', 'SubLeader\CreateRequestController@index')->name('crequest_subleader');
        Route::post('/create', 'SubLeader\CreateRequestController@save')->name('crequest_subleader');

        //INDIVIDUAL REQUEST
        Route::get('/individual', 'SubLeader\ShowIndividualRequestController@index')->name('show_indi_subleader');
        Route::get('/individual/new', 'SubLeader\ShowIndividualRequestController@new')->name('show_indi_subleader_new');
        Route::get('/individual/inprogress', 'SubLeader\ShowIndividualRequestController@inprogress')->name('show_indi_subleader_inprogress');
        Route::get('/individual/resolved', 'SubLeader\ShowIndividualRequestController@resolved')->name('show_indi_subleader_resolved');
        Route::get('/individual/outofdate', 'SubLeader\ShowIndividualRequestController@outofdate')->name('show_indi_subleader_outofdate');

        //RELEVANT REQUEST
        Route::get('/relevant', 'SubLeader\ShowRelevantRequestController@index')->name('sublead_show_rale_all');
        Route::get('/relevant/new', 'SubLeader\ShowRelevantRequestController@index')->name('sublead_show_rale_new');
        Route::get('/relevant/improgcess', 'SubLeader\ShowRelevantRequestController@index')->name('sublead_show_rele_improgress');
        Route::get('/relevant/resolved', 'SubLeader\ShowRelevantRequestController@index')->name('sublead_show_rele_resolved');
        Route::get('/relevant/outofdate', 'SubLeader\ShowRelevantRequestController@index')->name('sublead_show_rele_outofdate');

        //ASSIGN REQUEST
        Route::get('/assign', 'SubLeader\ShowAssignController@index')->name('sublead_show_assign');
        Route::get('/assign/new', 'SubLeader\ShowAssignController@new')->name('sublead_show_assign_new');
        Route::get('/assign/inprogress', 'SubLeader\ShowAssignController@inprogress')->name('sublead_show_assign_inprogresss');
        Route::get('/assign/feedback', 'SubLeader\ShowAssignController@feedback')->name('sublead_show_assign_feedback');
        Route::get('/assign/outofdate', 'SubLeader\ShowAssignController@outofdate')->name('sublead_show_assign_outofdate');

        //TEAM REQUEST
        Route::get('/team', 'SubLeader\ShowTeamController@index')->name('sublead_show_team');
        Route::get('/team/new', 'SubLeader\ShowTeamController@new')->name('sublead_show_team_new');
        Route::get('/team/inprogress', 'SubLeader\ShowTeamController@inprogress')->name('sublead_show_team_inprogress');
        Route::get('/team/feedback', 'SubLeader\ShowTeamController@feedback')->name('sublead_show_team_feedback');
        Route::get('/team/outofdate', 'SubLeader\ShowTeamController@outofdate')->name('sublead_show_team_outofdate');
        Route::get('/team/close', 'SubLeader\ShowTeamController@close')->name('sublead_show_team_close');

        //VIEW REQUEST
        Route::get('/view/{id}', 'SubLeader\EditRequestController@index')->name('srequest_view_subleader');
        Route::post('/view/{id}', 'SubLeader\EditRequestController@edit')->name('srequest_view_subleader');

    });

    Route::group(['prefix'=>'member','middleware'=>'is_member'],function(){

        Route::get('/', 'Member\MemberController@index')->name('member_after_login');

        //CREATE REQUEST
        Route::get('/create-member', 'Member\CreateRequestController@index')->name('crequest_member');
        Route::post('/create-member', 'Member\CreateRequestController@save')->name('crequest_member');

        //INDIVIDUAL REQUEST
        Route::get('/individual', 'Member\ShowIndividualRequestController@index')->name('mem_show_indi');
        Route::get('/individual/new', 'Member\ShowIndividualRequestController@new')->name('mem_show_indi_new');
        Route::get('/individual/inprogress', 'Member\ShowIndividualRequestController@inprogress')->name('mem_show_indi_inprogress');
        Route::get('/individual/resolved', 'Member\ShowIndividualRequestController@resolved')->name('mem_show_indi_resolved');
        Route::get('/individual/outofdate', 'Member\ShowIndividualRequestController@outofdate')->name('mem_show_indi_outofdate');

        //RELEVANT REQUEST
        Route::get('/individual', 'Member\ShowIndividualRequestController@index')->name('mem_show_indi');
        Route::get('/individual/new', 'Member\ShowIndividualRequestController@new')->name('mem_show_indi_new');
        Route::get('/individual/inprogress', 'Member\ShowIndividualRequestController@inprogress')->name('mem_show_indi_inprogress');
        Route::get('/individual/resolved', 'Member\ShowIndividualRequestController@resolved')->name('mem_show_indi_resolved');
        Route::get('/individual/outofdate', 'Member\ShowIndividualRequestController@outofdate')->name('mem_show_indi_outofdate');

        //ASSIGN REQUEST
        Route::get('/assign', 'Member\ShowAssignController@index')->name('mem_show_assign');
        Route::get('/assign/new', 'Member\ShowAssignController@new')->name('mem_show_assign_new');
        Route::get('/assign/inprogress', 'Member\ShowAssignController@inprogress')->name('mem_show_assign_inprogress');
        Route::get('/assign/feedback', 'Member\ShowAssignController@feedback')->name('mem_show_assign_feedback');
        Route::get('/assign/outofdate', 'Member\ShowAssignController@outofdate')->name('mem_show_assign_outofdate');

        //VIEW
        Route::get('/view/{id}', 'Member\ShowEditRequestController@index')->name('srequest_view_member');
        Route::post('/view/{id}', 'Member\EditRequestController@edit')->name('srequest_view_member');


    });


});
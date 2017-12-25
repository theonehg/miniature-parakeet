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

    //Tạo yêu cầu
    Route::get('/create-leader', 'Leader\CreateRequestController@index')->name('crequest_leader');
    Route::post('/create-leader', 'Leader\CreateRequestController@save')->name('crequest_leader');

    Route::get('/create-subleader', 'SubLeader\CreateRequestController@index')->name('crequest_subleader');
    Route::post('/create-subleader', 'SubLeader\CreateRequestController@save')->name('crequest_subleader');

    Route::get('/create-member', 'Member\CreateRequestController@index')->name('crequest_member');
    Route::post('/create-member', 'Member\CreateRequestController@save')->name('crequest_member');

    //show cong viec yeu cau
    //leader
    Route::get('/individual-leader', 'Leader\ShowIndividualRequestController@index')->name('show_indi_leader');
    Route::get('/individual-leader/new', 'Leader\ShowIndividualRequestController@new')->name('show_indi_leader_new');
    Route::get('/individual-leader/inprogress', 'Leader\ShowIndividualRequestController@inprogress')->name('show_indi_leader_improgress');
    Route::get('/individual-leader/resolved', 'Leader\ShowIndividualRequestController@resolved')->name('show_indi_leader_resolved');
    Route::get('/individual-leaderu/outofdate', 'Leader\ShowIndividualRequestController@outofdate')->name('show_indi_leader_outofdate');
    //subleader
    Route::get('/individual-subleader', 'SubLeader\ShowIndividualRequestController@index')->name('show_indi_subleader');
    Route::get('/individual-subleader/new', 'SubLeader\ShowIndividualRequestController@new')->name('show_indi_subleader_new');
    Route::get('/individual-subleader/inprogress', 'SubLeader\ShowIndividualRequestController@inprogress')->name('show_indi_subleader_improgress');
    Route::get('/individual-subleader/resolved', 'SubLeader\ShowIndividualRequestController@resolved')->name('show_indi_subleader_resolved');
    Route::get('/individual-subleader/outofdate', 'SubLeader\ShowIndividualRequestController@outofdate')->name('show_indi_subleader_outofdate');

    //member
    Route::get('/individual-member', 'Member\ShowIndividualRequestController@index')->name('mem_show_indi');
    Route::get('/individual-member/new', 'Member\ShowIndividualRequestController@new')->name('mem_show_indi_new');
    Route::get('/individual-member/improgcess', 'Member\ShowIndividualRequestController@improgcess')->name('mem_show_indi_improgcess');
    Route::get('/individual-member/resolved', 'Member\ShowIndividualRequestController@resolved')->name('mem_show_indi_resolved');
    Route::get('/individual-member/outofdate', 'Member\ShowIndividualRequestController@outofdate')->name('mem_show_indi_outofdate');

    //show cong viec lien quan
    //leader
    Route::get('/relevant-leader', 'Leader\ShowRelevantRequestController@index')->name('show_rale_all');
    Route::get('/relevant-leader/new', 'Leader\ShowRelevantRequestController@index')->name('show_rale_new');
    Route::get('/relevant-leader/improgcess', 'Leader\ShowRelevantRequestController@index')->name('show_rele_improgress');
    Route::get('/relevant-leader/resolved', 'Leader\ShowRelevantRequestController@index')->name('show_rele_resolved');
    Route::get('/relevant-leader/outofdate', 'Leader\ShowRelevantRequestController@index')->name('show_rele_outofdate');
    //subleader
    Route::get('/relevant-subleader', 'SubLeader\ShowRelevantRequestController@index')->name('sublead_show_rale_all');
    Route::get('/relevant-subleader/new', 'SubLeader\ShowRelevantRequestController@index')->name('sublead_show_rale_new');
    Route::get('/relevant-subleader/improgcess', 'SubLeader\ShowRelevantRequestController@index')->name('sublead_show_rele_improgress');
    Route::get('/relevant-subleader/resolved', 'SubLeader\ShowRelevantRequestController@index')->name('sublead_show_rele_resolved');
    Route::get('/relevant-subleader/outofdate', 'SubLeader\ShowRelevantRequestController@index')->name('sublead_show_rele_outofdate');

    //member
    Route::get('/relevant-member', 'Member\ShowRelavantController@index')->name('mem_show_rele');
    Route::get('/relevant-member/new', 'Member\ShowRelavantController@new')->name('mem_show_rele_new');
    Route::get('/relevant-member/improgcess', 'Member\ShowRelavantController@improgcess')->name('mem_show_rele_improcess');
    Route::get('/relevant-member/resolved', 'Member\ShowRelavantController@resolved')->name('mem_show_rele_resolved');
    Route::get('/relevant-member/outofdate', 'Member\ShowRelavantController@outofdate')->name('mem_show_rele_outofdate');


    //SHOW CONG VIEC TOI DUOC GIAO
    //leader
    Route::get('/assign-leader', 'Leader\ShowAssignRequestController@index')->name('show_assign_all');
    Route::get('/assign-leader/new', 'Leader\ShowAssignRequestController@new')->name('show_assign_new');
    Route::get('/assign-leader/improgcess', 'Leader\ShowAssignRequestController@improgcess')->name('show_assign_improgcess');
    Route::get('/assign-leader/feedback', 'Leader\ShowAssignRequestController@feedback')->name('show_assign_feedback');
    Route::get('/assign-leader/outofdate', 'Leader\ShowAssignRequestController@outofdate')->name('show_assign_outofdate');


    Route::get('/assign-subleader', 'SubLeader\ShowAssignController@index')->name('sublead_show_assign');
    Route::get('/assign-subleader/new', 'SubLeader\ShowAssignController@new')->name('sublead_show_assign_new');
    Route::get('/assign-subleader/improgcess', 'SubLeader\ShowAssignController@improgcess')->name('sublead_show_assign_improgcess');
    Route::get('/assign-subleader/feedback', 'SubLeader\ShowAssignController@feedback')->name('sublead_show_assign_feedback');
    Route::get('/assign-subleader/outofdate', 'SubLeader\ShowAssignController@outofdate')->name('sublead_show_assign_outofdate');

    Route::get('/assign-member', 'Member\ShowAssignController@index')->name('mem_show_assign');
    Route::get('/assign-member/new', 'Member\ShowAssignController@new')->name('mem_show_assign_new');
    Route::get('/assign-member/improgcess', 'Member\ShowAssignController@improgcess')->name('mem_show_assign_improgcess');
    Route::get('/assign-member/feedback', 'Member\ShowAssignController@feedback')->name('mem_show_assign_feedback');
    Route::get('/assign-member/outofdate', 'Member\ShowAssignController@outofdate')->name('mem_show_assign_outofdate');

    //SHOW CONG VIEC CUA TEAM
    //leader
    Route::get('/team-leader', 'Leader\ShowTeamRequestController@index')->name('show_team');
    Route::get('/team-leader/new', 'Leader\ShowTeamRequestController@new')->name('show_team_new');
    Route::get('/team-leader/improgcess', 'Leader\ShowTeamRequestController@improgcess')->name('show_team_improgcess');
    Route::get('/team-leader/feedback', 'Leader\ShowTeamRequestController@feedback')->name('show_team_feedback');
    Route::get('/team-leader/outofdate', 'Leader\ShowTeamRequestController@outofdate')->name('show_team_outofdate');
    Route::get('/team-leader/close', 'Leader\ShowTeamRequestController@close')->name('show_team_close');
    //subleader
    Route::get('/team-subleader', 'SubLeader\ShowTeamController@index')->name('sublead_show_team');
    Route::get('/team-subleader/new', 'SubLeader\ShowTeamController@new')->name('sublead_show_team_new');
    Route::get('/team-subleader/improgcess', 'SubLeader\ShowTeamController@improgcess')->name('sublead_show_team_improgcess');
    Route::get('/team-subleader/feedback', 'SubLeader\ShowTeamController@feedback')->name('sublead_show_team_feedback');
    Route::get('/team-subleader/outofdate', 'SubLeader\ShowTeamController@outofdate')->name('sublead_show_team_outofdate');
    Route::get('/team-subleader/close', 'SubLeader\ShowTeamController@close')->name('sublead_show_team_close');

    //CÔNG VIỆC CỦA BỘ PHẬN
    Route::get('/dept-leader', 'Leader\ShowDepartmentRequestController@index')->name('show_dept');
    Route::get('/dept-leader/new', 'Leader\ShowDepartmentRequestController@new')->name('show_dept_new');
    Route::get('/dept-leader/improgcess', 'Leader\ShowDepartmentRequestController@improgcess')->name('show_dept_improgcess');
    Route::get('/dept-leader/feedback', 'Leader\ShowDepartmentRequestController@feedback')->name('show_dept_feedback');
    Route::get('/dept-leader/outofdate', 'Leader\ShowDepartmentRequestController@outofdate')->name('show_dept_outofdate');
    Route::get('/dept-leader/close', 'Leader\ShowDepartmentRequestController@close')->name('show_dept_close');


    //edit cac yeu cau
    Route::get('/edit-leader/{id}', 'Leader\ShowEditRequestController@index')->name('srequest_edit_leader');
    Route::post('/edit-leader/{id}', 'Leader\ShowEditRequestController@edit')->name('srequest_edit_leader');

    Route::get('/edit-subleader/{id}', 'SubLeader\EditRequestController@index')->name('srequest_edit_leader');
    Route::post('/edit-subleader/{id}', 'SubLeader\EditRequestController@edit')->name('srequest_edit_leader');

    Route::get('/edit-member/{id}', 'Member\ShowEditRequestController@index')->name('srequest_edit_member');
    Route::post('/edit-member/{id}', 'Member\EditRequestController@edit')->name('srequest_edit_leader');
});
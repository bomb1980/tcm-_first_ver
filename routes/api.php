<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Protected routes
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('users/list', [App\Http\Controllers\Api\usersController::class, 'getUsers'])->name('api.users.list');

    Route::get('request/request1_1/list', [App\Http\Controllers\Api\Request\Request1_1Controller::class, 'getRequest1_1'])->name('api.request.request1_1.list');

    Route::get('config/branchtype/list', [App\Http\Controllers\Api\config\branchtypeController::class, 'getBranchType'])->name('api.config.branchtype.list');
    Route::get('config/users/list', [App\Http\Controllers\Api\config\usersController::class, 'getUsers'])->name('api.config.users.list');
    Route::get('config/job/list', [App\Http\Controllers\Api\config\JobController::class, 'getJob'])->name('api.config.job.list');

    Route::get('config/department/list', [App\Http\Controllers\Api\config\departmentController::class, 'getDepartment'])->name('api.config.department.list');
    Route::get('config/position/list', [App\Http\Controllers\Api\config\positionController::class, 'getPosition'])->name('api.config.position.list');
    Route::get('config/ex_position/list', [App\Http\Controllers\Api\config\ex_positionsController::class, 'getEx_Position'])->name('api.config.ex_position.list');
    Route::get('config/positionle/list', [App\Http\Controllers\Api\config\positionleController::class, 'getPositionle'])->name('api.config.positionle.list');
    Route::get('config/usergroup/list', [App\Http\Controllers\Api\config\usergroupController::class, 'getUsergroup'])->name('api.config.usergroup.list');

    Route::post('getProfile', [App\Http\Controllers\Api\eofficeContreller::class, 'profile'])->name('api.profile');
    Route::post('getAuthProfile', [App\Http\Controllers\Api\eofficeContreller::class, 'authProfile'])->name('api.authprofile');

    Route::get('master/fiscalyear/list', [App\Http\Controllers\Api\Master\FiscalyearController::class, 'getFiscalyear'])->name('api.master.fiscalyear.list');

    Route::get('master/coursegroup/list', [App\Http\Controllers\Api\Master\CoursegroupController::class, 'getCoursegroup'])->name('api.master.coursegroup.list');
    Route::get('master/coursesubgroup/list', [App\Http\Controllers\Api\Master\CoursesubgroupController::class, 'getCoursesubgroup'])->name('api.master.coursesubgroup.list');
    Route::get('master/course/list', [App\Http\Controllers\Api\Master\CourseController::class, 'getCourse'])->name('api.master.course.list');
    Route::get('master/ownertype/list', [App\Http\Controllers\Api\Master\OwnertypeController::class, 'getOwnertype'])->name('api.master.ownertype.list');
    Route::get('master/coursetype/list', [App\Http\Controllers\Api\Master\CoursetypeController::class, 'getCoursetype'])->name('api.master.coursetype.list');
    Route::get('master/buildingtype/list', [App\Http\Controllers\Api\Master\BuildingtypeController::class, 'getBuildingtype'])->name('api.master.buildingtype.list');
    Route::get('master/troubletype/list', [App\Http\Controllers\Api\Master\TroubletypeController::class, 'getTroubletype'])->name('api.master.troubletype.list');
    Route::get('master/cmleader/list', [App\Http\Controllers\Api\Master\CmleaderController::class, 'getCmleader'])->name('api.master.cmleader.list');
    Route::get('master/lecturer/list', [App\Http\Controllers\Api\Master\LecturerController::class, 'getlecturer'])->name('api.master.lecturer.list');
    Route::get('master/assessment_topic/list', [App\Http\Controllers\Api\Master\AssessmentTopicController::class, 'getassessment_topic'])->name('api.master.assessment_topic.list');

    Route::get('request/request2_3/list', [App\Http\Controllers\Api\Request\Request2_3Controller::class, 'getRequest2_3'])->name('api.request.request2_3.list');

    Route::get('request/sum_list/list', [App\Http\Controllers\Api\Request\Sum_ListController::class, 'getSumlist'])->name('api.request.sum_list.list');

    Route::get('request/reqform/list', [App\Http\Controllers\Api\Request\ReqformController::class, 'getReqform'])->name('api.request.reqform.list');

    Route::get('request/request2_1/list', [App\Http\Controllers\Api\Request\Request2_1Controller::class, 'getRequest'])->name('api.request.request2_1.list');

    // Route::get('master/lecturer/list', [App\Http\Controllers\Api\Master\LecturerController::class, 'getlecturer'])->name('api.master.lecturer.list');
    Route::get('request/request3_3/list', [App\Http\Controllers\Api\Request\Request3_3Controller::class, 'getRequest'])->name('api.request.request3_3.list');

    Route::get('activity/ready_confirm/list', [App\Http\Controllers\Api\Activity\Ready_ConfirmController::class, 'getAct'])->name('api.activity.ready_confirm.list');
    Route::get('request/reqform_seperate/list', [App\Http\Controllers\Api\Request\ReqformController::class, 'getReqform_seperate'])->name('api.request.reqform_seperate.list');

    Route::get('request/reqform_years_noti/detail', [App\Http\Controllers\Api\Request\ReqformController::class, 'getReqformYearsNoti'])->name('api.request.reqform_years_noti.detail');

    Route::get('manage/receivetransfer/list', [App\Http\Controllers\Api\Manage\ReceiveTransferController::class, 'getRequest'])->name('api.manage.receivetransfer.list');
    Route::get('permission_list', [App\Http\Controllers\Api\PermissionController::class, 'permission_list'])->name('api.permission.list');
});


Route::post('gettoken', [App\Http\Controllers\Auth\LoginController::class, 'gettoken']);

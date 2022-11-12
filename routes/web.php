<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);


Route::get('/survey/{reqform_id}', [App\Http\Controllers\report\surveyController::class, 'survey'])->name('survey');

Route::get('loginbyname', [App\Http\Controllers\Auth\LoginController::class, 'loginbyname'])->name('api.auth.checkUsername');


Route::group(['middleware' => 'auth'], function () {

    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'user'], function () {


        Route::get('/', [App\Http\Controllers\report\Dashboard3Controller::class, 'index'])->name('home');
        Route::get('/home', [App\Http\Controllers\report\Dashboard3Controller::class, 'index']);

        Route::get(
            '/config/users_list',
            [App\Http\Controllers\config\usersController::class, 'index']
        )->name('config.users.index');
        Route::get(
            '/config/users/create',
            [App\Http\Controllers\config\usersController::class, 'create']
        )->name('config.users.create');
        Route::get('config/users/{id}/edit', [App\Http\Controllers\config\usersController::class, 'edit'])->name('config.users.edit');
        Route::get('config/users/{id}/status', [App\Http\Controllers\config\usersController::class, 'status'])->name('config.users.status');
        Route::delete('config/users/{id}', [App\Http\Controllers\config\usersController::class, 'destroy'])->name('config.users.delete');


        Route::get(
            '/config/job_list',
            [App\Http\Controllers\config\JobController::class, 'index']
        )->name('config.job.index');
        Route::get(
            '/config/job/create',
            [App\Http\Controllers\config\JobController::class, 'create']
        )->name('config.job.create');
        Route::get('config/job/{id}/edit', [App\Http\Controllers\config\JobController::class, 'edit'])->name('config.job.edit');
        Route::get('config/job/{id}/status', [App\Http\Controllers\config\JobController::class, 'status'])->name('config.job.status');
        Route::delete('config/job/{id}', [App\Http\Controllers\config\JobController::class, 'destroy'])->name('config.job.delete');


        Route::get(
            '/config/branchtype_list',
            [App\Http\Controllers\config\branchtypeController::class, 'index']
        )->name('config.branchtype.index');
        Route::get(
            '/config/branchtype/create',
            [App\Http\Controllers\config\branchtypeController::class, 'create']
        )->name('config.branchtype.create');
        Route::get('config/branchtype/{id}/edit', [App\Http\Controllers\config\branchtypeController::class, 'edit'])->name('config.branchtype.edit');
        Route::get('config/branchtype/{id}/status', [App\Http\Controllers\config\branchtypeController::class, 'status'])->name('config.branchtype.status');
        Route::delete('config/branchtype/{id}', [App\Http\Controllers\config\branchtypeController::class, 'destroy'])->name('config.branchtype.delete');

        Route::get(
            '/config/department_list',
            [App\Http\Controllers\config\departmentController::class, 'index']
        )->name('config.department.index');
        Route::get(
            '/config/department/create',
            [App\Http\Controllers\config\departmentController::class, 'create']
        )->name('config.department.create');
        Route::get('config/department/{id}/edit', [App\Http\Controllers\config\departmentController::class, 'edit'])->name('config.department.edit');
        Route::get('config/department/{id}/status', [App\Http\Controllers\config\departmentController::class, 'status'])->name('config.department.status');
        Route::delete('config/department/{id}', [App\Http\Controllers\config\departmentController::class, 'destroy'])->name('config.department.delete');

        Route::get(
            '/config/position_list',
            [App\Http\Controllers\config\positionController::class, 'index']
        )->name('config.position.index');
        Route::get(
            '/config/position/create',
            [App\Http\Controllers\config\positionController::class, 'create']
        )->name('config.position.create');
        Route::get('config/position/{id}/edit', [App\Http\Controllers\config\positionController::class, 'edit'])->name('config.position.edit');
        Route::get('config/position/{id}/status', [App\Http\Controllers\config\positionController::class, 'status'])->name('config.position.status');
        Route::delete('config/position/{id}', [App\Http\Controllers\config\positionController::class, 'destroy'])->name('config.position.delete');

        Route::get(
            '/config/positionle_list',
            [App\Http\Controllers\config\positionleController::class, 'index']
        )->name('config.positionle.index');
        Route::get(
            '/config/positionle/create',
            [App\Http\Controllers\config\positionleController::class, 'create']
        )->name('config.positionle.create');
        Route::get('config/positionle/{id}/edit', [App\Http\Controllers\config\positionleController::class, 'edit'])->name('config.positionle.edit');
        Route::get('config/positionle/{id}/status', [App\Http\Controllers\config\positionleController::class, 'status'])->name('config.positionle.status');
        Route::delete('config/positionle/{id}', [App\Http\Controllers\config\positionleController::class, 'destroy'])->name('config.positionle.delete');

        Route::get(
            '/config/ex_position_list',
            [App\Http\Controllers\config\ex_positionsController::class, 'index']
        )->name('config.ex_position.index');
        Route::get(
            '/config/ex_position/create',
            [App\Http\Controllers\config\ex_positionsController::class, 'create']
        )->name('config.ex_position.create');
        Route::get('config/ex_position/{id}/edit', [App\Http\Controllers\config\ex_positionsController::class, 'edit'])->name('config.ex_position.edit');
        Route::get('config/ex_position/{id}/status', [App\Http\Controllers\config\ex_positionsController::class, 'status'])->name('config.ex_position.status');
        Route::delete('config/ex_position/{id}', [App\Http\Controllers\config\ex_positionsController::class, 'destroy'])->name('config.ex_position.delete');

        Route::get(
            '/config/usergroup_list',
            [App\Http\Controllers\config\usergroupController::class, 'index']
        )->name('config.usergroup.index');
        Route::get(
            '/config/usergroup/create',
            [App\Http\Controllers\config\usergroupController::class, 'create']
        )->name('config.usergroup.create');
        Route::get('config/usergroup/{id}/edit', [App\Http\Controllers\config\usergroupController::class, 'edit'])->name('config.usergroup.edit');
        Route::get('config/usergroup/{id}/status', [App\Http\Controllers\config\usergroupController::class, 'status'])->name('config.usergroup.status');
        Route::delete('config/usergroup/{id}', [App\Http\Controllers\config\usergroupController::class, 'destroy'])->name('config.usergroup.delete');

        Route::get(
            '/config/tokenMonitor',
            [App\Http\Controllers\config\tokenMonitorController::class, 'index']
        )->name('config.tokenMonitor.index');

        Route::get(
            '/config/apiMonitor',
            [App\Http\Controllers\config\apiMonitorController::class, 'index']
        )->name('config.apiMonitor.index');
        Route::get(
            '/config/apiMonitor/create',
            [App\Http\Controllers\config\apiMonitorController::class, 'create']
        )->name('config.apiMonitor.create');

        Route::get(
            '/testConectOracle_list',
            [App\Http\Controllers\testConectOracleController::class, 'index']
        )->name('testConectOracle.index');

        Route::get(
            '/dpistoumts',
            [App\Http\Controllers\DpisToUmts::class, 'create']
        )->name('dpistoumts.create');

        // role admin and super admin
        // Route::get('/user',   [App\Http\Controllers\UserController::class, 'index'])->name('auth.user');
        // Route::get('/admin',   [App\Http\Controllers\AdminController::class, 'index'])->name('auth.admin');
        // Route::get('/superadmin',   [App\Http\Controllers\SuperAdminController::class, 'index'])->name('auth.superadmin');

        // Route::get('/master/center_list',[App\Http\Controllers\Master\CenterController::class, 'index'])->name('master.center.index');
        // Route::get('/master/center/create',[App\Http\Controllers\Master\CenterController::class, 'create'])->name('master.center.create');


        // Route::get('/master/lecturer', [App\Http\Controllers\Master\LecturerController::class, 'index'])->name('master.lecturer.index');
        // Route::get('/master/lecturer/create', [App\Http\Controllers\Master\LecturerController::class, 'create'])->name('master.lecturer.create');
        // Route::get('/master/lecturer/{id}/edit', [App\Http\Controllers\Master\LecturerController::class, 'edit'])->name('master.lecturer.edit');
        // Route::delete('/master/lecturer/{id}', [App\Http\Controllers\Master\LecturerController::class, 'destroy'])->name('master.lecturer.destroy');

        // Route::get('master/callAjax/{courseno}', [App\Http\Controllers\AjaxController::class, 'courseno_relat']);

        Route::get('/request/request1_1', [App\Http\Controllers\Request\Request1_1Controller::class, 'index'])->name('request.request1.request1_1.index');
        Route::get('/request/request1_1/create', [App\Http\Controllers\Request\Request1_1Controller::class, 'create'])->name('request.request1.request1_1.create');
        Route::get('/request/request1_1/{id}/edit', [App\Http\Controllers\Request\Request1_1Controller::class, 'edit'])->name('request.request1.request1_1.edit');
        Route::delete('/request/request1_1/{id}', [App\Http\Controllers\Request\Request1_1Controller::class, 'destroy'])->name('request.request1.request1_1.destroy');

        Route::get('/request/request2_1', [App\Http\Controllers\Request\Request2_1Controller::class, 'index'])->name('request.request2_1.index');
        Route::get('/request/request2_1/create', [App\Http\Controllers\Request\Request2_1Controller::class, 'create'])->name('request.request2_1.create');
        Route::get('/request/request2_1/{id}/edit', [App\Http\Controllers\Request\Request2_1Controller::class, 'edit'])->name('request.request2_1.edit');

        Route::get('/request/request2_2', [App\Http\Controllers\Request\Request2_2Controller::class, 'index'])->name('request.request2_2.index');
        Route::get('/request/request2_2/create', [App\Http\Controllers\Request\Request2_2Controller::class, 'create'])->name('request.request2_2.create');
        Route::get('/request/request2_2/{id}/edit', [App\Http\Controllers\Request\Request2_2Controller::class, 'edit'])->name('request.request2_2.edit');

        Route::get('/request/request2_3', [App\Http\Controllers\Request\Request2_3Controller::class, 'index'])->name('request.request2_3.index');

        Route::get('/master/fiscalyear', [App\Http\Controllers\Master\FiscalyearController::class, 'index'])->name('master.fiscalyear.index');
        Route::get('/master/fiscalyear/create', [App\Http\Controllers\Master\FiscalyearController::class, 'create'])->name('master.fiscalyear.create');
        Route::get('/master/fiscalyear/{id}/edit', [App\Http\Controllers\Master\FiscalyearController::class, 'edit'])->name('master.fiscalyear.edit');
        Route::delete('/master/fiscalyear/{id}', [App\Http\Controllers\Master\FiscalyearController::class, 'destroy'])->name('master.fiscalyear.destroy');

        Route::get('/master/coursegroup', [App\Http\Controllers\Master\CoursegroupController::class, 'index'])->name('master.coursegroup.index');
        Route::get('/master/coursegroup/create', [App\Http\Controllers\Master\CoursegroupController::class, 'create'])->name('master.coursegroup.create');
        Route::get('/master/coursegroup/{id}/edit', [App\Http\Controllers\Master\CoursegroupController::class, 'edit'])->name('master.coursegroup.edit');
        Route::delete('/master/coursegroup/{id}', [App\Http\Controllers\Master\CoursegroupController::class, 'destroy'])->name('master.coursegroup.destroy');

        Route::get('/master/coursesubgroup', [App\Http\Controllers\Master\CoursesubgroupController::class, 'index'])->name('master.coursesubgroup.index');
        Route::get('/master/coursesubgroup/create', [App\Http\Controllers\Master\CoursesubgroupController::class, 'create'])->name('master.coursesubgroup.create');
        Route::get('/master/coursesubgroup/{id}/edit', [App\Http\Controllers\Master\CoursesubgroupController::class, 'edit'])->name('master.coursesubgroup.edit');
        Route::delete('/master/coursesubgroup/{id}', [App\Http\Controllers\Master\CoursesubgroupController::class, 'destroy'])->name('master.coursesubgroup.destroy');

        Route::get('/master/course', [App\Http\Controllers\Master\CourseController::class, 'index'])->name('master.course.index');
        Route::get('/master/course/create', [App\Http\Controllers\Master\CourseController::class, 'create'])->name('master.course.create');
        Route::get('/master/course/{id}/edit', [App\Http\Controllers\Master\CourseController::class, 'edit'])->name('master.course.edit');
        Route::delete('/master/course/{id}', [App\Http\Controllers\Master\CourseController::class, 'destroy'])->name('master.course.destroy');

        Route::get('/master/assessment_topic', [App\Http\Controllers\Master\AssessmentTopicController::class, 'index'])->name('master.assessment_topic.index');
        Route::get('/master/assessment_topic/create', [App\Http\Controllers\Master\AssessmentTopicController::class, 'create'])->name('master.assessment_topic.create');
        Route::get('/master/assessment_topic/{id}/edit', [App\Http\Controllers\Master\AssessmentTopicController::class, 'edit'])->name('master.assessment_topic.edit');
        Route::delete('/master/assessment_topic/{id}', [App\Http\Controllers\Master\AssessmentTopicController::class, 'destroy'])->name('master.assessment_topic.destroy');

        Route::get('file/view/{files_gen}', [App\Http\Controllers\File\FileController::class, 'view'])->name('file.view');
        // Route::get('file/view_type/{type}/{files_gen}', [App\Http\Controllers\File\FileController::class, 'view_type'])->name('file.view_type');

        Route::get('/master/ownertype', [App\Http\Controllers\Master\OwnertypeController::class, 'index'])->name('master.ownertype.index');
        Route::get('/master/ownertype/create', [App\Http\Controllers\Master\OwnertypeController::class, 'create'])->name('master.ownertype.create');
        Route::get('/master/ownertype/{id}/edit', [App\Http\Controllers\Master\OwnertypeController::class, 'edit'])->name('master.ownertype.edit');
        Route::delete('/master/ownertype/{id}', [App\Http\Controllers\Master\OwnertypeController::class, 'destroy'])->name('master.ownertype.destroy');

        Route::get('/master/coursetype', [App\Http\Controllers\Master\CoursetypeController::class, 'index'])->name('master.coursetype.index');
        Route::get('/master/coursetype/create', [App\Http\Controllers\Master\CoursetypeController::class, 'create'])->name('master.coursetype.create');
        Route::get('/master/coursetype/{id}/edit', [App\Http\Controllers\Master\CoursetypeController::class, 'edit'])->name('master.coursetype.edit');
        Route::delete('/master/coursetype/{id}', [App\Http\Controllers\Master\CoursetypeController::class, 'destroy'])->name('master.coursetype.destroy');

        Route::get('/master/buildingtype', [App\Http\Controllers\Master\BuildingtypeController::class, 'index'])->name('master.buildingtype.index');
        Route::get('/master/buildingtype/create', [App\Http\Controllers\Master\BuildingtypeController::class, 'create'])->name('master.buildingtype.create');
        Route::get('/master/buildingtype/{id}/edit', [App\Http\Controllers\Master\BuildingtypeController::class, 'edit'])->name('master.buildingtype.edit');
        Route::delete('/master/buildingtype/{id}', [App\Http\Controllers\Master\BuildingtypeController::class, 'destroy'])->name('master.buildingtype.destroy');

        Route::get('/master/troubletype', [App\Http\Controllers\Master\TroubletypeController::class, 'index'])->name('master.troubletype.index');
        Route::get('/master/troubletype/create', [App\Http\Controllers\Master\TroubletypeController::class, 'create'])->name('master.troubletype.create');
        Route::get('/master/troubletype/{id}/edit', [App\Http\Controllers\Master\TroubletypeController::class, 'edit'])->name('master.troubletype.edit');
        Route::delete('/master/troubletype/{id}', [App\Http\Controllers\Master\TroubletypeController::class, 'destroy'])->name('master.troubletype.destroy');

        Route::get('/master/cmleader', [App\Http\Controllers\Master\CmleaderController::class, 'index'])->name('master.cmleader.index');
        Route::get('/master/cmleader/create', [App\Http\Controllers\Master\CmleaderController::class, 'create'])->name('master.cmleader.create');
        Route::get('/master/cmleader/{id}/edit', [App\Http\Controllers\Master\CmleaderController::class, 'edit'])->name('master.cmleader.edit');
        Route::delete('/master/cmleader/{id}', [App\Http\Controllers\Master\CmleaderController::class, 'destroy'])->name('master.cmleader.destroy');

        Route::get('/request/reqform', [App\Http\Controllers\Request\ReqformController::class, 'index'])->name('request.reqform.index');

        Route::get('/request/request3_1', [App\Http\Controllers\Request\Request3_1Controller::class, 'index'])->name('request.request3.request3_1.index');
        Route::get('/request/request3_1/{id}/edit', [App\Http\Controllers\Request\Request3_1Controller::class, 'edit'])->name('request.request3.request3_1.edit');

        Route::get('/request/request3_2', [App\Http\Controllers\Request\Request3_2Controller::class, 'index'])->name('request.request3.request3_2.index');
        Route::get('/request/request3_2/{id}/edit', [App\Http\Controllers\Request\Request3_2Controller::class, 'edit'])->name('request.request3.request3_2.edit');

        Route::get('/request/request3_3', [App\Http\Controllers\Request\Request3_3Controller::class, 'index'])->name('request.request3.request3_3.index');

        Route::get('/request/sum_list', [App\Http\Controllers\Request\Sum_ListController::class, 'index'])->name('request.sum_list.index');

        Route::get('/manage/fiscal', [App\Http\Controllers\Manage\FiscalController::class, 'index'])->name('manage.fiscal.index');

        Route::get('/manage/installment', [App\Http\Controllers\Manage\InstallmentController::class, 'index'])->name('manage.installment.index');
        Route::get('/manage/installment/create', [App\Http\Controllers\Manage\InstallmentController::class, 'create'])->name('manage.installment.create');
        Route::get('/manage/installment/{id}/edit', [App\Http\Controllers\Manage\InstallmentController::class, 'edit'])->name('manage.installment.edit');

        Route::get('/manage/fiscalcenter', [App\Http\Controllers\Manage\FiscalcenterController::class, 'index'])->name('manage.fiscalcenter.index');
        Route::get('/manage/receivetransfer/index', [App\Http\Controllers\Manage\ReceivetransferController::class, 'index'])->name('manage.receivetransfer.index');
        Route::get('/manage/receivetransfer/create', [App\Http\Controllers\Manage\ReceivetransferController::class, 'create'])->name('manage.receivetransfer.create');
        Route::get('/manage/receivetransfer/{id}/edit', [App\Http\Controllers\Manage\ReceivetransferController::class, 'edit'])->name('manage.receivetransfer.edit');
        Route::get('/manage/allocate/create', [App\Http\Controllers\Manage\AllocateController::class, 'create'])->name('manage.allocate.create');

        Route::get('/manage/local_mng', [App\Http\Controllers\Manage\local_mng\LocalMngController::class, 'index'])->name('manage.local_mng.index');
        Route::get('/manage/local_mng/tranbackcen', [App\Http\Controllers\Manage\local_mng\LocalMngController::class, 'tranback'])->name('manage.local_mng.tranbackcen');

        Route::get('/manage/fiscalyear_cls', [App\Http\Controllers\Manage\fiscalyear_cls\Fiscalyear_ClsController::class, 'index'])->name('manage.fiscalyear_cls.index');

        Route::get('/manage/cen_depo', [App\Http\Controllers\Manage\cen_depo\Cen_DepoController::class, 'index'])->name('manage.cen_depo.index');
        Route::get('/manage/cen_depo/create', [App\Http\Controllers\Manage\cen_depo\Cen_DepoController::class, 'create'])->name('manage.cen_depo.create');
        Route::get('/manage/cen_depo/{id}/edit', [App\Http\Controllers\Manage\cen_depo\Cen_DepoController::class, 'edit'])->name('manage.cen_depo.edit');
        Route::get('/manage/follow_budget/index', [App\Http\Controllers\Manage\follow_budgetController::class, 'index'])->name('manage.follow_budget.index');


        Route::get('/activity/ready_confirm', [App\Http\Controllers\activity\ready_confirm\Ready_ConfirmController::class, 'index'])->name('activity.ready_confirm.index');
        Route::get('/activity/ready_confirm/list', [App\Http\Controllers\activity\ready_confirm\Ready_ConfirmController::class, 'list'])->name('activity.ready_confirm.list');
        Route::get('/activity/ready_confirm/hire', [App\Http\Controllers\activity\ready_confirm\Ready_ConfirmController::class, 'hire'])->name('activity.ready_confirm.hire');
        Route::get('/activity/ready_confirm/train', [App\Http\Controllers\activity\ready_confirm\Ready_ConfirmController::class, 'train'])->name('activity.ready_confirm.train');

        Route::get('/activity/tran_mng', [App\Http\Controllers\activity\tran_mng\Tran_MngController::class, 'index'])->name('activity.tran_mng.index');
        Route::get('/activity/tran_mng/manage', [App\Http\Controllers\activity\tran_mng\Tran_MngController::class, 'manage'])->name('activity.tran_mng.manage');
        Route::get('/activity/tran_mng/transfer', [App\Http\Controllers\activity\tran_mng\Tran_MngController::class, 'transfer'])->name('activity.tran_mng.transfer');
        Route::get('/activity/tran_mng/allocate', [App\Http\Controllers\activity\tran_mng\Tran_MngController::class, 'allocate'])->name('activity.tran_mng.allocate');

        Route::get('/activity/plan_adjust', [App\Http\Controllers\activity\plan_adjust\Plan_AdjustController::class, 'index'])->name('activity.plan_adjust.index');
        Route::get('/activity/plan_adjust/hire', [App\Http\Controllers\activity\plan_adjust\Plan_AdjustController::class, 'hire'])->name('activity.plan_adjust.hire');
        Route::get('/activity/plan_adjust/train', [App\Http\Controllers\activity\plan_adjust\Plan_AdjustController::class, 'train'])->name('activity.plan_adjust.train');

        Route::get('/activity/act_detail', [App\Http\Controllers\activity\act_detail\Act_DetailController::class, 'index'])->name('activity.act_detail.index');
        Route::get('/activity/act_detail/create', [App\Http\Controllers\activity\act_detail\Act_DetailController::class, 'create'])->name('activity.act_detail.create');

        Route::get('/activity/other_expense', [App\Http\Controllers\activity\other_expense\OtherExpenseController::class, 'index'])->name('activity.other_expense.index');
        Route::get('/activity/other_expense/create', [App\Http\Controllers\activity\other_expense\OtherExpenseController::class, 'create'])->name('activity.other_expense.create');

        Route::get('/activity/activity_image', [App\Http\Controllers\activity\activity_image\ActivityImageController::class, 'index'])->name('activity.activity_image.index');
        Route::get('/activity/activity_image/create', [App\Http\Controllers\activity\activity_image\ActivityImageController::class, 'create'])->name('activity.activity_image.create');
        Route::get('/activity/activity_image/images', [App\Http\Controllers\activity\activity_image\ActivityImageController::class, 'images'])->name('activity.activity_image.images');

        Route::get('/activity/assessment', [App\Http\Controllers\activity\assessment\AssessmentController::class, 'index'])->name('activity.assessment.index');
        Route::get('/activity/assessment/create', [App\Http\Controllers\activity\assessment\AssessmentController::class, 'create'])->name('activity.assessment.create');
        Route::get('/activity/participant', [App\Http\Controllers\activity\participant\ParticipantController::class, 'index'])->name('activity.participant.index');

        Route::get('/activity/participant/create/{reqform_id}', [App\Http\Controllers\activity\participant\ParticipantController::class, 'create'])->name('activity.participant.create');

        Route::get('/master/lecturer', [App\Http\Controllers\Master\LecturerController::class, 'index'])->name('master.lecturer.index');
        Route::get('/master/lecturer/create', [App\Http\Controllers\Master\LecturerController::class, 'create'])->name('master.lecturer.create');
        Route::get('/master/lecturer/{id}/edit', [App\Http\Controllers\Master\LecturerController::class, 'edit'])->name('master.lecturer.edit');
        Route::delete('/master/lecturer/{id}', [App\Http\Controllers\Master\LecturerController::class, 'destroy'])->name('master.lecturer.destroy');

        Route::get('/activity/join_activity', [App\Http\Controllers\activity\join_activity\JoinActivityController::class, 'index'])->name('activity.join_activity.index');
        Route::get('/activity/join_activity/create', [App\Http\Controllers\activity\join_activity\JoinActivityController::class, 'create'])->name('activity.join_activity.create');

        Route::get('/report/dashboard1', [App\Http\Controllers\report\Dashboard1Controller::class, 'index'])->name('report.dashboard1.index');
        Route::get('/report/dashboard2', [App\Http\Controllers\report\Dashboard2Controller::class, 'index'])->name('report.dashboard2.index');
        Route::get('/report/dashboard3', [App\Http\Controllers\report\Dashboard3Controller::class, 'index'])->name('report.dashboard3.index');
        Route::get('/report/dashboard4', [App\Http\Controllers\report\Dashboard3Controller::class, 'repoer4'])->name('report.dashboard4.index');
        Route::get('/report/dashboard5', [App\Http\Controllers\report\Dashboard3Controller::class, 'repoer5'])->name('report.dashboard5.index');
        Route::get('/report/dashboard6', [App\Http\Controllers\report\Dashboard3Controller::class, 'repoer6'])->name('report.dashboard6.index');

        Route::get('/activity/recordattendance', [App\Http\Controllers\activity\assessment\RecordattendanceController::class, 'index'])->name('activity.recordattendance.index');
        Route::get('/activity/recordattendance/create/{reqform_id}', [App\Http\Controllers\activity\assessment\RecordattendanceController::class, 'create'])->name('activity.recordattendance.create');

        Route::get('/permission_list', [App\Http\Controllers\Permission\PermissionController::class, 'index'])->name('permission.index');
        Route::get('/permission/create', [App\Http\Controllers\Permission\PermissionController::class, 'create'])->name('permission.create');
        Route::get('permission/{id}/edit', [App\Http\Controllers\Permission\PermissionController::class, 'edit'])->name('permission.edit');
        Route::get('permission/{id}/status', [App\Http\Controllers\Permission\PermissionController::class, 'status'])->name('permission.status');
        Route::delete('permission/{id}', [App\Http\Controllers\Permission\PermissionController::class, 'destroy'])->name('permission.delete');

        Route::get(
            '/grouppermission/create',
            [App\Http\Controllers\Permission\GroupPermissionController::class, 'index']
        )->name('grouppermission.index');


        Route::get(
            '/operate',
            [App\Http\Controllers\activity\operate\OperateController::class, 'index']
        )->name('operate.index');


        Route::get('/master/estimate', [App\Http\Controllers\Master\EstimateActivityController::class, 'index'])->name('master.estimate.index');
        Route::get('/master/estimate/create', [App\Http\Controllers\Master\EstimateActivityController::class, 'create'])->name('master.estimate.create');
        Route::get('/master/estimate/{id}/edit', [App\Http\Controllers\Master\EstimateActivityController::class, 'edit'])->name('master.estimate.edit');
        Route::delete('/master/estimate/{id}', [App\Http\Controllers\Master\EstimateActivityController::class, 'destroy'])->name('master.estimate.destroy');
    });

    // Route::group(['middleware' => 'role:ROLE_Admin'], function () {


});

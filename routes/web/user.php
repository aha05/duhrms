<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\VacancyRequestController;
use App\Http\Controllers\VacancyApprovalController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeStatusController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TempController;


Route::middleware( ['auth', 'role:Admin'])->group(function () {

});
Route::middleware( ['auth'])->group(function () {
    Route::get('/account/{user}', [UserController::class, 'index'])->name('account')->middleware('can:view,user');
    Route::delete('/account/{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
    //? Role
    Route::put('/{user}/attachRole', [UserController::class, 'attachRole'])->name('user.attach.role');
    Route::put('/{user}/detachRole', [UserController::class, 'detachRole'])->name('user.detach.role');
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/allroles', [RoleController::class, 'allroles'])->name('roles.all');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::put('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edits');
    Route::put('/roles/{role}/update', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{role}/destroy', [RoleController::class, 'destroy'])->name('roles.destroy');
    //? Permission
    Route::put('/{role}/attach', [RoleController::class, 'attachPermission'])->name('role.permission.attach');
    Route::put('/{role}/detach', [RoleController::class, 'detachPermission'])->name('role.permission.detach');

    //? Report
    Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::get('/report/pdf', [ReportController::class, 'generatePDF'])->name('generatePDF');
    Route::get('/view/pdf', [ReportController::class, 'viewPDF'])->name('view');
    Route::get('/reports/export/excel', [ReportController::class, 'generateExcel'])->name('generateExcel');
    Route::get('/reports/import/excel', [ReportController::class, 'importExcelDisplay'])->name('importExcel');
    Route::post('/reports/import/excel', [ReportController::class, 'importExcel'])->name('importExcel');

    //? Report employee information
     Route::get('/employee/report', [ReportController::class, 'employeeInfo'])->name('report.employee.info');
     Route::get('/employee/report/excel', [ReportController::class, 'employeeExcel'])->name('employee.excel.generate');
     Route::get('/employee/report/pdf', [ReportController::class, 'employeePdf'])->name('employee.pdf.generate');

     //? Report leave information
     Route::get('/leave/report', [ReportController::class, 'leaveInfo'])->name('report.leave.info');
     Route::get('/leave/report/excel', [ReportController::class, 'leaveExcel'])->name('leave.excel.generate');
     Route::get('/leave/report/pdf', [ReportController::class, 'leavePdf'])->name('leave.pdf.generate');




    //? Employee
    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
    Route::get('/employee/registration', [PersonController::class, 'index'])->name('register.employee');
    Route::post('/employee/registration', [EmployeeController::class, 'register'])->name('register.employee');
    Route::post('/employee/register', [PersonController::class, 'register'])->name('employee.register');
    Route::put('/employee/{employee}/edit', [EmployeeController::class, 'editEmployee'])->name('employee.edit');
    Route::get('/employee/{person}/details', [EmployeeController::class, 'details'])->name('employee.details');
    Route::get('/employee/{person}/show', [EmployeeController::class, 'show'])->name('employee.show');
    Route::delete('/employee/{person}/destroy', [PersonController::class, 'destroy'])->name('employee.destroy');
    Route::get('/employee/profile', [EmployeeController::class, 'employeeProfile'])->name('employee.profile');
    Route::get('/employee/{id}/status', [EmployeeController::class, 'changeEmployeeStatus'])->name('change.employee.status');

    Route::get('/employee/trash', [PersonController::class, 'trash'])->name('employee.trash');
    Route::put('/employee/{person}/restore', [PersonController::class, 'restore'])->name('employee.restore.person');
    Route::put('/employee/restore/all', [PersonController::class, 'restoreAll'])->name('employee.restore.all');

    Route::delete('/employee/remove/all', [PersonController::class, 'removeAll'])->name('employee.remove.all');
    Route::delete('/employee/{person}/remove/current', [PersonController::class, 'remove'])->name('employee.remove');

    Route::put('/employee/{person}/update', [EmployeeController::class, 'updatePerson'])->name('update.person');
    Route::put('/employee/{person}/photo/update', [EmployeeController::class, 'updatePersonPhoto'])->name('update.person.photo');
    Route::put('/employee/{contact}/contact/update', [EmployeeController::class, 'updateContact'])->name('update.contact');
    Route::put('/employee/{employee}/compBenefit/update', [EmployeeController::class, 'comp_benefit'])->name('comp.benefit');
    Route::post('/employee/{employee}/education/add', [EmployeeController::class, 'addEducation'])->name('add.education');
    Route::put('/employee/{id}/education/update', [EmployeeController::class, 'editEducation'])->name('update.education');
    Route::put('/employee/{employee}/education/edit', [EmployeeController::class, 'editEducation'])->name('education.edit');
    Route::put('/employee/{employee}/bank/edit', [EmployeeController::class, 'editBank'])->name('bank.edit');
    Route::post('/employee/{employee}/experience/add', [EmployeeController::class, 'addExperience'])->name('experience.add');
    Route::post('/employee/{id}/experience/edit', [EmployeeController::class, 'editExperience'])->name('experience.edit');

    Route::get('/empEdit/{edus}', function($edus){

        return view('partials._modal', ['edus'=>$edus]);
    })->name('emp.Edit');

    //? Leaves
    Route::get('/employee/leaves', [LeaveController::class, 'index'])->name('leaves');
    Route::post('/employee/create/leaveType', [LeaveController::class, 'createLeaveType'])->name('leave.type');
    Route::get('/employee/leave/types', [LeaveController::class, 'leaveTypes'])->name('leave.types');

    Route::get('/employee/leave/{request}/approve', [LeaveController::class, 'pendingLeave'])->name('leave.approve');
    Route::post('/employee/leave/{request}/approver', [LeaveController::class, 'leaveApprover'])->name('leave.approver');

    Route::get('/employee/leave/pending', [LeaveController::class, 'pendingLeaves'])->name('leave.pending');
    Route::get('/employee/leave/rejected', [LeaveController::class, 'rejectedLeaves'])->name('leave.rejected');
    Route::get('/employee/leave/approved', [LeaveController::class, 'approvedLeaves'])->name('leave.approved');
    Route::put('/employee/request/{leave}/update', [LeaveController::class, 'updateLeaveRequest'])->name('leave.request.update');

    Route::get('/employee/leave/exit/{id}/form', [LeaveController::class, 'exitFrom'])->name('leave.exit.form');
    // Route::get('/employee/leave/exit/forms', [LeaveController::class, 'exitFrom'])->name('leave.exit.form');
    Route::post('/employee/leave/exit/id/form', [LeaveController::class, 'exitFromStore'])->name('leave.exit.form.store');



    // ? Department
    Route::get('/department', [DepartmentController::class, 'index'])->name('department');
    Route::post('/department', [DepartmentController::class, 'create'])->name('department.add');
    Route::put('/department', [DepartmentController::class, 'create'])->name('department.edit');
    Route::delete('/department/{department}', [DepartmentController::class, 'destroy'])->name('department.destroy');

    //? Vacancy
    Route::resource('vacancy-requests', VacancyRequestController::class);
    Route::get('/vacancy/{vacancyRequest}/approval', [VacancyApprovalController::class, 'index'])->name('vacancy.approval');
    Route::post('/vacancy/{vacancyRequest}/approve', [VacancyApprovalController::class, 'approve'])->name('vacancy.approve');
    Route::post('/vacancy/requests', [VacancyRequestController::class, 'filterByDepartment'])->name('vacancy.filter.department');
    Route::get('/vacancy/requests', [VacancyRequestController::class, 'filterByDepartment'])->name('vacancy.filter.department');

    //? Applicant
    Route::resource('applicants', ApplicantController::class);
    Route::post('applicants/{applicant}/approve', [ApplicantController::class, 'store'])->name('approve.applicants');
    Route::get('/file/{filename}/show', [ApplicantController::class, 'showFile'])->name('file.show');
    //? Feedback
    Route::get('feedback', [AdminController::class, 'feedback'])->name('admin.feedback');
    Route::get('feedback/{id}/display', [AdminController::class, 'showFeedback'])->name('admin.feedback.display');
    Route::get('feedback/{id}/show', [AdminController::class, 'destroyFeedback'])->name('admin.feedback.destroy');

    //? Announcement-job
       Route::get('announcement/posts', [AdminController::class, 'jobs'])->name('admin.job.posts');
       Route::get('announcement/create/job', [AdminController::class, 'createJob'])->name('admin.create.job');
       Route::post('announcement/post/job', [AdminController::class, 'storeJob'])->name('admin.post.job');
       Route::get('announcement/job/{id}/details', [AdminController::class, 'showJob'])->name('admin.job.details');

       Route::delete('announcement/job/{id}/delete', [AdminController::class, 'deleteJob'])->name('admin.job.delete');
       Route::get('announcement/edit/{id}/job', [AdminController::class, 'editJob'])->name('admin.job.edit');
       Route::put('announcement/update/{id}/job', [AdminController::class, 'updateJob'])->name('admin.job.update');

    //? Announcement-notice
        Route::get('announcement/post/notice', [AdminController::class, 'createNotice'])->name('admin.post.notice');
        Route::post('announcement/notice/post', [AdminController::class, 'storeNotice'])->name('admin.store.notice');
        Route::get('announcement/notice/{id}/details', [AdminController::class, 'showJob'])->name('admin.notice.details');
        Route::get('announcement/all/notices', [AdminController::class, 'allNotices'])->name('admin.notices');
        Route::get('announcement/show/{id}/notice', [AdminController::class, 'showNotice'])->name('admin.show.notices');

        Route::get('announcement/edit/{id}/notice', [AdminController::class, 'editNotices'])->name('admin.edit.notice');
        Route::put('announcement/update/{notice}/notice', [AdminController::class, 'updateNotice'])->name('admin.update.notice');
        Route::delete('announcement/destroy/{id}/notice', [AdminController::class, 'destroyNotice'])->name('admin.destroy.notice');

        Route::get('/loginActivity', [AdminController::class, 'LoginActivity'])->name('loginActivity');



});



Route::middleware(['auth', /*'can:view, user'*/])->group(function () { //! can:view is policy and user is model passed to the policy
    Route::get('/{user}/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/{user}/profile', [UserController::class, 'update'])->name('profile');
    Route::get('user/{user}/profile/edit', [UserController::class, 'userProfileEdit'])->name('user.profile.edit');
    Route::put('user/{user}/profile/update', [UserController::class, 'userProfileUpdate'])->name('user.profile.update');
    Route::get('/chart', [ChartController::class, 'index'])->name('chart');
    Route::get('/employee/leave', [LeaveController::class, 'leaveHistory'])->name('leaves.history');
    Route::get('/employee/request/form', [LeaveController::class, 'createLeaveRequest'])->name('leave.request.form');
    Route::post('/employee/leave/request', [LeaveController::class, 'storeLeaveRequest'])->name('leave.request');
});

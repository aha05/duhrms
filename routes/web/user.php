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


Route::middleware('role:Admin')->group(function () {
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
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.stores');
    Route::put('/{role}/attach', [RoleController::class, 'attachPermission'])->name('role.permission.attach');
    Route::put('/{role}/detach', [RoleController::class, 'detachPermission'])->name('role.permission.detach');
    Route::put('/permissions/{permission}/update', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('/permissions/{permission}/destroy', [PermissionController::class, 'destroy'])->name('permissions.destroy');
    Route::put('/permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::get('/permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edits');

    //? Report
    Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::get('/report/pdf', [ReportController::class, 'generatePDF'])->name('generatePDF');
    Route::get('/view/pdf', [ReportController::class, 'viewPDF'])->name('view');
    Route::get('/reports/export/excel', [ReportController::class, 'generateExcel'])->name('generateExcel');
    Route::get('/reports/import/excel', [ReportController::class, 'importExcelDisplay'])->name('importExcel');
    Route::post('/reports/import/excel', [ReportController::class, 'importExcel'])->name('importExcel');

    //? Employee
    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
    Route::get('/employee/registration', [PersonController::class, 'index'])->name('register.employee');
    Route::post('/employee/registration', [EmployeeController::class, 'register'])->name('register.employee');
    Route::post('/employee/register', [PersonController::class, 'register'])->name('employee.register');
    Route::put('/employee/{employee}/edit', [EmployeeController::class, 'editEmployee'])->name('employee.edit');
    Route::get('/employee/{person}/details', [EmployeeController::class, 'details'])->name('employee.details');
    Route::delete('/employee/{person}/destroy', [PersonController::class, 'destroy'])->name('employee.destroy');

    Route::put('/employee/{person}/update', [EmployeeController::class, 'updatePerson'])->name('update.person');
    Route::put('/employee/{person}/photo/update', [EmployeeController::class, 'updatePersonPhoto'])->name('update.person.photo');
    Route::put('/employee/{contact}/contact/update', [EmployeeController::class, 'updateContact'])->name('update.contact');
    Route::put('/employee/{employee}/compBenefit/update', [EmployeeController::class, 'comp_benefit'])->name('comp.benefit');
    Route::post('/employee/{employee}/education/add', [EmployeeController::class, 'addEducation'])->name('add.education');
    Route::put('/employee/{employee}/education/update', [EmployeeController::class, 'editEducation'])->name('update.education');
    Route::put('/employee/{employee}/education/edit', [EmployeeController::class, 'editEducation'])->name('education.edit');
    Route::put('/employee/{employee}/bank/edit', [EmployeeController::class, 'editBank'])->name('bank.edit');
    Route::post('/employee/{employee}/bank/edit', [EmployeeController::class, 'addExperience'])->name('experience.add');

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




});

Route::middleware(['auth', /*'can:view, user'*/])->group(function () { //! can:view is policy and user is model passed to the policy
    Route::get('/{user}/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/{user}/profile', [UserController::class, 'update'])->name('profile');
    Route::get('/chart', [ChartController::class, 'index'])->name('chart');
    Route::get('/employee/leave', [LeaveController::class, 'leaveHistory'])->name('leaves.history');
    Route::get('/employee/request/form', [LeaveController::class, 'createLeaveRequest'])->name('leave.request.form');
    Route::post('/employee/leave/request', [LeaveController::class, 'storeLeaveRequest'])->name('leave.request');
});

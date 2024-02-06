@extends('layouts.layout')
@section('content')
    <?php
    $id = 0;
    ?>
    @if (session()->has('error'))
        <script>
            toastr.error('{{ session('error') }}');
        </script>
    @endif
    @if (session()->has('success'))
        <script>
            toastr.success('{{ session('success') }}');
        </script>
    @endif

    <div class="container" style="margin-left:5%; ">
        <div class="mt-2" style="margin-left:15%;">
            <h3 class="card-title">Edit Role</h3>
            <p class="card-subtitle mb-2 text-muted">Edit role permissions</p>
        </div>
        <!-- Add role form -->
        @if (session()->has('role-updated'))
            <div class="alert alert-success w-50">{{ session('role-updated') }}</div>
        @endif
        <form id="addRoleForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"
            action="{{ route('roles.update', $role) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-12 mt-5 fv-plugins-icon-container mt-5">
                <label for="name" class="form-label">{{ __('Role Name') }}</label>
                <input id="name" type="text" class="form-control w-50 @error('name') is-invalid @enderror"
                    name="name" value="{{ $role->name }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            @if ($permissions->isNotEmpty())
                <div class="col-12 mt-3">
                    <h4>Role Permissions</h4>
                    <!-- Permission table -->
                    <div class="table-responsive overflow overflow-y"style="height: 20rem;">
                        <table class="table table-flush-spacing  w-75">
                            <tbody>
                                <tr>
                                    <td class="text-nowrap fw-semibold">Administrator Access <i
                                            class="bx bx-info-circle bx-xs" data-bs-toggle="tooltip" data-bs-placement="top"
                                            aria-label="Allows a full access to the system"
                                            data-bs-original-title="Allows a full access to the system"></i></td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="select-all">
                                            <label class="form-check-label" for="select-all">
                                                Select All
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-semibold">Role and Permission</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="row">
                                                <div class="checkbox form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox" id="all-role">
                                                    <label class="form-check-label" for="all-role">
                                                        Select all
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="checkbox form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="roleCreate">
                                                    <label class="form-check-label" for="roleCreate">
                                                        Create
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="roleDelete">
                                                    <label class="form-check-label" for="roleDelete">
                                                        Delete
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="roleUpdate">
                                                    <label class="form-check-label" for="roleUpdate">
                                                        Update
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="roleView">
                                                    <label class="form-check-label" for="roleView">
                                                        View
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-semibold">User Management</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="row">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox" id="all-user">
                                                    <label class="form-check-label" for="all-user">
                                                        Select All
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="userCreate">
                                                    <label class="form-check-label" for="userCreate">
                                                        Create
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="userDelete">
                                                    <label class="form-check-label" for="userDelete">
                                                        Delete
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="userUpdate">
                                                    <label class="form-check-label" for="userUpdate">
                                                        Update
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="userView">
                                                    <label class="form-check-label" for="userView">
                                                        View
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-semibold">Employee Info Managment</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="row">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        id="all-employee">
                                                    <label class="form-check-label" for="all-employee">
                                                        Select all
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="employeeCreate">
                                                    <label class="form-check-label" for="employeeCreate">
                                                        Create
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="employeeDelete">
                                                    <label class="form-check-label" for="employeeDelete">
                                                        Delete
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="employeeUpdate">
                                                    <label class="form-check-label" for="employeeUpdate">
                                                        Update
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"
                                                        id="employeeView">
                                                    <label class="form-check-label" for="employeeView">
                                                        View
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-semibold">Department</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="row">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        id="all-department">
                                                    <label class="form-check-label" for="all-department">
                                                        Sellect all
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="departmentCreate">
                                                    <label class="form-check-label" for="departmentCreate">
                                                        Create
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="departmentDelete">
                                                    <label class="form-check-label" for="departmentDelete">
                                                        Delete
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="departmentUpdate">
                                                    <label class="form-check-label" for="departmentUpdate">
                                                        Update
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="departmentView">
                                                    <label class="form-check-label" for="departmentView">
                                                        View
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-semibold">Leave Management: leave type</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="row">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        id="all-leave_type">
                                                    <label class="form-check-label" for="all-leave_type">
                                                        Select all
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="leave_type_create">
                                                    <label class="form-check-label" for="leaveCreate">
                                                        Create
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="leave_type_delete">
                                                    <label class="checkbox form-check-label" for="leaveDelete">
                                                        Delete
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="leave_type_update">
                                                    <label class="form-check-label" for="leaveUpdate">
                                                        Update
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="leave_type_view">
                                                    <label class="form-check-label" for="leaveView">
                                                        View
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-semibold">Leave Management: leave request</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="row">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        id="all-leave">
                                                    <label class="form-check-label" for="all-leave">
                                                        Select all
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="leaveCreate">
                                                    <label class="form-check-label" for="leaveCreate">
                                                        Create
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="leaveDelete">
                                                    <label class="checkbox form-check-label" for="leaveDelete">
                                                        Delete
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="leaveUpdate">
                                                    <label class="form-check-label" for="leaveUpdate">
                                                        Update
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="leaveView">
                                                    <label class="form-check-label" for="leaveView">
                                                        View
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-semibold">Leave Management: leave approval</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="row">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        id="all-leave_approval">
                                                    <label class="form-check-label" for="all-leave">
                                                        Select all
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="leave_create">
                                                    <label class="form-check-label" for="leaveCreate">
                                                        Create
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="leave_delete">
                                                    <label class="checkbox form-check-label" for="leaveDelete">
                                                        Delete
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="leave_update">
                                                    <label class="form-check-label" for="leaveUpdate">
                                                        Update
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="leave_view">
                                                    <label class="form-check-label" for="leaveView">
                                                        View
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-semibold">Vacancy request</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="row">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        id="all-vacancy">
                                                    <label class="form-check-label" for="all-vacancy">
                                                        Select All
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="vacancyCreate">
                                                    <label class="form-check-label" for="vacancyCreate">
                                                        Create
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="vacancyDelete">
                                                    <label class="form-check-label" for="vacancyDelete">
                                                        Delete
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="vacancyUpdate">
                                                    <label class="form-check-label" for="vacancyUpdate">
                                                        Update
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="vacancyView">
                                                    <label class="form-check-label" for="vacancyView">
                                                        View
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-semibold">Vacancy: approval</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="row">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        id="all_vacancy_approval">
                                                    <label class="form-check-label" for="all_vacancy_approval">
                                                        Select All
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"
                                                        id="vacancy_create">
                                                    <label class="form-check-label" for="vacancyCreate">
                                                        Create
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="vacancy_delete">
                                                    <label class="form-check-label" for="vacancyDelete">
                                                        Delete
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="vacancy_update">
                                                    <label class="form-check-label" for="vacancyUpdate">
                                                        Update
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="vacancy_view">
                                                    <label class="form-check-label" for="vacancyView">
                                                        View
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-semibold">Reporting</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="row">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        id="all-report">
                                                    <label class="form-check-label" for="all-report">
                                                        Select all
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="reportCreate">
                                                    <label class="form-check-label" for="reportCreate">
                                                        Generate report
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="reportDelete">
                                                    <label class="form-check-label" for="reportDelete">
                                                        View report
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-semibold">Announcement: jobs</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="row">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        id="all-announcement">
                                                    <label class="form-check-label" for="all-announcement">
                                                        Select all
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-check col-6 me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="job_create">
                                                    <label class="form-check-label" for="job_create">
                                                        Post Jobs
                                                    </label>
                                                </div>
                                                <div class="form-check col-6 me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="job_delete">
                                                    <label class="form-check-label" for="job_delete">
                                                        Delete
                                                    </label>
                                                </div>

                                                <div class="form-check col-6 me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="job_update">
                                                    <label class="form-check-label" for="job_update">
                                                        Update
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="checkbox col-6 form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="job_lists_view">
                                                    <label class="form-check-label" for="job_lists_view">
                                                        View table
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-semibold">Announcement: notices</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="row">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        id="all-notice">
                                                    <label class="form-check-label" for="all-announcement">
                                                        Select all
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-check col-6 me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="notice_create">
                                                    <label class="form-check-label" for="notice_create">
                                                        Post notices
                                                    </label>
                                                </div>
                                                <div class="form-check col-6 me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="notice_delete">
                                                    <label class="form-check-label" for="notice_delete">
                                                        Delete
                                                    </label>
                                                </div>

                                                <div class="form-check col-6 me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="notice_update">
                                                    <label class="form-check-label" for="notice_update">
                                                        Update
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="checkbox col-6 form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="notice_view">
                                                    <label class="form-check-label" for="notice_view">
                                                        View table
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-semibold">Others</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="row">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        id="all-other">
                                                    <label class="form-check-label" for="all-announcement">
                                                        Select all
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-check col-6 me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="dashboard">
                                                    <label class="form-check-label" for="announcementCreate">
                                                        view dashboard
                                                    </label>
                                                </div>
                                                <div class="form-check col-6 me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"
                                                        id="view_applicants">
                                                    <label class="form-check-label" for="announcementDelete">
                                                        view applicants
                                                    </label>
                                                </div>
                                                <div class="form-check col-6 me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"

                                                        id="delete_applicants">
                                                    <label class="form-check-label" for="announcementDelete">
                                                        delete applicants
                                                    </label>
                                                </div>
                                                <div class="form-check col-6 me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"
                                                        id="approve_applicants">
                                                    <label class="form-check-label" for="announcementUpdate">
                                                        approve applicants
                                                    </label>
                                                </div>
                                                <div class="form-check col-6 me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                        @checked(true)
                                                    @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id++]->id ?? '' }}"
                                                        id="view_feedbacks">
                                                    <label class="form-check-label" for="announcementUpdate">
                                                        view feedbacks
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="checkbox col-6 form-check-input" type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                        @if ($role_permission->slug == $permissions[$id]->slug ?? '')
                                                            @checked(true)
                                                        @endif @endforeach
                                                        name="permissions[]" value="{{ $permissions[$id]->id ?? '' }}"
                                                        id="delete_feedbacks">
                                                    <label class="form-check-label" for="announcementView">
                                                        delete feedbacks
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            @endif
            <!-- Permission table -->
    </div>
    <div class="col-12 text-center">
        <button type="submit" class="btn btn-primary me-sm-3 me-1">Update</button>
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
            aria-label="Close">Cancel</button>
    </div>
    <input type="hidden">
    </form>

    <!--/ Add role form -->
    </div>

    <script>
        // JavaScript/jQuery
        $(document).ready(function() {
            // Event handler for the "Select All" checkbox
            $("#select-all").click(function() {
                $(".checkbox").prop("checked", $(this).prop("checked"));
            });
        });
    </script>
    <script>
        // JavaScript/jQuery
        $(document).ready(function() {
            // Event handler for the "Select All" checkbox
            $("#all-role").click(function() {
                var selectAllChecked = $(this).prop("checked");

                $("#roleCreate").prop("checked", selectAllChecked);
                $("#roleDelete").prop("checked", selectAllChecked);
                $("#roleUpdate").prop("checked", selectAllChecked);
                $("#roleView").prop("checked", selectAllChecked);
                // Add more lines for additional checkboxes based on their IDs
            });

            $("#all-user").click(function() {
                var selectAllChecked = $(this).prop("checked");

                $("#userCreate").prop("checked", selectAllChecked);
                $("#userDelete").prop("checked", selectAllChecked);
                $("#userUpdate").prop("checked", selectAllChecked);
                $("#userView").prop("checked", selectAllChecked);
                // Add more lines for additional checkboxes based on their IDs
            });

            $("#all-employee").click(function() {
                var selectAllChecked = $(this).prop("checked");

                $("#employeeCreate").prop("checked", selectAllChecked);
                $("#employeeDelete").prop("checked", selectAllChecked);
                $("#employeeUpdate").prop("checked", selectAllChecked);
                $("#employeeView").prop("checked", selectAllChecked);
                // Add more lines for additional checkboxes based on their IDs
            });

            $("#all-department").click(function() {
                var selectAllChecked = $(this).prop("checked");

                $("#departmentCreate").prop("checked", selectAllChecked);
                $("#departmentDelete").prop("checked", selectAllChecked);
                $("#departmentUpdate").prop("checked", selectAllChecked);
                $("#departmentView").prop("checked", selectAllChecked);
                // Add more lines for additional checkboxes based on their IDs
            });

            $("#all-leave_type").click(function() {
                var selectAllChecked = $(this).prop("checked");

                $("#leave_type_create").prop("checked", selectAllChecked);
                $("#leave_type_delete").prop("checked", selectAllChecked);
                $("#leave_type_update").prop("checked", selectAllChecked);
                $("#leave_type_view").prop("checked", selectAllChecked);
                // Add more lines for additional checkboxes based on their IDs
            });

            $("#all-leave").click(function() {
                var selectAllChecked = $(this).prop("checked");

                $("#leaveCreate").prop("checked", selectAllChecked);
                $("#leaveDelete").prop("checked", selectAllChecked);
                $("#leaveUpdate").prop("checked", selectAllChecked);
                $("#leaveView").prop("checked", selectAllChecked);
                // Add more lines for additional checkboxes based on their IDs
            });

            $("#all-leave_approval").click(function() {
                var selectAllChecked = $(this).prop("checked");

                $("#leave_create").prop("checked", selectAllChecked);
                $("#leave_delete").prop("checked", selectAllChecked);
                $("#leave_update").prop("checked", selectAllChecked);
                $("#leave_view").prop("checked", selectAllChecked);
                // Add more lines for additional checkboxes based on their IDs
            });

            $("#all-vacancy").click(function() {
                var selectAllChecked = $(this).prop("checked");

                $("#vacancyCreate").prop("checked", selectAllChecked);
                $("#vacancyDelete").prop("checked", selectAllChecked);
                $("#vacancyUpdate").prop("checked", selectAllChecked);
                $("#vacancyView").prop("checked", selectAllChecked);
                // Add more lines for additional checkboxes based on their IDs
            });

            $("#all_vacancy_approval").click(function() {
                var selectAllChecked = $(this).prop("checked");

                $("#vacancy_create").prop("checked", selectAllChecked);
                $("#vacancy_delete").prop("checked", selectAllChecked);
                $("#vacancy_update").prop("checked", selectAllChecked);
                $("#vacancy_view").prop("checked", selectAllChecked);
                // Add more lines for additional checkboxes based on their IDs
            });

            $("#all-report").click(function() {
                var selectAllChecked = $(this).prop("checked");

                $("#reportCreate").prop("checked", selectAllChecked);
                $("#reportDelete").prop("checked", selectAllChecked);
                $("#reportUpdate").prop("checked", selectAllChecked);
                $("#reportView").prop("checked", selectAllChecked);
                // Add more lines for additional checkboxes based on their IDs
            });

            $("#all-announcement").click(function() {
                var selectAllChecked = $(this).prop("checked");

                $("#job_create").prop("checked", selectAllChecked);
                $("#job_delete").prop("checked", selectAllChecked);
                $("#job_update").prop("checked", selectAllChecked);
                $("#job_lists_view").prop("checked", selectAllChecked);
                // Add more lines for additional checkboxes based on their IDs
            });

            $("#all-notice").click(function() {
                var selectAllChecked = $(this).prop("checked");

                $("#notice_create").prop("checked", selectAllChecked);
                $("#notice_delete").prop("checked", selectAllChecked);
                $("#notice_update").prop("checked", selectAllChecked);
                $("#notice_view").prop("checked", selectAllChecked);
                // Add more lines for additional checkboxes based on their IDs
            });

            $("#all-other").click(function() {
                var selectAllChecked = $(this).prop("checked");

                $("#dashboard").prop("checked", selectAllChecked);
                $("#view_applicants").prop("checked", selectAllChecked);
                $("#delete_applicants").prop("checked", selectAllChecked);
                $("#approve_applicants").prop("checked", selectAllChecked);
                $("#view_feedbacks").prop("checked", selectAllChecked);
                $("#delete_feedbacks").prop("checked", selectAllChecked);
                // Add more lines for additional checkboxes based on their IDs
            });
        });
    </script>
@endsection

@extends('layouts.layout')
@section('content')
    <?php
    $id = 0;
    ?>
    <div class="card ms-5 me-5" >
        <div class="card-body">
            <div class="text-center mb-4">
                <h3 class="card-title">Add Role</h3>
                <p class="card-subtitle mb-2 text-muted">Set role permissions</p>
            </div>
            <!-- Add role form -->
            <form id="addRoleForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"
                action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="col-12 mb-4 fv-plugins-icon-container">
                    <label class="form-label" for="modalRoleName">Role Name</label>
                    <input type="text" id="modalRoleName" name="name" class="form-control w-25"
                        placeholder="Enter a role name" tabindex="-1">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <div class="col-12">
                    <h4>Role Permissions</h4>
                    <!-- Permission table -->
                    <div class="table-responsive overflow overflow-y"style="height: 20rem;">
                        <table class="table table-flush-spacing">
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
                                                        name="permissions[]" value="{{ $permissions[$id++]->id }}"
                                                        id="roleCreate">
                                                    <label class="form-check-label" for="roleCreate">
                                                        Create
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        name="permissions[]" value="{{ $permissions[$id++]->id }}"
                                                        id="roleDelete">
                                                    <label class="form-check-label" for="roleDelete">
                                                        Delete
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        name="permissions[]" value="{{ $permissions[$id++]->id }}"
                                                        id="roleUpdate">
                                                    <label class="form-check-label" for="roleUpdate">
                                                        Update
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        name="permissions[]" value="{{ $permissions[$id++]->id }}"
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
                                                        name="permissions[]" value="{{ $permissions[$id++]->id }}"
                                                        id="userCreate">
                                                    <label class="form-check-label" for="userCreate">
                                                        Create
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        name="permissions[]" value="{{ $permissions[$id++]->id }}"
                                                        id="userDelete">
                                                    <label class="form-check-label" for="userDelete">
                                                        Delete
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        name="permissions[]" value="{{ $permissions[$id++]->id }}"
                                                        id="userUpdate">
                                                    <label class="form-check-label" for="userUpdate">
                                                        Update
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        name="permissions[]" value="{{ $permissions[$id++]->id }}"
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
                                                        name="permissions[]" value="{{ $permissions[$id++]->id }}"
                                                        id="employeeCreate">
                                                    <label class="form-check-label" for="employeeCreate">
                                                        Create
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        name="permissions[]" value="{{ $permissions[$id++]->id }}"
                                                        id="employeeDelete">
                                                    <label class="form-check-label" for="employeeDelete">
                                                        Delete
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        name="permissions[]" value="{{ $permissions[$id++]->id }}"
                                                        id="employeeUpdate">
                                                    <label class="form-check-label" for="employeeUpdate">
                                                        Update
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        name="permissions[]" value="{{ $permissions[$id++]->id }}"
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
                                                        name="permissions[]" value="{{ $permissions[$id++]->id }}"
                                                        id="departmentCreate">
                                                    <label class="form-check-label" for="departmentCreate">
                                                        Create
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        name="permissions[]" value="{{ $permissions[$id++]->id }}"
                                                        id="departmentDelete">
                                                    <label class="form-check-label" for="departmentDelete">
                                                        Delete
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        name="permissions[]" value="{{ $permissions[$id++]->id }}"
                                                        id="departmentUpdate">
                                                    <label class="form-check-label" for="departmentUpdate">
                                                        Update
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        name="permissions[]" value="{{ $permissions[$id++]->id }}"
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
                                    <td class="text-nowrap fw-semibold">Leave Management</td>
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
                                                        name="permissions[]" value="{{ $permissions[$id++]->id }}"
                                                        id="leaveCreate">
                                                    <label class="form-check-label" for="leaveCreate">
                                                        Create
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        name="permissions[]" value="{{ $permissions[$id++]->id }}"
                                                        id="leaveDelete">
                                                    <label class="checkbox form-check-label" for="leaveDelete">
                                                        Delete
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        name="permissions[]" value="{{ $permissions[$id++]->id }}"
                                                        id="leaveUpdate">
                                                    <label class="form-check-label" for="leaveUpdate">
                                                        Update
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        name="permissions[]" value="{{ $permissions[$id++]->id }}"
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
                                    <td class="text-nowrap fw-semibold">Vacancy</td>
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
                                                        id="vacancyCreate">
                                                    <label class="form-check-label" for="vacancyCreate">
                                                        Create
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        id="vacancyDelete">
                                                    <label class="form-check-label" for="vacancyDelete">
                                                        Delete
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        id="vacancyUpdate">
                                                    <label class="form-check-label" for="vacancyUpdate">
                                                        Update
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="checkbox form-check-input" type="checkbox"
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
                                                        id="reportCreate">
                                                    <label class="form-check-label" for="reportCreate">
                                                        Create
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        id="reportDelete">
                                                    <label class="form-check-label" for="reportDelete">
                                                        Delete
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        id="reportUpdate">
                                                    <label class="form-check-label" for="reportUpdate">
                                                        Update
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        id="reportView">
                                                    <label class="form-check-label" for="reportView">
                                                        View
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-semibold">Announcement</td>
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
                                                        id="announcementCreate">
                                                    <label class="form-check-label" for="announcementCreate">
                                                        Create
                                                    </label>
                                                </div>
                                                <div class="form-check col-6 me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        id="announcementDelete">
                                                    <label class="form-check-label" for="announcementDelete">
                                                        Delete
                                                    </label>
                                                </div>

                                                <div class="form-check col-6 me-3 me-lg-5">
                                                    <input class="checkbox form-check-input" type="checkbox"
                                                        id="announcementUpdate">
                                                    <label class="form-check-label" for="announcementUpdate">
                                                        Update
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="checkbox col-6 form-check-input" type="checkbox"
                                                        id="announcementView">
                                                    <label class="form-check-label" for="announcementView">
                                                        View
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Permission table -->
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                        aria-label="Close">Cancel</button>
                </div>
                <input type="hidden">
            </form>
            <!--/ Add role form -->
        </div>
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

            $("#all-leave").click(function() {
                var selectAllChecked = $(this).prop("checked");

                $("#leaveCreate").prop("checked", selectAllChecked);
                $("#leaveDelete").prop("checked", selectAllChecked);
                $("#leaveUpdate").prop("checked", selectAllChecked);
                $("#leaveView").prop("checked", selectAllChecked);
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

                $("#announcementCreate").prop("checked", selectAllChecked);
                $("#announcementDelete").prop("checked", selectAllChecked);
                $("#announcementUpdate").prop("checked", selectAllChecked);
                $("#announcementView").prop("checked", selectAllChecked);
                // Add more lines for additional checkboxes based on their IDs
            });
        });
    </script>
@endsection

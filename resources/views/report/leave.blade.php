@extends('layouts.layout')
@section('content')
    <!-- DataTales Example -->
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
    <!-- Vertically centered modal -->
    @include('partials._registerEmployee')
    <div class="container p-2">
        <div class="col-6">
            <h3 class="p-2 pb-0">Dashboard><span class="text-primary"> Leave Report</span> </h3>
        </div>
        <div class="row pt-3 mb-3">
            <div class="col-4 ">
            </div>
            <div class="col-8 text-end">
                <a href="{{ route('employee.pdf.generate') }}" class="btn btn-success text-light">
                    <i class="fas fa-file-pdf"></i> PDF Genrate
                </a>
                <button type="button" data-bs-toggle="modal" data-bs-target="#EmployeeExcel" class="btn btn-success ">
                    <i class="fas fa-file-excel"></i></i>&nbsp; Export
                </button>
            </div>
        </div>

        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th>Employee ID</th>
                    <th>leave Type</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leaveRequests as $item)
                    <tr>
                        <td>{{ $item->employee->emp_id ?? '' }}</td>
                        <td>{{ $item->leaveType->name }}</td>
                        <td>{{ $item->end_date->diffForHumans() ?? '' }}</td>
                        <td>{{ $item->status ?? '' }}</td>
                        <td>
                            {{ $item->employee->departments->first()->full_name ?? '' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Personal Details Modal -->
    <div class="modal fade" id="EmployeeExcel" tabindex="-1" aria-labelledby="EmployeeExcel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title ms-4" id="EmployeeExcel">Select Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('leave.excel.generate') }}" class="p-5 pt-1"
                        method="GET">
                        @csrf
                            <div class="checkbox form-check me-3 me-lg-5 mb-3">
                                <input class="checkbox form-check-input" type="checkbox" id="select-all">
                                <label class="form-check-label" for="select_all">
                                    Select All
                                </label>
                            </div>
                                <h6>Leave Details</h6>
                        <div class="mt-4 row">
                                <div class="col-6">
                                    <div class="checkbox form-check me-3 me-lg-5">
                                        <input class="checkbox form-check-input" type="checkbox" name="columns[employee][]"
                                            value="emp_id" id="roleCreate">
                                        <label class="form-check-label" for="roleCreate">
                                            Employee Id
                                        </label>
                                    </div>
                                    <div class="checkbox form-check me-3 me-lg-5">
                                        <input class="checkbox form-check-input" type="checkbox" name="columns[people][]"
                                            value="first_name" id="roleCreate">
                                        <label class="form-check-label" for="roleCreate">
                                            First Name
                                        </label>
                                    </div>
                                    <div class="checkbox form-check me-3 me-lg-5">
                                        <input class="checkbox form-check-input" type="checkbox" name="columns[people][]"
                                            value="last_name" id="roleCreate">
                                        <label class="form-check-label" for="roleCreate">
                                            Last Name
                                        </label>
                                    </div>
                                    <div class="checkbox form-check me-3 me-lg-5">
                                        <input class="checkbox form-check-input" type="checkbox"
                                            name="columns[leave_type][]" value="leave_type" id="leave_type">
                                        <label class="form-check-label" for="leave_type">
                                            Leave Type
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="checkbox form-check me-3 me-lg-5">
                                        <input class="checkbox form-check-input" type="checkbox"
                                            name="columns[leave_requests][]" value="start_date" id="start_date">
                                        <label class="form-check-label" for="start_date">
                                            Start Date
                                        </label>
                                    </div>
                                    <div class="checkbox form-check me-3 me-lg-5">
                                        <input class="checkbox form-check-input" type="checkbox"
                                            name="columns[leave_requests][]" value="end_date" id="end_date">
                                        <label class="form-check-label" for="end_date">
                                            End Date
                                        </label>
                                    </div>
                                    <div class="checkbox form-check me-3 me-lg-5">
                                        <input class="checkbox form-check-input" type="checkbox"
                                            name="columns[leave_requests][]" value="status" id="status">
                                        <label class="form-check-label" for="status">
                                            Status
                                        </label>
                                    </div>
                                    <div class="checkbox form-check me-3 me-lg-5">
                                        <input class="checkbox form-check-input" type="checkbox"
                                            name="columns[reviewed_by][]" value="reviewed_by" id="reviewed_by">
                                        <label class="form-check-label" for="reviewed_by">
                                            Reviewed By
                                        </label>
                                    </div>
                                </div>
                            </div>
                </div>
                <div class="modal-footer justify-content-center border-0 mb-2">
                    <button type="submit" class="btn btn-success text-light">Export</button>
                </div>
                </form>
            </div>
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
@endsection

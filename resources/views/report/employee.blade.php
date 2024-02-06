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
            <h3 class="p-2 pb-0">Dashboard><span class="text-primary"> Employee Report</span> </h3>
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

        <div class="overflow-auto">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">

                <thead class="table-primary">
                    <tr>

                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>DOB</th>
                        <th>Phone</th>
                        <th>Salary</th>
                        <th>Dete of hire</th>
                        <th>status</th>
                        <th>Department</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($person as $item)
                        <tr>
                            <td>{{ $item->employee->emp_id ?? '' }}</td>
                            <td>{{ $item->first_name ?? '' }}</td>
                            <td>{{ $item->last_name ?? '' }}</td>
                            <td>{{ $item->gender ?? '' }}</td>
                            <td>{{ $item->email ?? '' }}</td>
                            <td>{{ $item->DOB->format('F d, Y') ?? '' }}</td>
                            <td>{{ $item->phonen ?? '' }}</td>
                            <td>{{ $item->employee->compensation->salary ?? '$5000' }}</td>
                            <td>
                                {{ $item->employee->date_of_hire->format('F d, Y') ?? '' }}
                            </td>
                            <td>
                                @if ($item->employee->status ?? '' == 'leave')
                                    <span class="status red"></span> {{ $item->employee->status ?? '' }}
                                @endif
                                @if ($item->employee->status ?? '' == null)
                                    <span class="status purple"></span> active {{ $item->employee->status ?? '' }}
                                @endif
                            </td>
                            <td>
                                {{ $item->employee->departments->first()->full_name ?? '' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Personal Details Modal -->
    <div class="modal fade" id="EmployeeExcel" tabindex="-1" aria-labelledby="EmployeeExcel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title ms-4" id="EmployeeExcel">Select Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('employee.excel.generate') }}" class="p-5 pt-1" method="GET">
                        @csrf
                        <div class="row">
                            <div class="checkbox form-check me-3 me-lg-5 mb-3">
                                <input class="checkbox form-check-input" type="checkbox" id="select-all">
                                <label class="form-check-label" for="select_all">
                                    Select All
                                </label>
                            </div>
                            <div class="col-4">
                                <h6>Personal Details</h6>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[people][]"
                                        value="first_name" id="roleCreate">
                                    <label class="form-check-label" for="roleCreate">
                                        First Name
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[people][]"
                                        value="middle_name" id="roleCreate">
                                    <label class="form-check-label" for="roleCreate">
                                        Middle Name
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
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[people][]"
                                        value="email" id="roleCreate">
                                    <label class="form-check-label" for="roleCreate">
                                        Email
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[people][]"
                                        value="gender" id="roleCreate">
                                    <label class="form-check-label" for="roleCreate">
                                        Gender
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[people][]"
                                        value="DOB" id="roleCreate">
                                    <label class="form-check-label" for="roleCreate">
                                        DOB
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[people][]"
                                        value="phone" id="roleCreate">
                                    <label class="form-check-label" for="roleCreate">
                                        Phone
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[people][]"
                                        value="religion" id="roleCreate">
                                    <label class="form-check-label" for="roleCreate">
                                        Religion
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[people][]"
                                        value="marital_status" id="roleCreate">
                                    <label class="form-check-label" for="roleCreate">
                                        Marital Status
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[people][]"
                                        value="NO_of_children" id="roleCreate">
                                    <label class="form-check-label" for="roleCreate">
                                        NO. of children
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[people][]"
                                        value="nationality" id="roleCreate">
                                    <label class="form-check-label" for="roleCreate">
                                        Nationality
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[people][]"
                                        value="region" id="roleCreate">
                                    <label class="form-check-label" for="roleCreate">
                                        Region
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[people][]"
                                        value="zone" id="roleCreate">
                                    <label class="form-check-label" for="roleCreate">
                                        Zone
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[people][]"
                                        value="woreda" id="roleCreate">
                                    <label class="form-check-label" for="roleCreate">
                                        Woreda
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[people][]"
                                        value="kebele" id="roleCreate">
                                    <label class="form-check-label" for="roleCreate">
                                        Kebele
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[people][]"
                                        value="date_of_registration" id="roleCreate">
                                    <label class="form-check-label" for="roleCreate">
                                        date_of_registration
                                    </label>
                                </div>

                            </div>
                            <div class="col-4">
                                <h6>Emergnecy Contact Details</h6>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox"
                                        name="columns[contact_info][]" value="first_name" id="first_name">
                                    <label class="form-check-label" for="first_name">
                                        First Name
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox"
                                        name="columns[contact_info][]" value="last_name" id="last_name">
                                    <label class="form-check-label" for="last_name">
                                        Last Name
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox"
                                        name="columns[contact_info][]" value="email" id="email">
                                    <label class="form-check-label" for="email">
                                        Email
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox"
                                        name="columns[contact_info][]" value="gender" id="gender">
                                    <label class="form-check-label" for="gender">
                                        Gender
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox"
                                        name="columns[contact_info][]" value="phone" id="phone">
                                    <label class="form-check-label" for="phone">
                                        Phone
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox"
                                        name="columns[contact_info][]" value="address" id="address">
                                    <label class="form-check-label" for="address">
                                        Address
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox"
                                        name="columns[contact_info][]" value="relationship" id="relationship">
                                    <label class="form-check-label" for="relationship">
                                        Relationship
                                    </label>
                                </div>

                                <div class="mt-3">
                                    <h6 class="text-dark">Employement History</h6>
                                    <div class="checkbox form-check me-3 me-lg-5">
                                        <input class="checkbox form-check-input" type="checkbox"
                                            name="columns[educational_info][]" value="institution" id="institution">
                                        <label class="form-check-label" for="institution">
                                            Institution
                                        </label>
                                    </div>
                                    <div class="checkbox form-check me-3 me-lg-5">
                                        <input class="checkbox form-check-input" type="checkbox"
                                            name="columns[educational_info][]" value="field" id="field">
                                        <label class="form-check-label" for="field">
                                            Field
                                        </label>
                                    </div>
                                    <div class="checkbox form-check me-3 me-lg-5">
                                        <input class="checkbox form-check-input" type="checkbox"
                                            name="columns[educational_info][]" value="level" id="level">
                                        <label class="form-check-label" for="level">
                                            Level
                                        </label>
                                    </div>
                                    <div class="checkbox form-check me-3 me-lg-5">
                                        <input class="checkbox form-check-input" type="checkbox"
                                            name="columns[educational_info][]" value="year_of_graduation"
                                            id="year_of_graduation">
                                        <label class="form-check-label" for="year_of_graduation">
                                            Year of graduation
                                        </label>
                                    </div>
                                    <div class="checkbox form-check me-3 me-lg-5">
                                        <input class="checkbox form-check-input" type="checkbox"
                                            name="columns[educational_info][]" value="GPA" id="GPA">
                                        <label class="form-check-label" for="GPA">
                                            GPA
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <h6>Employement Details</h6>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[employee][]"
                                        value="emp_id" id="roleCreate">
                                    <label class="form-check-label" for="roleCreate">
                                        Employee Id
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[employee][]"
                                        value="job_title" id="roleCreate">
                                    <label class="form-check-label" for="roleCreate">
                                        Employee Id
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[employee][]"
                                        value="position" id="roleCreate">
                                    <label class="form-check-label" for="roleCreate">
                                        position
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[employee][]"
                                        value="employment_type" id="roleCreate">
                                    <label class="form-check-label" for="roleCreate">
                                        employment_type
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[employee][]"
                                        value="date_of_hire" id="date_of_hire">
                                    <label class="form-check-label" for="date_of_hire">
                                        date_of_hire
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[employee][]"
                                        value="location" id="location">
                                    <label class="form-check-label" for="location">
                                        location
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[employee][]"
                                        value="status" id="status">
                                    <label class="form-check-label" for="status">
                                        status
                                    </label>
                                </div>

                                <div class="mt-3">
                                    <h6 class="text-dark">Experience</h6>
                                    <div class="checkbox form-check me-3 me-lg-5">
                                        <input class="checkbox form-check-input" type="checkbox"
                                            name="columns[experience][]" value="company" id="company">
                                        <label class="form-check-label" for="company">
                                            Company
                                        </label>
                                    </div>
                                    <div class="checkbox form-check me-3 me-lg-5">
                                        <input class="checkbox form-check-input" type="checkbox"
                                            name="columns[experience][]" value="position" id="position">
                                        <label class="form-check-label" for="position">
                                            Position
                                        </label>
                                    </div>
                                    <div class="checkbox form-check me-3 me-lg-5">
                                        <input class="checkbox form-check-input" type="checkbox"
                                            name="columns[experience][]" value="start_date" id="start_date">
                                        <label class="form-check-label" for="start_date">
                                            Start date
                                        </label>
                                    </div>
                                    <div class="checkbox form-check me-3 me-lg-5">
                                        <input class="checkbox form-check-input" type="checkbox"
                                            name="columns[experience][]" value="end_date" id="end_date">
                                        <label class="form-check-label" for="end_date">
                                            End date
                                        </label>
                                    </div>
                                    <div class="checkbox form-check me-3 me-lg-5">
                                        <input class="checkbox form-check-input" type="checkbox"
                                            name="columns[experience][]" value="description" id="description">
                                        <label class="form-check-label" for="description">
                                            Description
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <div class="col-4">
                                <h6 class="text-dark">Compensation Benefit</h6>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox"
                                        name="columns[compensation][]" value="salary" id="salary">
                                    <label class="form-check-label" for="salary">
                                        Salary
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox"
                                        name="columns[compensation][]" value="pay_frequency" id="pay_frequency">
                                    <label class="form-check-label" for="pay_frequency">
                                        Pay Frequency
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox"
                                        name="columns[compensation][]" value="overtime_rate" id="overtime_rate">
                                    <label class="form-check-label" for="overtime_rate">
                                        Overtime rate
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox"
                                        name="columns[compensation][]" value="bonus" id="bonus">
                                    <label class="form-check-label" for="bonus">
                                        Bonus
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[benefits][]"
                                        value="healthcare" id="healthcare">
                                    <label class="form-check-label" for="healthcare">
                                        Healthcare
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[benefits][]"
                                        value="vacation" id="vacation">
                                    <label class="form-check-label" for="vacation">
                                        Vacation
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[benefits][]"
                                        value="retirement" id="retirement">
                                    <label class="form-check-label" for="retirement">
                                        retirement
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <h6 class="text-dark">Bank Information</h6>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[bank_info][]"
                                        value="full_name" id="full_name">
                                    <label class="form-check-label" for="full_name">
                                        Full Name
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[bank_info][]"
                                        value="bank_name" id="bank_name">
                                    <label class="form-check-label" for="bank_name">
                                        Bank Name
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[bank_info][]"
                                        value="account_number" id="account_number">
                                    <label class="form-check-label" for="account_number">
                                        Account Number
                                    </label>
                                </div>
                                <div class="checkbox form-check me-3 me-lg-5">
                                    <input class="checkbox form-check-input" type="checkbox" name="columns[bank_info][]"
                                        value="account_type" id="account_type">
                                    <label class="form-check-label" for="account_type">
                                        Account Type
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

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
            <h3 class="p-2">Dashboard>Employees><span class="text-primary">Employee Profile</span> </h3>
        </div>
        <div class="row pt-1 mb-3">
            <div class="col-4 ">
            </div>
        </div>

        <div class="overflow-auto">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">

                <thead class="table-primary">
                    <tr>
                        <th>Photo</th>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>DOB</th>
                        <th>Phone</th>
                        <th>Salary</th>
                        <th>Details</th>
                    </tr>
                </thead>

                <tbody id="myTable">
                    <tr>
                        @if ($person != null)
                            <td><img src="{{ $person->photo ?? '' }}" class="rounded-circle shadow" width="50px"
                                    height="50px" alt=""></td>
                        @endif
                        <td>{{ $person->employee->emp_id ?? '' }}</td>
                        <td>{{ $person->first_name ?? '' }}</td>
                        <td>{{ $person->last_name ?? '' }}</td>
                        <td>{{ $person->gender ?? '' }}</td>
                        <td>{{ $person->email ?? '' }}</td>
                        @if ($person != null)
                            <td>{{ $person->DOB->format('F d, Y') ?? '' }}</td>
                        @endif
                        <td>{{ $person->phone ?? '' }}</td>
                        @if ($person != null)
                        <td>{{ $person->employee->compensation->salary ?? '$5000' }}</td>
                            <td>
                                <a href="{{ route('employee.show', $person ?? '') }}"
                                    class="text-decoration-none text-primary"><i class="fas fa-eye"></i>&nbsp;View</a></a>
                            </td>
                        @endif
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection

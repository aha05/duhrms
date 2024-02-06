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
            <h3 class="p-2">Dashboard><span class="text-primary">All employee</span> </h3>
        </div>
        <div class="row pt-1 mb-3">
            <div class="col-4 ">
            </div>
            <div class="col-8 text-end">
                @can('create-employees')
                    <a href="{{ route('register.employee') }}" class="btn btn-primary text-light">
                        <i class="fas fa-plus-circle"></i> Register
                    </a>
                @endcan
            </div>
        </div>

        <div class="overflow-auto">

            <table class="table table-hover" id="dataTable" style="width: 20rem;" cellspacing="0">

                <thead class="table-primary">
                    <tr>
                        <th>Photo</th>
                        <th>ID</th>
                        @if (Auth::user()->userHasRole('Admin'))
                            <td>User account</td>
                        @endif
                        <th>First Name</th>
                        <th>Last name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>DOB</th>
                        <th>Phone</th>
                        <th>Salary</th>
                        <th>Status</th>
                        <th>Details</th>
                        @can('update-employees')
                            <th>Edit</th>
                        @endcan
                        @can('destroy-employees')
                            <th>Delete</th>
                        @endcan

                    </tr>
                </thead>

                <tbody id="myTable">

                    @foreach ($person as $item)
                        <tr>
                            <td><img src="{{ $item->photo ?? '' }}" class="rounded-circle shadow" width="50px"
                                    height="50px" alt=""></td>
                            <td>{{ $item->employee->emp_id ?? '' }}</td>
                            @if (Auth::user()->userHasRole('Admin'))
                                <td>{{ $item->employee->user->name ?? 'NULL' }}</td>
                            @endif
                            <td>{{ $item->first_name ?? '' }}</td>
                            <td>{{ $item->last_name ?? '' }}</td>
                            <td>{{ $item->gender ?? '' }}</td>
                            <td>{{ $item->email ?? '' }}</td>
                            <td>{{ $item->DOB->format('F d, Y') ?? '' }}</td>
                            <td>{{ $item->phone ?? '' }}</td>
                            <td>{{ $item->employee->compensation->salary ?? '$5000' }}</td>
                            <td>
                                <div class="dropdown" style="outline: none">
                                    <button class="btn btn-link dropdown-toggle text-decoration-none" type="button"
                                        data-toggle="dropdown" style="outline: none!important">
                                        @if (($item->employee->status ?? '') == 'Active' || ($item->employee->status ?? '') == null)
                                            <span class="text-success">
                                                {{ $item->employee->status ?? 'Active' }}
                                            </span>
                                        @endif
                                        @if (($item->employee->status ?? '') == 'Leave')
                                            <span class="text-danger">
                                                {{ $item->employee->status }}
                                            </span>
                                        @endif
                                        @if (($item->employee->status ?? '') == 'Retire')
                                            <span class="text-dark">
                                                {{ $item->employee->status }}
                                            </span>
                                        @endif
                                    </button>
                                    <div class="dropdown-menu">
                                        <form action="{{ route('change.employee.status', $item->employee->id) }}">
                                            <input type="text" name="status" value="Active" style="display: none">
                                            <button class="dropdown-item btn btn-link w-100 text-success"> Active</button>
                                        </form>
                                        <form action="{{ route('change.employee.status', $item->employee->id) }}">
                                            <input type="text" name="status" value="Leave" style="display: none">
                                            <button class="dropdown-item btn btn-link w-100 text-danger"> Leave</button>
                                        </form>
                                        <form action="{{ route('change.employee.status', $item->employee->id) }}">
                                            <input type="text" name="status" value="Retire" style="display: none">
                                            <button class="dropdown-item btn btn-link w-100"> Retire</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('employee.show', $item) }}" class="text-decoration-none text-primary"><i
                                        class="fas fa-eye"></i>&nbsp;View</a></a>
                            </td>
                            @can('update-employees')
                                <td>
                                    <a href="{{ route('employee.details', $item) }}" class="btn btn-primary text-light"
                                        style="width: 5rem;"><i class="fas fa-edit"></i> Edit</a>
                                </td>
                            @endcan

                            @can('destroy-employees')
                                <td>
                                    <form method="POST" action="{{ route('employee.destroy', $item) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" style="width: 6.7rem;"><i
                                                class="fas fa-trash-alt"></i> Delete</button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-4 text-center">
            @can('destroy-employees')
                <td>
                    <form method="get" action="{{ route('employee.trash') }}">
                        @csrf

                        <button class="btn btn-danger" type="submit" style="width: 10.7rem;"><i class="fas fa-trash-alt"></i>
                            Trash Files</button>
                    </form>
                </td>
            @endcan
        </div>
    </div>
@endsection

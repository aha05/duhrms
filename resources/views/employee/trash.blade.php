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
            <h3 class="p-2">Dashboard> All employee> <span class="text-primary"> Trash</span> </h3>
        </div>
        <div class="row pt-1 mb-3">
            <div class="col-4 ">
            </div>
            <div class="col-8 text-end">

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
                        <td><img src="{{ $item->photo ?? '' }}" class="rounded-circle shadow" width="50px" height="50px"
                                alt=""></td>
                        <td>{{ $item->employee->emp_id ?? '' }}</td>
                        <td>{{ $item->first_name ?? '' }}</td>
                        <td>{{ $item->last_name ?? '' }}</td>
                        <td>{{ $item->gender ?? '' }}</td>
                        <td>{{ $item->email ?? '' }}</td>
                        <td>{{ $item->DOB->format('F d, Y') ?? '' }}</td>
                        <td>{{ $item->phone ?? '' }}</td>
                        <td>{{ $item->employee->compensation->salary ?? '$5000' }}</td>
                        @can('update-employees')
                            <td>
                                <form method="POST" action="{{ route('employee.restore.person', $item ?? '') }}">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-primary" type="submit" style="width: 6.7rem;">
                                        <i class="fas fa-undo"></i> Restore</a> </button>
                                </form>
                            </td>
                        @endcan

                        @can('destroy-employees')
                            <td>
                                <form method="POST" action="{{ route('employee.remove', $item ?? '') }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" style="width: 6.7rem;"><i
                                            class="fas fa-trash-alt"></i> Remove</button>
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
            <table class="text-center">
                <tr>
                    <td>
                        @if (!$person->isEmpty())
                        <form method="POST" action="{{ route('employee.restore.all') }}">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-primary" type="submit" style="width: 6.7rem;">
                                <i class="fas fa-undo"></i> Restore All</a> </button>
                        </form>
                    @endif
                    </td>
                    <td>
                        @if (!$person->isEmpty())
                            <form method="POST" action="{{ route('employee.remove.all') }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" style="width: 10.7rem;"><i
                                        class="fas fa-trash-alt"></i>
                                    Remove All</button>
                            </form>
                        @endif
                    </td>
                </tr>
            </table>

            @endcan
        </div>
    </div>
@endsection

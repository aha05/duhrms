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
            <h2 class="text-primary">Employee Data Recored</h2>
        </div>
        <div class="row pt-3 mb-3">
            <div class="col-4 ">
                <input type="text" id="myInput" class="form-control" width="40px" onkeyup="myFunction()"
                    placeholder="Search" title="Type in a name">
            </div>
            <div class="col-8 text-end">
                <button type="button" data-bs-toggle="modal" data-bs-target="#leaveType" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i>&nbsp; Register
                </button>
            </div>
        </div>


        <table class="table table-hover " id="sortTable" width="100%">

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
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody id="myTable">

                @foreach ($person as $item)
                    <tr>
                        <td><img src="{{ $item->photo }}" class="rounded-circle shadow" width="50px" height="50px" alt=""></td>
                        <td>{{ $item->employee->emp_id }}</td>
                        <td>{{ $item->first_name }}</td>
                        <td>{{ $item->last_name }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->DOB }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->employee->compensation->salary ?? '$5000' }}</td>
                        <td>
                            <a href="{{ route('employee.details', $item) }}" class="btn btn-secondary  mx-2 text-light"> Details</a>
                        </td>
                        <td>
                            <a  href="{{ route('employee.details', $item) }}" class="btn btn-primary text-light" style="width: 5rem;"><i class="bi bi-pencil-square"></i> Edit</a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('employee.destroy', $item) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" style="width: 6.7rem;"><i class="bi bi-trash-fill"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        $('table').dataTable({
            searching: false,
            paging: true,
            info: true
        });
        $('#sortTable').DataTable();
    </script>
@endsection

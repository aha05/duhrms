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

    <div class="container p-2">
        <div class="col-6">
            <h2 class="text-primary">Employee Leaves</h2>
        </div>
        <div class="row pt-3 mb-3">
            <div class="col-4 ">

            </div>
            <div class="col-8 text-end">
                <button type="button" data-bs-toggle="modal" data-bs-target="#leaveType" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Leave Type
                </button>
            </div>
        </div>


        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">

            <thead class="table-primary">
                <tr>
                    <th>No. </th>
                    <th>Leave Type</th>
                    <th>Description</th>
                    <th>
                        Details
                    </th>
                    <th>
                        Delete
                    </th>
                </tr>

            </thead>

            <tbody>
                @foreach ($leaveType as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>

                        <td>
                            <a class="btn btn-primary mx-2 text-light" href="#"><i class="bi bi-pencil-square"></i>
                                Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger mx-2 text-light" href="#"><i class="bi bi-trash-fill"></i>
                                Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




    {{--  Employee Leave Type Modal --}}
    <div class="modal fade" id="leaveType" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title ms-4" id="exampleModalLabel">Employee Leave Type Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('leave.type') }}" class="p-5 pt-1" method="post">
                        @csrf
                        <div class="mb-2 form-group">
                            <label for="name">Leave Type:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <div class="mb-2 form-group">
                            <label for="description">Description:</label>
                            <textarea type="text" id="description" name="description" class="form-control" rows="3"></textarea>
                        </div>
                </div>
                <div class="modal-footer justify-content-center border-0 mb-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

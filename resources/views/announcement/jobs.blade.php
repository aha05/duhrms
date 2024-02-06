@extends('layouts.layout')
@section('content')
    @if (session()->has('user-deleted'))
        <div class="alert alert-success">{{ session('user-deleted') }}</div>
    @endif



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

    <?php
    use Carbon\Carbon;
    ?>


    <div class="container p-2">
        <div class="col-6">
            <h3 class="p-2 mb-3">Dashboard>Announcement>Jobs><span class="text-primary">Post</span> </h3>
        </div>
        <div class="row pt-3 mb-3">
            <div class="col-4 ">
                <input type="text" id="myInput" class="form-control" width="40px" onkeyup="myFunction()"
                    placeholder="Search" title="Type in a name">
            </div>
            <div class="col-8 text-end">
                <a href="{{ route('admin.create.job') }}" class="btn btn-primary text-light">
                    <i class="fas fa-plus-circle"></i> Post New Job
                </a>
            </div>
        </div>
        <table class="table table-hover " width="100%">

            <thead class="table-primary">
                <tr>
                    <th>Job Code</th>
                    <th>Title</th>
                    <th>Department</th>
                    <th>Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Date</th>
                    <th>Details</th>
                    <th>Edit</th>
                    <th>delete</th>
                </tr>
            </thead>

            <tbody id="myTable">
                @foreach ($jobLists as $joblist)
                    <tr>
                        <td>{{ $joblist->code }}</td>
                        <td>{{ $joblist->title }}</td>
                        <td>{{ $joblist->department }}</a></td>
                        <td>{{ $joblist->type }}</td>
                        <td>{{ $joblist->start_date->format('F j, Y') }}</td>
                        <td>{{ $joblist->end_date->diffForHumans() }}</td>
                        <td>{{ $joblist->created_at->diffForHumans() }}</td>
                        <td><a href="{{ route('admin.job.details', $joblist->id) }}" class="text-decoration-none"><i class="fas fa-eye"></i> View</a></td>
                        <td><a href="{{ route('admin.job.edit', $joblist->id)  }}" class="btn btn-primary text-light"><i class="fas fa-edit"></i> Edit</a></td>
                        <td>
                            <form method="POST" action="{{ route('admin.job.delete', $joblist->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/bootstraps.js') }}"></script>

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

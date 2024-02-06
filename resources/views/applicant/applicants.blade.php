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




    <div class="container p-2">
        <div class="col-6">
            <h3 class="p-2 mb-3">Dashboard><span class="text-primary">Applicants</span> </h3>
        </div>
        <div class="row pt-3 mb-3">
            <div class="col-4 ">
                <input type="text" id="myInput" class="form-control" width="40px" onkeyup="myFunction()"
                    placeholder="Search" title="Type in a name">
            </div>
        </div>
        <table class="table table-hover " width="100%">

            <thead class="table-primary">
                <tr>
                    <th>Job Code</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>GPA</th>
                    <th>Date</th>
                    <th>Hr. Status</th>
                    <th>Dep. Status</th>
                    <th>Details</th>
                    @unless (Auth::user()->userHasRole('Record officer') || Auth::user()->userHasRole('DEP officer'))
                        <th>delete</th>
                    @endunless
                </tr>
            </thead>

            <tbody id="myTable">
                @foreach ($applicants as $applicant)
                    <tr>
                        @if ($applicant->job != null)
                            <td>{{ $applicant->job->code }}</td>
                        @endif
                        <td>{{ $applicant->first_name }}</td>
                        <td>{{ $applicant->last_name }}</a></td>
                        <td>{{ $applicant->email }}</td>
                        <td>{{ $applicant->level }}</td>
                        <td>{{ $applicant->GPA }}</td>
                        <td>{{ $applicant->created_at->diffForHumans() }}</td>
                        <td>
                            @if ($applicant->hr_status == 'Approved')
                                <span class="text-success">
                                    <i class="fas fa-check"></i>
                                    {{ $applicant->hr_status }}
                                </span>
                            @elseif ($applicant->hr_status == 'Rejected')
                                <span class="text-danger">
                                    <i class="fas fa-times"></i></i>
                                    {{ $applicant->hr_status }}
                                </span>
                            @else
                                <i class="fas fa-clock"></i> Pending
                            @endif()
                        </td>
                        <td>
                            @if ($applicant->dep_status == 'Passed')
                                <span class="text-success">
                                    <i class="fas fa-check"></i>
                                    {{ $applicant->dep_status }}
                                </span>
                            @elseif ($applicant->dep_status == 'Failed')
                                <span class="text-danger">
                                    <i class="fas fa-times"></i></i>
                                    {{ $applicant->dep_status }}
                                </span>
                            @else
                                <i class="fas fa-clock"></i> Pending
                            @endif()
                        </td>
                        <td><a href="{{ route('applicants.show', $applicant->id) }}" class="text-decoration-none"><i
                                    class="fas fa-eye"></i> View</a></td>
                        @unless (Auth::user()->userHasRole('Record officer') || Auth::user()->userHasRole('DEP officer'))
                            <td>
                                <form method="POST" action="{{ route('applicants.destroy', $applicant) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i>
                                        Delete</button>
                                </form>
                            </td>
                        @endunless
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

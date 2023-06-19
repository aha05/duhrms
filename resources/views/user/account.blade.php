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
            <h2 class="text-primary"> User Account

            </h2>
        </div>
        <div class="row pt-3 mb-3">
            <div class="col-4 ">
                <input type="text" id="myInput" class="form-control" width="40px" onkeyup="myFunction()"
                    placeholder="Search" title="Type in a name">
            </div>
            <div class="col-8 text-end text-light">
                <a href="{{ route('register') }}" class="btn btn-primary text-light"><i
                        class="las la-plus-circle"></i>&nbsp;Add new user</a>
            </div>
        </div>


        <table class="table table-hover " width="100%">

            <thead class="table-primary">
                <tr>
                    <th>avatar</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>password</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>delete</th>
                </tr>
            </thead>

            <tbody id="myTable">
                @foreach ($users as $item)
                    <tr>
                        <td><img src="{{ $item->avatar }}" class="rounded-circle shadow" width="50px" height="50px" alt=""></td>
                        <td><a href="{{ route('profile', $item) }}">{{ $item->name }}</a></td>
                        <td>{{ $item->email }}</td>
                        <td>{{ __('Password') }}</td>
                        <td>{{ $item->created_at->diffForHumans() }}</td>
                        <td>{{ $item->updated_at->diffForHumans() }}</td>
                        <td>
                            <form method="POST" action="{{ route('user.destroy', $item) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">delete</button>
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

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
            <h3 class="p-2 pb-0">Dashboard><span class="text-primary">User Account</span> </h3>
        </div>
        <div class="row pt-3 mb-3">
            <div class="col-4 ">

            </div>
            <div class="col-8 text-end text-light">
                <a href="{{ route('register') }}" class="btn btn-primary text-light"> <i class="fas fa-plus-circle"></i> Add new user</a>
            </div>
        </div>


        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">

            <thead class="table-primary">
                <tr>
                    <th>avatar</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>delete</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <td><img src="{{ $item->avatar }}" class="rounded-circle shadow" width="50px" height="50px" alt=""></td>
                        <td><a href="{{ route('profile', $item) }}">{{ $item->name }}</a></td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->created_at->format('F d, Y') }}</td>
                        <td>{{ $item->updated_at->diffForHumans() }}</td>
                        <td>
                            <form method="POST" action="{{ route('user.destroy', $item) }}">
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
@endsection

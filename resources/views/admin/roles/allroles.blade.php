@extends('layouts.layout')
@section('content')
    <div class="container">

        @if (session()->has('role-deleted'))
            <div class="alert alert-success">{{ session('role-deleted') }}</div>
        @endif


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <h6 class="m-0 font-weight-bold text-primary col-9">{{ __('All Roles') }}</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>add</th>
                                <th>delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>add</th>
                                <th>delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td><a href="{{ route('roles.edits', $role) }}">{{ $role->name }}</a></td>
                                    <td>{{ $role->slug }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('roles.edit', $role) }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="role" value="{{ $role->id }}">
                                            <button class="btn btn-primary" type="submit">Edit</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('roles.destroy', $role) }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="role" value="{{ $role->id }}">
                                            <button class="btn btn-danger" type="submit">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

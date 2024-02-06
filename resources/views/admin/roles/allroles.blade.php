@extends('layouts.layout')
@section('content')
    <div class="container">
        @if (session()->has('role-deleted'))
            <div class="alert alert-success">{{ session('role-deleted') }}</div>
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
    <h3 class="p-2 pb-0">Dashboard><span class="text-primary"> All roles</span> </h3>

            <div class="text-end mb-3">
                <a href="{{ route('roles.index') }}" class="btn btn-primary text-light text-decoration-none"><i class="fas fa-plus-circle"></i>
                    Add new role</a>
            </div>

        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-primary">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Permission</th>
                        <th>Edit</th>
                        <th>delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td><a href="{{ route('roles.edits', $role) }}">{{ $role->name }}</a></td>
                            <td style="width: 33%">
                                @foreach ($role->permissions->take(6)  as $permission)
                                    <span class="bg-secondary text-light ps-1 rounded">{{ $permission->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <form method="POST" action="{{ route('roles.edit', $role) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="role" value="{{ $role->id }}">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-edit"></i> Edit</button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('roles.destroy', $role) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="role" value="{{ $role->id }}">
                                    <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

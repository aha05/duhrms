@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-4">
            @if (session()->has('permission-created'))
                <div class="alert alert-success">{{ session('permission-created') }}</div>
            @endif
            @if (session()->has('permission-failed'))
                <div class="alert alert-error">{{ session('permission-failed') }}</div>
            @endif
            <div class="card">
                <div class="card-header text-center ">
                    <span class="nam mt-3 text-bold text-dark fs-1">{{ __('Permissions') }}</span>

                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('permissions.stores') }}" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="row mb-3">
                            <label for="name" class="col-3 col-form-label">{{ __('Name') }}</label>

                            <div class="col-9">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name" value=""
                                    autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-primary-light">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-8">
            @if (session()->has('permission-deleted'))
                <div class="alert alert-success">{{ session('user-deleted') }}</div>
            @endif
            <!-- DataTales Example -->
            @if ($permissions->isNotEmpty())
                <div class="card">
                    <div class="card-header py-3">
                        <div class="row">
                            <h6 class="m-0 font-weight-bold text-primary col-9">Permissions</h6>
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
                                        <th>attach</th>
                                        <th>detach</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>attach</th>
                                        <th>detach</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->id }}</td>
                                            <td><a
                                                    href="{{ route('permissions.edits',$permission) }}">{{ $permission->name }}</a>
                                            </td>
                                            <td>{{ $permission->slug }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('permissions.edit', $permission) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="permission" value="{{ $permission->id }}">
                                                    <button class="btn btn-primary" type="submit">Edit</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form method="POST"
                                                    action="{{ route('permissions.destroy', $permission) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="permission" value="{{ $permission->id }}">
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
            @endif
        </div>
    </div>

@endsection

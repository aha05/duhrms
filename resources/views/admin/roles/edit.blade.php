@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8 mb-1">
                @if (session()->has('role-updated'))
                    <div class="alert alert-success">{{ session('role-updated') }}</div>
                @endif
                <div class="card">
                    <div class="card-header text-center ">
                        <div class="image d-flex flex-column justify-content-center align-items-center">
                            <span class="nam mt-3 text-bold text-dark fs-5">{{ __('Edit Role') }}</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.update', $role) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $role->name }}" autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@if ($permissions->isNotEmpty())
        <div class="table-responsive">
            <h6 class="m-0 font-weight-bold text-primary shadow-sm w-100 p-3 fs-3" style="background: #fff; height:50px!important;">Permissions</h6>
            <table style="border-collapse: separate;
            border-spacing: 0 2px;" class="table"  width="100%" cellspacing="0">

                    <tr class="shadow-sm " style="background: #fff">
                        <th>Options</th>
                        <th>Name</th>
                        <th>attach</th>
                        <th>detach</th>
                    </tr>
                    @foreach ($permissions as $permission)
                        <tr class="shadow-sm gy-5" style="background: #fff">
                            <td><input type="checkbox"
                                @foreach ($role->permissions as $role_permission)
                                    @if ($role_permission->slug == $permission->slug)
                                        @checked(true)
                                    @endif
                                @endforeach
                            ></td>

                            <td>{{ $permission->name }}</td>
                            <td>
                                <form method="POST" action="{{ route('role.permission.attach', $role) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="permission" value="{{ $permission->id }}" >
                                    <button class="btn btn-primary" type="submit"
                                            @if ($role->permissions->contains($permission))
                                                @disabled(true)
                                            @endif
                                    >attach</button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('role.permission.detach', $role) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="permission" value="{{ $permission->id }}" >
                                    <button class="btn btn-danger" type="submit"
                                    @if (!$role->permissions->contains($permission))
                                                @disabled(true)
                                            @endif
                                            >detach</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

            </table>
        </div>

@endif

        </div>
    </div>
@endsection

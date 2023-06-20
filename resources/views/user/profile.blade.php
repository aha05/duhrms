@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-2 @if (auth()->user()->userHasRole('Admin')) col-md-5 @else col-md-8 @endif">
                <div class="card">
                    <div class="card-header text-center ">
                        <div class="image d-flex flex-column justify-content-center align-items-center">
                            <button class="btn btn-secondary">
                                <img src="{{ $user->avatar }}" height="100" width="100" />
                            </button>
                            <span class="nam mt-3 text-bold text-dark">{{ __($user->name) }}</span>
                            <span class="idd text-gray">{{ __('@' . $user->name) }}</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profile', $user) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="avatar"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Avatar') }}</label>
                                <div class="col-md-6">
                                    <input id="avatar" type="file"
                                        class="form-control @error('avatar') is-invalid @enderror" name="avatar"
                                        autocomplete="avatar" autofocus>

                                    @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $user->name }}" autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $user->email }}" autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            @if (!$user->userHasRole('ACC officer') && !$user->userHasRole('Hr officer'))
                                <div class="row mb-3">
                                    <label for="department"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>

                                    <div class="col-md-6">
                                        <select id="department" class="form-control" name="department"
                                            value="@if ($user->departments->first() != null) {{ $user->departments->last()->full_name ?? '' }}" @endif autocomplete="department"
                                            required>
                                            <option value="">Select Department</option>
                                            @foreach ($department as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($user->departments->first() != null) {{ $item->full_name == $user->departments->last()->full_name ? 'selected' : '' }} @endif>
                                                    {{ $item->full_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('department')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @endif

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        value="{{ $user->password }}" autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password_confirmation"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" autocomplete="password_confirmation">

                                    @error('password_confirmation')
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

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if (auth()->user()->userHasRole('Admin'))
                <div class="col-md-7">
                    @if (session()->has('role-deleted'))
                        <div class="alert alert-success">{{ session('role-deleted') }}</div>
                    @endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <h6 class="m-0 font-weight-bold text-primary col-9">User Roles</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td>options</td>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>add</th>
                                            <th>delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>options</th>
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
                                                <td><input type="checkbox"
                                                        @foreach ($user->roles as $user_role)
                                                        @if ($user_role->slug == $role->slug)
                                                            @checked(true)
                                                        @endif @endforeach>
                                                </td>
                                                <td>{{ $role->id }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>{{ $role->slug }}</td>
                                                <td>
                                                    <form method="POST" action="{{ route('user.attach.role', $user) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="role"
                                                            value="{{ $role->id }}">
                                                        <button class="btn btn-primary" type="submit"
                                                            @if ($user->roles->contains($role)) @disabled(true) @endif>attach</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form method="POST" action="{{ route('user.detach.role', $user) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="role"
                                                            value="{{ $role->id }}">
                                                        <button class="btn btn-danger" type="submit"
                                                            @if (!$user->roles->contains($role)) @disabled(true) @endif>detach</button>
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
            @endif
        </div>
    </div>
@endsection

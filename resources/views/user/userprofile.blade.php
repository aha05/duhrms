@extends('layouts.layout')
@section('content')
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
    <div class="container">
        <h3 class="p-2">Dashboard><span class="text-primary"> Profile</span> </h3>
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ Auth::user()->avatar }}" alt="Admin" class="rounded-circle p-1 bg-primary"
                                    width="250px" height="300px">
                                <div class="mt-3">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <p class="text-secondary mb-1">{{ Auth::user()->email }}</p>
                                    @if (Auth::user()->employee != null)
                                        <p class="text-secondary mb-1">{{ Auth::user()->employee->position }}</p>
                                        <p class="text-muted font-size-sm">{{ Auth::user()->employee->emp_id }}</p>
                                        @if (Auth::user()->departments != null)
                                            <p class="text-muted font-size-sm">
                                                {{ Auth::user()->departments->first()->full_name }}</p>
                                        @endif
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @php
                    $user = Auth::user();
                @endphp
                <div class="col-lg-8">
                    <div class="card">
                        <div class="text-center mt-3">
                            <span class="text-primary fs-4 ">User Profile</span>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.profile.update', $user) }}"
                                enctype="multipart/form-data">
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

                    <div class="mt-4 grow mb-3">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title ms-3  text-primary">Employee Experience</h5>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                @if (Auth::user()->employee != null)
                                                    <div class="experience-content">

                                                        <div class="timeline-content row">

                                                            <div class="col-10">
                                                                <a href="#/"
                                                                    class="name">{{ Auth::user()->employee->experience->first()->position . ' at' . ' ' . Auth::user()->employee->experience->first()->company ?? 'Web Designer at Ron-tech' }}</a>
                                                                <span
                                                                    class="time">{{ Auth::user()->employee->experience->first()->start_date->format('F d, Y') .' -' .' ' .Auth::user()->employee->experience->first()->end_date->format('F d, Y') }}
                                                                    -
                                                                    ({{ Auth::user()->employee->experience->first()->end_date->diffInYears(Auth::user()->employee->experience->first()->start_date) . ' Years' }})
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

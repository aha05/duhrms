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
    <div class="container p-2">
        <div class="col-8">
            <h3 class="p-2 mb-3">Dashboard>Announcement>Jobs><span class="text-primary">Details</span> </h3>
        </div>
        <form class="mt-2 ps-5" method="POST" action="{{ route('admin.post.job') }}">
            @csrf
            <div class="col-8 row mb-3">
                <label for="title" class="form-label">{{ __('Title') }}</label>

                <div>
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                        name="title" value="{{ $postedJob->title }}" autocomplete="title" autofocus disabled>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-4 row mb-3">
                    <label for="department" class="form-label">{{ __('Department') }}</label>

                    <div>
                        <select id="department" type="text"
                            class="form-control @error('department') is-invalid @enderror" name="department"
                            value="{{ old('department') }}" autocomplete="department" autofocus disabled>
                            <option value="">Select Department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->full_name }}" {{ $postedJob->department == $department->full_name ? 'selected' : '' }}>{{ $department->full_name }}</option>
                            @endforeach
                        </select>

                        @error('department')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-4 row mb-3">
                    <label for="type" class="ms-0 form-label">{{ __('Employement Type') }}</label>
                    <div>
                        <select id="type" type="text" class="form-control @error('type') is-invalid @enderror"
                            name="type" value="{{ old('type') }}" autocomplete="type" autofocus disabled>
                            <option value="">Select Employement Type</option>
                            <option value="Part-time" {{ $postedJob->type == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                            <option value="Full-time" {{ $postedJob->type == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                            <option value="Temporary"{{ $postedJob->type == 'Temporary' ? 'selected' : '' }}>Temporary</option>
                            <option value="Permanent" {{ $postedJob->type == 'Permanent' ? 'selected' : '' }}>Permanent</option>
                        </select>

                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 row mb-3">
                    <label for="start_date" class="form-label">{{ __('Start Date') }}</label>

                    <div>
                        <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror"
                            name="start_date" autocomplete="current-date" value="{{ $postedJob->start_date->format('Y-m-d') }}"  autofocus disabled>

                        @error('start_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-4 row mb-3">
                    <label for="end_date" class="col-form-label">{{ __('End Date') }}</label>

                    <div>
                        <input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror"
                            name="end_date" value="{{ $postedJob->end_date->format('Y-m-d') }}" autocomplete="current-date" autofocus disabled>

                        @error('end_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-8 row mb-3">
                <label for="description" class="form-label">{{ __('Description') }}</label>
                <div>
                    <textarea rows="5" id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                        name="description" autocomplete="description" autofocus disabled>{{ $postedJob->description}}</textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </form>
    </div>
@endsection

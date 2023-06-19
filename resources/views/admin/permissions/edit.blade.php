@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8 mb-1">
                @if (session()->has('permission-updated'))
                    <div class="alert alert-success">{{ session('permission-updated') }}</div>
                @endif
                <div class="card">
                    <div class="card-header text-center ">
                        <div class="image d-flex flex-column justify-content-center align-items-center">
                            <span class="nam mt-3 text-bold text-dark fs-5">{{ __('Edit Permission') }}</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('permissions.update', $permission) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $permission->name }}" autocomplete="name" autofocus>

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
        </div>
    </div>
@endsection

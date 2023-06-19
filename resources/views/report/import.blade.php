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
                            <span class="nam mt-3 text-bold text-dark fs-5">{{ __('Emport Excel') }}</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('importExcel') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="excel"
                                    class="col-md-4 col-form-label text-md-end">{{ __('File') }}</label>

                                <div class="col-md-6">
                                    <input id="excel" type="file"
                                        class="form-control @error('excel') is-invalid @enderror" name="excel"
                                        autocomplete="excel" autofocus>

                                    @error('excel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Import') }}
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

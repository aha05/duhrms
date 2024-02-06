@extends('layouts.layout')
@section('content')
<script src="{{ asset('js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('js/tinymce.config.js') }}"></script>
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
            <h3 class="p-2 mb-3">Dashboard>Notice><span class="text-primary">Details</span> </h3>
        </div>
        <form class="mt-2 ps-5" method="POST" action="{{ route('admin.store.notice') }}">
            @csrf
            <div class="col-8 row mb-3">
                <label for="title" class="form-label">{{ __('Title') }}</label>

                <div>
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                        name="title" autocomplete="title" value="{{ $notice->title }}" disabled autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-8 row mb-3">
                <label for="content" class="form-label">{{ __('Content:') }}</label>
                <div>
                    <textarea rows="20" id="content" type="text" class="form-control @error('content') is-invalid @enderror"
                        name="content" autocomplete="content" autofocus>{{ $notice->content }}</textarea>

                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </form>
    </div>
@endsection

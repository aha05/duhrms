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

    <h3 class="p-2 mb-3">Dashboard>Feedback><span class="text-primary">Details</span> </h3>

    <div class="container">
        <form action="{{ route('vacancy.approve', $feedback) }}" class="ps-4" style="padding-right: 20%" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-4">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" value="{{ $feedback->name}}" name="name"
                        disabled>
                </div>
                <div class="form-group col-4">
                    <label for="email">Email:</label>
                    <input type="text"  class="form-control" value="{{ $feedback->email }}"
                        id="email" name="email" disabled>
                </div>
                <div class="form-group col-4">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone"
                        value="{{ $feedback->phone }}" disabled>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-4">
                    <label for="date">Date:</label>
                    <input type="date" class="form-control" id="date" name="date"

                        value="{{ $feedback->created_at->format('Y-m-d') }}" disabled>
                </div>
                <div class="form-group col-8">
                    <label for="message">Message:</label>
                    <textarea type="text" class="form-control" id="message" name="message" rows="4" disabled>{{ $feedback->message }}</textarea>
                </div>
            </div>
        </form>
    </div>
@endsection

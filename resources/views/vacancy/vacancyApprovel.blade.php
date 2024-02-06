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

    <h3 class="p-2 mb-3">Dashboard>Vacancy> <span class="text-primary">Approval</span> </h3>

    <div class="container">

        <form action="{{ route('vacancy.approve', $vacancyRequest) }}" class="ps-4" style="padding-right: 20%" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-4">
                    <label for="department">Department:</label>
                    <input type="text" class="form-control" value="{{ $vacancyRequest->department->full_name }}"
                        disabled>
                </div>
                <div class="form-group col-4">
                    <label for="title">Title:</label>
                    <input type="text" value="$vacancyRequest" class="form-control" value="{{ $vacancyRequest->title }}"
                        id="title" name="title" disabled>
                </div>
                <div class="form-group col-4">
                    <label for="number_of_positions">No of Positions:</label>
                    <input type="number" class="form-control" id="number_of_positions" name="number_of_positions"
                        value="{{ $vacancyRequest->number_of_positions }}" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea type="text" class="form-control" id="description" name="description" rows="3" disabled>{{ $vacancyRequest->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea type="text" class="form-control" id="comment" name="comment" rows="3"
                    placeholder="Write your comment here!"></textarea>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="ac_status">Ac. status:</label>
                    <select class="form-control" id="ac_status" name="ac_status"
                        @unless (Auth::user()->userHasRole('AC officer'))
                         disabled
                        @endunless>
                        <option value="">Select Status</option>
                        <option value="Approved">Approved</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="hr_status">Hr. status:</label>
                    <select class="form-control" id="hr_status" name="hr_status"
                        @unless (Auth::user()->userHasRole('Hr officer'))
                        disabled
                    @endunless>
                        <option value="">Select Status</option>
                        <option value="Approved">Approved</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

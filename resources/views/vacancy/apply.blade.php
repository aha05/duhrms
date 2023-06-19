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
    <h3 class="p-2 mb-3">Dashboard>Vacancy><span class="text-primary">Apply</span> </h3>

    <div class="container">
        <h2>Vacancy Request Form</h2>
        <form action="{{ route('vacancy-requests.store') }}" class="ps-4" style="padding-right: 20%" method="POST">
            @csrf
            <div class="form-group">
                <label for="department">Department:</label>
                <select class="form-control" id="department" name="department">
                    <option value="">Department</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->full_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="number_of_positions">No of Positions:</label>
                <input type="number" class="form-control" id="number_of_positions" name="number_of_positions" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea type="text" class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

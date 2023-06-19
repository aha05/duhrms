@extends('layouts.layout')
@section('content')
    <h3 class="p-2 mb-3">Dashboard><span class="text-primary">Vacancy</span> </h3>

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
    <table class="table">
        <thead>
            <tr>
                <th>Department</th>
                <th>Title</th>
                <th>No. of Positions</th>
                <th>Ac. Status</th>
                <th>Hr Status</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vacancyRequests as $vacancyRequest)
                <tr>
                    <td>{{ $vacancyRequest->department->full_name }}</td>
                    <td>{{ $vacancyRequest->title }}</td>
                    <td>{{ $vacancyRequest->number_of_positions }}</td>
                    <td>{{ $vacancyRequest->status }}</td>
                    <td>{{ $vacancyRequest->status }}</td>
                    <td><a href="" class="text-decoration-none"><i class="fas fa-eye"></i>&nbsp;View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection

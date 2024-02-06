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
    <div class="ps-5 pe-5 pb-5 justify-content-center w-100">
        <div class="card h-100 p-3" style="width: 50rem;">
            <div class="card-body">
                <div class="container">
                    <h2>Leave Request</h2>
                    <form action="{{ route('leave.request') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="employeeId">Employee ID:</label>
                                <input type="text" class="form-control @error('employeeId')
                                        is-invalid
                                @enderror" id="employeeId" name="employeeId" required>
                                @error('employeeId')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="leaveType">Leave Type:</label>
                                <select class="form-control" id="leaveType" name="leaveType" required>
                                    <option value="">Select Leave Type</option>
                                    @foreach ($leaveType as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="start_date">Start Date:</label>
                                <input type="date" class="form-control @error('start_date')
                                    is-invalid
                                @enderror" id="start_date" name="start_date" required>
                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="end_date">End Date:</label>
                                <input type="date" class="form-control @error('end_date')
                                    is-invalid
                                @enderror" id="end_date" name="end_date" required>
                                @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="reason">Reason:</label>
                            <textarea class="form-control @error('reason')
                                is-invalid
                            @enderror" id="reason" name="reason" rows="7"></textarea>
                            @error('reason')
                                <span class="invalid-feedbak" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

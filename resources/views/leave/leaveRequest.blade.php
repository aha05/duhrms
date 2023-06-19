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
                                <input type="text" class="form-control" id="employeeId" name="employeeId" required>
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
                                <label for="startDate">Start Date:</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="end_date">End Date:</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" required>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="reason">Reason:</label>
                            <textarea class="form-control" id="reason" name="reason" rows="7"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

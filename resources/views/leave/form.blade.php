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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


                <div class="container">
                    <h2>Leave Exit From</h2>
                    <form action="{{ route('leave.exit.form.store') }}" method="POST">
                        @csrf
                        <input type="text" class="form-control" id="formId" value="{{ $form->id }}" name="formId"
                             style="display: none;">

                        <div class="row">
                            <div class="form-group col-4">
                                <label for="employeeId">Employee ID:</label>
                                <input type="text" class="form-control" id="employeeId" name="employeeId"
                                     >
                            </div>
                            <div class="form-group col-4">
                                <label for="leaveType">Leave Type:</label>
                                <input type="text" class="form-control" id="leave_type" name="leave_type"
                                     >
                            </div>
                            <div class="form-group col-4">
                                <label for="startDate">Start Date:</label>
                                <input type="text" class="form-control" id="start_date" name="start_date"
                                    >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="end_date">End Date:</label>
                                <input type="text" class="form-control" id="end_date" name="end_date"
                                    >
                            </div>
                            <div class="form-group col-8">
                                <label for="reason">Reason:</label>
                                <textarea class="form-control" id="reason" name="reason" rows="3" ></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment:</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
@endsection

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

    <div class="ps-5 pe-5 pb-5 justify-content-center w-100">
        <div class="card h-100 p-3" style="padding: 10rem;">
            <div class="card-body">
                <div class="container">
                    <h2>Leave Request</h2>
                    <form action="{{ route('leave.approver', ['request' => $leave]) }}" method="POST">
                        @csrf
                        <input type="text" class="form-control" id="leave_request_id" name="leave_request_id"
                            value="{{ $leave->id }}" style="display: none;">

                        <div class="row">
                            <div class="form-group col-4">
                                <label for="employeeId">Employee ID:</label>
                                <input type="text" class="form-control" id="employeeId" name="employeeId"
                                    value="{{ $leave->employee->emp_id }}" disabled>
                            </div>
                            <div class="form-group col-4">
                                <label for="leaveType">Leave Type:</label>
                                <input type="text" class="form-control" id="leave_type" name="leave_type"
                                    value="{{ $leave->leaveType->name }}" disabled>
                            </div>
                            <div class="form-group col-4">
                                <label for="startDate">Start Date:</label>
                                <input type="text" class="form-control" id="start_date" name="start_date"
                                    value="{{ $leave->start_date }}" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="end_date">End Date:</label>
                                <input type="text" class="form-control" id="end_date" name="end_date"
                                    value="{{ $leave->end_date }}" disabled>
                            </div>
                            <div class="form-group col-8">
                                <label for="reason">Reason:</label>
                                <textarea class="form-control" id="reason" name="reason" rows="3" disabled>{{ $leave->reason }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment:</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3">{{ $leave->reason }}</textarea>
                        </div>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="dep_status">DEP Status:</label>
                                <select class="form-control" id="dep_status" name="dep_status"
                                    @unless (Auth::user()->userHasRole('DEP officer'))
                                        disabled
                                        @unless ($leave->isDepApprove($leave->id))
                                            disabled
                                        @endunless
                                    @endunless
                                    >
                                <option value=""><i class="fas fa-clock"></i> Pending</option>
                                <option value="Approved" class="text-success"
                                    {{ ($leave->getDepApproval($leave->id) && $leave->getDepApproval($leave->id)->status=='Approved')== 'true' ? 'selected' : '' }}><i
                                        class="fas fa-check"></i>Approved<i class="fas fa-check"></option>
                                <option value="Rejected" class="text-danger"
                                    {{($leave->getDepApproval($leave->id) && $leave->getDepApproval($leave->id)->status=='Rejected')== 'true' ? 'selected' : '' }}><i
                                        class="fas fa-times"></i>Rejected</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label for="ac_status">Ac Status:</label>
                            <select class="form-control" id="ac_status" name="ac_status"
                                @unless (Auth::user()->userHasRole('AC officer'))
                                    disabled
                                    @unless ($leave->isAcApprove($leave->id))
                                        disabled
                                    @endunless
                                @endunless
                            >
                            <option value=""><i class="fas fa-clock"></i> Pending</option>
                            <option value="Approved" class="text-success"
                                {{ ($leave->getAcApproval($leave->id) && $leave->getAcApproval($leave->id)->status=='Approved' && $leave->getDepApproval($leave->id)->status=='Approved') == 'true' ? 'selected' : '' }}><i
                                    class="fas fa-check"></i>Approved<i class="fas fa-check"></option>
                            <option value="Rejected" class="text-danger"
                                {{ ($leave->getAcApproval($leave->id) && $leave->isAcApprove($leave->id) && $leave->getDepApproval($leave->id)->status=='Rejected')  == 'true' ? 'selected' : '' }}><i
                                    class="fas fa-times"></i>Rejected</option>
                        </select>
                    </div>
                    <div class="form-group col-4">
                        <label for="hr_status">Hr Status:</label>
                        <select class="form-control" id="hr_status" name="hr_status"
                            @unless (Auth::user()->userHasRole('HR officer'))
                                disabled
                                @unless ($leave->isHrApprove($leave->id))
                                    disabled
                                @endunless
                            @endunless
                        >
                            <option value=""><i class="fas fa-clock"></i> Pending</option>
                            <option value="Approved" class="text-success"
                                {{ $leave->isHrApprove($leave->id) == 'true' ? 'selected' : '' }}><i
                                    class="fas fa-check"></i>Approve<i class="fas fa-check"></option>
                            <option value="Rejected" class="text-danger"
                                {{ $leave->isHrApprove($leave->id) == 'true' ? 'selected' : '' }}><i
                                    class="fas fa-times"></i>Reject</option>
                        </select>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection

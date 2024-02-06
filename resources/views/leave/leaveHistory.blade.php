@extends('layouts.layout')
@section('content')
    <!-- DataTales Example -->
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
            <h2 class="text-primary">Employee Leaves</h2>
        </div>
        <div class="row pt-3 mb-3">
            @php
                $x = 0;
            @endphp
            @foreach ($approvals as $approval)
                @if ($approval->id == $forms[$x]->leave_request_id && $forms[0]->is_filled == false)
                    <a href="{{ route('leave.exit.form', ['id' => $forms[$x++]->id]) }}" class="col-1 text-decoration-none">
                        <div class="card bg-success" style="width: 6rem; hieght:6rem;">
                            <div class="card-body p-0">
                                <p class="text-center mb-0 text-light text-bold">ID {{ $approval->id }}</p>
                                <p class="card-text text-bold text-light text-center">Form</p>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach

        </div>


        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">

            <thead class="table-primary">
                <tr>
                    <th>No. </th>
                    <th>Employee ID</th>
                    <th>Leave Type</th>
                    <th>End Date</th>
                    <th>DEP. Status</th>
                    <th>Aca. Status</th>
                    <th>HR. Status</th>


            </thead>

            <tbody>
                @foreach ($leave as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->employee->emp_id }}</td>
                        <td>{{ $item->leaveType->name }}</td>
                        <td>{{ $item->end_date }}</td>
                        {{-- Department approval status --}}
                        <td>
                            @if (!$item->isDepApprove($item->id))
                                <i class="fas fa-clock"></i> Pending
                            @else
                                @if ($item->hasApprover($item->id))
                                    @if ($item->isDepApprove($item->id))
                                        @if ($item->getDepApproval($item->id)->status == 'Approved')
                                            <span class="text-success">
                                                <i class="fas fa-check"></i> {{ $item->getDepApproval($item->id)->status }}
                                            </span>
                                        @else
                                            <span class="text-danger">
                                                <i class="fas fa-times"></i></i>
                                                {{ $item->getDepApproval($item->id)->status }}
                                            </span>
                                        @endif
                                    @endif
                                @endif
                            @endif
                        </td>

                        {{-- Acadamics approval status --}}
                        <td>
                            @if (!$item->isAcApprove($item->id))
                                @if ($item->hasApprover($item->id))
                                    @if ($item->isDepApprove($item->id))
                                        @if ($item->getDepApproval($item->id)->status == 'Rejected')
                                            <span class="text-danger">
                                                <i class="fas fa-times"></i></i>
                                                {{ __('Failed') }}
                                            </span>
                                        @else
                                            <i class="fas fa-clock"></i> Pending
                                        @endif
                                    @endif
                                @else
                                    <i class="fas fa-clock"></i> Pending
                                @endif
                            @else
                                @if ($item->hasApprover($item->id))
                                    @if ($item->getDepApproval($item->id)->status == 'Approved')
                                        @if ($item->isAcApprove($item->id))
                                            @if ($item->getAcApproval($item->id)->status == 'Approved')
                                                <span class="text-success">
                                                    <i class="fas fa-check"></i>
                                                    {{ $item->getAcApproval($item->id)->status }}
                                                </span>
                                            @else
                                                <span class="text-danger">
                                                    <i class="fas fa-times"></i></i>
                                                    {{ $item->getAcApproval($item->id)->status }}
                                                </span>
                                            @endif
                                        @endif
                                    @else
                                        <span class="text-danger">
                                            <i class="fas fa-times"></i></i>
                                            {{ __('Failed') }}
                                        </span>
                                    @endif
                                @endif
                            @endif
                        </td>
                        {{-- HR approval status --}}

                        <td>
                            @if (!$item->isHrApprove($item->id))
                                @if ($item->hasApprover($item->id))
                                    @if ($item->isDepApprove($item->id))
                                        @if ($item->getDepApproval($item->id)->status == 'Rejected')
                                            <span class="text-danger">
                                                <i class="fas fa-times"></i></i>
                                                {{ __('Failed') }}
                                            </span>
                                        @else
                                            <i class="fas fa-clock"></i> Pending
                                        @endif
                                    @endif
                                @else
                                    <i class="fas fa-clock"></i> Pending
                                @endif
                            @else
                                @if ($item->hasApprover($item->id))
                                    @if ($item->getDepApproval($item->id)->status == 'Approved' && $item->getAcApproval($item->id)->status == 'Approved')
                                        @if ($item->isHrApprove($item->id))
                                            @if ($item->getHrApproval($item->id)->status == 'Approved')
                                                <span class="text-success">
                                                    <i class="fas fa-check"></i>
                                                    {{ $item->getHrApproval($item->id)->status }}
                                                </span>
                                            @else
                                                <span class="text-danger">
                                                    <i class="fas fa-times"></i></i>
                                                    {{ $item->getHrApproval($item->id)->status }}
                                                </span>
                                            @endif
                                        @endif
                                    @else
                                        <span class="text-danger">
                                            <i class="fas fa-times"></i></i>
                                            {{ __('Failed') }}
                                        </span>
                                    @endif
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    {{--  Employee Leave Type Modal --}}
    <div class="modal fade" id="leaveType" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title ms-4" id="exampleModalLabel">Employee Leave Type Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('leave.type') }}" class="p-5 pt-1" method="post">
                        @csrf
                        <div class="mb-2 form-group">
                            <label for="name">Leave Type:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <div class="mb-2 form-group">
                            <label for="description">Description:</label>
                            <textarea type="text" id="description" name="description" class="form-control" rows="3"></textarea>
                        </div>
                </div>
                <div class="modal-footer justify-content-center border-0 mb-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

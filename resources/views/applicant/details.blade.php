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

    <h3 class="p-2 mb-3 ms-3">Dashboard>Applicant><span class="text-primary">Details</span> </h3>

    <div class="container">

        <form action="{{ route('approve.applicants', $applicant) }}" class="ps-4" style="padding-right: 20%" method="POST">
            @csrf
            <div class="form-group col-4">
                <label for="first_name">Job Code:</label>
                <input type="text" class="form-control" value="{{ $applicant->job->code }}" name="first_name" disabled>
            </div>

            <div class="row">
                <div class="form-group col-4">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" value="{{ $applicant->first_name }}" name="first_name"
                        disabled>
                </div>
                <div class="form-group col-4">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" value="{{ $applicant->last_name }}" name="last_name"
                        disabled>
                </div>
                <div class="form-group col-4">
                    <label for="age">Age:</label>
                    <input type="text" class="form-control" value="{{ $applicant->age }}" id="title" name="age"
                        disabled>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-4">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="phone" value="{{ $applicant->email }}"
                        disabled>
                </div>
                <div class="form-group col-4">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $applicant->phone }}"
                        disabled>
                </div>
                <div class="form-group col-4">
                    <label for="level">Level:</label>
                    <input type="text" class="form-control" id="level" name="level" value="{{ $applicant->level }}"
                        disabled>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-4">
                    <label for="gpa">GPA:</label>
                    <input type="text" class="form-control" id="gpa" name="gpa" value="{{ $applicant->GPA }}"
                        disabled>
                </div>
                <div class="form-group col-4">
                    <label for="numberofdoc">No. Doc:</label>
                    <input type="text" class="form-control" id="numberofdoc" name="numberofdoc"
                        value="{{ $applicant->numberofdoc }}" disabled>
                </div>
                <div class="form-group col-4">
                    <label for="date_of_registration">No. Doc:</label>
                    <input type="text" class="form-control" id="date_of_registration" name="date_of_registration"
                        value="{{ $applicant->date_of_registration }}" disabled>
                </div>
            </div>
            <div class="row">
                <div
                    class="form-group">
                    <label for="remark">Remark:</label>
                    <textarea type="text" class="form-control" id="remark" name="remark" rows="4" disabled>{{ $applicant->remark }}</textarea>
                </div>
                <div class="form-group" @if (Auth::user()->userHasRole('HR officer'))
                    style="display:none"
                @endunless>
                <label for="remark">Comment:</label>
                <textarea type="text" class="form-control" id="remark" name="remark" rows="4" placeholder="comment!" @unless (Auth::user()->userHasRole('DEP officer'))
                    disabled
                  @endunless></textarea>
            </div>
        </div>

        <div class=" p-2 mt-3 mb-4 text-dark">File>Attachment> <a class="text-primary text-decoration-none"
                href="{{ route('file.show', ['filename' => $applicant->attachment]) }}">{{ $applicant->attachment }}
            </a></div>
        @can('approve-applicants')
            <div class="row">
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
                <div class="form-group col-6">
                    <label for="dep_status">Dep. status:</label>
                    <select class="form-control" id="dep_status" name="dep_status"
                        @unless (Auth::user()->userHasRole('DEP officer'))
                          disabled
                        @endunless>
                        <option value="">Select Status</option>
                        <option value="Passed">Passed</option>
                        <option value="Failed">Failed</option>
                    </select>
                </div>
                <div class="col-5" style="margin-top:3.8%;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        @endcan

    </form>
</div>
@endsection

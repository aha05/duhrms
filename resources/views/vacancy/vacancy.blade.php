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

    <div class="row">
        <div class="col-4">
            <form action="{{ route('vacancy.filter.department') }}" class="row">
                <div class="form-group col-8 me-0">
                    <label for="department">Department:</label>
                    <select class="form-control" id="department" name="department">
                        <option value="">Department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}" {{ $depPrev ?? '' == $department->full_name ?? '' ? 'selected' : '' }}>{{ $department->full_name ?? '' }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary col-4 h-25 ms-0" style="margin-top: 8%;" type="submit">search</button>
            </form>
        </div>
    </div>
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
                    <td>
                        @if ($vacancyRequest->getAcApproval($vacancyRequest->id)->status ?? '')
                            @if ($vacancyRequest->getAcApproval($vacancyRequest->id)->status == 'Approved')
                                <span class="text-success">
                                    <i class="fas fa-check"></i>
                                    {{ $vacancyRequest->getAcApproval($vacancyRequest->id)->status }}
                                </span>
                            @elseif ($vacancyRequest->getAcApproval($vacancyRequest->id)->status == 'Rejected')
                                <span class="text-danger">
                                    <i class="fas fa-times"></i>
                                    {{ $vacancyRequest->getAcApproval($vacancyRequest->id)->status }}
                                </span>
                            @else
                            @endif
                        @else
                            <i class="fas fa-clock"></i> Pending
                        @endif
                    </td>
                    <td>
                        @if ($vacancyRequest->getHrApproval($vacancyRequest->id)->status ?? '')
                            @if ($vacancyRequest->getHrApproval($vacancyRequest->id)->status == 'Approved')
                                <span class="text-success">
                                    <i class="fas fa-check"></i>
                                    {{ $vacancyRequest->getHrApproval($vacancyRequest->id)->status }}
                                </span>
                            @elseif ($vacancyRequest->getHrApproval($vacancyRequest->id)->status == 'Rejected')
                                <span class="text-danger">
                                    <i class="fas fa-times"></i>
                                    {{ $vacancyRequest->getHrApproval($vacancyRequest->id)->status }}
                                </span>
                            @else
                            @endif
                        @else
                            <i class="fas fa-clock"></i> Pending
                        @endif
                    </td>

                    <td><a href="{{ route('vacancy.approval', $vacancyRequest) }}" class="text-decoration-none"><i
                                class="fas fa-eye"></i>&nbsp;View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <script>
        function loadDoc() {
            document.getElementById("demo").style.visibility = 'visible';
            document.getElementById("one").style.visibility = 'hidden';
            const xhttp =
                new XMLHttpRequest(); //! A browser built-in XMLHttpRequest object (to request data from a web server).
            xhttp.onreadystatechange = function() {
                // A callback function is a function passed as a parameter to another function.
                if (this.readyState == 4 && this.status == 200) {

                    document.getElementById("one").style.visibility = 'visible';
                    document.getElementById("demo").style.visibility = 'hidden';
                }
            };
            xhttp.open("POST", "{{ route('vacancy.filter.department') }}");
            xhttp.send();
        }
    </script>
@endsection

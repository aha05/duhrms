@extends('layouts.layout')
@section('content')
    @php

    @endphp
    @can('view-dashboard')
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
        <main>
            <div class="cards">
                <div style="border-left: 3px solid red;" class="card-single">
                    <div>
                        @if (Auth::user()->userHasRole('admin') || Auth::user()->userHasRole('HR officer'))
                            <h1>{{ $leave->count() }}</h1>
                            <span style="color: red !important;;">Pending Leave</span>
                        @elseif (Auth::user()->userHasRole('HR officer') || Auth::user()->userHasRole('AC officer'))
                            <h1>{{ $leave->count() }}</h1>
                            <span style="color: red !important;;">Pending Leave</span>
                        @else
                            <h1>{{ $self_leave->count() }}</h1>
                            <span style="color: red !important;;">Requested Leave</span>
                        @endif
                    </div>
                    <div>
                        <span class="fas fa-user-times"></span>
                    </div>
                </div>

                <div style="border-left: 3px solid #2fa4e7;" class="card-single">
                    <div>
                        <h1>2</h1>
                        <span style="color:#2fa4e7!important;"> Report</span>
                    </div>
                    <div>
                        <span class="fas fa-file"></span>
                    </div>
                </div>

                <div style="border-left: 3px solid #f6c23e!important;" class="card-single">
                    <div>
                        <h1>{{ $employee->count() }}</h1>
                        <span style="color:#f6c23e!important;">Total Employee</span>
                    </div>
                    <div>
                        <span class="fas fa-users"></span>
                    </div>
                </div>
                @can('view-users-lists')
                    <div style="border-left: 3px solid #f6c23e!important;" class="card-single">
                        <div>
                            <h1>{{ $all_users->count() }}</h1>
                            <span style="color:#3ef688!important;">Users</span>
                        </div>
                        <div>
                            <span class="fas fa-users"></span>
                        </div>
                    </div>
                @endcan
            </div>

            <div class="recent-grid">
                <div class="project">
                    <div class="card">
                        <div class="card-header">
                            <h3>Report
                            </h3>
                            @can('view-reports')
                                <a href="{{ route('report') }}" class="btn btn-primary text-light">see all <i
                                        class="las la-arrow-right">
                                    </i></a>
                            @endcan
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <td>Report types</td>
                                            <td> information</td>
                                            <td>Status</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Employee general information </td>
                                            <td>information</td>
                                            <td>
                                                <span class="status"></span>
                                                review
                                            </td>
                                        </tr>


                                        <tr>
                                            <td>Employee leave information </td>
                                            <td>information</td>
                                            <td>
                                                <span class="status "></span>
                                                review
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h3>Users</h3>
                            @can('view-users-lists')
                                <button class="btn btn-primary"> <a href="{{ route('account', Auth::user()) }}"
                                        class="text-light text-decoration-none">see all <i
                                            class="las la-arrow-right"></i></a></button>
                            @endcan
                        </div>
                        <div class="card-body">
                            @foreach ($all_users->take(4) as $all_user)
                                <div class="customer">
                                    <div class="info">
                                        <img src="{{ $all_user->avatar }}" alt="££" width="40px" height="40px">
                                        <div>
                                            <h4>{{ $all_user->name }}</h4>
                                            @if ($all_user->employee != null)
                                                <small>{{ $all_user->employee->position }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="contact">
                                        <span class="las la-user-circle"></span>
                                        <span class="las la-cmment"></span>
                                        <span class="las la-phone"></span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
        </main>
    @endcan
@endsection

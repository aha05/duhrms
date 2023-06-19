@extends('layouts.layout')
@section('content')
    <main>
        <div class="cards">
            <div style="border-left: 3px solid red;" class="card-single">
                <div>
                    <h1>54</h1>
                    <span style="color: red !important;;">Leave</span>
                </div>
                <div>
                    <span class="fas fa-user-times"></span>
                </div>
            </div>

            <div style="border-left: 3px solid #2fa4e7;" class="card-single">
                <div>
                    <h1>7</h1>
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

            <div style="border-left: 0.25rem solid #4e73df!important;" class="card-single">
                <div>
                    <h1>$6k</h1>
                    <span>Bonus</span>
                </div>
                <div>
                    <span class="las la-google-wallet"></span>
                </div>
            </div>
        </div>

        <div class="recent-grid">
            <div class="project">
                <div class="card">
                    <div class="card-header">
                        <h3>Report
                        </h3>
                        <button class="btn btn-primary">see all <i class="las la-arrow-right">
                            </i></button>
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
                                        <td>Employee general information </td>
                                        <td>information</td>
                                        <td>
                                            <span class="status purple"></span>
                                            review
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Employee general information </td>
                                        <td>information</td>
                                        <td>
                                            <span class="status "></span>
                                            review
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Employee general information </td>
                                        <td>information</td>
                                        <td>
                                            <span class="status orange"></span>
                                            review
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Employee general information </td>
                                        <td>information</td>
                                        <td>
                                            <span class="status pink"></span>
                                            review
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Employee general information </td>
                                        <td>information</td>
                                        <td>
                                            <span class="status"></span>
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
                        <button class="btn btn-primary"> <a href="{{ route('account', Auth::user()) }}"
                                class="text-light text-decoration-none">see all <i
                                    class="las la-arrow-right"></i></a></button>
                    </div>
                    <div class="card-body">
                        @foreach ($all_users->take(4) as $all_user)
                            <div class="customer">
                                <div class="info">
                                    <img src="{{ $all_user->avatar }}" alt="££" width="40px" height="40px">
                                    <div>
                                        <h4>{{ $all_user->name }}</h4>
                                        <small>CEO Excerpt</small>
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
    <div class="recent-grids">
        <div class="card text-center ms-3 mb-3">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
            </div>
        </div>
        <div class="card text-center me-3 mb-3">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <canvas id="mydoughnut" style="width:100%;max-width:600px"></canvas>
            </div>
        </div>
    </div>
@endsection

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
    <!-- Vertically centered modal -->
    @include('partials._registerEmployee')
    <div class="container p-2">
        <div class="col-6">
            <h3 class="p-2 pb-4">Dashboard><span class="text-primary"> Login Activity</span> </h3>
        </div>

        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <td></td>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Ip Address</th>
                    <th>First Login</th>
                    <th>Last Login</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logActivity as $item)
                    <tr>
                        <td><img src="{{ $item->user->avatar }}" class="rounded-circle shadow" width="50px" height="50px" alt=""></td>
                        <td>{{ $item->user->name ?? '' }}</td>
                        <td>{{ $item->user->email }}</td>
                        <td>{{ $item->ip_address }}</td>
                        <td>{{ $item->created_at->format('F d, Y') ?? '' }}</td>
                        <td>{{ $item->login_at->diffForHumans() ?? '' }}</td>
                        <td style="display: none"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

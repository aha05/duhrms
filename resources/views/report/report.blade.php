@extends('layouts.layout')
@section('content')
<h3 class="p-2 pb-0">Dashboard> User<span class="text-primary"> User Report</span> </h3>
            <div class="row mb-3">
                <div class="col-5"></div>
                <a href="{{ route('generatePDF') }}" class="btn btn-success col-2 pe-0 ps-0 me-1"><i class="fas fa-file-pdf"></i> PDF Export</a>
                <a href="{{ route('generateExcel') }}" class="btn btn-info col-2 pe-0 ps-0 me-1"><i class="fas fa-file-excel"></i> Excel Export</a>
                <a href="{{ route('importExcel') }}" class="btn btn-info col-2 pe-0 ps-0 me-1"><i class="fas fa-file-excel"></i>  Import Excel</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-primary">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>avatar</th>
                            <th>password</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><a
                                        href="{{ route('profile', $item) }}">{{ $item->name }}</a></td>
                                <td>{{ $item->email }}</td>
                                <td><img src="{{$item->avatar}}" width="50px" height="50px" alt=""></td>
                                <td>{{ __('Password') }}</td>
                                <td>{{ $item->created_at->diffForHumans() }}
                                </td>
                                <td>{{ $item->updated_at->diffForHumans() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

    </body>

    </html>
@endsection

@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
@section('content')
    </div>
    <div class="row">
        <div class="col-8">
            @foreach ($posts as $post)
            <div class="card shadow mb-3 m-3 ms-5" style="width:80%;">
                <div class="card-body text-secondary">
                    <h5 class="card-title fw-bolder fs-2 text-dark">{{ $post->title }}</h5>
                    <div class="row">
                        <p class="card-text col-9">{{ $post->description }}</p>
                        <a href="{{ route('applyjob') }}" class="btn bg-primary col-2 h-25 m-1">apply</a>
                        <div class="table">
                            <td><span class="fw-bolder text-primary">department:</span></td>
                            <td>{{ $post->department }}</td>
                            <td><span class="ms-5 fs-3text-dark bg-light">{{ $post->type }}</span></td>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div style="width:25%; margin-left:10%;">
                {{ $posts->links() }}
            </div>

        </div>
        <div class="col-4">
            @if (Auth::check())
             <a href="{{ route('postjob') }}" class="btn btn-primary m-4 shadow">Post Job</a>
            @endif
            <div class="input-group w-75">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-primary">search</button>
            </div>
            <div class="card mt-5 w-75 shadow">
                <div class="card-body">
                  <h5 class="card-title fw-bolder fs-2">Catagories</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
             </div>
        </div>

    </div>
@endsection

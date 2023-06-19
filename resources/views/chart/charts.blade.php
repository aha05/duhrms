@extends('layouts.layout')
@section('content')
 <h1>chart</h1>
 {!! $chart->container() !!}

 <div class="container" >
   <div class="w-25 h-25">
      {!! $chart->script() !!}
   </div>

 </div>

@endsection

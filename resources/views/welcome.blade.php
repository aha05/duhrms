@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src="{{ asset('js/bootstraps.js') }}"></script>
    <title>Document</title>
</head>
<body>
    <h1 class="text-capitalize fs-1 text-center">Welcome to Dilla University Human resource management</h1>
</body>
<div id = "loading" class="spinner spinner--steps icon-spinner" aria-hidden="true"></div>
<style>
    #loading {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 32px;
  height: 32px;
  /* 1/2 of the height and width of the actual gif */
  margin: -16px 0 0 -16px;
  z-index: 100;
  }
</style>
<script>
    $(window).load(function() {
  $('#loading').remove();
  });
</script>
</html>

@endsection


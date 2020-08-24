@extends('layout')
@section('css')
        <link rel="stylesheet" href="{{asset('css/timepicki.css')}}">
@stop
@section('javascript')
        <script src="{{asset('js/timepicki.js')}}"></script>
@stop
@section('title', 'Iluminación')
@section('content')
@nav
@endnav
<div id="content" class="container-md">
  <h2>{{$titlePage}}</h2>
  @alert
  @endalert
  @error('title')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror

@mode('1')
@include('pages.timer')
@elsemode('0')
@include('pages.manual')
@endmode

</div>
<script src="{{asset('js/ajaxbtn.js')}}"></script>
@parent
@endsection

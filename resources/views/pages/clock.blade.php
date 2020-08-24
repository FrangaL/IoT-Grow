@extends('layout')
@section('css')
        <link rel="stylesheet" href="{{asset('css/clock.css')}}">
@stop
@section('title', 'Reloj')
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
<div class="outer">
    <div class="inner">
                <form name="phpoc_setup" action="clock_setup_php.php" method="post">
                        <div class="inline">
                                <canvas id="rtc_clock"></canvas>
                        </div>
                        <div class="inline">
                                <canvas id="local_clock"></canvas>
                                <input type="hidden" name="host_time_txt">
                        </div>
                        <br>
<!--                        <table>
                                <tr>
                                        <td class="theader">Last updated</td>
                                        <td><div id="sync_time"></div></td>
                                </tr>
                        </table> -->
                        <button type="button" id="sync" class="btn btn-outline-secondary sync mr-1">Sincronizar</button>
                </form>
</div>
</div>

</div>
<script> var rtc_time = '{{ rtc_get_date() }}';</script>
<script src="{{asset('js/clock.js')}}"></script>

@parent
@endsection

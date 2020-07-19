@extends('layout')
@section('css')
        <link rel="stylesheet" href="{{asset('css/toastr.css') }}" >
@stop
@section('title', 'Iluminación')

@section('content')
@nav
@endnav
<div id="content" class="container-md">
  <h2>{{$titlePage}}</h2>
	<table class="table table-bordered">
		<thead class="thead-light">
			<tr>
				<th>Sector 1</th>
				<th>Sector 2</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<input type="checkbox" name="#toggle1" id="toggle1" data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger" data-off="Apagado" data-on="Encendido" {{ btnact('24') }}>
				</td>
				<td>
					<input type="checkbox" name="toggle2" id="toggle2" data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger" data-off="Apagado" data-on="Encendido" {{ btnact('25') }}>
				</td>
			</tr>
		</tbody>
		<thead class="thead-light">
			<tr>
				<th>Sector 3</th>
				<th>Sector 4</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<input type="checkbox" name="toggle3" id="toggle3" data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger" data-off="Apagado" data-on="Encendido" {{ btnact('26') }}>
				</td>
				<td>
					<input type="checkbox" name="toggle4" id="toggle4" data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger" data-off="Apagado" data-on="Encendido" {{ btnact('27') }}>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<script src="{{asset('js/ajaxbtn.js')}}"></script>

@parent
@endsection

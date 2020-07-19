@extends('layout')
@section('title', 'Temperatura')

@section('content')
@nav
@endnav
<style>
@font-face {
    font-family: 'fontello';
    src: local('fontello'),
        url(data:application/font-woff2;charset=utf-8;base64,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) format('woff2');
    font-weight: normal;
    font-style: normal;
}
[class^="icon-"]:before, [class*=" icon-"]:before {
 font-family: "fontello";
 font-style: normal;
 font-weight: normal;
 speak: none;
 display: inline-block;
 text-decoration: inherit;
 width: 1em;
 margin-right: .2em;
 text-align: center;
 font-variant: normal;
 text-transform: none;
 line-height: 1em;
 margin-left: .2em;
 -webkit-font-smoothing: antialiased;
 -moz-osx-font-smoothing: grayscale;
}
.icon-clock:before { content: '\e800'; } /* '' */
.icon-left-big:before { content: '\e801'; } /* '' */
.icon-right-big:before { content: '\e802'; } /* '' */
</style>

<div id="content" class="container-md">
	<div class="menu-trigger"></div>
	<h2>Gráficas temperatura</h2>

	<style>
	.carousel img {
	     margin: auto;
	}
	</style>
	<div id="carouselTemp" class="carousel slide" data-ride="carousel">
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img class="d-block w-75" src="images/temp-sensor/cpu_temp_1h.png" alt="1 Hora">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-75" src="images/temp-sensor/cpu_temp_2h.png" alt="Second slide">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-75" src="images/temp-sensor/cpu_temp_6h.png" alt="Third slide">
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselTemp" role="button" data-slide="prev">
	<i style="color:black" class="icon-left-big"></i>
	    <span class="sr-only">Anterior</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselTemp" role="button" data-slide="next">
	<i style="color:black" class="icon-right-big"></i>
	    <span class="sr-only">Próxima</span>
	  </a>
	</div>
</div>
@parent
@endsection

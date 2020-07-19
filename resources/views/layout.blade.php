<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
@yield('head')
		<title>DomIndoor - @yield('title')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="favicon.ico">
		<meta name="csrf-token" content="{{csrf_token()}}">
		<script src="{{asset('js/app.js')}}"></script>
@yield('javascript')
		<link rel="stylesheet" href="{{asset('css/app.css')}}">
		<link rel="stylesheet" href="{{asset('css/all.css')}}">
@yield('css')
	</head>
<body>
	<header id="header">
		<div class="inner">
			<a href="/" class="logo">
				<span class="symbol"><img src="/images/logo.png" alt="Logo" /></span><span class="title">Indoor</span>
			</a>
		</div>
	</header>
<div class="blue-bg"></div>
<div class="white-bg shadow-hd"></div>
@yield('content')
@yield('footer')
    <div class="footer">
        	<h4>&copy; DomoIndoor</h4>
    </div>
@show
<script src="{{asset('js/all.js')}}"></script>
<script>
$('.burger, .overlay').click(function(){
  $('.burger').toggleClass('clicked');
  $('.overlay').toggleClass('show');
  $('nav').toggleClass('show');
  $('body').toggleClass('overflow');
});
</script>
</body>
</html>

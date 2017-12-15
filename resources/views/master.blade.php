<!DOCTYPE HTML>
<html>
	<head>
		<title>Mobilestore Website</title>
		<base href="{{asset('')}}">
		<link href="source/css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link rel="stylesheet" type="text/css" href="source/css/bootstrap.css">
		<meta name="keywords" content="Mobilestore iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
		<link href='//fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="source/css/responsiveslides.css">
		<script src="source/js/jquery.min.js"></script>
		<script src="source/js/responsiveslides.min.js"></script>
	</head>
	<body>
		<div class="wrap">
		<!----start-Header---->
		@include('header')
		<!----End-Header---->

	    <!----start-Content---->
	    @yield('content')
		<!----End-Content---->
		
		<!----start-Footer---->
		@include('footer')
		<!----End-Footer---->
	</body>
</html>
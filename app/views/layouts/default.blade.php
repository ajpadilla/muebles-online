<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Grupo Dos: Diseños Auxiliares</title>
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
	<meta name="author" content="" />

	<!-- Mobile Specific Metas
    ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<!-- CSS ================================================== -->
    @include('layouts.partials._css-includes')

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico" />

    <!-- PAGE SCRIPT -->
    <script>
	    $(document).ready(function() {
			$('#selectNav').change(function(e) {
				var option = $(this).selected();
				var url = option.val();
				document.location.href = url;
			});
	    });
    </script>
</head>
<body class="home">
	<div id="bodychild">
		<div id="outercontainer">
            @include('layouts.partials._header')
            @yield('content')
			@include('layouts.partials._footer')
		</div><!-- end outercontainer -->
	</div><!-- end bodychild -->
    <!-- SCRIPT INCLUDES -->
    @include('layouts.partials._js-includes')
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Muebles Laravel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<!--CSS-->
    @include('layouts.partials._css-includes')
    <!-- PAGE SCRIPT -->
    <script>
        @yield('script')
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

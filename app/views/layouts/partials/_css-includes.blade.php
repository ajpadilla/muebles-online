<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
{{--<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">--}}
<link rel="stylesheet" href="{{asset('css/main.css')}}" />
<link rel="stylesheet" href="{{asset('css/vendor/flexslider.css')}}"/>
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
<link rel="stylesheet" href="{{asset('css/vendor/inner.css')}}" />
<link rel="stylesheet" href="{{asset('css/vendor/layout.css')}}" />
<link rel="stylesheet" href="{{asset('css/vendor/color.css')}}" />
<link rel="stylesheet" href="{{asset('css/vendor/prettyPhoto.css')}}" />
<link rel="stylesheet" href="{{asset('css/vendor/nivo-slider.css')}}"/>
@yield('in-situ-css')

<style>
	.mini-photo {
		width: 74px;
		height: 103px;
		/*margin: 0 auto;*/
		margin-right: 14px;
	}

	td {
	    vertical-align: middle;
	    text-align: left;
	}

	.sub-menu-own {
		padding: 10px;
		margin-right: 15px;
		list-style: none;
		font-size: 13px;
		font-weight: bold;
		text-transform: uppercase;
		color: #777;
	}

	#topnav li a {
        font-size: {{ $fontSize }};
    }
</style>

@yield('styles')

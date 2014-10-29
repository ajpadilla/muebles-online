@extends('layouts.default')

@section('content')
	<article>
		@include('flash::message');
	</article>
    @include('pages.partials._slider')
    @include('pages.partials._main-content')
    {{--@include('pages.partials._bottom')--}}
@stop

@section('')

@section('in-situ-js')
<!-- jQuery Flex Slider -->
<script type="text/javascript" src="{{asset('js/vendor/jquery.nivo.slider.pack.js')}}"></script>
@stop

@section('script')
<script type="text/javascript">
	jQuery(window).load(function() {
		jQuery('#slidernivo').nivoSlider({
			directionNav : false,
			controlNav :  true,
			effect: 'random',
			slices: 15,
			boxCols: 8,
			boxRows: 4,
			animSpeed: 500,
			pauseTime: 6000,
		});
		jQuery('#selectNav').change(function(e) {
			var option = $(this).selected();
			var url = option.val();
			document.location.href = url;
		});
	});
</script>
@stop

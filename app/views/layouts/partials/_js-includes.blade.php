<!--Jquery fileupload-->
<script text="text/javascript" src="{{asset('js/jQuery-File-Uploadjs/vendor/jquery.ui.widget.js')}}"></script>
<script text="text/javascript" src="{{asset('js/jQuery-File-Uploadjs/jquery.iframe-transport.js')}}"></script>
<script text="text/javascript" src="{{asset('js/jQuery-File-Uploadjs/jquery.fileupload.js')}}"></script>

<!--Jquery fancybox plugin-->
<script text="text/javascript" src="{{asset('js/fancybox/source/jquery.fancybox.js')}}"></script>
<script text="text/javascript" src="{{asset('js/fancybox/source/jquery.fancybox.pack.js')}}"></script>

<!--Jquery validate plugin-->
<script type="text/javascript" src="{{asset('js/jquery.validate.min.js')}}"></script>

<!--Nuevas validaciones para el jquery validate plugin-->
  <script type="text/javascript" src="{{asset('js/validaciones.js')}}"></script>

<!--Jquery form plugin-->
<script type="text/javascript" src="{{asset('js/jquery.form.min.js')}}"></script>

<!-- jQuery Superfish -->
<script type="text/javascript" src="{{asset('js/hoverIntent.js')}}"></script>
<script type="text/javascript" src="{{asset('js/superfish.js')}}"></script>
<script type="text/javascript" src="{{asset('js/supersubs.js')}}"></script>

<!-- jQuery Flex Slider -->
<script type="text/javascript" src="{{asset('js/jquery.nivo.slider.pack.js')}}"></script>

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
	});
</script>

<!-- jQuery Dropdown Mobile -->
<script type="text/javascript" src="{{asset('js/tinynav.min.js')}}"></script>

<!-- Custom Script -->
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>

<!-- jQuery PrettyPhoto -->
<script type="text/javascript" src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
<script type="text/javascript" src="{{asset('js/fade.js')}}"}}></script>
<script type="text/javascript" src="{{asset('js/jquery-easing-1.3.js')}}"></script>
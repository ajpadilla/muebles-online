<!--Jquery fileupload-->
<script text="text/javascript" src="{{asset('js/vendor/jquery-1.7.1.min.js')}}"></script>
{{--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>--}}

<!-- jQuery Superfish -->
<script type="text/javascript" src="{{asset('js/vendor/hoverIntent.js')}}"></script>
<script type="text/javascript" src="{{asset('js/vendor/superfish.js')}}"></script>
<script type="text/javascript" src="{{asset('js/vendor/supersubs.js')}}"></script>

<!-- jQuery Dropdown Mobile -->
<script type="text/javascript" src="{{asset('js/vendor/tinynav.min.js')}}"></script>

<!-- Extre in-situ include librarys -->
@yield('in-situ-js')

<!-- Custom Script -->
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>

<!-- jQuery PrettyPhoto -->
<script type="text/javascript" src="{{asset('js/vendor/jquery.prettyPhoto.js')}}"></script>
<script type="text/javascript" src="{{asset('js/vendor/fade.js')}}"}}></script>
<script type="text/javascript" src="{{asset('js/vendor/jquery-easing-1.3.js')}}"></script>


@yield('script');
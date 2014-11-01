@extends('layouts.default')
@section('content')
	<!-- AFTERHEADER -->
    <div id="outerafterheader">
        <div class="container">
            <div class="row">
                <div id="afterheader" class="twelve columns">
                    <h4 class="pagetitle nodesc">Nuestra Empresa</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- END AFTERHEADER -->
    <!-- MAIN CONTENT -->
	<div id="outermain">
	    <div id="maincontainer">
	        <div class="container">
	            <div class="row">
	                <section id="maincontent">
	                    <section class="twelve columns">
	                        <div class="row" style="margin-bottom: 10px;">
	                            <article style="border-color: #ffffff; border-style: solid; border-width: 5px; margin: 3px; padding: 5px 5px;">
	                                <p style="margin: 5px; padding: 5px; font-size: 110%">
	                                    <em>Nos es grato presentarles una nueva edición de nuestro catálogo general, el cual comtempla tanto los modelos ya conocidos por Vds. como las últmas novedades. Lo hacemos con la ilusión de que siga teniendo la misma aceptación que nos han dispensado hasta ahora. Deseando que les sea de gran utilidad y les facilite su trabajo, reciban nuestro más sincero agradecimiento.</em>
                                    </p>
	                            </article>
                            </div>
	                    </section>
	                    <section id="content" class="twelve columns">
	                        <div id="ts-portfolio">
	                            @if($imgIndex = 1) @endif
	                            @for ($i = 1; $i <= 3; $i++)
	                                <div class="row ">
	                                    @for ($j = 1; $j <= 3; $j++)
			                                <div class="item one_third columns">
			                                    <div class="ts-pf-img">
			                                        <a class="pfzoom" href="{{asset('images/about/' . $imgIndex . '.jpg')}}" data-rel=prettyPhoto[mixed] title="Deluxe Room">
			                                            <span class="rollover"></span>
			                                            <img src="{{asset('images/about/' . $imgIndex . '.jpg')}}" alt="img{{ $imgIndex }}" />
			                                        </a>
			                                    </div>
			                                    <div class="ts-pf-text">
			                                        <h3 class="pftitle">Deluxe Room</h3>
			                                        <div class="textcontainer">
			                                            Praesent vestibulum aenean non ummy hendrerit mauris. Hasellus porta. Fusce suscipit varius mi cum sociis natoque penatibus et. Duis elementum risus non vulputate venenatis.
			                                        </div>
			                                        {{--<div class="more-container"><a href="room-detail.html" class="more-link">Read More</a></div>--}}
			                                    </div>
			                                    <div class="clear"></div>
			                                </div>
			                                @if($imgIndex++) @endif
		                                @endfor
		                            </div>
		                        @endfor
	                        </div>
	                    </section>
	                </section>
	            </div>
	        </div>
	    </div>
	</div>
<!-- END MAIN CONTENT -->
@stop

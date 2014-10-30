@extends('layouts.default')

@section('content')
<div id="outerafterheader">
    <div class="container">
        <div class="row">
            <div id="afterheader" class="twelve columns">
                <h1 class="pagetitle nodesc">{{ $user->nombre}}</h1>
            </div>
        </div>
    </div>
</div>
    <!-- MAIN CONTENT -->
<div id="outermain">
    <div id="maincontainer">
        <div class="container">
            <div class="row">
                <section id="maincontent">
                     <section class="eight columns positionleft" id="content">
                        <article>
                            <div class="articlecontainer">
                                <div class="entry-content">
                                    <br/>
                                    <h2>Datos del usuario</h2>
                                    <ul class="listborder">
                                        <li><strong>Nombre: </strong><em>{{$user->nombre}}</em></li>
                                        <li><strong>Email: </strong><em>{{ $user->email}}</em></li>
	                                    <li><strong>Dirección: </strong><em>{{$user->direccion}}</em></li>
	                                    <li><strong>Codigo Postal: </strong><em>{{ $user->codigo_postal }}</em></li>
	                                    <li><strong>Provincia: </strong><em>{{ $user->provincia->poblacion->nombre }}</em></li>
	                                    <li><strong>Telefono fijo: </strong><em>{{ $user->telefono_fijo }}</em></li>
	                                    <li><strong>Fax: </strong><em>{{ $user->fax}}</em></li>
	                                    <li><strong>Activo: </strong><em>{{ $user->getActivoShow() }}</em></li>
	                                    <li><strong>Rol: </strong><em>{{ $user->rol}}</em></li>
                                    </ul>
                                    <div class="clear"></div>
                                    <ul class="line">
                                        <li>
                                        </li>
                                    </ul>
                                </div>

                                <div class="clear"></div>
                            </div>
                        </article><!-- end post -->

                    </section><!-- content -->

                    <aside class="four columns positionright" id="sidebar">
						<div class="widget-area">
                        <ul>
                            <!--<li class="widget-container widget_hover">
                                <h2 class="widget-title">Información del Producto</h2>
                                <div class="textwidget">{{}}</div>
                            </li>-->
                            @include('layouts.partials._random-products')
                            {{--@include('layouts.partials._tags')--}}
                        </ul>
                        </div>
                    </aside><!-- sidebar -->

                </section>
            </div>
        </div>
    </div>
</div>
@stop

@section('in-situ-css')
<style>
	.img-slider .slides img {
	    width: 550px;
	    height: auto;
	    margin: 0 auto;
	    /*margin-left: 15px;
	    margin-right: 15px;*/
	}

	.black-background {
		background-color: #0c0c0c;
	}
</style>
@stop

@section('in-situ-js')
	<script src="/js/vendor/jquery.flexslider-min.js"></script>
@stop

@section('script')
<script>
	jQuery(window).load(function() {
		jQuery('#roomslider').flexslider({
			animation: "fade",
			touch:true,
			animationDuration: 6000,
			directionNav: true,
			controlNav: false
		});
	});
</script>
@stop
@extends('layouts.default')

@section('content')
<div id="outerafterheader">
    <div class="container">
        <div class="row">
            <div id="afterheader" class="twelve columns">
                <h1 class="pagetitle nodesc">{{ $product->nombre }}</h1>
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
                                <div class="black-background img-slider flexslider" id="roomslider">
                                     <ul class="slides">
                                        <?php $i=0; ?>
                                        @foreach($product->photos as $photo)
                                            <a class="pfzoom" data-rel="prettyPhoto[mixed]" rel="prettyPhoto[mixed]" href="{{ asset($photo->path . $photo->filename) }}">
	                                            @if($i==0)
		                                            <li style="width: 100%; float: left; margin-right: -100%; position: relative; display: list-item;" class="flex-active-slide">
		                                            <?php $i=1; ?>
		                                        @else
		                                            <li style="width: 100%; float: left; margin-right: -100%; position: relative; display: none;" class="">
		                                        @endif
													<img class="" alt="{{ $photo->filename }}" src="{{ asset($photo->path . $photo->filename) }}">
		                                        </li>
	                                        </a>
                                        @endforeach
                                     </ul>
                                     <div class="clear"></div>
                                <ul class="flex-direction-nav"><li><a href="#" class="flex-prev">Anterior</a></li><li><a href="#" class="flex-next">Siguiente</a></li></ul></div>

                                <div class="entry-content">
                                    <br/>
                                    <h2>Detalles</h2>
                                    <ul class="listborder">
                                        <li><strong>Código: </strong><em>{{ $product->codigo }}</em></li>
                                        <li><strong>Medidas: </strong><em>{{ $product->medidas }}</em></li>
                                        @if($currentUser)
	                                        {{--<li><strong>Lacado: </strong><em>{{ $product->lacado }}</em></li>--}}
	                                        <li><strong>Precio del Lacado: </strong><em>{{ $product->precio_lacado }}</em></li>
	                                        <li><strong>Precio en Puntos del Lacado: </strong><em>{{ $product->precio_lacado_puntos }}</em></li>
	                                        {{--<li><strong>Pulimento: </strong><em>{{ $product->pulimento }}</em></li>--}}
	                                        <li><strong>Precio del Pulimento: </strong><em>{{ $product->precio_pulimento }}</em></li>
	                                        <li><strong>Precio en Puntos del Pulimento: </strong><em>{{ $product->precio_pulimento_puntos }}</em></li>
	                                    @endif
                                    </ul>
                                    <div class="clear"></div>
                                    <ul class="line">
                                        <li>
                                        {{--<div class="price">€{{ $product->precio }}--}}{{--<span>/-->night</span>--}}{{--</div>--}}
                                        </li>
                                        @if($currentUser)
                                            @if($currentUser->isClient())
                                                <li><a href="{{ route('pedidos.create', $product->id) }}" class="button">Realizar pedido</a></li>
                                            @endif

                                            @if($currentUser->isAdmin())
                                                <li><a href="{{ route('photos.create', $product->id) }}" class="button">Agregar fotos</a></li>
                                                <li><a href="{{ route('products.edit', $product->id) }}" class="button">Editar</a></li>
                                                <li><a href="{{ route('products.destroy', $product->id) }}" class="button">Eliminar</a></li>
                                            @endif
                                        @endif
                                    </ul>
                                </div>

                                <div class="clear"></div>
                            </div>
                        </article><!-- end post -->

                    </section><!-- content -->

                    <aside class="four columns positionright" id="sidebar">
						<div class="widget-area">
                        <ul>
                            <li class="widget-container widget_hover">
                                <h2 class="widget-title">Información del Producto</h2>
                                <div class="textwidget">{{ $product->descripcion }}</div>
                            </li>
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
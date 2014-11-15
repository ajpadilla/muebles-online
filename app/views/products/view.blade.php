@extends('layouts.default')

@section('content')
<div id="outerafterheader">
    <div class="container">
        <div class="row">
            <div id="afterheader" class="twelve columns">
                <h1 class="pagetitle nodesc">{{ $product->codigo . ' - ' . $product->nombre }}</h1>
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
								<div class="flexslider black-background img-slider">
								  <ul class="slides">
								    @foreach($product->photos as $photo)
								        @if($product->photos->count() == 1)
								            <li data-thumb="{{ asset($photo->complete_path) }}" class="flex-active-slide">
								        @else
							                <li data-thumb="{{ asset($photo->complete_path) }}">
							            @endif
								      <img id="img-{{ $photo->id }}" src="{{ asset($photo->complete_path) }}" data-zoom-image="{{ asset($photo->complete_path) }}" />
								    </li>
								    @endforeach
								  </ul>
								</div>

                                <div class="entry-content">
                                    <br/>
                                    <h2>Detalles</h2>
                                    <ul class="listborder">
                                        <li><strong>Código: </strong><em>{{ $product->codigo }}</em></li>
                                        <li><strong>Medidas: </strong><em>{{ $product->medidas }}</em></li>
                                        @if($currentUser)
	                                        <li><strong>Precio del Lacado: </strong><em>{{ $product->precio_lacado }}</em></li>
	                                        <li><strong>Precio en Puntos del Lacado: </strong><em>{{ $product->precio_lacado_puntos }}</em></li>
	                                        <li><strong>Precio del Pulimento: </strong><em>{{ $product->precio_pulimento }}</em></li>
	                                        <li><strong>Precio en Puntos del Pulimento: </strong><em>{{ $product->precio_pulimento_puntos }}</em></li>
	                                    @endif
                                    </ul>
                                    <div class="clear"></div>
                                    <ul class="line">
                                        <li>
                                        </li>
                                        @if($currentUser)
                                            @if($currentUser->isClient())
                                                {{--<li><a href="{{ route('pedidos.create', $product->id) }}" class="button">Realizar pedido</a></li>--}}
                                                <li><a id="create-pedido" href="#fancybox" class="button" width="600">Realizar pedido</a></li>
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
                            <li class="widget-container widget_hover">
                                <h2 class="widget-title">Fotos Relacionadas</h2>
                                <div class="textwidget">
                                    <div>
                                    @foreach($product->photos as $photo)
                                        <a class="frame mini-photo" href="{{ route('products.show', [$product->id, $photo->id]) }}">
                                            <img id="img-{{ $photo->id }}" src="{{ asset($photo->complete_thumbnail_path) }}" />
                                        </a>
                                    @endforeach
                                    </div>
                                </div>
                            </li>
                            @include('layouts.partials._random-products')
                            {{--@include('layouts.partials._tags')--}}
                        </ul>
                        </div>
                    </aside><!-- sidebar -->

                </section>
            </div>

            {{-- Section for Fancybox Window --}}
            <div class="row" style="display: none">
                <section id="fancybox">
                    <section class="three columns positionleft"></section>
					<section id="content" class="six columns positionleft">
						<div class="page articlecontainer">
							<article class="entry-content">
								<h2>RELLENA LOS SIGUIENTES CAMPOS</h2>
								<div id="contactform">
									{{ Form::open(['id' => 'frmPedidoRequest', 'url' => 'pedidos']) }}
									{{ Form::hidden('product_id', $product->id) }}
									<fieldset>
										<div id ="div-errors" class="alert alert-danger" style="display: none">
											<ul id="ul-errors">

											</ul>
										</div>
										<div id="div-flash" class="alert" style="display: none">

										</div>
										<div class="row">
											<div class="six columns">
												{{ Form::label('color', 'Color:') }}
												{{ Form::text('color', null, ['size' => '10', 'class' => 'text-input']) }}
											</div>
											<div class="six columns">
												{{ Form::label('cantidad', 'Cantidad:') }}
												{{ Form::number('cantidad', 1, ['size' => '10', 'class' => 'text-input', 'placeholder' => '1', 'min' => 1]) }}
											</div>
											<div class="clear"></div>
                                            <div class="clear"></div>
                                            <div class="six columns">
                                                {{ Form::label('nombre_cliente', 'Nombre del Cliente:') }}
                                                {{ Form::text('nombre_cliente', null, ['class' => 'text-input', 'placeholder' => 'Si es para otro cliente, escribe la direccion. Si es para ti, dejalo en blanco.']) }}
                                            </div>
                                            <div class="twelve columns">
                                                {{ Form::label('direccion', 'Dirección Cliente:') }}
                                                {{ Form::text('direccion', null, ['class' => 'text-input']) }}
                                            </div>
											<div class="clear"></div>
											<div class="twelve columns">
                                                {{ Form::label('observacion', 'Observaciones:') }}
                                                {{ Form::textarea('observacion', null, ['class' => 'text-input', 'rows' => '2', 'cols' => '50']) }}
                                            </div>
											<div class="clear"></div>
											{{--<div class="three columns"></div>--}}
											<div class="six columns">
												{{ Form::label('do', 'Qué desea hacer:') }}
												{{ Form::radio('do', '1', null,  ['id' => 'do', 'checked']) }}
												Agregar más productos</br>
												{{ Form::radio('do', '0', null,  ['id' => 'do']) }}
												Finalizar Pedido
											</div>
											<div class="four columns">
												{{ Form::submit('Continuar', ['class' => 'button']) }}
											</div>
										</div>
									</fieldset>
									{{ Form::close() }}
								</div><!-- end contactform -->
							</article>
						</div>
					</section>
                </section>
            </div>
        </div>
    </div>
</div>
@stop

@section('in-situ-css')
<link rel="stylesheet" href="{{ asset('css/vendor/jquery.fancybox-1.3.4.css') }}"/>
<style>
	.img-slider .slides img {
	    width: 580px;
	    height: 700px;
	    margin: 0 auto;
	}

	.black-background {
		background-color: #e7e7e7;
	}

	ol img {
		width: 150px;
		height: 170px;
		margin-right: 5px;
		margin-left: 5px;
	}

	.fancybox-nav span {
		visibility: visible;
	}
</style>
@stop

@section('in-situ-js')
	<script src="{{ asset('js/vendor/jquery.flexslider-min.js') }}"></script>
	<script src="{{ asset('js/vendor/jquery.elevatezoom.min.js') }}"></script>
	<script src="{{ asset('js/vendor/jquery.elevatezoom.min.js') }}"></script>
	<script src="{{ asset('js/vendor/jquery.form.js') }}"></script>
	<script src="{{ asset('js/vendor/jquery.fancybox-1.3.4.pack.js') }}"></script>
	<script src="{{ asset('js/vendor/jquery-easing-1.3.js') }}"></script>
@stop

@section('styles')
<style>
.textwidget a {
	float: left;
	margin: 0;
}
</style>

@section('script')
<script>
	jQuery(window).load(function() {
		jQuery('.flexslider').flexslider({
            animation: "slide",
            directionNav: true,
			prevText: "Anterior",           //String: Set the text for the "previous" directionNav item
			nextText: "Siguiente",
            keyboard: true,
            startAt: {{ $startAt }},
            slideshow: false
          });

          jQuery('ul.slides').mouseover(function() {
	        jQuery('.flex-active-slide img').elevateZoom(
	        {
	            zoomType    : "lens",
	            lensShape   : "round",
	            lensSize    : 280
	        });
          });

		jQuery("#create-pedido").fancybox({
            centerOnScroll: true,
            hideOnOverlayClick: true
        });

	    var options = {
	        //target:        '#output2',   // target element(s) to be updated with server response
	        beforeSubmit:  showRequest,  // pre-submit callback
	        success:       showResponse  // post-submit callback

	        // other available options:
	        //url:       url         // override for form's 'action' attribute
	        //type:      type        // 'get' or 'post', override for form's 'method' attribute
	        //dataType:  null        // 'xml', 'script', or 'json' (expected server response type)
	        //clearForm: true        // clear all form fields after successful submit
	        //resetForm: true        // reset the form after successful submit

	        // $.ajax options can be used here too, for example:
	        //timeout:   3000
	    };

	    // bind to the form's submit event
	    jQuery('#frmPedidoRequest').submit(function() {
	        // inside event callbacks 'this' is the DOM element so we first
	        // wrap it in a jQuery object and then invoke ajaxSubmit
	        jQuery(this).ajaxSubmit(options);

	        // !!! Important !!!
	        // always return false to prevent standard browser submit and page navigation
	        return false;
	    });
	});

	// pre-submit callback
	function showRequest(formData, jqForm, options) {
	    // formData is an array; here we use $.param to convert it to a string to display it
	    // but the form plugin does this for you automatically when it submits the data
	    //var queryString = $.param(formData);

	    // jqForm is a jQuery object encapsulating the form element.  To access the
	    // DOM element for the form do this:
	    // var formElement = jqForm[0];

	    //alert('About to submit: \n\n' + queryString);

	    // here we could return false to prevent the form from being submitted;
	    // returning anything other than false will allow the form submit to continue
	    jQuery('#div-errors').hide();
	    jQuery('#div-flash').hide();
	    jQuery('#div-flash').removeClass().addClass('alert');
	    return true;
	}

	// post-submit callback
	function showResponse(responseText, statusText, xhr, $form)  {
	    // for normal html responses, the first argument to the success callback
	    // is the XMLHttpRequest object's responseText property

	    // if the ajaxSubmit method was passed an Options Object with the dataType
	    // property set to 'xml' then the first argument to the success callback
	    // is the XMLHttpRequest object's responseXML property

	    // if the ajaxSubmit method was passed an Options Object with the dataType
	    // property set to 'json' then the first argument to the success callback
	    // is the json data object returned by the server

	    /*alert('status: ' + statusText + '\n\nresponseText: \n' + responseText +
	        '\n\nThe output div should have already been updated with the responseText.');*/

	    var ulErrors = jQuery('#ul-errors');
	    var flash = jQuery('#div-flash');
		if(responseText.flashMsg) {
			var styleClass = (responseText.errors) ? 'alert-warning' : 'alert-success';
            flash.append('<p>' + responseText.flashMsg + '</p>');
            jQuery('#div-flash').addClass(styleClass).show();
	    }
	    var errors = responseText.errors;
	    if(!responseText.success) {
	        if(responseText.errors) {
		        jQuery.each(responseText.errors, function(key, value){
	                ulErrors.append('<li>' + value + '</li>');
	            });
	            jQuery('#div-errors').show();
	        }
	    } else {
	        if(responseText.redirect) {
	            document.location = responseText.redirect;
	        }
	    }
	}
</script>
@stop
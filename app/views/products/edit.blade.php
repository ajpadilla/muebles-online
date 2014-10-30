@extends('layouts.default')

@section('content')
	<div id="outerafterheader">
	    <div class="container">
	        <div class="row">
	            <div id="afterheader" class="twelve columns">
	                <h1 class="pagetitle nodesc">Registro de Producto</h1>
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
                        <section id="empty" class="three columns positionleft"></section>
                        <section id="content" class="six columns positionleft">
                            <div class="page articlecontainer">
                                <article class="entry-content">
                                    <h2>LLENA LOS SIGUIENTES CAMPOS</h2>
                                    <div id="contactform">
                                     {{ Form::model($product, array('route' => array('products.update', $product->id), 'method' => 'PUT')) }}
                                      <fieldset>
                                        @include('layouts.partials.error')
                                        <div class="row">
										  <div class="six columns">
										    {{ Form::label('codigo', 'Código:') }}
										    {{ Form::text('codigo', $product->codigo, ['size' => '128', 'class' => 'text-input']) }}
										  </div>
										  <div class="six columns">
										    {{ Form::label('nombre', 'Nombre:') }}
										    {{ Form::text('nombre', $product->nombre, ['size' => '128', 'class' => 'text-input']) }}
										  </div>
										  <div class="twelve columns">
									        {{ Form::label('descripcion', 'Descripción:') }}
								            {{ Form::text('descripcion', $product->descripcion, ['size' => 256, 'class' => 'text-input']) }}
										  </div>
										  <div class="two_fifth columns">
										    {{ Form::label('medidas', 'Medidas:') }}
										    {{ Form::text('medidas', $product->medidas, ['size' => '50', 'class' => 'text-input', 'placeholder' => 'ANCHO x ALTO x LARGO']) }}
										  </div>
										  <div class="clear"></div>
										  <!--  Form Input -->
                                          <div class="six columns">
                                            {{ Form::label('precio_pulimento', 'Precio del Pulimento:') }}
                                            {{ Form::text('precio_pulimento', $product->precio_pulimento, ['size' => '15', 'class' => 'text-input', 'placeholder' => '0,00']) }}
                                          </div>
										  <div class="six columns">
										  	{{ Form::label('precio_pulimento_puntos', 'Precio del Pulimento en Puntos:') }}
										  	{{ Form::number('precio_pulimento_puntos',(int) $product->precio_pulimento_puntos, ['size' => '10', 'class' => 'text-input', 'placeholder' => '0', 'min' => 0]) }}
										  </div>
										  <div class="six columns">
										    {{ Form::label('precio_lacado', 'Precio del Lacado:') }}
										    {{ Form::text('precio_lacado', $product->precio_lacado, ['size' => '15', 'class' => 'text-input', 'placeholder' => '0,00']) }}
										  </div>
										  <div class="six columns">
										  	{{ Form::label('precio_lacado_puntos', 'Precio del Lacado en Puntos:') }}
										  	{{ Form::number('precio_lacado_puntos', (int)$product->precio_lacado_puntos, ['size' => '10', 'class' => 'text-input', 'placeholder' => '0', 'min' => 0]) }}
										  </div>
										  <div class="clear"></div>
										  <div class="six columns">
                                            {{ Form::label('cantidad', 'Cantidad:') }}
                                            {{ Form::number('cantidad', $product->cantidad, ['size' => '10', 'class' => 'text-input', 'placeholder' => '0', 'min' => 0]) }}
                                          </div>
										  <div class="clear"></div>
										  {{--<div class="three columns"></div>--}}
										  <div class="six columns">
                                            {{ Form::label('do', 'Qué desea hacer:') }}
                                                {{ Form::radio('do', '1', null,  ['id' => 'do', 'checked']) }}
                                                Agregar Fotos
                                                {{ Form::radio('do', '0', null,  ['id' => 'do']) }}
                                                Guardar solamente
                                          </div>
										  <div class="four columns">
										    {{ Form::submit('Actualizar', ['class' => 'button']) }}
										  </div>
                                        </div>
                                      </fieldset>
                                    {{ Form::close() }}
                                    </div><!-- end contactform -->
                                </article>
                            </div>
                        </section><!-- content -->
                    </section>
                </div>
            </div>
        </div>
    </div>
        <!-- END MAIN CONTENT -->
@stop
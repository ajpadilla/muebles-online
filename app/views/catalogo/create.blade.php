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
                        <section id="empty" class="two columns positionleft"></section>
                        <section id="content" class="eight columns positionleft">
                            <div class="page articlecontainer">
                                <article class="entry-content">
                                    <h2>LLENA LOS SIGUIENTES CAMPOS</h2>
                                    <div id="contactform">
                                    {{ Form::open(['route' => 'catalogo.store']) }}
                                      <fieldset>
                                        @include('layouts.partials.error')
                                        <div class="row">
										  <div class="two_fifth columns">
										    {{ Form::label('codigo', 'Código:') }}
										    {{ Form::text('codigo', null, ['size' => '128', 'class' => 'text-input']) }}
										  </div>
										  <div class="two_fifth columns">
										    {{ Form::label('nombre', 'Nombre:') }}
										    {{ Form::text('nombre', null, ['size' => '128', 'class' => 'text-input']) }}
										  </div>
										  <div class="twelve columns">
									        {{ Form::label('descripcion', 'Descripción:') }}
								            {{ Form::text('descripcion', null, ['size' => 256, 'class' => 'text-input']) }}
										  </div>
										  <div class="two_fifth columns">
										    {{ Form::label('modelo', 'Modelo:') }}
										    {{ Form::text('modelo', null, ['size' => '10', 'class' => 'text-input']) }}
										  </div>
										  <div class="two_fifth columns">
										    {{ Form::label('medidas', 'Medidas:') }}
										    {{ Form::text('medidas', null, ['size' => '50', 'class' => 'text-input', 'placeholder' => 'ANCHO x ALTO x LARGO']) }}
										  </div>
										  <div class="two_fifth columns">
										    {{ Form::label('lacado', 'Lacado:') }}
										    	{{ Form::radio('lacado', '1', null,  ['id' => 'lacado']) }}
										    	Si
				                                {{ Form::radio('lacado', '0', null,  ['id' => 'lacado', 'checked']) }}
				                                No
										  </div>
										  <div class="two_fifth columns">
										    {{ Form::label('precio_lacado', 'Precio del Lacado:') }}
										    {{ Form::text('precio_lacado', null, ['size' => '15', 'class' => 'text-input', 'placeholder' => '0,00']) }}
										  </div>
										  <div class="two_fifth columns">
                                            {{ Form::label('pulimento', 'Pulimento:') }}
                                                {{ Form::radio('pulimento', '1', null,  ['id' => 'pulimento']) }}
                                                Si
                                                {{ Form::radio('pulimento', '0', null,  ['id' => 'pulimento', 'checked']) }}
                                                No
                                          </div>
                                          <div class="two_fifth columns">
                                            {{ Form::label('precio_pulimento', 'Precio del Pulimento:') }}
                                            {{ Form::text('precio_pulimento', null, ['size' => '15', 'class' => 'text-input', 'placeholder' => '0,00']) }}
                                          </div>
										  <div class="clear"></div>
										  <div class="two_fifth columns">
                                            {{ Form::label('cantidad', 'Cantidad:') }}
                                            {{ Form::number('cantidad', 1, ['size' => '10', 'class' => 'text-input', 'placeholder' => '0', 'min' => 0]) }}
                                          </div>
										  <div class="two_fifth columns">
											{{ Form::label('precio', 'Precio:') }}
											{{ Form::text('precio', null, ['size' => '15', 'class' => 'text-input', 'placeholder' => '0,00']) }}
                                          </div>
										  <div class="clear"></div>
										  <div class="eight columns"></div>
										  <div class="four columns">
										    {{ Form::submit('Siguiente: Agregar fotos', ['class' => 'button']) }}
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
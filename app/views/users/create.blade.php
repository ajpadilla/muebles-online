@extends('layouts.default')

@section('content')
	<div id="outerafterheader">
	    <div class="container">
	        <div class="row">
	            <div id="afterheader" class="twelve columns">
	                <h1 class="pagetitle nodesc">Registro de Usuario</h1>
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
                                    {{ Form::open(['route' => 'register_user_path']) }}
                                      <fieldset>
                                        @include('layouts.partials.error')
                                        <div class="row">
										  <div class="two_fifth columns">
										    {{ Form::label('nombre', 'Nombre:') }}
										    {{ Form::text('nombre', null, ['size' => '50', 'class' => 'text-input']) }}
										  </div>
										  <div class="two_fifth columns">
										    {{ Form::label('nombre_comercial', 'Nombre Comercial:') }}
										    {{ Form::text('nombre_comercial', null, ['size' => '50', 'class' => 'text-input']) }}
										  </div>
										  <div class="twelve columns">
									        {{ Form::label('direccion', 'Dirección:') }}
								            {{ Form::text('direccion', null, ['size' => 128, 'class' => 'text-input']) }}
										  </div>
										  <div class="two_fifth columns">
										    {{ Form::label('codigo_postal', 'Código Postal:') }}
										    {{ Form::text('codigo_postal', null, ['size' => '10', 'class' => 'text-input']) }}
										  </div>
										  <div class="two_fifth columns">
                                            {{ Form::label('poblacion', 'Población:') }}
                                            {{ Form::select('poblacion', $poblaciones , null , ['class' => 'text-input']) }}
                                          </div>
										  <div class="twelve columns">
                                            {{ Form::label('provincia', 'Provincia:') }}
                                            {{ Form::select('provincia', $provincias , null , ['class' => 'text-input']) }}
                                          </div>
										  <div class="two_fifth columns">
										    {{ Form::label('telefono_fijo', 'Télefono Fijo:') }}
										    {{ Form::text('telefono_fijo', null, ['size' => '50', 'class' => 'text-input']) }}
										  </div>
										  <div class="two_fifth columns">
										    {{ Form::label('fax', 'Fax:') }}
										    {{ Form::text('fax', null, ['size' => '50', 'class' => 'text-input']) }}
										  </div>
										  <div class="two_fifth columns">
										    {{ Form::label('email', 'Email:') }}
										    {{ Form::text('email', null, ['size' => '50', 'class' => 'text-input']) }}
										  </div>
										  <div class="clear"></div>
										  <div class="two_fifth columns">
										    {{ Form::label('password', 'Contraseña:') }}
										    {{ Form::password('password', null, ['size' => '50', 'class' => 'text-input']) }}
										  </div>
										  <div class="clear"></div>
										  <div class="two_fifth columns">
										    {{ Form::label('password_confirmation', 'Confirme su contraseña:') }}
										    {{ Form::password('password_confirmation', null, ['size' => '50', 'class' => 'text-input']) }}
										  </div>
										  <div class="clear"></div>
										  <div class="eight columns"></div>
										  <div class="two columns">
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
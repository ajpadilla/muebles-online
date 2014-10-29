@extends('layouts.default')

@section('content')
	<div id="outerafterheader">
	    <div class="container">
	        <div class="row">
	            <div id="afterheader" class="twelve columns">
	                <h1 class="pagetitle nodesc">Actualizar Usuario</h1>
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
                                    <h2>EDITAR LOS SIGUIENTES CAMPOS</h2>
                                    <div id="contactform">
                                    {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}
                                      <fieldset>
                                        @include('layouts.partials.error')
                                        <div class="row">
										  <div class="two_fifth columns">
										    {{ Form::label('nombre', 'Nombre:') }}
										    {{ Form::text('nombre', $user->nombre, ['size' => '50', 'class' => 'text-input']) }}
										  </div>
										  <div class="two_fifth columns">
										    {{ Form::label('nombre_comercial', 'Nombre Comercial:') }}
										    {{ Form::text('nombre_comercial', $user->nombre_comercial, ['size' => '50', 'class' => 'text-input']) }}
										  </div>
										  <div class="twelve columns">
									        {{ Form::label('direccion', 'Dirección:') }}
								            {{ Form::text('direccion', $user->direccion, ['size' => 128, 'class' => 'text-input']) }}
										  </div>
										  <div class="two_fifth columns">
										    {{ Form::label('codigo_postal', 'Código Postal:') }}
										    {{ Form::text('codigo_postal', $user->codigo_postal, ['size' => '10', 'class' => 'text-input']) }}
										  </div>
										  <div class="two_fifth columns">
                                            {{ Form::label('poblacion', 'Población:') }}
                                            {{ Form::select('poblacion', $poblaciones , $user->provincia->poblacion->id , ['class' => 'text-input']) }}
                                          </div>
										  <div class="twelve columns">
                                            {{ Form::label('provincia', 'Provincia:') }}
                                            {{ Form::select('provincia', $provincias , $user->provincia->id , ['class' => 'text-input']) }}
                                          </div>
										  <div class="two_fifth columns">
										    {{ Form::label('telefono_fijo', 'Télefono Fijo:') }}
										    {{ Form::text('telefono_fijo', $user->telefono_fijo, ['size' => '50', 'class' => 'text-input']) }}
										  </div>
										  <div class="two_fifth columns">
										    {{ Form::label('fax', 'Fax:') }}
										    {{ Form::text('fax', $user->fax, ['size' => '50', 'class' => 'text-input']) }}
										  </div>
										  <div class="two_fifth columns">
										    {{ Form::label('email', 'Email:') }}
										    {{ Form::text('email', $user->email, ['size' => '50', 'class' => 'text-input']) }}
										  </div>
										  <div class="two_fifth columns">
										    {{ Form::label('activo', 'Activo:') }}
										    {{ Form::select('activo', array('1'=>'SI','0'=>'NO'), $user->provincia->id , ['class' => 'text-input']) }}
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
@extends('......layouts.default')

@section('content')
	<div id="outerafterheader">
	    <div class="container">
	        <div class="row">
	            <div id="afterheader" class="twelve columns">
	                <h1 class="pagetitle nodesc">Ingreso de Usuario</h1>
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
                            <section id="empty" class="four columns positionleft"></section>
                            <section id="content" class="four columns positionleft">
                                <div class="page articlecontainer">
                                    <article class="entry-content">
                                        <h2>Ingrese sus credenciales</h2>
                                        <div id="contactform">
                                        {{ Form::open(['route' => 'login_path']) }}
                                          <fieldset>
                                            @include('......layouts.partials.error')
                                            <div class="row">
											  <div class="six columns">
											    {{ Form::label('email', 'Email:') }}
											    {{ Form::email('email', null, ['size' => '50', 'class' => 'text-input']) }}
											  </div>
											</div>
											<div class="row">
											  <div class="six columns">
											    {{ Form::label('password', 'Contraseña:') }}
											    {{ Form::password('password', null, ['size' => '50', 'class' => 'text-input']) }}
											  </div>
											</div>
											<div class="row">
												<div class="two_fifth columns">
												    {{ Form::submit('Ingresar', ['class' => 'button']) }}
												</div>
											</div>
                                          </fieldset>
                                        {{ Form::close() }}
                                        </div><!-- end contactform -->
                                    </article>
                                </div>
                            </section>
                    </div>
                </div>
                </div>
            </div>
        <!-- END MAIN CONTENT -->
@stop
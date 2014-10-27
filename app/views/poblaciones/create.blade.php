@extends('layouts.default')

@section('content')
	<div id="outerafterheader">
	    <div class="container">
	        <div class="row">
	            <div id="afterheader" class="twelve columns">
	                <h3 class="pagetitle nodesc">Registrar nueva población</h3>
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
                                        <h2>Llena los siguientes campos</h2>
                                        <div id="contactform">
                                        {{ Form::open(['route' => 'poblaciones_register_path']) }}
                                          <fieldset>
                                            @include('layouts.partials.error')
                                            <div class="row">
											  <div class="four_fifth columns">
											    {{ Form::label('nombre', 'Nombre:') }}
											    {{ Form::text('nombre', null, ['size' => '50', 'class' => 'text-input']) }}
											   <br>
											    {{ Form::submit('Guardar', ['class' => 'button']) }}
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
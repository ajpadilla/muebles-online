@extends('layouts.default')

@section('content')
	<div id="outerafterheader">
	    <div class="container">
	        <div class="row">
	            <div id="afterheader" class="twelve columns">
	                <h3 class="pagetitle nodesc">Registrar nueva provincia</h3>
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
                            <section id="empty" class="one columns positionleft"></section>
                            <section id="content" class="ten columns positionleft">
                                <div class="page articlecontainer">
                                    <article class="entry-content">
                                        <h2>Llena los siguientes campos</h2>
                                        <div id="contactform">
                                        {{ Form::open(['route' => 'provincias_register_path']) }}
                                          <fieldset>
                                            @include('layouts.partials.error')
                                            <div class="row">
											  <div class="two_fifth columns">
											    {{ Form::label('nombre', 'Nombre:') }}
											    {{ Form::text('nombre', null, ['size' => '50', 'class' => 'text-input']) }}
											  </div>
                                              <div class="two_fifth columns">
                                                  {{ Form::label('poblacion_id', 'Poblaciones:',array('class'=>'control-label col-md-3')) }}
                                                  {{ Form::select('poblacion_id',$poblaciones,'',array('class' => 'form-control')) }}
                                              </div>
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
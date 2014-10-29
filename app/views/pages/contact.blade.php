@extends('layouts.default')

@section('content')
<div id="outerafterheader">
    <div class="container">
        <div class="row">
            <div id="afterheader" class="twelve columns">
                <h1 class="pagetitle nodesc">Contacto</h1>
            </div>
        </div>
    </div>
</div>

<div id="outermain">
        	<div id="maincontainer">
        	<div class="container">
                <div class="row">
                	<section id="maincontent">

                       	<section id="content" class="eight columns positionleft">
                        	<div class="page articlecontainer">
                                <article class="entry-content">
                                    <p>Envienos un mensaje con cualquier inquietud que tenga y pronto le atenderemos.</p>
                    				<h2>Llena los campos</h2>
                                    <div id="contactform">
                                    {{ Form::open(['route' => 'contact_path']) }}
                                      <fieldset>
                                          @include('layouts.partials.error')
                                          <div class="row">
	                                          <div class="two_fifth columns">
		                                          <label for="nombre" id="name_label">Nombre (obligatorio)</label>
		                                          <input type="text" name="nombre" id="nombre" size="50" value="" class="text-input">
	                                          </div>
	                                          <div class="two_fifth columns">
		                                          <label for="email" id="email_label">Email (obligatorio)</label>
		                                          <input type="text" name="email" id="email" size="50" value="" class="text-input">
	                                          </div>
	                                          <div class="two_fifth columns">
		                                          <label for="asunto" id="subject_label">Asunto</label>
		                                          <input type="text" name="asunto" id="asunto" size="50" value="" class="text-input">
	                                          </div>
	                                          <div class="two_fifth columns">
		                                          <label for="website" id="website_label">Sitio web</label>
		                                          <input type="text" name="website" id="website" size="50" value="" class="text-input">
	                                          </div>
	                                          <div class="twelve columns">
		                                          <label for="mensaje" id="msg_label">Mensaje</label>
		                                          <textarea rows="10" name="mensaje" id="msg" class="text-input">Mensaje</textarea>

	                                            <br>
	                                            <input type="submit" name="submit" class="button" id="submit_btn" value="Enviar mensaje">
	                                          </div>
	                                      </div>
                                      </fieldset>
                                    {{ Form::close() }}
                                    </div><!-- end contactform -->
								</article>
                            </div>
                        </section><!-- content -->

                        <aside id="sidebar" class="four columns positionright">
							<div class="widget-area">
                                <ul>
                                    <li class="widget-container widget_hover">
                                        <h2 class="widget-title">Información</h2>
                                        <div class="textwidget">Detalles de contacto adicionales</div>
                                    </li>
                                    @include('layouts.partials._random-products')
                                    {{--@include('layouts.partials.tags')--}}
                                </ul>
       						</div>
                        </aside><!-- sidebar -->

                	</section>
                </div>
            </div>
            </div>
        </div>
@stop


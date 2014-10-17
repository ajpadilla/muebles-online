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
                            <section id="empty" class="one columns positionleft"></section>
                            <section id="content" class="ten columns positionleft">
                                <div class="page articlecontainer">
                                    <article class="entry-content">
                                        <h2>Llena los siguientes campos</h2>
                                        <div id="contactform">
                                        {{ Form::open(['route' => 'register_user_path']) }}
                                          <fieldset>
                                            @include('layouts.partials.error')
                                            <div class="row">
											  <div class="two_fifth columns">
											    {{ Form::label('nombres', 'Nombres:') }}
											    {{ Form::text('nombres', null, ['size' => '50', 'class' => 'text-input']) }}
											  </div>
											  <div class="two_fifth columns">
											    {{ Form::label('apellidos', 'Apellidos:') }}
											    {{ Form::text('apellidos', null, ['size' => '50', 'class' => 'text-input']) }}
											  </div>
											  <div class="two_fifth columns">
											    {{ Form::label('email', 'Email:') }}
											    {{ Form::text('email', null, ['size' => '50', 'class' => 'text-input']) }}
											  </div>
											  <div class="two_fifth columns">
											    {{ Form::label('movil', 'Teléfono Móvil:') }}
											    {{ Form::text('movil', null, ['size' => '50', 'class' => 'text-input']) }}
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
											    {{ Form::label('codigo_postal', 'Código Postal:') }}
											    {{ Form::text('codigo_postal', null, ['size' => '10', 'class' => 'text-input']) }}
											  </div>
											  <div class="two_fifth columns">
											    {{ Form::label('username', 'Nombre de Usuario:') }}
											    {{ Form::text('username', null, ['size' => '50', 'class' => 'text-input']) }}
											  </div>
											  <div class="two_fifth columns">
											    {{ Form::label('password', 'Contraseña:') }}
											    {{ Form::password('password', null, ['size' => '50', 'class' => 'text-input']) }}
											  </div>
											  <div class="two_fifth columns">
											    {{ Form::label('password_confirmation', 'Confirme su contraseña:') }}
											    {{ Form::password('password_confirmation', null, ['size' => '50', 'class' => 'text-input']) }}
											  </div>
											  <div class="two_fifth columns">
                                                {{ Form::label('ciudad', 'Ciudades:') }}
                                                {{ Form::select('ciudad', $ciudades , null , ['class' => 'text-input']) }}
                                              </div>
											  <div class="two_fifth columns">
											    {{ Form::label('ubicacion', 'Detalles de ubicación:') }}
										        {{ Form::textarea('ubicacion', null, ['class' => 'text-input']) }}
											    <br>
											    {{ Form::submit('Registrar', ['class' => 'button']) }}
											  </div>
                                            </div>
                                          </fieldset>
                                        {{ Form::close() }}
                                        </div><!-- end contactform -->
                                    </article>
                                </div>
                            </section><!-- content -->

                            {{--<aside id="sidebar" class="four columns positionright">
                                <div class="widget-area">
                                <ul>
                                    <li class="widget-container widget_hover">
                                        <h2 class="widget-title">Information</h2>
                                        <div class="textwidget">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent aliquam ligula arcu, sed congue diam placerat at. Maecenas nec vestibulum nulla, et elementum.</div>
                                    </li>
                                    <li class="widget-container">
                                        <h2 class="widget-title">Latest Post</h2>
                                        <ul class="rp-widget">
                                            <li>
                                                <img src="images/content/small-img1.jpg" class="frame" alt="">
                                                <h3><a href="single.html">Lorem ipsum dolor sit amet</a></h3>
                                                <span class="smalldate">July 12, 2013</span>
                                                <span class="clear"></span>
                                            </li>
                                            <li>
                                                <img src="images/content/small-img2.jpg" class="frame" alt="">
                                                <h3><a href="single.html">Praesent et eros scelerisque</a></h3>
                                                <span class="smalldate">July 12, 2013</span>
                                                <span class="clear"></span>
                                            </li>
                                            <li>
                                                <img src="images/content/small-img3.jpg" class="frame" alt="">
                                                <h3><a href="single.html">Nunc vel lectus quis velit tempus</a></h3>
                                                <span class="smalldate">July 12, 2013</span>
                                                <span class="clear"></span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="widget-container widget_tag_cloud">
                                        <h3 class="widget-title">Tags</h3>
                                        <div class="tagcloud">
                                            <a href="#">aside</a>
                                            <a href="#">audio</a>
                                            <a href="#">blog</a>
                                            <a href="#">design</a>
                                            <a href="#">gallery</a>
                                            <a href="#">image</a>
                                            <a href="#">link</a>
                                            <a href="#">quote</a>
                                            <a href="#">video</a>
                                        </div>
                                        <div class="clear"></div>
                                    </li>
                                </ul>
                                </div>
                            </aside><!-- sidebar -->

                        </section>--}}
                    </div>
                </div>
                </div>
            </div>
        <!-- END MAIN CONTENT -->
@stop
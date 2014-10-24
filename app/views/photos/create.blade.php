@extends('layouts.default')

@section('content')
	<div id="outerafterheader">
	    <div class="container">
	        <div class="row">
	            <div id="afterheader" class="twelve columns">
	                <h1 class="pagetitle nodesc">Adjuntar fotos al producto ({{ $nombre }})</h1>
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
                                    {{--{{ Form::open(['route' => 'products.store']) }}--}}
                                      <fieldset>
                                        @include('layouts.partials.error')
                                        <div class="row">
										  <div class="twelve columns">
									        {{ Form::label('descripcion', 'Descripción:') }}
								            {{ Form::text('descripcion', null, ['size' => 256, 'class' => 'text-input']) }}
										  </div>
										  <div class="twelve columns">
											{{ Form::label('files[]', 'Fotos:') }}
										    {{ Form::file('files[]', ['id' => 'fireupload', 'data-url' => route("photo_upload_path"), 'class' => 'text-input']) }}
										  </div>
										  <div class="four columns">
										    {{--{{ Form::submit('Adjuntar', ['class' => 'button']) }}--}}
										    <button class="button">Adjuntar</button>
										  </div>
                                        </div>
                                      </fieldset>
                                    {{--{{ Form::close() }}--}}
                                    </div><!-- end contactform -->
                                </article>
                            </div>
                        </section><!-- content -->
						<section id="files" class="twelve columns positionleft">
							<div class="page articlecontainer">
								<article class="entry-content">
									<h2>Imagenes asociadas</h2>
									<ul id="files-attached">

		                            </ul>
								</article>
							</div>
						</section>
                    </section>
                </div>
            </div>
        </div>
    </div>
        <!-- END MAIN CONTENT -->
@stop

@section('in-situ-js')
	<!-- jQuery File Upload Includes -->
	<script src="{{ asset('js/jQuery-File-Upload/js/vendor/jquery.ui.widget.js') }}"></script>
	<script src="{{ asset('js/jQuery-File-Upload/js/jquery.iframe-transport.js') }}"></script>
	<script src="{{ asset('js/jQuery-File-Upload/js/jquery.fileupload.js') }}"></script>
@stop
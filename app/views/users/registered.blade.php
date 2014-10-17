@extends('layouts.default')

@section('content')
	<div id="outerafterheader">
	    <div class="container">
	        <div class="row">
	            <div id="afterheader" class="twelve columns">
	                <h1 class="pagetitle nodesc">Hemos registrado sus datos</h1>
	            </div>
	        </div>
	    </div>
	</div>
<p>Estimado {{ $nombres }}, debes esperar por aprobación para poder ingresar al sistema, un correo será enviado a {{ $email }} cuando tu usuario sea activado.</p>
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
	                                    <p>Estimado {{ $nombres }}, debes esperar por aprobación para poder ingresar al sistema, un correo será enviado a {{ $email }} cuando tu usuario sea activado.</p>
	                                </article>
	                            </div>
	                        </section><!-- content -->
	                </div>
	            </div>
	            </div>
	        </div>
	    <!-- END MAIN CONTENT -->
@stop
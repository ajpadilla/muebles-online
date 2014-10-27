@extends('layouts.default')

@section('content')
	<div id="outerafterheader">
	    <div class="container">
	        <div class="row">
	            <div id="afterheader" class="twelve columns">
	                <h1 class="pagetitle nodesc">El usuario {{ $user->nombres . ' ' . $user->apellidos }}, ha sido activado, se ha enviado un un mensaje con la información a {{ $user->email }}.</h1>
	            </div>
	        </div>
	    </div>
	</div>
@stop
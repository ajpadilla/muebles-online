@extends('layouts.default')

@section('content')
	<div id="outerafterheader">
	    <div class="container">
	        <div class="row">
	            <div id="afterheader" class="twelve columns">
	                <h1 class="pagetitle nodesc">El usuario {{ $user->nombres . ' ' . $user->apellidos }}, ya se encuentra activo.</h1>
	            </div>
	        </div>
	    </div>
	</div>
@stop
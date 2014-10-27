@extends('layouts.default')

@section('content')
	<article>
		@include('flash::message');
	</article>
    @include('pages.partials._slider')
    @include('pages.partials._main-content')
    @include('pages.partials._bottom')
@stop

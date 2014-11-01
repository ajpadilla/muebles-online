@extends('layouts.default')

@section('content')
	<div id="outerafterheader">
	    <div class="container">
	        <div class="row">
	            <div id="afterheader" class="twelve columns">
	                <h1 class="pagetitle nodesc">Lista de factura</h1>
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
		                <section id="empty" class="twelve columns positionleft">
		                    <div class="ten columns positionleft"></div>
		                    <div class="two columns positionright">
			                    
		                    </div>
		                </section>
		                <section id="content" class="twelve columns positionleft">
		                    <div class="page articlecontainer">
		                    	@if($currentUser AND $currentUser->isAdmin())
		                        	<article class="entry-content">
		                           		<?php
		                                	$columns = [
		                                				'id',
			                                            'Fecha de la Factura',
	                                                    'Nombre Cliente',
	                                                    'Estado',
                                                    ];
                                        	if($currentUser AND $currentUser->rol == 'admin')
                                            	$columns[] = 'Acciones';
	                                    	$table = Datatable::table()
                                            	->addColumn($columns)
                                            	->setUrl(route('api.facturas'))
                                            	->noScript();
                                    	?>
                                    	<div class="row"><br/></div>
							        	{{ $table->render() }}
                                	</article>
                                 @else
                                 	<article class="entry-content">
		                           		<?php
		                                	$columns = [
		                                				'id',
			                                            'Fecha de la Factura',
	                                                    'Nombre Cliente',
	                                                    'Estado',
                                                    ];
                                        	if($currentUser AND $currentUser->rol == 'cliente')
                                            	$columns[] = 'Acciones';
	                                    	$table = Datatable::table()
                                            	->addColumn($columns)
                                            	->setUrl(route('api.facturasCliente'))
                                            	->noScript();
                                    	?>
                                    	<div class="row"><br/></div>
							        	{{ $table->render() }}
                                	</article>
                                 @endif
                            </div>
                        </section><!-- content -->
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
@stop

@section('in-situ-css')
    {{--<link rel="stylesheet" href="//cdn.datatables.net/1.10.3/css/jquery.dataTables.min.css"/>--}}
    <link rel="stylesheet" href="{{ asset('css/vendor/jquery.dataTables.min.css') }}"/>
@stop

@section('in-situ-js')
    {{--<script src="//cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js"></script>--}}
    <script src="{{ asset('js/vendor/jquery.dataTables.min.js') }}"></script>

@stop

@section('script')
	{{ $table->script() }}
@stop
@extends('layouts.default')

@section('content')
	<div id="outerafterheader">
	    <div class="container">
	        <div class="row">
	            <div id="afterheader" class="twelve columns">
	                <h1 class="pagetitle nodesc">Lista de pedidos </h1>
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
		                        <article class="entry-content">
		                            <?php
		                                $columns = [
	                                                    'color',
	                                                    'cantidad',
	                                                    'observacion',
	                                                    'Fecha del pedido',
	                                                    'Codigo del pedido',
                                                    ];
	                                    $table = Datatable::table()
                                            ->addColumn($columns)
                                            ->setUrl(route('api.pedidos'))
                                            ->noScript();
                                    ?>
                                    <div class="row"><br/></div>
							        {{ $table->render() }}
                                </article>
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
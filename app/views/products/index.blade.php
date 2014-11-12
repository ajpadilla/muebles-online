@extends('layouts.default')

@section('content')
	<div id="outerafterheader">
	    <div class="container">
	        <div class="row">
	            <div id="afterheader" class="twelve columns">
	                <h1 class="pagetitle nodesc">Lista de Productos</h1>
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
		                    <div class="nine columns positionleft"></div>
		                    @if($currentUser AND $currentUser->isAdmin())
			                    <div class="one columns positionleft">
				                    {{ link_to_route('products.create', 'Nuevo', null, ['class' => 'button']) }}
			                    </div>
			                    <div class="one columns positionleft">
				                    {{ link_to_route('products.import-csv', 'Importar', null, ['class' => 'button']) }}
			                    </div>
			                    <div class="one columns positionleft">
				                    {{ link_to_route('products.export-csv', 'Exportar', null, ['class' => 'button']) }}
			                    </div>
		                    @endif
		                </section>
		                <div class="row"><br/></div>
		                <section id="content" class="twelve columns positionleft">
		                    <div class="page articlecontainer">
		                        <article class="entry-content">
<?php
$columns = [
	'foto',
	'codigo',
	'nombre',
	'medidas'
];
if ($currentUser AND $currentUser->rol == 'admin') {
	$columns[] = 'Acciones';
}

$table = Datatable::table()
	->addColumn($columns)
	->setUrl(route('api.products'))
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
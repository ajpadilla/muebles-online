@extends('layouts.default')

@section('content')
	<div id="outerafterheader">
	    <div class="container">
	        <div class="row">
	            <div id="afterheader" class="twelve columns">
	                <h1 class="pagetitle nodesc">Catálogo</h1>
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
		                    <div class="two columns positionright">{{ link_to_route('register_user_path', 'Nuevo Usuario', null, ['class' => 'button']) }}</div>
		                </section>
		                <section id="content" class="twelve columns positionleft">
		                    <div class="page articlecontainer">
		                        <article class="entry-content">
                                    @include('flash::message');
		                            <?php
	                                    $table = Datatable::table()
                                            ->addColumn([
                                                    'nombre',
                                                    'direccion',
                                                    'codigo_postal',
                                                    'telefono_fijo',
                                                    'fax',
                                                    'email',
                                                    'rol',
                                                    'activo',
                                                    'provincia',
                                                    'Acciones'    
                                                ])
                                            ->setUrl(route('api.users'))
                                            ->noScript();
                                    ?>
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
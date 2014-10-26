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
		                    <div class="two columns positionright">{{ link_to_route('products.create', 'Nuevo Producto', null, ['class' => 'button']) }}</div>
		                </section>
		                <section id="content" class="twelve columns positionleft">
		                    <div class="page articlecontainer">
		                        <article class="entry-content">
		                            {{--<table>
			                            <thead>
			                                <th>Código</th>
			                                <th>Nombre</th>
			                                <th>Modelo</th>
			                                <th>Medidas</th>
			                                <th>Lacado</th>
			                                <th>Precio del Lacado</th>
			                                <th>Pulimento</th>
			                                <th>Precio del Pulimento</th>
			                                <th>Cantidad</th>
			                                <th>Precio</th>
			                                <th>Acciones</th>
			                            </thead>
			                            <tbody>
			                            @foreach($products as $product)
			                                <tr>
				                                <td>{{ $product->codigo }}</td>
	                                            <td>{{ $product->nombre }}</td>
	                                            <td>{{ $product->modelo }}</td>
	                                            <td>{{ $product->medidas }}</td>
	                                            <td>{{ ($product->lacado) ? 'Si' : 'No' }}</td>
	                                            <td>{{ $product->precio_lacado }}</td>
	                                            <td>{{ ($product->pulimento) ? 'Si' : 'No' }}</td>
	                                            <td>{{ $product->precio_pulimento }}</td>
	                                            <td>{{ $product->cantidad }}</td>
	                                            <td>{{ $product->precio }}</td>
	                                            <td>
	                                                <a href="#">Editar</a>
	                                                <a href="#">Ver</a>
	                                                <a href="#">Eliminar</a>
	                                            </td>
                                            </tr>
                                        @endforeach
			                            </tbody>
			                            <tfoot>

			                            </tfoot>
		                            </table>--}}
		                            <?php
	                                    $table = Datatable::table()
                                            ->addColumn([
                                                    'codigo',
                                                    'nombre',
                                                    'modelo',
                                                    'medidas',
                                                    'lacado',
                                                    'Precio del Lacado',
                                                    'pulimento',
                                                    'precio_pulimento',
                                                    'cantidad',
                                                    'precio',
                                                    'Acciones',
                                                ])
                                            ->setUrl('/api/products')
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
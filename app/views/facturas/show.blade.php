@extends('...layouts.default')

@section('content')
	<div id="outerafterheader">
	    <div class="container">
	        <div class="row">
	            <div id="afterheader" class="twelve columns">
	                <h1 class="pagetitle nodesc">Resumen de su Pedido</h1>
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
		                <section id="content" class="twelve columns positionleft">
		                    <article>
			                    <div class="page articlecontainer">
			                        <article class="entry-content">
							            <br/>
							            <h2>Cliente</h2>
							            <ul class="listborder">
											<li><p><em>Nombre: </em> <strong>{{ $client->nombre }}</strong></p></li>
									        <li><p><em>Email: </em> <strong>{{ $client->email }}</strong></p></li>
									        <li><p><em>Código Postal: </em> <strong>{{ $client->codigo_postal }}</strong></p></li>
									        <li><p><em>Fax: </em> <strong>{{ $client->fax }}</strong></p></li>
									        <li><p><em>Teléfono: </em> <strong>{{ $client->telefono_fijo }}</strong></p></li>
									        <li><p><em>Población: </em> <strong>{{ $client->provincia->poblacion->nombre }}</strong></p></li>
									        <li><p><em>Provincia: </em> <strong>{{ $client->provincia->nombre }}</strong></p></li>
									        <li><p><em>Dirección: </em> <strong>{{ $client->direccion }}</strong></p></li>
							            </ul>
	                                    <div class="clear"></div>
							            <h2>Pedidos</h2>
			                            <table class="row-border dataTable no-footer" cellspacing="0" width="100%">
			                                <thead>
			                                    <tr>
					                                <th>CODIGO</th>
					                                <th>NOMBRE</th>
					                                <th>CANTIDAD</th>
					                                <th>COLOR</th>
					                                <th>MEDIDAS</th>
					                                <th>OBSERVACIONES</th>
					                            </tr>
			                                </thead>
			                                <tbody>
			                                    @foreach($pedidos as $pedido)
			                                    <tr>
				                                    <td>{{ $pedido->product->codigo }}</td>
		                                            <td>{{ $pedido->product->nombre }}</td>
		                                            <td>{{ $pedido->cantidad }}</td>
		                                            <td>{{ $pedido->color }}</td>
		                                            <td>{{ $pedido->product->medidas }}</td>
		                                            <td>{{ $pedido->observacion }}</td>
	                                            </tr>
	                                            @endforeach
			                                </tbody>
			                            </table>
	                                </article>
	                            </div>
	                        </article>
                        </section><!-- content -->
                    </section>
	                <section class="twelve columns">
	                    <section class="eleven columns positionleft"></section>
	                    <section class="one columns positionright">
	                        <a target="_blank" href="{{ route('pdf_invoice_path', $factura->id) }}" class="button">PDF</a>
	                    </section>
	                </section>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
@stop

@section('in-situ-css')
    <link rel="stylesheet" href="{{ asset('css/vendor/jquery.dataTables.min.css') }}"/>
@stop

@section('styles')
	<style>
		ul.listborder li:before {
			content: "";
			padding-right: 7px;
		}
	</style>
@stop
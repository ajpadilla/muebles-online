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
		                <section class="twelve columns">
		                    <fieldset>
		                        <legend>
		                            <h3>Datos del cliente</h3>
		                        </legend>
								<p><em>Nombre: </em> <strong>{{ $client->nombre }}</strong></p>
								<p><em>Email: </em> <strong>{{ $client->email }}</strong></p>
								<p><em>Código Postal: </em> <strong>{{ $client->codigo_postal }}</strong></p>
								<p><em>Fax: </em> <strong>{{ $client->fax }}</strong></p>
								<p><em>Teléfono: </em> <strong>{{ $client->telefono_fijo }}</strong></p>
								<p><em>Población: </em> <strong>{{ $client->provincia->poblacion->nombre }}</strong></p>
								<p><em>Provincia: </em> <strong>{{ $client->provincia->nombre }}</strong></p>
								<p><em>Dirección: </em> <strong>{{ $client->direccion }}</strong></p>		                        
		                    </fieldset>
		                </section>
		                <section id="content" class="twelve columns positionleft">
		                    <div class="page articlecontainer">
		                        <h3>Detalles de los pedidos</h3>
		                        <article class="entry-content">
		                            <table>
		                                <thead>
			                                <th>CODIGO</th>
			                                <th>NOMBRE</th>
			                                <th>CANTIDAD</th>
			                                <th>COLOR</th>
			                                <th>MEDIDAS</th>
			                                <th>OBSERVACIONES</th>
		                                </thead>
		                                <tbody>
		                                    @foreach($pedidos as $pedido)
		                                    <tr>
			                                    <th>{{ $pedido->product->codigo }}</th>
	                                            <th>{{ $pedido->product->nombre }}</th>
	                                            <th>{{ $pedido->cantidad }}</th>
	                                            <th>{{ $pedido->color }}</th>
	                                            <th>{{ $pedido->product->medidas }}</th>
	                                            <th>{{ $pedido->observacion }}</th>
                                            </tr>
                                            @endforeach
		                                </tbody>
		                            </table>
                                </article>
                            </div>
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
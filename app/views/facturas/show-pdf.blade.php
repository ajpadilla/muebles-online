<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Pedidos {{ $client->nombre }}</title>
	<style>
		.CSSTableGenerator {
			margin:0px;padding:0px;
			width:100%;
			box-shadow: 10px 10px 5px #888888;
			border:1px solid #000000;

			-moz-border-radius-bottomleft:5px;
			-webkit-border-bottom-left-radius:5px;
			border-bottom-left-radius:5px;

			-moz-border-radius-bottomright:5px;
			-webkit-border-bottom-right-radius:5px;
			border-bottom-right-radius:5px;

			-moz-border-radius-topright:5px;
			-webkit-border-top-right-radius:5px;
			border-top-right-radius:5px;

			-moz-border-radius-topleft:5px;
			-webkit-border-top-left-radius:5px;
			border-top-left-radius:5px;
		}.CSSTableGenerator table{
		    border-collapse: collapse;
		        border-spacing: 0;
			width:100%;
			height:100%;
			margin:0px;padding:0px;
		}.CSSTableGenerator tr:last-child td:last-child {
			-moz-border-radius-bottomright:5px;
			-webkit-border-bottom-right-radius:5px;
			border-bottom-right-radius:5px;
		}
		.CSSTableGenerator table tr:first-child td:first-child {
			-moz-border-radius-topleft:5px;
			-webkit-border-top-left-radius:5px;
			border-top-left-radius:5px;
		}
		.CSSTableGenerator table tr:first-child td:last-child {
			-moz-border-radius-topright:5px;
			-webkit-border-top-right-radius:5px;
			border-top-right-radius:5px;
		}.CSSTableGenerator tr:last-child td:first-child{
			-moz-border-radius-bottomleft:5px;
			-webkit-border-bottom-left-radius:5px;
			border-bottom-left-radius:5px;
		}.CSSTableGenerator tr:hover td{

		}
		.CSSTableGenerator tr:nth-child(odd){ background-color:#aad4ff; }
		.CSSTableGenerator tr:nth-child(even)    { background-color:#ffffff; }.CSSTableGenerator td{
			vertical-align:middle;


			border:1px solid #000000;
			border-width:0px 1px 1px 0px;
			text-align:left;
			padding:7px;
			font-size:10px;
			font-family:Arial;
			font-weight:normal;
			color:#000000;
		}.CSSTableGenerator tr:last-child td{
			border-width:0px 1px 0px 0px;
		}.CSSTableGenerator tr td:last-child{
			border-width:0px 0px 1px 0px;
		}.CSSTableGenerator tr:last-child td:last-child{
			border-width:0px 0px 0px 0px;
		}
		.CSSTableGenerator tr:first-child td{
				background:-o-linear-gradient(bottom, #005fbf 5%, #003f7f 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #005fbf), color-stop(1, #003f7f) );
			background:-moz-linear-gradient( center top, #005fbf 5%, #003f7f 100% );
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf", endColorstr="#003f7f");	background: -o-linear-gradient(top,#005fbf,003f7f);

			background-color:#005fbf;
			border:0px solid #000000;
			text-align:center;
			border-width:0px 0px 1px 1px;
			font-size:14px;
			font-family:Arial;
			font-weight:bold;
			color:#ffffff;
		}
		.CSSTableGenerator tr:first-child:hover td{
			background:-o-linear-gradient(bottom, #005fbf 5%, #003f7f 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #005fbf), color-stop(1, #003f7f) );
			background:-moz-linear-gradient( center top, #005fbf 5%, #003f7f 100% );
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf", endColorstr="#003f7f");	background: -o-linear-gradient(top,#005fbf,003f7f);

			background-color:#005fbf;
		}
		.CSSTableGenerator tr:first-child td:first-child{
			border-width:0px 0px 1px 0px;
		}
		.CSSTableGenerator tr:first-child td:last-child{
			border-width:0px 0px 1px 1px;
		}

		.footer {
			float: right;
		}
	</style>
</head>
<body>
	<div class="header">
		<div class="logo">
			<a href="{{ route('home') }}"><img src="{{asset('images/logo.png')}}" alt=""/>
		</div>
	</div>
	<div class="content">
		<section>
			<section class="two columns"></section>
		    <section id="content" class="ten columns positionleft">
		        <div class="page articlecontainer">
		            <article class="entry-content">
		            <br/>
		            <h2>Cliente</h2>
					<p><em>Nombre: </em> <strong>{{ $client->nombre }}</strong></p>
					<p><em>Nombre Comercial: </em> <strong>{{ $client->nombre_comercial }}</strong></p>
			        <p><em>Dirección: </em> <strong>{{ $client->direccion }}</strong></p>

	                <p><em>Código Postal: </em> <strong>{{ $client->codigo_postal }}</strong>
	                <em>Población: </em> <strong>{{ $client->provincia->poblacion->nombre }}</strong>
	                <em>Provincia: </em> <strong>{{ $client->provincia->nombre }}</strong></p>

			        <p><em>Teléfono: </em> <strong>{{ $client->telefono_fijo }}</strong></p>
			        <p><em>Fax: </em> <strong>{{ $client->fax }}</strong></p>
			        <p><em>Email: </em> <strong>{{ $client->email }}</strong></p>
			        <hr/>
		            <h2>Pedidos</h2>
		            <table class="CSSTableGenerator">
		                <thead>
		                    <tr>
		                        <th>CODIGO</th>
		                        <th>NOMBRE</th>
		                        <th>CANTIDAD</th>
		                        <th>COLOR</th>
		                        <th>MEDIDAS</th>
								<th>CLIENTE</th>
                                <th>DIRECCION</th>
		                        <th>OBSERVACIONES</th>
		                   </tr>
		                </thead>
		                <tbody>
		                    @foreach($pedidos as $pedido)
		                    <tr>
		                        <th>{{ $pedido->product->codigo }}</th>
		                        <th>{{ $pedido->product->nombre }}</th>
		                        <th>{{ $pedido->cantidad }}</th>
		                        <th>{{ $pedido->color }}Pero d</th>
		                        <th>{{ $pedido->product->medidas }}</th>
		                        <td>{{ $pedido->nombre_cliente }}</td>
                                <td>{{ $pedido->direccion }}</td>
		                        <th>{{ $pedido->observaciones }}</th>
		                    </tr>
		                    @endforeach
		                </tbody>
		            </table>
		            </article>
		        </div>
		    </section>
		</section>
	</div>
	<hr/>
	<div>
		<div style="float: left;"></div>
		<div style="float: left;">
			<em>[<strong>PEDIDO WEB: </strong><em>{{ $factura->id }}</em>] - {{ $factura->updated_at }}</em>
		</div>
	</div>

</body>
</html>
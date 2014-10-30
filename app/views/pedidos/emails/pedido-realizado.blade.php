<h1>Información del Pedido</h1>
<section>
	<h3>Cliente</h3>
	<fieldset>
		<p><em>Nombre: </em> <strong>{{ $pedido->client->nombre }}</strong></p>
		<p><em>Email: </em> <strong>{{ $pedido->client->email }}</strong></p>
		<p><em>Código Postal: </em> <strong>{{ $pedido->client->codigo_postal }}</strong></p>
		<p><em>Fax: </em> <strong>{{ $pedido->client->fax }}</strong></p>
		<p><em>Teléfono: </em> <strong>{{ $pedido->client->telefono_fijo }}</strong></p>
		<p><em>Población: </em> <strong>{{ $pedido->client->provincia->poblacion->nombre }}</strong></p>
		<p><em>Provincia: </em> <strong>{{ $pedido->client->provincia->nombre }}</strong></p>
		<p><em>Dirección: </em> <strong>{{ $pedido->client->direccion }}</strong></p>
	</fieldset>
	<h3>Producto</h3>
	<fieldset>
		<p><em>Nombre: </em> <strong>{{ $pedido->product->nombre }}</strong></p>
		<p><em>Código: </em> <strong>{{ $pedido->product->codigo }}</strong></p>
		<p><em>Medidas: </em> <strong>{{ $pedido->product->medidas }}</strong></p>
		<p><em>Descripción: </em> <strong>{{ $pedido->product->descripcion }}</strong></p>
		<p><em>Precio del lacado: </em> <strong>{{ $pedido->product->precio_lacado }}</strong></p>
		<p><em>Precio del pulimento: </em> <strong>{{ $pedido->product->precio_pulimento }}</strong></p>
	</fieldset>

	<h2><em><a href="{{ route('request_show_path', $pedido->id) }}">Obtener PDF</a></em></h2>
	<em>{{ $pedido->created_at }}</em>
</section>
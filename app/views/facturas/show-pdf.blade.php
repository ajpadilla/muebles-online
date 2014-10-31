<h1>Información del Pedido</h1>
<section>
	<h3>Cliente</h3>
	<fieldset>
		<p><em>Nombre: </em> <strong>{{ $client->nombre }}</strong></p>
        <p><em>Email: </em> <strong>{{ $client->email }}</strong></p>
        <p><em>Código Postal: </em> <strong>{{ $client->codigo_postal }}</strong></p>
        <p><em>Fax: </em> <strong>{{ $client->fax }}</strong></p>
        <p><em>Teléfono: </em> <strong>{{ $client->telefono_fijo }}</strong></p>
        <p><em>Población: </em> <strong>{{ $client->provincia->poblacion->nombre }}</strong></p>
        <p><em>Provincia: </em> <strong>{{ $client->provincia->nombre }}</strong></p>
        <p><em>Dirección: </em> <strong>{{ $client->direccion }}</strong></p>
	</fieldset>

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
                            <th>{{ $pedido->observaciones }}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </article>
        </div>
    </section>
</section>
<em>{{ $factura->created_at }}</em>
</section>
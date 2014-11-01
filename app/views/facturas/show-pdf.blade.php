<section>
	<section class="two columns"></section>
    <section id="content" class="ten columns positionleft">
        <div class="page articlecontainer">
            <article class="entry-content">
            <br/>
            <h2>Cliente</h2>
            <ul class="listborder">
				<li><p></li><em>Nombre: </em> <strong>{{ $client->nombre }}</strong></p></li>
		        <li><p></li><em>Email: </em> <strong>{{ $client->email }}</strong></p></li>
		        <li><p></li><em>Código Postal: </em> <strong>{{ $client->codigo_postal }}</strong></p></li>
		        <li><p></li><em>Fax: </em> <strong>{{ $client->fax }}</strong></p></li>
		        <li><p></li><em>Teléfono: </em> <strong>{{ $client->telefono_fijo }}</strong></p></li>
		        <li><p></li><em>Población: </em> <strong>{{ $client->provincia->poblacion->nombre }}</strong></p></li>
		        <li><p></li><em>Provincia: </em> <strong>{{ $client->provincia->nombre }}</strong></p></li>
		        <li><p></li><em>Dirección: </em> <strong>{{ $client->direccion }}</strong></p></li>
            </ul>
            <h2>Pedidos</h2>
            <table border="2">
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
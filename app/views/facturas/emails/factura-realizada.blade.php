<h1>Información del Pedido</h1>
<section>
	<h3>Cliente</h3>
	<fieldset>
		<p><em>Nombre: </em> <strong>{{ $currentUser->nombre }}</strong></p>
        <p><em>Email: </em> <strong>{{ $currentUser->email }}</strong></p>
        <p><em>Código Postal: </em> <strong>{{ $currentUser->codigo_postal }}</strong></p>
        <p><em>Fax: </em> <strong>{{ $currentUser->fax }}</strong></p>
        <p><em>Teléfono: </em> <strong>{{ $currentUser->telefono_fijo }}</strong></p>
        <p><em>Población: </em> <strong>{{ $currentUser->provincia->poblacion->nombre }}</strong></p>
        <p><em>Provincia: </em> <strong>{{ $currentUser->provincia->nombre }}</strong></p>
        <p><em>Dirección: </em> <strong>{{ $currentUser->direccion }}</strong></p>
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
    </section><!-- content -->
</section>

	<h2><em><a href="{{ route('facturas.show', $factura->id) }}">Ver en la Página</a></em></h2>
	<h2><em><a href="{{ route('pdf_invoice_path', $factura->id) }}">Obtener PDF</a></em></h2>
	<em>{{ $factura->created_at }}</em>
</section>
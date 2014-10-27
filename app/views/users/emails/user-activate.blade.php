<h1>Hemos admitido tu ingreso</h1>
<section>
	<h2>HOla {{ $user->nombre }} </h2>
	<h3>Ya puedes acceder con tus datos de registro al sistema</h3>
	<fieldset>
		<p><em>Nombre</em> <strong>{{ $user->nombre }}</strong></p>
		<p><em>Email</em> <strong>{{ $user->email }}</strong></p>
		<p><em>Codigo Postal</em> <strong>{{ $user->codigo_postal }}</strong></p>
		<p><em>Teléfono</em> <strong>{{ $user->telefono_fijo }}</strong></p>
		<p><em>Fax</em> <strong>{{ $user->fax }}</strong></p>
		<p><em>Provincia</em> <strong>{{ $user->provincia_id }}</strong></p>
		<p><em>Dirección</em> <strong>{{ $user->direccion }}</strong></p>
	</fieldset>
</section>
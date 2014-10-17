<h1>Hemos admitido tu ingreso</h1>
<section>
	<h2>HOla {{ $user->nombres }} </h2>
	<h3>Ya puedes acceder con tus datos de registro al sistema</h3>
	<fieldset>
		<p><em>Nombre de Usuario</em> <strong>{{ $user->username }}</strong></p>
		<p><em>Nombres</em> <strong>{{ $user->nombres }}</strong></p>
		<p><em>Apellidos</em> <strong>{{ $user->apellidos }}</strong></p>
		<p><em>Email</em> <strong>{{ $user->email }}</strong></p>
		<p><em>Codigo Postal</em> <strong>{{ $user->codigo_postal }}</strong></p>
		<p><em>Movil</em> <strong>{{ $user->movil }}</strong></p>
		<p><em>Teléfono</em> <strong>{{ $user->telefono_fijo }}</strong></p>
		<p><em>Fax</em> <strong>{{ $user->fax }}</strong></p>
		<p><em>Ciudad</em> <strong>{{ $user->ciudad_id }}</strong></p>
		<p><em>Ubicación</em> <strong>{{ $user->ubicacion }}</strong></p>
	</fieldset>
</section>
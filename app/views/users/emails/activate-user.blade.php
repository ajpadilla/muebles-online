<h1>Un nuevo usuario se ha registrado</h1>
<section>
	<h2>Datos de {{ $user->nombre }} </h2>
	<fieldset>
		<p><em>Nombre</em> <strong>{{ $user->nombre }}</strong></p>
		<p><em>Email</em> <strong>{{ $user->email }}</strong></p>
		<p><em>Codigo Postal</em> <strong>{{ $user->codigo_postal }}</strong></p>
		<p><em>Teléfono</em> <strong>{{ $user->telefono_fijo }}</strong></p>
		<p><em>Fax</em> <strong>{{ $user->fax }}</strong></p>
		<p><em>Provincia</em> <strong>{{ $user->provincia_id }}</strong></p>
		<p><em>Dirección</em> <strong>{{ $user->direccion }}</strong></p>
	</fieldset>
	<h3>Puede seguir el siguiente enlace para activar al usuario: {{ HTML::linkRoute('activate_user_path', 'Activar Usuario', ['id' => $user->id]) }}</h3>
	<p>ó copiar y pegar el siguiente enlace en tu navegador: {{ route('activate_user_path', ['id' => $user->id]) }} </p>
</section>
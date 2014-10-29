<h1>Has recibido un nuevo mensaje de contacto</h1>
<section>
	<fieldset>
		<p><em>Nombre: </em> <strong>{{ $formData['nombre'] }}</strong></p>
		<p><em>Email: </em> <strong>{{ $formData['email'] }}</strong></p>
		@if($formData['website'])
			<p><em>Website: </em> <strong>{{ $formData['website'] }}</strong></p>
		@endif
		@if($formData['asunto'])
			<p><em>Asunto: </em> <strong>{{ $formData['asunto'] }}</strong></p>
		@endif
		<hr/>
		<p><em>Mensaje: </em> <strong>{{ $formData['mensaje'] }}</strong></p>
	</fieldset>
</section>
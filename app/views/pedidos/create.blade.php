@extends('layouts.default')

@section('content')
<div id="outerafterheader">
	<div class="container">
		<div class="row">
			<div id="afterheader" class="twelve columns">
				<h1 class="pagetitle nodesc">Añadir Pedido</h1>
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
					<section id="empty" class="three columns positionleft"></section>
					<section id="content" class="six columns positionleft">
						<div class="page articlecontainer">
							<article class="entry-content">
								<h2>LLENA LOS SIGUIENTES CAMPOS</h2>
								<div id="contactform">
									{{ Form::open(['url' => 'pedidos']) }}
									{{ Form::hidden('product_id', $product->id) }}
									<fieldset>
										@include('layouts.partials.error')
										<div class="row">
											<div class="six columns">
												{{ Form::label('color', 'Color:') }}
												{{ Form::text('color', null, ['size' => '10', 'class' => 'text-input']) }}
											</div>
											<div class="six columns">
												{{ Form::label('cantidad', 'Cantidad:') }}
												{{ Form::number('cantidad', 1, ['size' => '10', 'class' => 'text-input', 'placeholder' => '1', 'min' => 1]) }}
											</div>
											<div class="clear"></div>
											<div class="twelve columns">
                                                {{ Form::label('observacion', 'Observaciones:') }}
                                                {{ Form::text('observacion', null, ['class' => 'text-input']) }}
                                            </div>
											<div class="clear"></div>
											{{--<div class="three columns"></div>--}}
											<div class="six columns">
												{{ Form::label('do', 'Qué desea hacer:') }}
												{{ Form::radio('do', '1', null,  ['id' => 'do', 'checked']) }}
												Agregar más productos
												{{ Form::radio('do', '0', null,  ['id' => 'do']) }}
												Finalizar Pedido
											</div>
											<div class="four columns">
												{{ Form::submit('Continuar', ['class' => 'button']) }}
											</div>
										</div>
									</fieldset>
									{{ Form::close() }}
								</div><!-- end contactform -->
							</article>
						</div>
					</section><!-- content -->
				</section>
			</div>
		</div>
	</div>
</div>
<!-- END MAIN CONTENT -->
@stop
@extends('layouts.default')

@section('content')
	<div id="outerafterheader">
	    <div class="container">
	        <div class="row">
	            <div id="afterheader" class="twelve columns">
	                <h1 class="pagetitle nodesc">Catálogo</h1>
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
		                <section id="empty" class="twelve columns positionleft">
		                    <div class="ten columns positionleft"></div>
		                    <div class="two columns positionright">{{ link_to_route('catalogo.create', 'Nuevo Producto', null, ['class' => 'button']) }}</div>
		                </section>
		                <section id="content" class="twelve columns positionleft">
		                    <div class="page articlecontainer">
		                        <article class="entry-content">
		                            <table>
			                            <thead>
			                                <th>Código</th>
			                                <th>Nombre</th>
			                                <th>Modelo</th>
			                                <th>Medidas</th>
			                                <th>Lacado</th>
			                                <th>Precio del Lacado</th>
			                                <th>Pulimento</th>
			                                <th>Precio del Pulimento</th>
			                                <th>Cantidad</th>
			                                <th>Precio</th>
			                                <th>Acciones</th>
			                            </thead>
			                            <tbody>
			                                <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
			                            </tbody>
			                            <tfoot>

			                            </tfoot>
		                            </table>
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
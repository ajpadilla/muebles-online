@extends('layouts.default')
@section('content')

<div id="outerafterheader">
    <div class="container">
        <div class="row">
            <div id="afterheader" class="twelve columns">
                <h3 class="pagetitle nodesc">Lista de productos</h3>
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
                    <section id="empty" class="one columns positionleft"></section>
                    <section id="content" class="ten columns positionleft">
                        <div class="page articlecontainer">
                            @if (!$products->isEmpty())
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Medidas</th>
                                        <th>Precio lacado</th>
                                        <th>Precio lacado por puntos</th>
                                        <th>Precio pulimento</th>
                                        <th>Precio pulimento por puntos</th>
										<th>Cantidad</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{{ $product->codigo }}}</td>
                                        <td>{{{ $product->nombre }}}</td>
                                        <td>{{{ $product->descripcion }}}</td>
                                        <td>{{{ $product->medidas }}}</td>
                                        <td>{{{ $product->precio_lacado }}}</td>
                                        <td>{{{ $product->precio_lacado_puntos }}}</td>
                                        <td>{{{ $product->precio_pulimento }}}</td>
                                        <td>{{{ $product->precio_pulimento_puntos }}}</td>
                                        <td>{{{ $product->cantidad }}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            	No hay productos registrados
                            @endif
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
    @stop

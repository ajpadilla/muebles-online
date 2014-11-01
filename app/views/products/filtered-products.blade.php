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
                    <section id="empty" class="columns positionleft"></section>
                    <section id="content" class="twelve columns positionleft">
                        <div class="twelve page articlecontainer">
                            <article class="entry-content">
                                @if (!$products->isEmpty())
                                <table class="table" frame="below" role="grid" style="width: 1128px;">
                                    <colgroup>
                                    <col class="con0">
                                    <col class="con1">
                                    <col class="con2">
                                    <col class="con3">
                                    <col class="con4">
                                    <col class="con5">
                                    <col class="con6">
                                    <col class="con7">
                                    <col class="con8">
                                    <col class="con9">
                                </colgroup>
                                <thead>
                                    <tr role="row">
                                        <th align="center" valign="middle" class="head0 sorting_asc" tabindex="0" aria-controls="zWjUje86" rowspan="1" colspan="1" aria-sort="ascending" aria-label="nombre: activate to sort column descending" style="width: 56px;">Foto</th>
                                        <th align="center" valign="middle" class="head0 sorting_asc" tabindex="0" aria-controls="zWjUje86" rowspan="1" colspan="1" aria-sort="ascending" aria-label="nombre: activate to sort column descending" style="width: 56px;">Codigo</th>
                                        <th align="center" valign="middle" class="head0 sorting_asc" tabindex="0" aria-controls="zWjUje86" rowspan="1" colspan="1" aria-sort="ascending" aria-label="nombre: activate to sort column descending" style="width: 56px;">Nombre</th>
                                        <th align="center" valign="middle" class="head0 sorting_asc" tabindex="0" aria-controls="zWjUje86" rowspan="1" colspan="1" aria-sort="ascending" aria-label="nombre: activate to sort column descending" style="width: 56px;">Medidas</th>
                                        <th align="center" valign="middle" class="head0 sorting_asc" tabindex="0" aria-controls="zWjUje86" rowspan="1" colspan="1" aria-sort="ascending" aria-label="nombre: activate to sort column descending" style="width: 56px;">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($products as $product)
                                    <tr role="row">
                                        <td>
                                            <a href="{{URL::to('products.show',$product->id)}}">
                                                <img
                                                class='mini-photo' src="" alt="$product->getFirstPhoto()->filename" src="asset($product->getFirstPhoto()->path . $product->getFirstPhoto()->filename)">
                                            </a>
                                        </td>
                                        <td>{{{ $product->codigo }}}</td>
                                        <td>{{{ $product->nombre }}}</td>
                                        <td>{{{ $product->medidas }}}</td>
                                        <td>
                                            <a href="{{URL::to('products/edit',$product->id)">Editar</a>
                                            <br />
                                            <a href="URL::to('borrarProduct/'.$product->id)">Eliminar</a>
                                            <br />
                                            <a href="URL::to('photos.create',$product->id)">Agregar Fotos</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                No hay productos registrados
                            @endif
                        </article>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT -->
@stop

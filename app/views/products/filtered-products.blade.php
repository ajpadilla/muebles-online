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
                                <table class="table" role="grid" style="width: 1128px;">
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
                                        <th align="center" valign="middle" class="head0 sorting_asc" tabindex="0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 56px;">
                                            Foto
                                        </th>

                                        <th align="center" valign="middle" class="head0 sorting_asc" tabindex="0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 56px;">
                                            Codigo
                                        </th>

                                        <th align="center" valign="middle" class="head0 sorting_asc" tabindex="0"  rowspan="1" colspan="1" aria-sort="ascending" style="width: 56px;">
                                            Nombre
                                        </th>

                                        <th align="center" valign="middle" class="head0 sorting_asc" tabindex="0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 56px;">
                                            Medidas
                                        </th>
                                        @if(Auth::check() AND Auth::user()->isAdmin())
                                            <th align="center" valign="middle" class="head0 sorting_asc" tabindex="0" rowspan="1" colspan="1"  style="width: 56px;">Acciones</th>
                                        @endif
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($products as $product)
                                    <tr role="row">
                                        <td>
                                            @foreach ($product->photos as $k => $photo)
                                                @if($k <= 2)
                                                    <a href="{{URL::to('products/.', $product->id)}}">
                                                    <img class='mini-photo' alt="{{$photo->filename}}" src="{{asset($photo->path.$photo->filename)}}">
                                                    </a>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{{ $product->codigo }}}</td>
                                        <td>{{{ $product->nombre }}}</td>
                                        <td>{{{ $product->medidas }}}</td>
                                        @if(Auth::check() AND Auth::user()->isAdmin())
                                            <td>
                                                <a href="{{URL::to('products/'.$product->id.'/edit')}}">Editar</a>
                                                <br />
                                                <a href="{{URL::to('borrarProduct/'.$product->id)}}">Eliminar</a>
                                                <br />
                                                <a href="{{URL::to('photos/create/'.$product->id)}}">Agregar Fotos</a>
                                            </td>
                                        @endif
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

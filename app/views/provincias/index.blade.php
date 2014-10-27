@extends('layouts.default')
@section('content')

<div id="outerafterheader">
    <div class="container">
        <div class="row">
            <div id="afterheader" class="twelve columns">
                <h3 class="pagetitle nodesc">Lista de poblaciones</h3>
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
                            @if (!$provincias->isEmpty())
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Poblacion</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($provincias as $provincia)
                                    <tr>
                                        <td>{{{ $provincia->nombre }}}</td>
                                        <td>{{{$provincia->poblacion->nombre}}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            No hay provincias registradas
                            @endif
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
    @stop

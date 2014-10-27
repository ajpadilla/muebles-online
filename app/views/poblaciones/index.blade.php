@extends('layouts.default')
@section('content')
<div id="outerafterheader">
    <div class="container">
        <div class="row">
            <div id="afterheader" class="twelve columns">
                <h3 class="pagetitle nodesc">Poblaciones</h3>
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
                            <article class="entry-content">
                            <h3>Lista de poblaciones</h3>
                                <div id="contactform">
                                 @if (!$poblaciones->isEmpty())
                                 <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($poblaciones as $poblacion)
                                        <tr>
                                            <td>{{{ $poblacion->nombre }}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                No hay poblaciones registradas
                                @endif

                            </div><!-- end contactform -->
                        </article>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT -->
@stop

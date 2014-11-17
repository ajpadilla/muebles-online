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
                                @if ($product)
                                <table class="row-border dataTable no-footer" cellspacing="0" width="100%">
                                <thead>
                                    <tr role="row">
                                        <th>Foto</th>
                                        @if(Auth::check() AND Auth::user()->isAdmin())
                                            <th>Acciones</th>
                                        @endif
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($product->photos as $photo)
                                    <tr role="row">
                                        <td>
                                            <img class='mini-photo' alt="{{$photo->filename}}" src="{{asset($photo->complete_thumbnail_path)}}">
                                        </td>
                                        @if(Auth::check() AND Auth::user()->isAdmin())
                                            <td>
                                                {{ Form::open(['route' => ['photos.destroy', $photo->id], 'method' => 'delete']) }}
                                                    {{--<a href="{{ route('photos.destroy', $photo->id)}}">Eliminar</a>--}}
                                                    {{ Form::submit('Eliminar', ['class' => 'form-control']) }}
                                                {{ Form::close() }}
                                            </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                No hay fotos registradas!
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

@section('in-situ-css')
    <link rel="stylesheet" href="{{ asset('css/vendor/jquery.dataTables.min.css') }}"/>
@stop
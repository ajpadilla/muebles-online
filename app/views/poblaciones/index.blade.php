@extends('layouts.default')
@section('content')
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


@stop

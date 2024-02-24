@extends('layouts.app')

@section('content')
    <h1>Resultado de la búsqueda</h1>

    @if($results->count() > 0)
        @foreach($results as $result)
            <div>
                <h2>{{ $result->title }}</h2>
                <p>{{ $result->content }}</p>
            </div>
        @endforeach
    @else
        <p>No se encontraron resultados.</p>
    @endif
@endsection
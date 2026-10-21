@extends('layouts.app')

@section('title', __('Página no encontrada').' | '.config('app.name'))

@section('content')
    <x-error-page :code="$exception->getStatusCode()" :title="__('No encontrado')"
        :subtitle="__('Esto es algo vergonzoso, ¿no?')"
        :description="__('Parece que no se ha encontrado nada en esta ubicación. ¿Quizás probar con una búsqueda?')" />
@endsection

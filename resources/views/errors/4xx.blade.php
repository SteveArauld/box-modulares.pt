@extends('layouts.app')

@section('title', __('Algo ha ido mal').' | '.config('app.name'))

@section('content')
    <x-error-page :code="$exception->getStatusCode()" :title="__('Algo ha ido mal')"
        :subtitle="__('Esto es algo vergonzoso, ¿no?')"
        :description="__('No hemos podido procesar tu solicitud. Vuelve al inicio o prueba con una búsqueda.')" />
@endsection

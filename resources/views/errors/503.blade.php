@extends('layouts.app')

@section('title', __('Sitio en mantenimiento').' | '.config('app.name'))

@section('content')
    <x-error-page :code="$exception->getStatusCode()" :title="__('Sitio en mantenimiento')"
        :subtitle="__('Volvemos enseguida.')"
        :description="__('Estamos realizando algunas mejoras. Inténtalo de nuevo en unos minutos.')" />
@endsection

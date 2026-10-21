@extends('layouts.app')

@section('title', __('Demasiadas solicitudes').' | '.config('app.name'))

@section('content')
    <x-error-page :code="$exception->getStatusCode()" :title="__('Demasiadas solicitudes')"
        :subtitle="__('Vas un poco rápido, ¿no?')"
        :description="__('Espera unos minutos antes de volver a intentarlo.')" />
@endsection

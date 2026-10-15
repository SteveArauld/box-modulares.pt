@extends('layouts.app')

@section('title', __('Página caducada').' | '.config('app.name'))

@section('content')
    <x-error-page :code="$exception->getStatusCode()" :title="__('Página caducada')"
        :subtitle="__('Tu sesión ha expirado.')"
        :description="__('Por motivos de seguridad, actualiza la página e inténtalo de nuevo.')" />
@endsection

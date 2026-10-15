@extends('layouts.app')

@section('title', __('Acceso denegado').' | '.config('app.name'))

@section('content')
    <x-error-page :code="$exception->getStatusCode()" :title="__('Acceso denegado')"
        :subtitle="__('No tienes permiso para estar aquí.')"
        :description="__('Si crees que esto es un error, vuelve al inicio o contáctanos.')" />
@endsection

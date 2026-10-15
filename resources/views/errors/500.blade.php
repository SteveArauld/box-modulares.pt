@extends('layouts.app')

@section('title', __('Error del servidor').' | '.config('app.name'))

@section('content')
    <x-error-page :code="$exception->getStatusCode()" :title="__('Error del servidor')"
        :subtitle="__('Esto es algo vergonzoso, ¿no?')"
        :description="__('Algo ha fallado por nuestra parte. Ya estamos trabajando para solucionarlo.')" />
@endsection

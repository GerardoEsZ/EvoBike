@extends('layouts.app')

@section('content')
<div class="container mx-auto text-center mt-10">
    <h1 class="text-4xl font-bold">{{ __('Bienvenido al Panel de Producción') }}</h1>
    <p class="mt-4">{{ __('Aquí puedes registrar y gestionar los modelos de bicicletas en producción.') }}</p>
    <div class="mt-6">
        <a href="{{ route('produccion.registro') }}" class="btn btn-primary">{{ __('Registrar Nueva Producción') }}</a>
    </div>
</div>
@endsection

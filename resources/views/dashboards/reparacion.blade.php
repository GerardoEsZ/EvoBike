@extends('layouts.app')

@section('content')
<div class="container mx-auto text-center mt-10">
    <h1 class="text-4xl font-bold">{{ __('Bienvenido al Panel de Reparación') }}</h1>
    <p class="mt-4">{{ __('Aquí puedes registrar y gestionar las reparaciones de bicicletas.') }}</p>
    <div class="mt-6">
        <a href="{{ route('reparacion.registro') }}" class="btn btn-primary">{{ __('Registrar Nueva Reparación') }}</a>
    </div>
</div>
@endsection

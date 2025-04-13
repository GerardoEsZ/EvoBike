@extends('layouts.app')

@section('content')
<div class="container mx-auto text-center mt-10">
    <h1 class="text-4xl font-bold">{{ __('Bienvenido al Panel de Administración') }}</h1>
    <p class="mt-4">{{ __('Aquí puedes gestionar todas las operaciones y generar reportes.') }}</p>
    <div class="mt-6">
        <a href="{{ route('admin.reportes') }}" class="btn btn-primary">{{ __('Generar Reportes') }}</a>
    </div>
</div>
@endsection

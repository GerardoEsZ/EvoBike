@extends('layouts.app')

@section('content')
<div class="container mx-auto text-center mt-10">
    <h1 class="text-4xl font-bold">{{ __('Bienvenido a tu Panel de Cliente') }}</h1>
    <p class="mt-4">{{ __('Aquí puedes ver tus compras y estado de pedidos.') }}</p>
    <div class="mt-6">
        <a href="{{ route('cliente.pedidos') }}" class="btn btn-primary">{{ __('Ver Mis Pedidos') }}</a>
    </div>
</div>
@endsection

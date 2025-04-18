<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Inventario</h2>
    </x-slot>

    <div class="py-4 px-6">
        <a href="{{ route('inventory.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Registrar Pieza</a>

        <table class="mt-4 w-full text-left">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Stock Mínimo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($parts as $part)
                    <tr class="{{ $part->stock <= $part->stock_min ? 'bg-red-100' : '' }}">
                        <td>{{ $part->name }}</td>
                        <td>{{ $part->stock }}</td>
                        <td>{{ $part->stock_min }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

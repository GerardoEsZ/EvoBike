<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Registrar Pieza</h2>
    </x-slot>

    <div class="py-4 px-6">
        <form method="POST" action="{{ route('inventory.store') }}">
            @csrf
            <div>
                <label>Nombre</label>
                <input type="text" name="name" class="border rounded w-full px-2 py-1" required>
            </div>

            <div class="mt-2">
                <label>Stock</label>
                <input type="number" name="stock" class="border rounded w-full px-2 py-1" required>
            </div>

            <div class="mt-2">
                <label>Stock Mínimo</label>
                <input type="number" name="stock_min" class="border rounded w-full px-2 py-1" required>
            </div>

            <div class="mt-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
            </div>
        </form>
    </div>
</x-app-layout>

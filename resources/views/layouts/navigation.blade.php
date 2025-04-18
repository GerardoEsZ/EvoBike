<!-- resources/views/layouts/navigation.blade.php -->

<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    {{-- 🔐 ADMINISTRADOR --}}
                    @role('admin')
                    <!-- Menú de Inventario -->
                    <x-nav-link :href="route('inventory.index')" :active="request()->routeIs('inventory.index')">
                        {{ __('Inventario') }}
                    </x-nav-link>

                    <!-- Menú de Ventas -->
                    <x-nav-link :href="route('sales.index')" :active="request()->routeIs('sales.index')">
                        {{ __('Ventas') }}
                    </x-nav-link>

                    <!-- Menú de Producción -->
                    <x-nav-link :href="route('production.index')" :active="request()->routeIs('production.index')">
                        {{ __('Producción') }}
                    </x-nav-link>

                    <!-- Menú de Reparaciones -->
                    <x-nav-link :href="route('repairs.index')" :active="request()->routeIs('repairs.index')">
                        {{ __('Reparaciones') }}
                    </x-nav-link>

                    <!-- Menú de Recursos Humanos -->
                    <x-nav-link :href="route('rh.reports')" :active="request()->routeIs('rh.reports')">
                        {{ __('RH') }}
                    </x-nav-link>

                    <!-- Registrar Usuario -->
                    <x-nav-link :href="route('admin.registerUserForm')" :active="request()->routeIs('admin.registerUserForm')">
                        {{ __('Registrar Usuario') }}
                    </x-nav-link>
                    @endrole

                    {{-- 🔧 EMPLEADO --}}
                    @role('empleado')
                    <x-nav-link :href="route('repairs.index')" :active="request()->routeIs('repairs.index')">
                        {{ __('Reparaciones') }}
                    </x-nav-link>
                    @endrole

                    {{-- 📚 USUARIO --}}
                    @role('usuario')
                    <x-nav-link :href="route('sales.index')" :active="request()->routeIs('sales.index')">
                        {{ __('Mis Compras') }}
                    </x-nav-link>
                    @endrole
                </div>
            </div>

            <!-- Configuración de sesión -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Dropdown de usuario -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414L10 13.414l-4.707-4.707a1 1 0 010-1.414z"/>
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Profile -->
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Cerrar sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>

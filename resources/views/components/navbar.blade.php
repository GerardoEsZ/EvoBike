<nav id="navbar" class="fixed top-0 w-full bg-white shadow-md z-50 transition-transform duration-500">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
        <div class="text-xl font-bold text-blue-600">
            EvoBike 🚲
        </div>
        <div class="space-x-4">
            <a href="{{ route('admin.dashboard') }}" class="text-gray-800 hover:text-blue-600 transition">Admin</a>
            <a href="{{ route('produccion.dashboard') }}" class="text-gray-800 hover:text-blue-600 transition">Producción</a>
            <a href="{{ route('reparacion.dashboard') }}" class="text-gray-800 hover:text-blue-600 transition">Reparación</a>
            <a href="{{ route('cliente.dashboard') }}" class="text-gray-800 hover:text-blue-600 transition">Cliente</a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="text-red-500 hover:text-red-700 transition">Cerrar sesión</button>
            </form>
        </div>
    </div>
</nav>

<script>
    let lastScrollTop = 0;
    const navbar = document.getElementById("navbar");

    window.addEventListener("scroll", function () {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            // Scroll hacia abajo
            navbar.style.transform = "translateY(-100%)";
        } else {
            // Scroll hacia arriba
            navbar.style.transform = "translateY(0)";
        }
        lastScrollTop = scrollTop;
    });
</script>

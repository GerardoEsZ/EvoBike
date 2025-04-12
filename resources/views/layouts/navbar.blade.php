<nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm py-3 px-4" style="transition: top 0.4s;">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <i class="fas fa-bicycle me-2"></i> EvoBike
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                    @role('admin')
                        <li class="nav-item"><a class="nav-link" href="#">Dashboard Admin</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Usuarios</a></li>
                    @endrole

                    @role('empleado')
                        <li class="nav-item"><a class="nav-link" href="#">Producción</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Reparaciones</a></li>
                    @endrole

                    @role('cliente')
                        <li class="nav-item"><a class="nav-link" href="#">Mis Pedidos</a></li>
                    @endrole
                @endauth
            </ul>

            <ul class="navbar-nav">
                @auth
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-outline-light btn-sm">Cerrar sesión</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<?php

namespace App\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Listeners\SendLoginResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * El nombre de espacio para las rutas dentro del archivo.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * El prefijo de las rutas principales de la aplicación.
     *
     * @var string
     */
    public const HOME = '/redirect-by-role';

    /**
     * Define las rutas para la aplicación.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define las rutas para la aplicación.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();
        $this->mapApiRoutes();
    }

    /**
     * Define las rutas web de la aplicación.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define las rutas API de la aplicación.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
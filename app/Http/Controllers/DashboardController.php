<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('dashboards.admin');
    }

    public function cliente()
    {
        return view('dashboards.cliente');
    }

    public function produccion()
    {
        return view('dashboards.produccion');
    }

    public function reparacion()
    {
        return view('dashboards.reparacion');
    }
}
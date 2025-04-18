<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Client;
use App\Models\Bike;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sale::with('client', 'bike')->get();
        return view('sales.index', compact('sales'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'bike_id' => 'required',
            'total_price' => 'required|numeric',
        ]);

        Sale::create($request->all());

        return redirect()->route('sales.index')->with('success', 'Venta registrada con éxito.');
    }
}

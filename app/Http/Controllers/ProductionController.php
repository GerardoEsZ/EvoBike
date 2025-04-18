<?php

namespace App\Http\Controllers;

use App\Models\Production;
use App\Models\Bike;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    public function index()
    {
        $productions = Production::with('bike')->get();
        return view('production.index', compact('productions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bike_id' => 'required',
            'production_date' => 'required|date',
        ]);

        Production::create($request->all());

        return redirect()->route('production.index')->with('success', 'Producción registrada con éxito.');
    }
}

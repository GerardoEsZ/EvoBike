<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Part;

class InventoryController extends Controller
{
    public function index()
    {
        $parts = Part::all();
        return view('inventory.index', compact('parts'));
    }

    public function create()
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required|integer|min:0',
            'stock_min' => 'required|integer|min:0',
        ]);

        Part::create($request->all());

        return redirect()->route('inventory.index')->with('success', 'Pieza registrada.');
    }
}
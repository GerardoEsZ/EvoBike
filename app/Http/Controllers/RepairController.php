<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use App\Models\Bike;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    public function index()
    {
        $repairs = Repair::with('bike')->get();
        return view('repairs.index', compact('repairs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bike_id' => 'required',
            'description' => 'required',
        ]);

        Repair::create($request->all());

        return redirect()->route('repairs.index')->with('success', 'Reparación registrada con éxito.');
    }
}

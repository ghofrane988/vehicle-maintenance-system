<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index()
    {
        return response()->json(Maintenance::with('vehicle')->get(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'type' => 'required|string',
            'description' => 'required|string',
            'cost' => 'nullable|numeric',
            'return_date' => 'nullable|date',
        ]);

        $maintenance = Maintenance::create($validated);

        return response()->json($maintenance, 201);
    }

    public function show(Maintenance $maintenance)
    {
        return response()->json($maintenance->load('vehicle'), 200);
    }

    public function update(Request $request, Maintenance $maintenance)
    {
        $validated = $request->validate([
            'vehicle_id' => 'sometimes|required|exists:vehicles,id',
            'type' => 'sometimes|required|string',
            'description' => 'sometimes|required|string',
            'cost' => 'nullable|numeric',
            'return_date' => 'nullable|date',
        ]);

        $maintenance->update($validated);

        return response()->json($maintenance, 200);
    }

    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();
        return response()->json(null, 204);
    }
}

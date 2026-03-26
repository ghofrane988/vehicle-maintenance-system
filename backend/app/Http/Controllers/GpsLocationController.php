<?php

namespace App\Http\Controllers;

use App\Models\GpsLocation;
use Illuminate\Http\Request;

class GpsLocationController extends Controller
{
    public function index()
    {
        return response()->json(GpsLocation::with('vehicle')->get(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $gps = GpsLocation::create($validated);

        return response()->json($gps, 201);
    }

    public function show(GpsLocation $gpsLocation)
    {
        return response()->json($gpsLocation->load('vehicle'), 200);
    }

    public function update(Request $request, GpsLocation $gpsLocation)
    {
        $validated = $request->validate([
            'vehicle_id' => 'sometimes|required|exists:vehicles,id',
            'latitude' => 'sometimes|required|numeric',
            'longitude' => 'sometimes|required|numeric',
        ]);

        $gpsLocation->update($validated);

        return response()->json($gpsLocation, 200);
    }

    public function destroy(GpsLocation $gpsLocation)
    {
        $gpsLocation->delete();
        return response()->json(null, 204);
    }
}

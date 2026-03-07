<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return response()->json($reservations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'employee_id' => 'required|exists:employees,id',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'km_debut' => 'required|integer',
            'km_fin' => 'nullable|integer|gte:km_debut',
            'statut' => 'required|string|max:50',
        ]);

        $reservation = Reservation::create($request->all());

        return response()->json($reservation, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        return response()->json($reservation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'vehicle_id' => 'sometimes|required|exists:vehicles,id',
            'employee_id' => 'sometimes|required|exists:employees,id',
            'date_debut' => 'sometimes|required|date',
            'date_fin' => 'sometimes|required|date|after_or_equal:date_debut',
            'km_debut' => 'sometimes|required|integer',
            'km_fin' => 'nullable|integer|gte:km_debut',
            'statut' => 'sometimes|required|string|max:50',
        ]);

        $reservation->update($request->all());

        return response()->json($reservation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return response()->json(null, 204);
    }
}

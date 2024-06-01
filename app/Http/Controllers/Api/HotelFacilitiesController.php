<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel_Facility;
use Illuminate\Http\Request;

class HotelFacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotelfacility = Hotel_Facility::all();
        if ($hotelfacility->count() <= 0) {
            return response()->json([
                'status' => false,
                'message' => 'Data not available',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'hotelfacilities' => $hotelfacility
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

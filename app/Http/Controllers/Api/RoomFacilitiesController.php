<?php

namespace App\Http\Controllers;

use App\Models\RoomFacilities;
use Illuminate\Http\Request;

class RoomFacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomfacility = RoomFacilities::all();
        if ($roomfacility->count() <= 0) {
            return response()->json([
                'status' => false,
                'message' => 'Data not available',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'roomfacilities' => $roomfacility
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

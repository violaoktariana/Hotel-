<?php

namespace App\Http\Controllers\Api;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RoomApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        if ($rooms->count() <= 0) {
            return response()->json([
                'message' => 'Data not available',
            ], 404);
        }

        return response()->json([
            'data' => $rooms
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_room' => 'required|unique:rooms,name_room',
            'price' => 'required',
            'short_desc' => 'required',
            'detail_desc' => 'required',
            'category_room' => 'required',
            'path' => 'nullable|image',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error Invalid Fields',
                'error' => $validator->errors(),
            ], 422);
        }
        $rooms = Room::create($request->all());
        return response()->json([
            'data' => $rooms
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return response()->json([
            'data' => $room
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $rooms = Room::create($request->all());
        return response()->json([
            'data' => $rooms
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}

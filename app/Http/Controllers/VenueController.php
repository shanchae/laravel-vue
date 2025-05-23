<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;

class VenueController extends Controller
{
    //
    public function index() {
        $venues = Venue::all();

        return response()->json([
            'data' => $venues,
            'message' => 'Venues retrieved successfully',
            'status' => 200
        ]);
    }

    public function show($id) {
        $venue = Venue::find($id);

        if (!$venue) {
            return response()->json([
                'message' => 'Venue not found',
                'status' => 404
            ]);
        }

        return response()->json([
            'data' => $venue,
            'message' => 'Venue retrieved successfully',
            'status' => 200
        ]);

    }

    public function store(Request $request) {
        $venue = Venue::create($request->all());

        return response()->json([
            'data' => $venue,
            'message' => 'Venue created successfully',
            'status' => 201
        ]);
    }

    public function update(Request $request, $id) {
        $venue = Venue::find($id);

        if (!$venue) {
            return response()->json([
                'message' => 'No venue found',
                'status' => 404
            ]);
        }

        $venue->update($request->all());

        return response()->json([
            'data' => $venue,
            'message' => 'Venue updated successfully',
            'status' => 200
        ]);
    }

    public function destroy($id) {
        $venue = Venue::find($id);

        if (!$venue) {
            return response()->json([
                'message' => 'No venue found',
                'status' => 404
            ]);
        }

        $venue->delete();

        return response()->json([
            'message' => 'Venue deleted successfully',
            'status' => 200
        ]);
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    //

    public function index() {
        $attendees = Attendee::all();

        return response()->json([
            'data' => $attendees,
            'message' => 'Attendees retrieved successfully',
            'status' => 200
        ]);
    }

    public function show($id) {
        $attendee = Attendee::find($id);

        if (!$attendee) {
            return response()->json([
                'message' => 'Attendee not found',
                'status' => 404
            ]);
        }

        return response()->json([
            'data' => $attendee,
            'message' => 'Attendee retrieved successfully',
            'status' => 200
        ]);
    }

    public function store(Request $request) {
        $attendee = Attendee::create($request->all());

        return response()->json([
            'data' => $attendee,
            'message' => 'Attendee created successfully',
            'status' => 201
        ]);
    }

    public function update(Request $request, $id) {
        $attendee = Attendee::find($id);

        if (!$attendee) {
            return response()->json([
                'message' => 'No attendee found',
                'status' => 404
            ]);
        }

        $attendee->update($request->all());

        return response()->json([
            'data' => $attendee,
            'message' => 'Attendee updated successfully',
            'status' => 200
        ]);
    }

    public function destroy($id) {
        $attendee = Attendee::find($id);

        if (!$attendee) {
            return response()->json([
                'message' => 'No attendee found',
                'status' => 404
            ]);
        }

        $attendee->delete();

        return response()->json([
            'message' => 'Attendee deleted successfully',
            'status' => 200
        ]);
    }
}

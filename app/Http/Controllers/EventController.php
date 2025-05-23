<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;

class EventController extends Controller
{
    //

    public function index() {
        $events = Events::all();

        return response()->json([
            'data' => $events,
            'message' => 'Events retrieved successfully',
            'status' => 200
        ]);
    }

    public function show($id) {
        $event = Events::find($id);

        if (!$event) {
            return response()->json([
                'message' => 'Event not found',
                'status' => 404
            ]);
        }

        return response()->json([
            'data' => $event,
            'message' => 'Event retrieved successfully',
            'status' => 200
        ]);

    }

    public function store(Request $request) {
        $event = Events::create($request->all());

        return response()->json([
            'data' => $event,
            'message' => 'Event created successfully',
            'status' => 201
        ]);
    }

    public function update(Request $request, $id) {
        $event = Events::find($id);

        if (!$event) {
            return response()->json([
                'message' => 'No event found',
                'status' => 404
            ]);
        }

        $event->update($request->all());

        return response()->json([
            'data' => $event,
            'message' => 'Event updated successfully',
            'status' => 200
        ]);
    }

    public function destroy($id) {
        $event = Events::find($id);

        if (!$event) {
            return response()->json([
                'message' => 'Event not found',
                'status' => 404
            ]);
        }

        $event->delete();

        return response()->json([
            'message' => 'Event deleted successfully',
            'status' => 200
        ]);
    }

    
}

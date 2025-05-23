<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index() {
        $users = User::all();

        return response()->json([
            'data' => $users,
            'message' => 'Users retrieved successfully',
            'status' => 200
        ]);
    }

    public function show($id) {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found',
                'status' => 404
            ]);
        }

        return response()->json([
            'data' => $user,
            'message' => 'User retrieved successfully',
            'status' => 200
        ]);
    }

    public function store(Request $request) {
        $user = User::create($request->all());

        return response()->json([
            'data' => $user,
            'message' => 'User created successfully',
            'status' => 201
        ]);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'No user found',
                'status' => 404
            ]);
        }

        $user->update($request->all());

        return response()->json([
            'data' => $user,
            'message' => 'User updated successfully',
            'status' => 200
        ]);
    }

    public function destroy($id) {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'No user found',
                'status' => 404
            ]);
        }

        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully',
            'status' => 200
        ]);
    }

}

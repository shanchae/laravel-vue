<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();

        return response()->json([
            'success' => true,
            'data' => $users,
            'message' => 'Users retrieved successfully'
        ], 200);
    }

    public function show($id)
    {
        $users = User::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $users,
            'message' => 'User retrieved successfully'
        ], 200);
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'address' => $request->input('address'),
            'phone' => $request->input('phone')
        ]);

        return response()->json([
            'success' => true,
            'data' => $user,
            'message' => 'User created successfully'
        ], 201);

    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $user,
            'message' => 'User updated successfully'
        ], 200);

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully'
        ], 200);
    }


}

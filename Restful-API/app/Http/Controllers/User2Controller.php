<?php

namespace App\Http\Controllers;

use App\Models\User2;
use Illuminate\Http\Request;

class User2Controller extends Controller
{
    public function index()
    {
        $users = User2::all();

        return response()->json([
            'status' => 200,
            'message' => 'Users retrieved succesfully',
            'data' => $users
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'username' => 'required|string',
            'phone' => 'required|integer'
        ]);

        $users = User2::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'User created succesfully',
            'data' => $users
        ], 201);
    }

    public function show($id)
    {
        $users = User2::find($id);

        if (!$users) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found',
                'data' => null
            ],404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'User retrieved succesfully',
            'data' => $users
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $users = User2::find($id);

        if(!$users) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found',
                'data' => null
            ], 404);
        }

        $request->validate([
            'name' => 'string|max:255',
            'email' => 'required|string',
            'password' => 'required|string',
            'username' => 'required|string',
            'phone' => 'required|integer'
        ]);
        $users->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'User updated succesfully',
            'data' => $users
        ], 200);
    }

    public function destroy($id)
    {
        $users = User2::find($id);

        if(!$users) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found',
                'data' => null
            ], 404);
        }

        $users->delete();

        return response()->json([
            'status' => 200,
            'message' => 'User deleted succesfully',
            'data' => null
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    // public function index()
    // {
    //     $users = User::all();

    //     return response()->json([
    //         'status' => 200,
    //         'message' => 'Users retrieved successfully.',
    //         'data' => $users,
    //     ], 200);
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'user_id' => 'required|integer|unique:users,user_id',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|min:6',
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'user_id' => $request->user_id,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password), // ✅ Hash password sebelum menyimpan
    //     ]);

    //     return response()->json([
    //         'status' => 201,
    //         'message' => 'User created successfully.',
    //         'data' => $user
    //     ], 201);
    // }

    // public function show(User $user) // ✅ Gunakan parameter yang benar
    // {
    //     return response()->json([
    //         'status' => 200,
    //         'message' => 'User retrieved successfully.',
    //         'data' => $user,
    //     ], 200);
    // }

    // public function update(Request $request, User $user)
    // {
    //     $request->validate([
    //         'name' => 'sometimes|string|max:255',
    //         'user_id' => 'sometimes|integer|unique:users,user_id,' . $user->id,
    //         'email' => 'sometimes|email|unique:users,email,' . $user->id,
    //         'password' => 'sometimes|min:6',
    //     ]);

    //     // ✅ Perbarui data jika diberikan dalam request
    //     $user->update([
    //         'name' => $request->name ?? $user->name,
    //         'user_id' => $request->user_id ?? $user->user_id,
    //         'email' => $request->email ?? $user->email,
    //         'password' => $request->password ? Hash::make($request->password) : $user->password,
    //     ]);

    //     return response()->json([
    //         'status' => 200,
    //         'message' => 'User updated successfully.',
    //         'data' => $user
    //     ], 200);
    // }

    // public function destroy(User $user)
    // {
    //     $user->delete();

    //     return response()->json([
    //         'status' => 200,
    //         'message' => 'User deleted successfully.',
    //         'data' => null
    //     ], 200);
    // }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loans; // ✅ Gunakan nama model yang benar

class LoansController extends Controller
{
    // Menampilkan semua data loans
    public function index()
    {
        $loans = loans::all();

        return response()->json([
            'status' => 200,
            'message' => 'Loans retrieved successfully.',
            'data' => $loans,
        ], 200);
    }

    // Menyimpan data loans
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'book_id'       => 'required|integer|exists:books,id',
            'user_id'       => 'required|integer|exists:users,id',
            'loan_date'     => 'required|date',
            'return_date'   => 'required|date|after_or_equal:loan_date',
            'status'        => 'required|string|in:dipinjam,dikembalikan',
        ]);

        $loan = loans::create($validatedData);

        return response()->json([
            'status' => 201,
            'message' => 'Loan created successfully.',
            'data' => $loan,
        ], 201);
    }

    // Menampilkan satu data loan berdasarkan ID
    public function show(loans $loan) // ✅ Model Binding
    {
        return response()->json([
            'status' => 200,
            'message' => 'Loan retrieved successfully.',
            'data' => $loan,
        ], 200);
    }

    // Mengupdate data loan berdasarkan ID
    public function update(Request $request, $id)
{
    $loan = loans::find($id);

    if (!$loan) {
        return response()->json([
            'status' => 404,
            'message' => 'Category not found.',
            'data' => null
        ], 404);
    }

    $request->validate(['name' => 'string|max:255']);
    $loan->update($request->all());

    return response()->json([
        'status' => 200,
        'message' => 'Category updated successfully.',
        'data' => $loan
    ], 200);
}

    // Menghapus data loan berdasarkan ID
    public function destroy(loans $loan) // ✅ Model Binding
    {
        $loan->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Loan deleted successfully.',
            'data' => null,
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // Menampilkan semua data buku
    public function index()
    {
        $books = Book::all();

        return response()->json([
            'status' => 200,
            'message' => 'Books retrieved successfully.',
            'data' => $books,
        ], 200);
    }

    // Menyimpan data buku baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'writer'      => 'required|string|max:255',
            'user_id'     => 'required|integer',
            'category_id' => 'required|integer',
            'publisher'   => 'required|string|max:255',
            'year'        => 'required|integer',
            'stock'       => 'required|integer'
        ]);

        $book = Book::create($validatedData);

        return response()->json([
            'status' => 201,
            'message' => 'Book created successfully.',
            'data' => $book,
        ], 201);
    }

    // Menampilkan satu data buku berdasarkan ID
    public function show(Book $book) // ✅ Model Binding
    {
        return response()->json([
            'status' => 200,
            'message' => 'Book retrieved successfully.',
            'data' => $book,
        ], 200);
    }

    // Mengupdate data buku berdasarkan ID
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'title'       => 'sometimes|required|string|max:255',
            'writer'      => 'sometimes|required|string|max:255',
            'user_id'     => 'sometimes|required|integer',
            'category_id' => 'sometimes|required|integer',
            'publisher'   => 'sometimes|required|string|max:255',
            'year'        => 'sometimes|required|integer',
            'stock'       => 'sometimes|required|integer'
        ]);

        // Update data dalam model
        $book ->update($validatedData);

        return response()->json([
            'message' => 'Book updated successfully',
            'book'    => $book
        ]);
    }

    // Menghapus data buku berdasarkan ID
    public function destroy(Book $book) // ✅ Model Binding
    {
        $book->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Book deleted successfully.',
            'data' => null,
        ], 200);
    }
}

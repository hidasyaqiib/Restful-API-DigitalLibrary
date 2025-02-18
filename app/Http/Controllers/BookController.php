<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return response()->json([
            'status' => 200,
            'message' => 'Books retrieved successfully.',
            'data' => $books,
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            // Validasi input
            $validatedData = $request->validate([
                'title'       => 'required|string|max:255',
                'writer'      => 'required|string|max:255',
                'user_id'     => 'required|integer|exists:user2s,id',
                'category_id' => 'required|integer|exists:categories,id',
                'publisher'   => 'required|string|max:255',
                'year'        => 'required|integer',
            ]);

            // Simpan data buku
            $book = Book::create($validatedData);

            return response()->json([
                'status'  => 201,
                'message' => 'Book created successfully.',
                'data'    => $book,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 500,
                'message' => 'Something went wrong!',
                'error'   => $e->getMessage(),
            ], 500);
        }}

    public function show(Book $book)
    {
        return response()->json([
            'status' => 200,
            'message' => 'Book retrieved successfully.',
            'data' => $book,
        ], 200);
    }

    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'title'       => 'sometimes|required|string|max:255',
            'writer'      => 'sometimes|required|string|max:255',
            'user_id'     => 'sometimes|required|integer',
            'category_id' => 'sometimes|required|integer',
            'publisher'   => 'sometimes|required|string|max:255',
            'year'        => 'sometimes|required|integer',
        ]);

        $book ->update($validatedData);

        return response()->json([
            'message' => 'Book updated successfully',
            'book'    => $book
        ]);
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Book deleted successfully.',
            'data' => null,
        ], 200);
    }
}

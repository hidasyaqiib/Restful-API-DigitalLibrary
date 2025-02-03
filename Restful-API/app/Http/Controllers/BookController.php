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
        return response()->json($books);
    }

    // Menyimpan data buku baru
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'writer'      => 'required|string|max:255',
            'user_id'     => 'required|integer',
            'category_id' => 'required|integer',
            'publisher'   => 'required|string|max:255',
            'year'        => 'required|integer',
        ]);

        // Buat data buku baru
        $book = Book::create($validatedData);

        return response()->json($book, 201);
    }

    // Menampilkan satu data buku berdasarkan ID
    public function show($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return response()->json($book);
    }

    // Mengupdate data buku berdasarkan ID
    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        // Validasi input (gunakan rule 'sometimes' jika tidak semua field wajib di-update)
        $validatedData = $request->validate([
            'title'       => 'sometimes|required|string|max:255',
            'writer'      => 'sometimes|required|string|max:255',
            'user_id'     => 'sometimes|required|integer',
            'category_id' => 'sometimes|required|integer',
            'publisher'   => 'sometimes|required|string|max:255',
            'year'        => 'sometimes|required|integer',
        ]);

        // Update data buku
        $book->update($validatedData);

        return response()->json($book);
    }

    // Menghapus data buku berdasarkan ID
    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->delete();

        return response()->json(['message' => 'Book deleted successfully']);
    }
}

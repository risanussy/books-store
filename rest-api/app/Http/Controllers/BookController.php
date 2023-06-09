<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // Mengambil Semua Data
    public function index() {
        $books = Book::all();

        // response
        return response()->json([
            "message" => "Data Berhasil Diambil",
            "code" => 200,
            "data" => $books
        ]);
    }

    // Mengambil Data berdasarkan id
    public function show($id) {
        $books = Book::find($id);

        // response
        return response()->json([
            "message" => "Data Berhasil Diambil",
            "code" => 200,
            "data" => $books
        ]);
    }

    // Menambah Data
    public function store(Request $request){
        $check = $request->validate([
            "nama" => "required",
            "tema" => "required",
            "judul" => "required",
            "deskripsi" => "required",
            "harga" => "required|numeric",
        ]);

        $books = Book::create($check);
        return response()->json([
            "message" => "Data Berhasil Ditambah",
            "code" => 200,
            "data" => $books
        ]);
    }

    // Update Data
    public function edit(Request $request, $id){
        $check = $request->validate([
            "nama" => "required",
            "tema" => "required",
            "judul" => "required",
            "deskripsi" => "required",
            "harga" => "required|numeric",
        ]);

        $books = Book::find($id);
        $books->nama = $check["nama"];
        $books->tema = $check["tema"];
        $books->judul = $check["judul"];
        $books->deskripsi = $check["deskripsi"];
        $books->harga = $check["harga"];
        $books->save();

        return response()->json([
            "message" => "Data Berhasil Diupdate",
            "code" => 200,
            "data" => $books
        ]);
    }

    // Menghapus Data
    public function delete($id) {
        $books = Book::find($id);
        $books->delete();

        // response
        return response()->json([
            "message" => "Data Berhasil Dihapus",
            "code" => 200
        ]);
    }
}

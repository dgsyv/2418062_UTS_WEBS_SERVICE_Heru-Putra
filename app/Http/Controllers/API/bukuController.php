<?php

namespace App\Http\Controllers\API;

use App\Models\buku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class bukuController extends Controller
{

    public function index()
    {
        $bukus = buku::all();

        return response()->json([
            "status" => true,
            "message" => "Data buku berhasil diambil",
            "data" => $bukus
        ]);
    }


    public function show($id)
    {
        $buku = buku::find($id);

        if (!$buku) {
            return response()->json([
                "status" => false,
                "message" => "Data tidak ditemukan",
                "data" => null
            ]);
        }

        return response()->json([
            "status" => true,
            "message" => "Data buku ditemukan",
            "data" => $buku
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|integer|min:1900',
            'stock' => 'required|integer|min:0'
        ]);

        $buku = buku::create($validated);

        return response()->json([
            "status" => true,
            "message" => "Data buku berhasil ditambahkan",
            "data" => $buku
        ]);
    }

    public function update(Request $request, $id)
    {
        $buku = buku::find($id);

        if (!$buku) {
            return response()->json([
                "status" => false,
                "message" => "Data tidak ditemukan",
                "data" => null
            ]);
        }

        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|integer|min:1900',
            'stock' => 'required|integer|min:0'
        ]);

        $buku->update($validated);

        return response()->json([
            "status" => true,
            "message" => "Data buku berhasil diupdate",
            "data" => $buku
        ]);
    }

    public function destroy($id)
    {
        $buku = buku::find($id);

        if (!$buku) {
            return response()->json([
                "status" => false,
                "message" => "Data tidak ditemukan",
                "data" => null
            ]);
        }

        $buku->delete();

        return response()->json([
            "status" => true,
            "message" => "Data buku berhasil dihapus",
            "data" => null
        ]);
    }
}
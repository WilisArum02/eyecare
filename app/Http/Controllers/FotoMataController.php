<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FotoMata; // Tambahkan ini untuk menggunakan model

class FotoMataController extends Controller
{
    public function getFoto($id)
    {
        $foto = FotoMata::find($id);

        if (!$foto) {
            return response()->json(['message' => 'Foto tidak ditemukan'], 404);
        }

        return response()->json([
            'id' => $foto->id,
            'user_id' => $foto->user_id,
            'file_path' => asset('storage/' . $foto->file_path), // Menampilkan URL lengkap file
            'upload_date' => $foto->upload_date,
            'created_at' => $foto->created_at,
            'updated_at' => $foto->updated_at
        ]);

    }

    public function uploadFoto(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan gambar ke storage
        $image = $request->file('image');
        $imagePath = $image->store('uploads', 'public');

        // Simpan ke database
        $foto = FotoMata::create([
            'user_id' => $request->user_id,
            'file_path' => $imagePath,
            'upload_date' => now(),
        ]);

        return response()->json([
            'message' => 'Foto berhasil diunggah!',
            'data' => $foto
        ]);
    }
}
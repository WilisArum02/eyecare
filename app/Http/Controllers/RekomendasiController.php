<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekomendasi; // Tambahkan ini untuk menggunakan model

class RekomendasiController extends Controller
{
    public function getRekomendasi($id)
    {
        $rekomendasi = Rekomendasi::find($id);

        if (!$rekomendasi) {
            return response()->json(['message' => 'Rekomendasi tidak ditemukan'], 404);
        }

        return response()->json([
            'solusi' => $rekomendasi->solusi
        ]);
    }
}

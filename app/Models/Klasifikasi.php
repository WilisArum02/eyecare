<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    use HasFactory;

    protected $fillable = ['foto_id', 'rekomendasi_id', 'hasil', 'akurasi'];

    public function fotoMata()
    {
        return $this->belongsTo(FotoMata::class, 'foto_id');
    }

    public function rekomendasi()
    {
        return $this->belongsTo(Rekomendasi::class, 'rekomendasi_id');
    }
}

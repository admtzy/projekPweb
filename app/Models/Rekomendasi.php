<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{
    use HasFactory;
    protected $fillable = ['lahan_id','tanaman_id','tanggal','skor_kecocokan'];

    public function lahan() 
    { 
        return $this->belongsTo(Lahan::class); 
    }
    public function tanaman() 
    { 
        return $this->belongsTo(Tanaman::class); 
    }
}

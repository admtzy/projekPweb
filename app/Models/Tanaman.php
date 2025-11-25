<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    use HasFactory;
    protected $table = 'tanamans';
    protected $fillable = [
        'nama_tanaman',
        'jenis_tanah',
        'suhu_min',
        'suhu_max',
        'curah_hujan_min',
        'curah_hujan_max',
        'ph_min',
        'ph_max'
    ];

    public function rekomendasis() 
    { 
        return $this->hasMany(Rekomendasi::class); 
    }
}

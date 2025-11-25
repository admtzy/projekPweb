<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lahan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama_lahan',
        'luas_lahan',
        'provinsi',
        'kabupaten',
        'bulan_tanam',
        'jenis_tanah',
        'tanaman_filter', 
    ];

    protected $casts = [
        'tanaman_filter' => 'array', 
    ];

    public function user() { return $this->belongsTo(User::class); }
    public function rekomendasis() { return $this->hasMany(Rekomendasi::class); }
    public function pupuk() { return $this->hasMany(Pupuk::class); }
}

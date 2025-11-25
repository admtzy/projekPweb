<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pupuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'lahan_id',
        'user_id',
        'jenis_pupuk',
        'jumlah',
        'catatan',
        'status',
        'foto_petani',
        'tanda_tangan'
    ];

    public function lahan()
    {
        return $this->belongsTo(Lahan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Lahan;
use App\Models\Tanaman;
use App\Models\Rekomendasi;

class RekomendasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lahan = Lahan::first();
        $tanaman = Tanaman::first();

        Rekomendasi::create([
            'lahan_id' => $lahan->id,
            'tanaman_id' => $tanaman->id,
            'tanggal' => now(),
            'skor_kecocokan' => 95.0
        ]);
    }
}

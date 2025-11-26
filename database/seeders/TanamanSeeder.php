<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tanaman;
use App\Models\Cuaca;
use App\Models\Lahan;

class TanamanSeeder extends Seeder
{
    public function run(): void
    {
         $tanamans = [
            [
                'nama_tanaman' => 'padi',
                'jenis_tanah' => 'Liat',
                'suhu_min' => 22,
                'suhu_max' => 32,
                'curah_hujan_min' => 100,
                'curah_hujan_max' => 300,
            ],
            [
                'nama_tanaman' => 'jagung',
                'jenis_tanah' => 'Aluvial',
                'suhu_min' => 20,
                'suhu_max' => 30,
                'curah_hujan_min' => 60,
                'curah_hujan_max' => 200,
            ],
            [
                'nama_tanaman' => 'Kedelai',
                'jenis_tanah' => 'Lempung',
                'suhu_min' => 18,
                'suhu_max' => 28,
                'curah_hujan_min' => 50,
                'curah_hujan_max' => 150,
            ],
            [
                'nama_tanaman' => 'Kacang Tanah',
                'jenis_tanah' => 'Andosol',
                'suhu_min' => 21,
                'suhu_max' => 30,
                'curah_hujan_min' => 60,
                'curah_hujan_max' => 180,
            ],
            [
                'nama_tanaman' => 'Ubi',
                'jenis_tanah' => 'Gambut',
                'suhu_min' => 23,
                'suhu_max' => 33,
                'curah_hujan_min' => 70,
                'curah_hujan_max' => 220,
            ],
            [
                'nama_tanaman' => 'Singkong',
                'jenis_tanah' => 'Aluvial',
                'suhu_min' => 22,
                'suhu_max' => 34,
                'curah_hujan_min' => 80,
                'curah_hujan_max' => 250,
            ],
        ];

        foreach ($tanamans as $tanaman) {
            Tanaman::create($tanaman);
        }
    }
}

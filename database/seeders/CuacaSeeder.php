<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Cuaca;

class CuacaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cuacas = [
            [
                'provinsi' => 'Jawa Timur',
                'kabupaten' => 'Surabaya',
                'bulan' => 'Januari',
                'suhu' => 32,
                'curah_hujan' => 50,
                'kelembapan' => 70,
                'musim' => 'Kemarau',
            ],
            [
                'provinsi' => 'Jawa Timur',
                'kabupaten' => 'Surabaya',
                'bulan' => 'Februari',
                'suhu' => 30,
                'curah_hujan' => 70,
                'kelembapan' => 68,
                'musim' => 'Kemarau',
            ],
            [
                'provinsi' => 'Jawa Barat',
                'kabupaten' => 'Bandung',
                'bulan' => 'Januari',
                'suhu' => 25,
                'curah_hujan' => 120,
                'kelembapan' => 80,
                'musim' => 'Hujan',
            ],
            [
                'provinsi' => 'Jawa Barat',
                'kabupaten' => 'Bandung',
                'bulan' => 'Maret',
                'suhu' => 27,
                'curah_hujan' => 100,
                'kelembapan' => 75,
                'musim' => 'Hujan',
            ],
            [
                'provinsi' => 'Sumatera Selatan',
                'kabupaten' => 'Palembang',
                'bulan' => 'Agustus',
                'suhu' => 30,
                'curah_hujan' => 180,
                'kelembapan' => 78,
                'musim' => 'Hujan',
            ],
            [
                'provinsi' => 'Sumatera Selatan',
                'kabupaten' => 'Palembang',
                'bulan' => 'September',
                'suhu' => 31,
                'curah_hujan' => 150,
                'kelembapan' => 75,
                'musim' => 'Hujan',
            ],
            [
                'provinsi' => 'DKI Jakarta',
                'kabupaten' => 'Jakarta Selatan',
                'bulan' => 'Juni',
                'suhu' => 29,
                'curah_hujan' => 90,
                'kelembapan' => 70,
                'musim' => 'Kemarau',
            ],
            [
                'provinsi' => 'DKI Jakarta',
                'kabupaten' => 'Jakarta Selatan',
                'bulan' => 'Juli',
                'suhu' => 30,
                'curah_hujan' => 100,
                'kelembapan' => 72,
                'musim' => 'Kemarau',
            ],
            [
                'provinsi' => 'Bali',
                'kabupaten' => 'Denpasar',
                'bulan' => 'Mei',
                'suhu' => 28,
                'curah_hujan' => 80,
                'kelembapan' => 68,
                'musim' => 'Kemarau',
            ],
            [
                'provinsi' => 'Bali',
                'kabupaten' => 'Denpasar',
                'bulan' => 'Juni',
                'suhu' => 29,
                'curah_hujan' => 75,
                'kelembapan' => 70,
                'musim' => 'Kemarau',
            ],
            [
                'provinsi' => 'Jawa Timur',
                'kabupaten' => 'Jember',
                'bulan' => 'Januari',
                'suhu' => 32,
                'curah_hujan' => 50,
                'kelembapan' => 70,
                'musim' => 'Kemarau',
            ],
            [
                'provinsi' => 'Jawa Timur',
                'kabupaten' => 'Jember',
                'bulan' => 'Februari',
                'suhu' => 30,
                'curah_hujan' => 59,
                'kelembapan' => 80,
                'musim' => 'Hujan',
            ],
        ];


        foreach ($cuacas as $cuaca) {
            Cuaca::create($cuaca);
        }
    }
}

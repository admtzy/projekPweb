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
        $daerahs = ['Jawa Timur', 'Jawa Barat', 'Jawa Tengah', 'Bali', 'Sumatera Utara'];
        $kabupatens = [
            'Jember','Banyuwangi','Malang','Surabaya','Bandung','Bekasi','Solo','Denpasar','Medan','Palembang'
        ];
        $bulans = [
            'Januari','Februari','Maret','April','Mei','Juni',
            'Juli','Agustus','September','Oktober','November','Desember'
        ];
        $musims = ['Hujan', 'Kemarau'];

        for ($i = 0; $i < 100; $i++) {
            $daerah = $daerahs[array_rand($daerahs)];
            $kabupaten = $kabupatens[array_rand($kabupatens)];
            $bulan = $bulans[array_rand($bulans)];
            $suhu = rand(22, 35); 
            $curah_hujan = rand(50, 300); 
            $kelembapan = rand(60, 90); 
            $musim = $musims[array_rand($musims)];

            Cuaca::create([
                'daerah' => $daerah,
                'kabupaten' => $kabupaten,
                'bulan' => $bulan,
                'suhu' => $suhu,
                'curah_hujan' => $curah_hujan,
                'kelembapan' => $kelembapan,
                'musim' => $musim,
            ]);
        }
    }
}

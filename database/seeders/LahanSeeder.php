<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Lahan;
use App\Models\User;

class LahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('role', 'user')->first();

        Lahan::create([
            'user_id' => $user->id,
            'nama_lahan' => 'Lahan Sawah Jember',
            'luas_lahan' => 2.5,
            'provinsi' => 'Jawa Timur',
            'kabupaten' => 'Jember',
            'bulan_tanam' => 'Januari',
            'jenis_tanah' => 'Liat',
        ]);

        Lahan::create([
            'user_id' => $user->id,
            'nama_lahan' => 'Lahan Banyuwangi',
            'luas_lahan' => 3.0,
            'provinsi' => 'Jawa Timur',
            'kabupaten' => 'Banyuwangi',
            'bulan_tanam' => 'Januari',
            'jenis_tanah' => 'Liat',
        ]);
    }
}

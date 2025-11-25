<?php

namespace App\Http\Controllers;

use App\Models\{Lahan, Tanaman, Cuaca, Rekomendasi};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekomendasiController extends Controller
{
    public function index()
    {
        $rekomendasis = Rekomendasi::with(['lahan', 'tanaman'])->get();
        $lahans = Auth::user()->role === 'admin'
            ? Lahan::all()
            : Lahan::where('user_id', Auth::id())->get();

        return view('rekomendasis.index', compact('rekomendasis', 'lahans'));
    }

    public function generateForLahan(Lahan $lahan)
    {
        $cuaca = Cuaca::where('kabupaten', $lahan->kabupaten)
                    ->where('bulan', $lahan->bulan_tanam)
                    ->first();

        $filter = $lahan->tanaman_filter
            ? json_decode($lahan->tanaman_filter, true)
            : Tanaman::pluck('nama_tanaman')->map(fn($n)=>strtolower($n))->toArray();

        $tanamans = Tanaman::whereIn(\DB::raw('lower(nama_tanaman)'), $filter)->get();

        foreach ($tanamans as $t) {
            $skor = 0;

            $skor += ($lahan->jenis_tanah === $t->jenis_tanah) ? 40 : 15;
            if ($cuaca) {
                if ($cuaca->curah_hujan >= $t->curah_hujan_min && $cuaca->curah_hujan <= $t->curah_hujan_max) $skor += 30;
                elseif (abs($cuaca->curah_hujan - $t->curah_hujan_min) <= 50 || abs($cuaca->curah_hujan - $t->curah_hujan_max) <= 50) $skor += 20;
                else $skor += 10;

                if ($cuaca->suhu >= $t->suhu_min && $cuaca->suhu <= $t->suhu_max) $skor += 30;
                elseif (abs($cuaca->suhu - $t->suhu_min) <= 3 || abs($cuaca->suhu - $t->suhu_max) <= 3) $skor += 20;
                else $skor += 10;
            }

            $skor = min($skor, 100);
            
            Rekomendasi::updateOrCreate(
                ['lahan_id' => $lahan->id, 'tanaman_id' => $t->id],
                ['tanggal' => now(), 'skor_kecocokan' => $skor]
            );
        }
    }
}

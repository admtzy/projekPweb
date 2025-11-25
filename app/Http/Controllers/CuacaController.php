<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Cuaca;

class CuacaController extends Controller
{
    public function fetchCuaca()
    {
        $response = Http::get('https://api.bmkg.go.id/publik/prakiraan-cuaca?adm4=31.71.03.1001'); // Kemayoran

        if (!$response->successful()) {
            return redirect()->back()->with('error', 'Gagal menghubungi API BMKG.');
        }

        $data = $response->json();

        if (!isset($data['data'])) {
            return redirect()->back()->with('error', 'Data BMKG tidak ditemukan.');
        }

        foreach ($data['data'] as $item) {
            $cuaca = $item['cuaca'][0][0] ?? null;
            if (!$cuaca) continue;

            Cuaca::updateOrCreate(
                [
                    'daerah' => $item['lokasi']['desa'] ?? 'Tidak diketahui',
                    'kabupaten' => $item['lokasi']['kotkab'] ?? 'Tidak diketahui',
                    'bulan' => now()->format('Y-m'),
                ],
                [
                    'suhu' => $cuaca['t'] ?? null,
                    'curah_hujan' => $cuaca['tp'] ?? null,
                    'kelembapan' => $cuaca['hu'] ?? null,
                    'musim' => $cuaca['weather_desc'] ?? 'Tidak Diketahui',
                ]
            );
        }

        return redirect()->back()->with('success', 'Data cuaca berhasil diperbarui dari BMKG!');
    }



    public function index(Request $request)
    {
        $kabupatenList = Cuaca::select('kabupaten')->distinct()->get();

        $query = Cuaca::query();

        if ($request->kabupaten) {
            $query->where('kabupaten', $request->kabupaten);
        }

        $cuaca = $query->orderBy('bulan')->get();

        return view('cuaca.index', compact('cuaca', 'kabupatenList'));
    }
}

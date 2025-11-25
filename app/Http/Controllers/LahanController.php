<?php

namespace App\Http\Controllers;

use App\Models\Lahan;
use App\Http\Controllers\RekomendasiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LahanController extends Controller
{
    public function index()
    {
        $lahans = Auth::user()->role === 'admin'
            ? Lahan::all()
            : Lahan::where('user_id', Auth::id())->get();

        return view('lahans.index', compact('lahans'));
    }

    public function create()
    {
        return view('lahans.create'); 
    }

    public function store(Request $request)
    {
         $request->validate([
            'nama_lahan' => 'required',
            'luas_lahan' => 'required|numeric',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'bulan_tanam' => 'required',
            'jenis_tanah' => 'required',
            'tanaman_filter_input' => 'required|string',
        ]);

        $tanamanFilter = array_map('trim', explode(',', $request->tanaman_filter_input));
        $tanamanFilter = array_map('strtolower', $tanamanFilter);

        $lahan = Lahan::create([
            'user_id' => Auth::id(),
            'nama_lahan' => $request->nama_lahan,
            'luas_lahan' => $request->luas_lahan,
            'provinsi' => strtolower($request->provinsi),
            'kabupaten' => strtolower($request->kabupaten),
            'bulan_tanam' => strtolower($request->bulan_tanam),
            'jenis_tanah' => strtolower($request->jenis_tanah),
            'tanaman_filter' => json_encode($tanamanFilter),
        ]);

        (new RekomendasiController())->generateForLahan($lahan);

        return redirect()->route('rekomendasis.index')
                        ->with('success', 'Lahan berhasil ditambahkan & rekomendasi diperbarui!');
    }

    public function edit(Lahan $lahan)
    {
        return view('lahans.edit', compact('lahan'));
    }

    public function update(Request $request, Lahan $lahan)
    {
        $request->validate([
            'nama_lahan' => 'required',
            'luas_lahan' => 'required|numeric',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'bulan_tanam' => 'required',
            'jenis_tanah' => 'required',
            'tanaman_filter_input' => 'sometimes|string',
        ]);

        $updateData = $request->only([
            'nama_lahan','luas_lahan','provinsi','kabupaten','bulan_tanam','jenis_tanah'
        ]);

        if ($request->filled('tanaman_filter_input')) {
            $tanamanFilter = array_map('trim', explode(',', $request->tanaman_filter_input));
            $tanamanFilter = array_map('strtolower', $tanamanFilter);
            $updateData['tanaman_filter'] = json_encode($tanamanFilter);
        }

        $lahan->update($updateData);

        (new RekomendasiController())->generateForLahan($lahan);

        return redirect()->route('lahans.index')
                         ->with('success', 'Lahan diperbarui dan rekomendasi diperbarui!');
    }
    
    public function destroy(Lahan $lahan)
    {
        $lahan->delete();
        return redirect()->route('lahans.index')
                         ->with('success', 'Lahan dihapus');
    }
}

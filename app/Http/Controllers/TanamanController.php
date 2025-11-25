<?php

namespace App\Http\Controllers;

use App\Models\Tanaman;
use Illuminate\Http\Request;

class TanamanController extends Controller
{
    public function index()
    {
        $tanamans = Tanaman::all();
        return view('tanamans.index', compact('tanamans'));
    }

    public function create() {
         return view('tanamans.create');
         }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tanaman'=>'required',
            'jenis_tanah'=>'required',
            'suhu_min'=>'required|numeric',
            'suhu_max'=>'required|numeric',
            'curah_hujan_min'=>'required|numeric',
            'curah_hujan_max'=>'required|numeric',
            'ph_min'=>'required|numeric',
            'ph_max'=>'required|numeric',
        ]);
        Tanaman::create($request->all());
        return redirect()->route('tanamans.index')->with('success','Tanaman ditambahkan');
    }

    public function edit(Tanaman $tanaman)
    {
        return view('tanamans.edit', compact('tanaman'));
    }

    public function update(Request $request, Tanaman $tanaman)
    {
        $tanaman->update($request->all());
        return redirect()->route('tanamans.index')->with('success','Tanaman diperbarui');
    }

    public function destroy(Tanaman $tanaman)
    {
        $tanaman->delete();
        return redirect()->route('tanamans.index')->with('success','Tanaman dihapus');
    }
}

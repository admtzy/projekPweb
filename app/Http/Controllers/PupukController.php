<?php

namespace App\Http\Controllers;

use App\Models\Pupuk;
use App\Models\Lahan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PupukController extends Controller
{
    public function userIndex()
    {
        $lahan = Lahan::where('user_id', auth()->id())->get();
        $list = Pupuk::where('user_id', auth()->id())->get();

        return view('pupuk.index-user', compact('lahan','list'));
    }

    public function createUser($lahanId)
    {
        $lahan = Lahan::findOrFail($lahanId);
        return view('pupuk.create-user', compact('lahan','lahanId'));
    }

    public function store(Request $request, $lahanId)
    {
        $request->validate([
            'jenis_pupuk' => 'required|string',
            'jumlah' => 'required|numeric',
            'catatan' => 'nullable|string',
            'foto_petani' => 'nullable|image',
            'tanda_tangan' => 'nullable|image',
        ]);

        $fotoName = null;
        if($request->hasFile('foto_petani')) {
            $fotoName = time().'_foto.'.$request->foto_petani->extension();
            $request->foto_petani->move(public_path('images'), $fotoName);
        }

        $ttName = null;
        if($request->hasFile('tanda_tangan')) {
            $ttName = time().'_tt.'.$request->tanda_tangan->extension();
            $request->tanda_tangan->move(public_path('images'), $ttName);
        }

        Pupuk::create([
            'lahan_id' => $lahanId,
            'user_id' => auth()->id(),
            'jenis_pupuk' => $request->jenis_pupuk,
            'jumlah' => $request->jumlah,
            'catatan' => $request->catatan,
            'foto_petani' => $fotoName,
            'tanda_tangan' => $ttName,
            'status' => 'pending',
        ]);

        return redirect()->route('pupuk.index-user')
            ->with('success','Permintaan pupuk berhasil diajukan.');
    }

    public function userShow($id)
    {
        $pupuk = Pupuk::with('lahan')->where('user_id', auth()->id())->findOrFail($id);
        return view('pupuk.show-user', compact('pupuk'));
    }

    public function downloadPdf($id)
    {
        $pupuk = Pupuk::with('lahan','user')->findOrFail($id);
        $pdf = Pdf::loadView('pupuk.pdf', compact('pupuk'));
        return $pdf->download('Permintaan-Pupuk-'.$pupuk->id.'.pdf');
    }


    public function adminIndex()
    {
        $list = Pupuk::with(['user','lahan'])->orderBy('created_at','desc')->get();
        return view('pupuk.index-admin', compact('list'));
    }

    public function adminShow($id)
    {
        $pupuk = Pupuk::with(['user','lahan'])->findOrFail($id);
        return view('pupuk.show-admin', compact('pupuk'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approve,tolak'
        ]);

        $pupuk = Pupuk::findOrFail($id);
        $pupuk->status = $request->status;
        $pupuk->save();

        return back()->with('success','Status berhasil diperbarui.');
    }
}

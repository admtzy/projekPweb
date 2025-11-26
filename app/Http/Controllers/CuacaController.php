<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Cuaca;

class CuacaController extends Controller
{
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
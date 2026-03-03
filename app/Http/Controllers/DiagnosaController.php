<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Diagnosa; 
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    public function index(Request $request)
    {
        $pasien = Pelanggan::orderBy('nama_pasien', 'asc')->get();
        $riwayat = Diagnosa::with('pelanggan')
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();

        return view('rekam-medis.diagnosa.index', compact('pasien', 'riwayat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'keluhan' => 'required',
            'diagnosa' => 'required',
            'tindakan' => 'required',
            'obat' => 'required',
        ]);

        Diagnosa::create([
            'pelanggan_id' => $request->pelanggan_id,
            'keluhan' => $request->keluhan,
            'diagnosa' => $request->diagnosa,
            'tindakan' => $request->tindakan,
            'obat' => $request->obat,
        ]);

        return redirect()->back()->with('success', 'Diagnosa berhasil disimpan!');
    }
}
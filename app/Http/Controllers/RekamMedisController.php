<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Diagnosa;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function index(Request $request)
    {
        $semuaPasien = Pelanggan::orderBy('nama_pasien', 'asc')->get();

        $pasienTerpilih = null;
        $riwayatMedis = collect();

        if ($request->has('pasien_id')) {
            $pasienTerpilih = Pelanggan::find($request->pasien_id);
            if ($pasienTerpilih) {
    
                $riwayatMedis = Diagnosa::where('pelanggan_id', $pasienTerpilih->id)
                                ->orderBy('created_at', 'desc')
                                ->get();
            }
        }

        return view('rekam-medis.pemeriksaan.index', compact('semuaPasien', 'pasienTerpilih', 'riwayatMedis'));
    }
}
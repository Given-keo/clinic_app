<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        
        $pelanggan = Pelanggan::latest()->get();
        
        // SweetAlert confirm delete
        confirmDelete("Hapus Data", "Apakah anda yakin ingin menghapus data pasien ini?");
        
        return view('pelanggan.index', compact('pelanggan'));
    }

    public function store(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'nama_pasien'   => 'required|max:255',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'nomor_telepon' => 'nullable|max:20',
            'alamat'        => 'nullable|max:255',
        ], [
            'nama_pasien.required'   => 'Nama pasien wajib diisi',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi',
            'tanggal_lahir.date'     => 'Format tanggal lahir tidak valid',
        ]);

        Pelanggan::updateOrCreate(
            ['id' => $id],
            [
                'nama_pasien'   => $request->nama_pasien,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nomor_telepon' => $request->nomor_telepon,
                'alamat'        => $request->alamat,
            ]
        );

        toast()->success($id ? 'Data pasien berhasil diperbarui' : 'Data pasien berhasil disimpan');
        
        return redirect()->route('data-master.pelanggan.index');
    }

    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        toast()->success('Data pasien berhasil dihapus');
        
        return redirect()->route('data-master.pelanggan.index');
    }
}
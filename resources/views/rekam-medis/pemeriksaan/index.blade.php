@extends("layouts.app")

@section("content")
<div class="row">
    <div class="col-12">
        {{-- Bagian Pencarian Pasien --}}
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <form action="{{ route('rekam-medis.pemeriksaan.index') }}" method="GET" id="searchForm">
                    <select name="pasien_id" class="form-select select2" onchange="document.getElementById('searchForm').submit()">
                        <option value="">Cari nomor pasien atau nama...</option>
                        @foreach($semuaPasien as $p)
                            <option value="{{ $p->id }}" {{ request('pasien_id') == $p->id ? 'selected' : '' }}>
                                {{ $p->nomor_pasien }} - {{ $p->nama_pasien }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>

        @if($pasienTerpilih)
        {{-- Bagian Data Pasien --}}
        <div class="card mb-3 shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h6 class="mb-0 fw-bold">Data Pasien</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless table-sm mb-0">
                            <tr>
                                <td width="150" class="text-muted">Nama</td>
                                <td>: {{ $pasienTerpilih->nama_pasien }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Jenis Kelamin</td>
                                <td>: {{ $pasienTerpilih->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Usia</td>
                                <td>: {{ $pasienTerpilih->usia }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless table-sm mb-0">
        
                            <tr>
                                <td class="text-muted">Alamat</td>
                                <td>: {{ $pasienTerpilih->alamat }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bagian Riwayat Rekam Medis --}}
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h6 class="mb-0 fw-bold">Rekam Medis</h6>
            </div>
            <div class="card-body">
                @forelse($riwayatMedis as $rm)
                    <div class="border-bottom mb-4 pb-3">
                        <h6 class="fw-bold text-dark mb-1">{{ $rm->created_at->translatedFormat('l, d F Y') }}</h6>
                        <div class="row small mt-2">
                            <div class="col-12 mb-1">
                                <span class="text-muted fw-bold">Pemeriksa :</span> <span class="text-dark">admin</span>
                            </div>
                            <div class="col-12 mb-1">
                                <span class="text-muted fw-bold">Keluhan :</span> {{ $rm->keluhan }}
                            </div>
                            <div class="col-12 mb-1">
                                <span class="text-muted fw-bold">Diagnosa :</span> {{ $rm->diagnosa }}
                            </div>
                            <div class="col-12 mb-1">
                                <span class="text-muted fw-bold">Tindakan :</span> {{ $rm->tindakan ?? '-' }}
                            </div>
                            <div class="col-12">
                                <span class="text-muted fw-bold">Obat :</span> {{ $rm->obat }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-4">
                        <p class="text-muted mb-0">Tidak ada riwayat rekam medis ditemukan.</p>
                    </div>
                @endforelse
            </div>
        </div>
        @else
        <div class="alert alert-secondary border-0 shadow-sm text-center">
            Silakan pilih pasien untuk melihat riwayat rekam medis.
        </div>
        @endif
    </div>
</div>
@endsection

@push('js')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap-5',
            width: '100%'
        });
    });
</script>
@endpush
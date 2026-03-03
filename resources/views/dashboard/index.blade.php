@extends("layouts.app")
@section("content_title","Dashboard")

@section("content")
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card shadow-sm border-0" >
            <div class="card-body p-4">
                <h4 class="mb-1 ">Selamat Datang, <strong>{{ auth()->user()->name }}</strong>!</h4>
                <p class="mb-0 opacity-75">Sistem Manajemen Klinik - Pantau aktivitas klinik Anda hari ini di sini.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-3 bg-light-primary p-3 rounded">
                        <i class="ti ti-users fs-1 text-primary"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="text-muted mb-1">Total Pasien</h6>
                        <h3 class="mb-0">{{ \App\Models\Pelanggan::count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-3 bg-light-success p-3 rounded">
                        <i class="ti ti-activity fs-1 text-success"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="text-muted mb-1">Diagnosa Hari Ini</h6>
                        <h3 class="mb-0">{{ \App\Models\Diagnosa::whereDate('created_at', today())->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-3 bg-light-warning p-3 rounded">
                        <i class="ti ti-user-plus fs-1 text-warning"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="text-muted mb-1">Pasien Baru (Bulan Ini)</h6>
                        <h3 class="mb-0">{{ \App\Models\Pelanggan::whereMonth('created_at', date('m'))->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-md-8 mb-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white py-3">
                <h6 class="mb-0 fw-bold"><i class="ti ti-list me-2"></i>Diagnosa Terbaru</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Pasien</th>
                                <th>Diagnosa</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(\App\Models\Diagnosa::with('pelanggan')->latest()->take(5)->get() as $d)
                            <tr>
                                <td>
                                    <div class="fw-bold text-dark">{{ $d->pelanggan->nama_pasien }}</div>
                                    <small class="text-muted">{{ $d->pelanggan->nomor_pasien }}</small>
                                </td>
                                <td>{{ Str::limit($d->diagnosa, 40) }}</td>
                                <td><small class="text-muted">{{ $d->created_at->diffForHumans() }}</small></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-4 text-muted">Belum ada aktivitas diagnosa.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white py-3">
                <h6 class="mb-0 fw-bold">Menu Pintas</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('data-master.pelanggan.index') }}" class="btn btn-outline-primary text-start p-3">
                        <i class="ti ti-user-plus me-2"></i> Registrasi Pasien Baru
                    </a>
                    <a href="{{ route('rekam-medis.diagnosa.index') }}" class="btn btn-outline-dark text-start p-3">
                        <i class="ti ti-heart-rate-monitor me-2"></i> Input Diagnosa Baru
                    </a>
                    <a href="{{ route('rekam-medis.pemeriksaan.index') }}" class="btn btn-outline-info text-start p-3">
                        <i class="ti ti-notes me-2"></i> Cari Rekam Medis
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends("layouts.app")

@section("content")
<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="ti ti-heart-rate-monitor me-2"></i>Form Diagnosa</h5>
                <button type="submit" form="formDiagnosa" class="btn btn-primary btn-sm">Simpan Diagnosa</button>
            </div>
            <div class="card-body">
                <form action="{{ route('rekam-medis.diagnosa.store') }}" method="POST" id="formDiagnosa">
                    @csrf
                    <div class="mb-3">
                        <select name="pelanggan_id" class="form-select select2" required>
                            <option value="">Cari nomor pasien atau nama...</option>
                            @foreach($pasien as $p)
                                <option value="{{ $p->id }}">{{ $p->nomor_pasien }} - {{ $p->nama_pasien }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keluhan <span class="text-danger">*</span></label>
                        <textarea name="keluhan" class="form-control" rows="4" placeholder="Input keluhan pasien..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Diagnosa <span class="text-danger">*</span></label>
                        <textarea name="diagnosa" class="form-control" rows="4" placeholder="Input diagnosa medis..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tindakan</label>
                        <textarea name="tindakan" class="form-control" rows="4" placeholder="Input tindakan yang diberikan..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Obat <span class="text-danger">*</span></label>
                        <textarea name="obat" class="form-control" rows="3" placeholder="Input daftar obat..."></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0"><i class="ti ti-file-text me-2"></i>Rekam Medis</h5>
                <small class="text-muted">Menampilkan 5 rekam medis terakhir</small>
            </div>
            <div class="card-body p-0">
                <div class="accordion accordion-flush" id="accordionRiwayat">
                    @forelse($riwayat as $index => $r)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $r->id }}">
                                <button class="accordion-button collapsed py-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $r->id }}">
                                    <div class="d-block">
                                        <div class="fw-bold text-dark">{{ $r->created_at->translatedFormat('l, d F Y') }}</div>
                                        <small class="text-muted">{{ $r->pelanggan->nama_pasien }} - <span class="text-primary">{{ $r->diagnosa }}</span></small>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapse{{ $r->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionRiwayat">
                                <div class="accordion-body bg-light-subtle small">
                                    <div class="mb-2">
                                        <strong class="d-block text-uppercase text-xs text-muted">Keluhan:</strong>
                                        <span>{{ $r->keluhan }}</span>
                                    </div>
                                    <div class="mb-2">
                                        <strong class="d-block text-uppercase text-xs text-muted">Tindakan:</strong>
                                        <span>{{ $r->tindakan ?? '-' }}</span>
                                    </div>
                                    <div class="mt-3 p-2 border rounded bg-white">
                                        <strong class="d-block text-uppercase mb-1 text-muted" style="font-size: 0.7rem; letter-spacing: 0.5px;">Daftar Obat:</strong>
                                        <div class="text-dark lh-base" style="word-break: break-word;">
                                            {{ $r->obat }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="p-4 text-center">
                            <p class="text-muted mb-0">Belum ada riwayat rekam medis.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap-5'
        });
    });
</script>
@endpush
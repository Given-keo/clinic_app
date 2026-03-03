@props([
    'id' => null, 
    'namaPasien' => '', 
    'jenisKelamin' => '', 
    'tanggalLahir' => '', 
    'nomorTelepon' => '', 
    'alamat' => ''
])

<div>

    <button type="button"
        class="btn {{ $id ? 'btn-warning btn-sm' : 'btn-primary btn-sm' }}"
        data-bs-toggle="modal"
        data-bs-target="#formPelanggan{{ $id ?? 'Tambah' }}">

        @if($id)
            <i class="fas fa-edit text-light"></i>
        @else
            <i class="fas fa-plus"></i> Tambah Pasien
        @endif
    </button>

    {{-- Struktur Modal --}}
    <div class="modal fade" id="formPelanggan{{ $id ?? 'Tambah' }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('data-master.pelanggan.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $id }}">

                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            {{ $id ? 'Form Edit Data Pasien' : 'Form Tambah Pasien Baru' }}
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body text-start">
                        {{-- Nama Pasien --}}
                        <div class="form-group mb-3">
                            <label class="form-label" for="nama_pasien{{ $id }}">Nama Lengkap Pasien</label>
                            <input type="text" name="nama_pasien" id="nama_pasien{{ $id }}" 
                                   class="form-control" value="{{ $id ? $namaPasien : old('nama_pasien') }}" required>
                        </div>

                        <div class="row">
                            {{-- Jenis Kelamin --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-select" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Laki-Laki" {{ ($id ? $jenisKelamin : old('jenis_kelamin')) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="Perempuan" {{ ($id ? $jenisKelamin : old('jenis_kelamin')) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            {{-- Tanggal Lahir --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="tanggal_lahir{{ $id }}">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir{{ $id }}" 
                                           class="form-control" value="{{ $id ? $tanggalLahir : old('tanggal_lahir') }}" required>
                                </div>
                            </div>
                        </div>

                        {{-- No Telepon --}}
                        <div class="form-group mb-3">
                            <label class="form-label" for="nomor_telepon{{ $id }}">No. Telepon / HP</label>
                            <input type="text" name="nomor_telepon" id="nomor_telepon{{ $id }}" 
                                   class="form-control" value="{{ $id ? $nomorTelepon : old('nomor_telepon') }}" placeholder="08xxxxxxxxxx">
                        </div>

                        {{-- Alamat --}}
                        <div class="form-group">
                            <label class="form-label" for="alamat{{ $id }}">Alamat Lengkap</label>
                            <textarea name="alamat" id="alamat{{ $id }}" rows="3" 
                                      class="form-control">{{ $id ? $alamat : old('alamat') }}</textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
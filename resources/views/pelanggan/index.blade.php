@extends("layouts.app")

@section("content_title","Data Pasien")

@section("content")
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Data Pasien</h4>

        <div class="d-flex justify-content-end mb-2">
            <x-pelanggan.form-pelanggan/>
        </div>
    </div>

    <div class="card-body">
        <x-alert :error="$errors->any()"/>

        <div class="table-responsive">
            <table class="table table-sm" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Pasien</th>
                        <th>Nama Pasien</th>
                        <th>Jenis Kelamin</th>
                        <th>Usia</th>
                        <th>Opsi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pelanggan as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-bold">{{ $item->nomor_pasien }}</td>
                            <td>{{ $item->nama_pasien }}</td>
                            <td>
                                <span class="badge {{ $item->jenis_kelamin == 'Laki-Laki' ? 'bg-light-secondary' : 'bg-light-danger' }}">
                                    {{ $item->jenis_kelamin }}
                                </span>
                            </td>
                            <td>{{ $item->usia }}</td> 

                            <td>
                                <div class="d-flex align-items-center">
                                    {{-- Komponen form untuk edit data --}}
                                    <x-pelanggan.form-pelanggan
                                        :id="$item->id"
                                        :nama-pasien="$item->nama_pasien"
                                        :jenis-kelamin="$item->jenis_kelamin"
                                        :tanggal-lahir="$item->tanggal_lahir"
                                        :nomor-telepon="$item->nomor_telepon"
                                        :alamat="$item->alamat"
                                    />

                                    <a href="{{ route('data-master.pelanggan.destroy', $item->id) }}"
                                       data-confirm-delete="true"
                                       class="btn btn-sm btn-danger mx-1 text-light">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
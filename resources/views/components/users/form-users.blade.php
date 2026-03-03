@props(['id' => null, 'name' => '', 'email' => '', 'password' => ''])

<div>
    <button type="button" class="btn {{ $id ? 'btn-warning btn-sm' : 'btn-primary btn-sm' }}" 
            data-bs-toggle="modal" data-bs-target="#formUsers{{ $id ?? 'Tambah' }}">
        @if($id)
            <i class="fas fa-edit text-light"></i>
        @else
            <i class="fas fa-plus"></i> Tambah Users
        @endif
    </button>

    <div class="modal fade" id="formUsers{{ $id ?? 'Tambah' }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $id }}">
                
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ $id ? 'Form Edit Users' : 'Form Tambah Users' }}</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body text-start"> <div class="form-group my-2">
                            <label for="name{{ $id }}">Name</label>
                            <input type="text" name="name" id="name{{ $id }}" class="form-control" value="{{ $id ? $name : old('name') }}">
                        </div>
                        <div class="form-group my-2">
                            <label for="email{{ $id }}">Email</label>
                            <input type="email" name="email" id="email{{ $id }}" class="form-control" value="{{ $id ? $email : old('email') }}">
                        </div>
                        <div class="form-group my-2">
                            <label for="password{{ $id }}">Password</label>
                            <input type="password" name="password" id="password{{ $id }}" class="form-control" placeholder="{{ $id ? 'Kosongkan jika tidak ubah' : '' }}">
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div> 
            </form> 
        </div>
    </div>
</div>
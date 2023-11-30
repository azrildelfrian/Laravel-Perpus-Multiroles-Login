@extends('section.admin')
@section('title')
    Anggota / Edit Anggota
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Edit Informasi Anggota</p>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-sm">Informasi Anggota</p>
                    <form action="{{ route('anggota.update', $users->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama</label>
                                    <input name="fullname" class="form-control" type="text"
                                        value="{{ $users->fullname }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Email</label>
                                    <input name="email" class="form-control" type="text" value="{{ $users->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Role</label>
                                    <select name="role" class="form-control" required>
                                        <option value="{{ $users->role }}">{{ $users->role }}</option>
                                        <option value="admin">Admin</option>
                                        <option value="staff">Staff</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm ms-auto">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

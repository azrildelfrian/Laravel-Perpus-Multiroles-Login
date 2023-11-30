@extends('section.admin')
@section('title')
    Anggota / Tambah Anggota
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h4 class="mb-0">Tambah Anggota</h4>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-sm">Informasi anggota</p>
                    <form action="{{ route('anggota.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama</label>
                                    <input name="nama" class="form-control" type="text" value=""
                                        placeholder="Masukkan nama anggota..." required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nomor Telepon</label>
                                    <input name="no_telp" class="form-control" type="text" value=""
                                        placeholder="Masukkan nomor telepon...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Email</label>
                                    <input name="email" class="form-control" type="text" value=""
                                        placeholder="Masukkan email anggota...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Password</label>
                                    <input name="password" class="form-control" type="text" value=""
                                        placeholder="Password anggota...">
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Alamat</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Alamat</label>
                                    <input name="alamat" class="form-control" type="text" value=""
                                        placeholder="Alamat Anggota...">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Role</label>
                                    <select name="role_id" class="form-control" required>
                                        <option value="2">Staff</option>
                                        <option value="3">Anggota</option>
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

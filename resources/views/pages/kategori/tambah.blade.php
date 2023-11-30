@extends('section.admin')
@section('title')
    Kategori / Tambah Kategori
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h4 class="mb-0">Tambah Kategori</h4>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-sm">Informasi Kategori</p>
                    <form action="{{ route('kategori.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama Kategori</label>
                                    <input name="nama_kategori" class="form-control" type="text" value=""
                                        placeholder="Masukkan nama kategori..." required>
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

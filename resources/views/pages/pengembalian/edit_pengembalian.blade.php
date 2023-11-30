@extends('section.admin')
@section('title')
    Pengembalian / Edit Pengembalian
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Edit Informasi Pengembalian</p>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-sm">Informasi Pengembalian</p>
                    <form action="{{ route('pengembalian.update', $peminjaman->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tanggal Pengembalian</label>
                                    <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian"
                                        class="form-control" value="{{ $peminjaman->tanggal_pengembalian }}">
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

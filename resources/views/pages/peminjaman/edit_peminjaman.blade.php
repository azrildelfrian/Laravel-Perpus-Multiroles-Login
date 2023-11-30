@extends('section.admin')
@section('title')
    Peminjaman / Edit Peminjaman
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Edit Informasi Peminjaman</p>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-sm">Informasi Peminjaman</p>
                    <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama Peminjam</label>
                                    <select name="id_users" id="" class="form-control">
                                        <option value="{{ $peminjaman->id_users }}"></option>
                                        @foreach ($users as $item)
                                            @if ($item->role === 'user')
                                                <option value="{{ $item->id }}">{{ $item->fullname }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="buku" class="form-control-label">Buku yang akan dipinjam</label>
                                    <select name="id_buku" id="" class="form-control">
                                        <option value="{{ $peminjaman->id_buku }}"></option>
                                        @foreach ($buku as $item)
                                            <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tanggal Pinjam</label>
                                    <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control"
                                        value="{{ $peminjaman->tanggal_pinjam }}">
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

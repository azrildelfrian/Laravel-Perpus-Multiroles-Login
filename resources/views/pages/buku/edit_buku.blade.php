@extends('section.admin')
@section('title')
    Buku / Edit Buku
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Edit Informasi Buku</p>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-sm">Informasi Buku</p>
                    <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Judul</label>
                                    <input name="judul" class="form-control" type="text" value="{{ $buku->judul }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Penulis</label>
                                    <input name="penulis" class="form-control" type="text" value="{{ $buku->penulis }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Penerbit</label>
                                    <input name="penerbit" class="form-control" type="text"
                                        value="{{ $buku->penerbit }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tahun Terbit</label>
                                    <input name="tahun_terbit" class="form-control" type="text"
                                        value="{{ $buku->tahun_terbit }}">
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Informasi Lain</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Kategori</label>
                                    <select name="id_kategori" id="" class="form-control">
                                        <option value="{{ $buku->id_kategori }}"></option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Jumlah Salinan</label>
                                    <input name="jumlah_salinan" class="form-control" type="text"
                                        value="{{ $buku->jumlah_salinan }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Cover Buku</label>
                                    <input type="file" name="cover" id="cover"
                                        class="input100 form-control form-control-lg" value="{{ $buku->cover }}">
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Sinopsis</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Sinopsis</label>
                                    <input name="sinopsis" class="form-control" type="text"
                                        value="{{ $buku->sinopsis }}">
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

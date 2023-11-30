@extends('section.admin')
@section('title')
    Buku / Tambah Buku
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h4 class="mb-0">Tambah Buku</h4>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-sm">Informasi Buku</p>
                    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Judul</label>
                                    <input name="judul" class="form-control" type="text" value=""
                                        placeholder="Masukkan judul buku..." required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Penulis</label>
                                    <input name="penulis" class="form-control" type="text" value=""
                                        placeholder="Masukkan nama penulis...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Penerbit</label>
                                    <input name="penerbit" class="form-control" type="text" value=""
                                        placeholder="Masukkan penerbit buku...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tahun Terbit</label>
                                    <input name="tahun_terbit" class="form-control" type="text" value=""
                                        placeholder="Tahun terbit buku...">
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
                                        <option value=""></option>
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
                                    <input name="jumlah_salinan" class="form-control" type="text" value=""
                                        placeholder="Jumlah salinan buku">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Cover Buku</label>
                                    <input type="file" name="cover" id="cover"
                                        class="input100 form-control form-control-lg">
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Sinopsis</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Sinopsis</label>
                                    <input name="sinopsis" class="form-control" type="text" value=""
                                        placeholder="Sinopsis singkat">
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

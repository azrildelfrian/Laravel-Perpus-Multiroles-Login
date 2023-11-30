@extends('section.admin')
@section('title')
    Daftar Buku
@endsection


@section('content')
@if (Auth::user()->role == 'admin')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Buku</h6>
                    <a href="{{ route('buku.tambah') }}" class="btn btn-primary btn-sm ms-auto float-end">Tambah Buku</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Penulis|Penerbit|Tahun</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Kategori</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jumlah Salinan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        cover</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buku as $buku)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $buku->judul }}</h6>
                                                    <p class="text-xs text-secondary mb-0">"{{ $buku->sinopsis }}"</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $buku->penulis }}</p>
                                            <p class="text-xs text-secondary mb-0">{{ $buku->penerbit }}</p>
                                            <p class="text-xs text-secondary mb-0">{{ $buku->tahun_terbit }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span
                                                class="badge badge-sm bg-primary">{{ $buku->kategori ? $buku->kategori->nama_kategori : 'Kategori Tidak Tersedia' }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $buku->jumlah_salinan }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <img src="{{ asset('picture/buku/' . $buku->cover) }}" width="30px"
                                                height="40px" class="">
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-warning btn-sm"
                                                onclick="location.href='{{ route('buku.edit', $buku->id) }}'"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                Edit
                                            </button>
                                        </td>
                                        <td>
                                            <form action="{{ route('buku.destroy', $buku->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" value="Hapus" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif (Auth::user()->role == 'user')
<div class="row">
    @foreach ($buku as $item)
    <div class="col-md-4 my-3">
        <div class="card card-profile h-100">
            <img src="{{ asset('picture/buku/' . $item->cover) }}" alt="Image placeholder" class="card-img-top">
            <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <h5 class="card-title">{{ $item->judul }}</h5>
                <p class="card-text">
                    <b>Pengarang:</b> {{ $item->penulis }} <br>
                    <b>Penerbit:</b> {{ $item->penerbit }} <br>
                    <b>Tahun:</b> {{ $item->tahun_terbit }} <br>
                    <b>Kategori:</b> {{ $item->kategori ? $item->kategori->nama_kategori : 'Kategori Tidak Tersedia' }} <br>
                    <b>Sinopsis:</b> {{ $item->sinopsis }}
                </p>
              </div>
            </div>
            <a href="{{ route('peminjaman.tambah') }}" class="btn btn-primary mx-3">Pinjam Buku</a> <!-- Moved outside the card-body div -->
        </div>
    </div>
    @endforeach
</div>
@endif


@endsection

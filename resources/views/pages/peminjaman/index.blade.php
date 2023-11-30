@extends('section.admin')
@section('title')
    Daftar peminjaman
@endsection

@section('content')
@if (Auth::user()->role == 'admin')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Peminjaman</h6>
                    <a href="{{ route('peminjaman.tambah') }}" class="btn btn-primary btn-sm ms-auto float-end">Tambah
                        Peminjaman</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Judul Buku</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tanggal Pinjam</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tanggal Kembali</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peminjaman as $peminjaman)
                                    @if ($peminjaman->status === 'Dipinjam')
                                        <tr>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $peminjaman->user->fullname }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $peminjaman->buku->judul }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $peminjaman->tanggal_pinjam }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $peminjaman->tanggal_kembali }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <button class="btn btn-warning btn-sm"
                                                    onclick="location.href='{{ route('peminjaman.edit', $peminjaman->id) }}'"
                                                    data-toggle="tooltip" data-original-title="Edit peminjaman">
                                                    Edit
                                                </button>
                                            </td>
                                            <td>
                                                <form action="{{ route('peminjaman.destroy', $peminjaman->id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="submit" value="Hapus" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus peminjaman ini?')">
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif (Auth::user()->role == 'user')

@endif
@endsection

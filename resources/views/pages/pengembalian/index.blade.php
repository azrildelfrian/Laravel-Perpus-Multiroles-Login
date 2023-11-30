@extends('section.admin')
@section('title')
    Daftar Pengembalian
@endsection

@section('content')
@if (Auth::user()->role == 'admin')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Pengembalian</h6>
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
                                        Tanggal Dikembalikan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
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
                                                    class="text-secondary text-xs font-weight-bold">{{ $peminjaman->tanggal_pengembalian }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                @php
                                                    $status = $peminjaman->status;
                                                    $badgeClass = '';
                                                    
                                                    switch ($status) {
                                                        case 'Terlambat':
                                                            $badgeClass = 'badge badge-sm bg-danger';
                                                            break;
                                                        case 'Dikembalikan':
                                                            $badgeClass = 'badge badge-sm bg-success';
                                                            break;
                                                        case 'Dipinjam':
                                                            $badgeClass = 'badge badge-sm bg-primary';
                                                            break;
                                                        default:
                                                            $badgeClass = 'badge badge-sm bg-secondary';
                                                            break;
                                                    }
                                                @endphp

                                                <span class="{{ $badgeClass }}">{{ $status }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <button class="btn btn-warning btn-sm"
                                                    onclick="location.href='{{ route('pengembalian.edit', $peminjaman->id) }}'"
                                                    data-toggle="tooltip" data-original-title="Edit pengembalian">
                                                    Pengembalian
                                                </button>
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
@endif
@endsection

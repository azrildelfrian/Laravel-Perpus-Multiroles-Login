@extends('section.admin')
@section('title')
    Daftar Kategori
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Kategori</h6>
                    @if (Auth::user()->role == 'admin')
                    <a href="{{ route('kategori.tambah') }}" class="btn btn-primary btn-sm ms-auto float-end">Tambah
                        Kategori</a>
                    @endif
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama
                                        Kategori</th>
                                        @if (Auth::user()->role == 'admin')
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        colspan="2">Aksi</th>
                                        @endif

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $kategori)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $kategori->id }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $kategori->nama_kategori }}</span>
                                        </td>
                                        @if (Auth::user()->role == 'admin')
                                        <td class="align-middle">
                                            <button class="btn btn-warning btn-sm"
                                                onclick="location.href='{{ route('kategori.edit', $kategori->id) }}'"
                                                data-toggle="tooltip" data-original-title="Edit kategori">
                                                Edit
                                            </button>
                                        </td>
                                        <td>
                                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" value="Hapus" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

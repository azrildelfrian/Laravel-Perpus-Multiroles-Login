<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\M_Peminjaman;
use App\Models\M_Buku;
use App\Models\User;
use Carbon\Carbon;


class C_Peminjaman extends Controller
{
    public function index()
    {
        $peminjaman = M_Peminjaman::all();
        $users = User::all();
        $buku = M_Buku::all();

        return view('pages.peminjaman.index', compact('peminjaman', 'users', 'buku'));
    }

    public function tambah()
    {
        // Periksa apakah pengguna saat ini adalah admin
        $isAdmin = Auth::user()->role === 'admin';

        // Jika admin, ambil semua data user
        if ($isAdmin) {
            $users = User::all();
        } else {
            // Jika bukan admin, ambil data user yang terkait dengan pengguna saat ini
            $userId = Auth::id();
            $users = User::where('id', $userId)->get();
        }

        $buku = M_Buku::all();
        $peminjaman = M_Peminjaman::all();

        return view('pages.peminjaman.tambah', compact('users', 'buku', 'peminjaman'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        // Ambil tanggal pinjam dari request dan konversi ke objek Carbon
        $tanggal_pinjam = Carbon::createFromFormat('Y-m-d', $request->input('tanggal_pinjam'));

        // Hitung tanggal kembali dengan menambahkan 7 hari ke tanggal pinjam
        $tanggal_kembali = $tanggal_pinjam->copy()->addDays(7);

        // Simpan data peminjaman ke dalam database
        $peminjaman = new M_Peminjaman();
        $peminjaman->id_users = $request->input('id_users');
        $peminjaman->id_buku = $request->input('id_buku');
        $peminjaman->tanggal_pinjam = $tanggal_pinjam;
        $peminjaman->tanggal_kembali = $tanggal_kembali;
        $peminjaman->tanggal_pengembalian = $request->input('tanggal_pengembalian');
        $peminjaman->save();

        // Redirect atau tampilkan pesan sukses jika perlu
        // return redirect('/peminjaman')->with('success', 'Data buku berhasil disimpan.');
        $isAdmin = Auth::user()->role === 'admin';

        // Jika admin, redirect ke '/peminjaman' dengan pesan sukses
        if ($isAdmin) {
            return redirect('/peminjaman')->with('success', 'Data buku berhasil disimpan.');
        } else {
            // Jika bukan admin, redirect ke 'pages.riwayat_peminjaman.index' dengan pesan sukses
            return redirect('/riwayat_peminjaman')->with('success', 'Data buku berhasil disimpan.');
        }
    }

    public function edit($id)
    {
        $peminjaman = M_Peminjaman::findOrFail($id);
        $buku = M_Buku::all();
        $users = User::all();
        return view('pages.peminjaman.edit_peminjaman', compact(['buku','peminjaman', 'users']));
    }

    public function update(Request $request, $id)
    {
        // Temukan data peminjaman berdasarkan ID
        $peminjaman = M_Peminjaman::findOrFail($id);
    
        // Ambil tanggal pinjam dari request dan konversi ke objek Carbon
        $tanggal_pinjam = Carbon::createFromFormat('Y-m-d', $request->input('tanggal_pinjam'));
    
        // Hitung tanggal kembali dengan menambahkan 7 hari ke tanggal pinjam
        $tanggal_kembali = $tanggal_pinjam->copy()->addDays(7);
    
        // Update data peminjaman yang sudah ada dengan nilai yang baru
        $peminjaman->id_users = $request->input('id_users');
        $peminjaman->id_buku = $request->input('id_buku');
        $peminjaman->tanggal_pinjam = $tanggal_pinjam;
        $peminjaman->tanggal_kembali = $tanggal_kembali;
        $peminjaman->tanggal_pengembalian = $request->input('tanggal_pengembalian');
        $peminjaman->save();
    
        // Redirect atau tampilkan pesan sukses jika perlu
        return redirect('/peminjaman')->with('success', 'Data buku berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $peminjaman = M_Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect('/peminjaman')->with('success', 'Data anggota berhasil dihapus.');
    }

}

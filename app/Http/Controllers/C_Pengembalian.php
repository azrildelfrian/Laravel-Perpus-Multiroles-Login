<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Buku;
use App\Models\M_Peminjaman;
use App\Models\User;
use Carbon\Carbon;

class C_Pengembalian extends Controller
{
    public function index()
    {
        $peminjaman = M_Peminjaman::all();
        $users = User::all();
        $buku = M_Buku::all();

        return view('pages.pengembalian.index', compact('peminjaman', 'users', 'buku'));
    }


    public function edit($id)
    {
        $peminjaman = M_Peminjaman::findOrFail($id);
        $buku = M_Buku::all();
        $users = User::all();
        return view('pages.pengembalian.edit_pengembalian', compact(['buku','peminjaman', 'users']));
    }

    public function update(Request $request, $id)
    {
        // Temukan data peminjaman berdasarkan ID
        $peminjaman = M_Peminjaman::findOrFail($id);
            
        $tanggal_pengembalian = $request->input('tanggal_pengembalian');
        $tanggal_kembali = $peminjaman->tanggal_kembali;
            
        // Mengubah status berdasarkan tanggal pengembalian
        if ($tanggal_pengembalian > $tanggal_kembali) {
            $peminjaman->status = 'Terlambat';
        } elseif ($tanggal_pengembalian <= $tanggal_kembali) {
            $peminjaman->status = 'Dikembalikan';
        }
        
        $peminjaman->tanggal_pengembalian = $tanggal_pengembalian;
        $peminjaman->save();
        
        // Redirect atau tampilkan pesan sukses jika perlu
        return redirect('/pengembalian')->with('success', 'Data buku berhasil diperbarui.');
    }

}

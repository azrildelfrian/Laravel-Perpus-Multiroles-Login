<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\M_Buku;
use App\Models\M_Peminjaman;
use App\Models\User;
use Carbon\Carbon;

class C_Riwayat_peminjaman extends Controller
{
    public function index()
    {
        // Periksa apakah pengguna saat ini adalah admin
        $isAdmin = Auth::user()->role === 'admin';

        // Jika admin, ambil semua data peminjaman
        if ($isAdmin) {
            $peminjaman = M_Peminjaman::all();
        } else {
            // Jika bukan admin, ambil data peminjaman yang terkait dengan pengguna saat ini
            $userId = Auth::id();
            $peminjaman = M_Peminjaman::where('id_users', $userId)->get();
        }

        // Lanjutkan dengan mengirimkan data $peminjaman ke tampilan Anda
        return view('pages.riwayat_peminjaman.index', compact('peminjaman'));
    }
}

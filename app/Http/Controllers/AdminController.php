<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\M_Buku;
use App\Models\M_Peminjaman;
use App\Models\M_Pengembalian;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        $peminjaman = M_Peminjaman::all();
        $users = User::all();
        $buku = M_Buku::all();
        $peminjamanCount = M_Peminjaman::count();
        $userCount = User::count();
        $bukuCount = M_Buku::count();
        return view('session/index', compact(['peminjamanCount', 'userCount', 'bukuCount']));
    }
    

}

<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class C_Anggota extends Controller
{
    public function index()
    {
        $users = User::all();
        // dd($anggota);
        return view('pages.anggota.anggota', compact('users'));
    }

    public function tambah()
    {
        return view('pages.anggota.tambah_anggota');
    }

    public function edit($id)
    {
        // Terapkan middleware admin di sini
        $this->middleware('admin');
        $users = User::findOrFail($id);
        return view('pages.anggota.edit_anggota', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->fullname = $request->input('fullname');
        $users->email = $request->input('email');
        $users->role = $request->input('role');
        $users->save();

        return redirect('/anggota')->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/anggota')->with('success', 'Data anggota berhasil dihapus.');
    }
}

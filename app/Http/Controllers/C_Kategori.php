<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Kategori;

class C_Kategori extends Controller
{
    public function index()
    {
        $kategori = M_Kategori::all();

        return view('pages.kategori.kategori', compact('kategori'));
    }

    public function tambah()
    {
        $kategori = M_Kategori::all();

        return view('pages.kategori.tambah', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required',
        ]);

        $kategori = new M_Kategori();
        $kategori->nama_kategori = $request->input('nama_kategori');
        $kategori->save();

        return redirect('/kategori')->with('success', 'Kategori berhasil ditambahkan.');
    }

    function edit($id){
        // Terapkan middleware admin di sini
        $this->middleware('admin');

        $kategori = M_Kategori::findOrFail($id);
        return view('pages.kategori.edit', compact('kategori'));
        
    }

    public function update(Request $request, $id)
    {
        $kategori = M_Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->input('nama_kategori');
        $kategori->save();

        return redirect('/kategori')->with('success', 'Data kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategori = M_Kategori::findOrFail($id);
        $kategori->delete();

        return redirect('/kategori')->with('success', 'Data kategori berhasil dihapus.');
    }
}

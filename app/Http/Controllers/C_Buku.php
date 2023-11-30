<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\M_Buku;
use App\Models\M_Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;

class C_Buku extends Controller
{
    public function index()
    {
        $buku = M_Buku::all();
        $kategori = M_Kategori::all();
        
        //dd($buku);
        return view('pages.buku.buku',compact(['buku','kategori']));
    }

    public function tambah()
    {
        $buku = M_Buku::with('kategori')->get();
        $kategori = M_Kategori::all();

        return view('pages.buku.tambah_buku',compact(['buku','kategori']));
    }

    public function store(Request $request)
    {
        $buku = new M_Buku();
        $buku->judul = $request->input('judul');
        $buku->penulis = $request->input('penulis');
        $buku->penerbit = $request->input('penerbit');
        $buku->tahun_terbit = $request->input('tahun_terbit');
        $buku->id_kategori = $request->input('id_kategori');
        $buku->jumlah_salinan = $request->input('jumlah_salinan');
        $buku->sinopsis = $request->input('sinopsis');
    
        // Cek apakah ada file gambar yang diupload
        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {

            // Upload gambar baru
            $gambar_file = $request->file('cover');
            $gambar_ekstensi = $gambar_file->extension();
            $nama_gambar = date('ymdhis') . "." . $gambar_ekstensi;
            $gambar_file->move(public_path('picture/buku/'), $nama_gambar);
            $buku->cover = $nama_gambar;
        }
    
        $buku->save();
    
        // Redirect atau tampilkan pesan sukses jika perlu
        return redirect('/buku')->with('success', 'Data buku berhasil disimpan.');
    }
    

    public function edit($id)
    {
        $buku = M_Buku::findOrFail($id);
        $kategori = M_Kategori::all();
        return view('pages.buku.edit_buku', compact(['buku','kategori']));
    }

    public function update(Request $request, $id)
    {
        $buku = M_Buku::findOrFail($id);
        $buku->judul = $request->input('judul');
        $buku->penulis = $request->input('penulis');
        $buku->penerbit = $request->input('penerbit');
        $buku->tahun_terbit = $request->input('tahun_terbit');
        $buku->id_kategori = $request->input('id_kategori');
        $buku->jumlah_salinan = $request->input('jumlah_salinan');
        $buku->sinopsis = $request->input('sinopsis');
    
        // Cek apakah ada file gambar yang diupload
        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            // Hapus gambar lama jika ada
            if ($buku->cover && file_exists(public_path('picture/buku/' . $buku->cover))) {
                unlink(public_path('picture/buku/' . $buku->cover));
            }
    
            // Upload gambar baru
            $gambar_file = $request->file('cover');
            $gambar_ekstensi = $gambar_file->extension();
            $nama_gambar = date('ymdhis') . "." . $gambar_ekstensi;
            $gambar_file->move(public_path('picture/buku/'), $nama_gambar);
            $buku->cover = $nama_gambar;
        }
    
        $buku->save();
    
        // Redirect atau tampilkan pesan sukses jika perlu
        return redirect('/buku')->with('success', 'Data buku berhasil disimpan.');
    }
    

    public function destroy($id)
    {
        $buku = M_Buku::findOrFail($id);
        $buku->delete();

        return redirect('/buku')->with('success', 'Data buku berhasil dihapus.');
    }

    
}

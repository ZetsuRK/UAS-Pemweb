<?php

namespace App\Http\Controllers\Wartawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::where('user_id', auth()->id())->get();
        return view('wartawan.berita.index', compact('berita'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('wartawan.berita.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $gambar = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('gambar-berita', 'public');
        }

        Berita::create([
            'user_id' => auth()->id(),
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $gambar,
            'status' => 'draft',
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditulis dan menunggu persetujuan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

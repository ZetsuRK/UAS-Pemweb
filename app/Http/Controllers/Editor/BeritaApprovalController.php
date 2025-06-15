<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeritaApprovalController extends Controller
{
    public function index()
    {
        $berita = Berita::where('status', 'draft')->get();
        return view('editor.berita.index', compact('berita'));
    }

    public function approve(Berita $berita)
    {
        $berita->update(['status' => 'approved']);
        return back()->with('success', 'Berita disetujui');
    }

    public function reject(Berita $berita)
    {
        $berita->update(['status' => 'rejected']);
        return back()->with('error', 'Berita ditolak');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BeritaArtikel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BeritaArtikelController extends Controller
{
    public function index(Request $request): View
    {
        $query = BeritaArtikel::query();

        // Pencarian judul dan ringkasan
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('ringkasan', 'like', "%{$search}%");
            });
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Statistik berita
        $totalBerita = BeritaArtikel::count();
        $beritaTerbit = BeritaArtikel::where('status', 'published')->count();
        $beritaDraft = BeritaArtikel::where('status', 'draft')->count();
        $beritaArsip = BeritaArtikel::where('status', 'archived')->count();

        // Daftar berita terbaru
        $berita = $query->latest()->paginate(10)->withQueryString();

        return view('admin.berita-artikel.index', compact(
            'berita',
            'totalBerita',
            'beritaTerbit',
            'beritaDraft',
            'beritaArsip'
        ));
    }

    public function create(): View
    {
        return view('admin.berita-artikel.create');
    }

    public function store(Request $request)
    {
        // Akan diisi pada tahap implementasi penyimpanan.
        abort(501, 'Fitur penyimpanan berita belum diimplementasikan.');
    }

   
public function show(string $beritaArtikel)
{
    $berita = \App\Models\BeritaArtikel::findOrFail($beritaArtikel);

    return view('admin.berita-artikel.show', compact('berita'));
}


    public function edit(string $beritaArtikel): View
    {
        $berita = BeritaArtikel::findOrFail($beritaArtikel);

        return view('admin.berita-artikel.edit', compact('berita'));
    }

    public function update(Request $request, string $beritaArtikel)
    {
        abort(501, 'Fitur pembaruan berita belum diimplementasikan.');
    }

    public function destroy(string $beritaArtikel)
    {
        abort(501, 'Fitur penghapusan berita belum diimplementasikan.');
    }
}
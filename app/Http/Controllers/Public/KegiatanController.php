<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index(Request $request)
    {
        $query = Kegiatan::query()
            ->where('status', 'published');

        // Pencarian kegiatan
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_kegiatan', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%")
                    ->orWhere('lokasi', 'like', "%{$search}%");
            });
        }

        // Filter kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Ambil kegiatan dengan pagination
        $kegiatan = $query
            ->orderByDesc('tanggal_mulai')
            ->paginate(9)
            ->withQueryString();

        $kategoriKegiatan = [
            'Seminar',
            'Workshop',
            'Pelatihan',
            'Diskusi',
            'Lainnya',
        ];

        return view('public.kegiatan.index', compact(
            'kegiatan',
            'kategoriKegiatan'
        ));
    }

    public function show(string $slug)
{
    $item = \App\Models\Kegiatan::where('slug', $slug)
        ->where('status', 'published')
        ->firstOrFail();

    return view('public.kegiatan.show', compact('item'));
}
}
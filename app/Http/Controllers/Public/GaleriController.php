<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GaleriController extends Controller
{
    public function index(Request $request): View
    {
        $query = Galeri::with('kegiatan')
            ->where('status', 'published');

        // Pencarian berdasarkan judul atau deskripsi
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        $galeri = $query
            ->latest('created_at')
            ->paginate(9)
            ->withQueryString();

        return view('public.galeri.index', compact('galeri'));
    }

    public function show(string $slug): View
    {
        $item = Galeri::with('kegiatan')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('public.galeri.show', compact('item'));
    }
}
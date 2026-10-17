<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\BeritaArtikel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BeritaArtikelController extends Controller
{
    public function index(Request $request): View
    {
        $query = BeritaArtikel::query()
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('ringkasan', 'like', "%{$search}%")
                    ->orWhere('isi', 'like', "%{$search}%");
            });
        }

        $berita = $query
            ->orderByDesc('published_at')
            ->paginate(9)
            ->withQueryString();

        return view('public.berita.index', compact('berita'));
    }

    public function show(string $slug): View
    {
        $berita = BeritaArtikel::query()
            ->where('slug', $slug)
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->firstOrFail();

        return view('public.berita.show', compact('berita'));
    }
}
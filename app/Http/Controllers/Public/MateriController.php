<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MateriController extends Controller
{
    private function daftarKategori(): array
    {
        return [
            'Dasar Investasi',
            'Saham',
            'Pasar Modal',
            'Investasi Syariah',
            'Analisis Saham',
        ];
    }

    public function index(Request $request): View
    {
        $query = Materi::query()
            ->where('status', 'published');

        // Pencarian judul, deskripsi, dan isi artikel
        if ($request->filled('search')) {
            $kataKunci = $request->input('search');

            $query->where(function ($q) use ($kataKunci) {
                $q->where('judul', 'like', "%{$kataKunci}%")
                    ->orWhere('deskripsi', 'like', "%{$kataKunci}%")
                    ->orWhere('isi', 'like', "%{$kataKunci}%");
            });
        }

        // Filter kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->input('kategori'));
        }

        $materi = $query
            ->latest()
            ->paginate(9)
            ->withQueryString();

        $kategoriMateri = $this->daftarKategori();

        return view('public.materi.index', compact(
            'materi',
            'kategoriMateri'
        ));
    }

    public function show(string $slug): View
    {
        $item = Materi::query()
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('public.materi.show', compact('item'));
    }
}
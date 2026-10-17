<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    public function index(Request $request)
    {
        $query = Materi::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $totalMateri = Materi::count();
        $materiTerbit = Materi::where('status', 'published')->count();
        $materiDraft = Materi::where('status', 'draft')->count();

        $materi = $query->latest()->paginate(10)->withQueryString();

        $kategoriMateri = [
            'Dasar Investasi',
            'Saham',
            'Pasar Modal',
            'Investasi Syariah',
            'Analisis Saham',
        ];

        return view('admin.materi.index', compact(
            'materi',
            'totalMateri',
            'materiTerbit',
            'materiDraft',
            'kategoriMateri'
        ));
    }

    public function create()
    {
        $kategoriMateri = [
            'Dasar Investasi',
            'Saham',
            'Pasar Modal',
            'Investasi Syariah',
            'Analisis Saham',
        ];

        return view('admin.materi.create', compact('kategoriMateri'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:materis,slug'],
            'kategori' => ['required', Rule::in([
                'Dasar Investasi', 'Saham', 'Pasar Modal',
                'Investasi Syariah', 'Analisis Saham',
            ])],
            'deskripsi' => ['nullable', 'string'],
            'gambar' => ['nullable', 'image', 'max:2048'],
            'file_materi' => ['nullable', 'mimes:pdf', 'max:10240'],
            'status' => ['required', Rule::in(['draft', 'published'])],
        ]);

        $validated['slug'] = $validated['slug'] ?: Str::slug($validated['judul']);

        if (Materi::where('slug', $validated['slug'])->exists()) {
            return back()->withInput()->withErrors([
                'slug' => 'Slug sudah digunakan. Silakan gunakan slug lain.',
            ]);
        }

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')
                ->store('materi/gambar', 'public');
        }

        if ($request->hasFile('file_materi')) {
            $validated['file_materi'] = $request->file('file_materi')
                ->store('materi/pdf', 'public');
        }

        Materi::create($validated);

        return redirect()
            ->route('admin.materi.index')
            ->with('success', 'Materi berhasil ditambahkan.');
    }

    public function show(string $materi)
    {
        $item = Materi::findOrFail($materi);

        return view('admin.materi.show', compact('item'));
    }

    public function edit(string $materi)
    {
        $item = Materi::findOrFail($materi);

        $kategoriMateri = [
            'Dasar Investasi',
            'Saham',
            'Pasar Modal',
            'Investasi Syariah',
            'Analisis Saham',
        ];

        return view('admin.materi.edit', compact('item', 'kategoriMateri'));
    }

    public function update(Request $request, string $materi)
    {
        $item = Materi::findOrFail($materi);

        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'slug' => [
                'required', 'string', 'max:255',
                Rule::unique('materis', 'slug')->ignore($item->id),
            ],
            'kategori' => ['required', Rule::in([
                'Dasar Investasi', 'Saham', 'Pasar Modal',
                'Investasi Syariah', 'Analisis Saham',
            ])],
            'deskripsi' => ['nullable', 'string'],
            'gambar' => ['nullable', 'image', 'max:2048'],
            'file_materi' => ['nullable', 'mimes:pdf', 'max:10240'],
            'status' => ['required', Rule::in(['draft', 'published'])],
        ]);

        if ($request->hasFile('gambar')) {
            if ($item->gambar) {
                Storage::disk('public')->delete($item->gambar);
            }

            $validated['gambar'] = $request->file('gambar')
                ->store('materi/gambar', 'public');
        }

        if ($request->hasFile('file_materi')) {
            if ($item->file_materi) {
                Storage::disk('public')->delete($item->file_materi);
            }

            $validated['file_materi'] = $request->file('file_materi')
                ->store('materi/pdf', 'public');
        }

        $item->update($validated);

        return redirect()
            ->route('admin.materi.index')
            ->with('success', 'Materi berhasil diperbarui.');
    }

    public function destroy(string $materi)
    {
        $item = Materi::findOrFail($materi);

        if ($item->gambar) {
            Storage::disk('public')->delete($item->gambar);
        }

        if ($item->file_materi) {
            Storage::disk('public')->delete($item->file_materi);
        }

        $item->delete();

        return redirect()
            ->route('admin.materi.index')
            ->with('success', 'Materi berhasil dihapus.');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::with('kegiatan');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $galeri = $query
            ->latest('created_at')
            ->paginate(10)
            ->withQueryString();

        $totalGaleri = Galeri::count();
        $galeriTerbit = Galeri::where('status', 'published')->count();
        $galeriDraft = Galeri::where('status', 'draft')->count();

        return view('admin.galeri.index', compact(
            'galeri',
            'totalGaleri',
            'galeriTerbit',
            'galeriDraft'
        ));
    }

    public function create()
    {
        $kegiatan = Kegiatan::orderBy('nama_kegiatan')->get();

        return view('admin.galeri.create', compact('kegiatan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:galeris,slug'],
            'deskripsi' => ['nullable', 'string'],
            'gambar' => ['required', 'image', 'max:5120'],
            'tanggal_dokumentasi' => ['nullable', 'date'],
            'kegiatan_id' => ['nullable', 'exists:kegiatans,id'],
            'status' => ['required', Rule::in(['draft', 'published'])],
        ]);

        $validated['slug'] = Str::slug(
            $validated['slug'] ?: $validated['judul']
        );

        if (Galeri::where('slug', $validated['slug'])->exists()) {
            return back()
                ->withInput()
                ->withErrors([
                    'slug' => 'Slug sudah digunakan. Silakan gunakan slug lain.',
                ]);
        }

        $validated['gambar'] = $request->file('gambar')
            ->store('galeri', 'public');

        Galeri::create($validated);

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Dokumentasi galeri berhasil ditambahkan.');
    }

    public function show(string $galeri)
    {
        $item = Galeri::with('kegiatan')->findOrFail($galeri);

        return view('admin.galeri.show', compact('item'));
    }

    public function edit(string $galeri)
    {
        $item = Galeri::findOrFail($galeri);
        $kegiatan = Kegiatan::orderBy('nama_kegiatan')->get();

        return view('admin.galeri.edit', compact('item', 'kegiatan'));
    }

    public function update(Request $request, string $galeri)
    {
        $item = Galeri::findOrFail($galeri);

        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('galeris', 'slug')->ignore($item->id),
            ],
            'deskripsi' => ['nullable', 'string'],
            'gambar' => ['nullable', 'image', 'max:5120'],
            'tanggal_dokumentasi' => ['nullable', 'date'],
            'kegiatan_id' => ['nullable', 'exists:kegiatans,id'],
            'status' => ['required', Rule::in(['draft', 'published'])],
        ]);

        if ($request->hasFile('gambar')) {
            if ($item->gambar) {
                Storage::disk('public')->delete($item->gambar);
            }

            $validated['gambar'] = $request->file('gambar')
                ->store('galeri', 'public');
        }

        $item->update($validated);

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Dokumentasi galeri berhasil diperbarui.');
    }

    public function destroy(string $galeri)
    {
        $item = Galeri::findOrFail($galeri);

        if ($item->gambar) {
            Storage::disk('public')->delete($item->gambar);
        }

        $item->delete();

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Dokumentasi galeri berhasil dihapus.');
    }
}
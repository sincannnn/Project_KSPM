<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BeritaArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class BeritaArtikelController extends Controller
{
    public function index(Request $request): View
    {
        $query = BeritaArtikel::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('ringkasan', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $totalBerita = BeritaArtikel::count();
        $beritaTerbit = BeritaArtikel::where('status', 'published')->count();
        $beritaDraft = BeritaArtikel::where('status', 'draft')->count();
        $beritaArsip = BeritaArtikel::where('status', 'archived')->count();

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
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:berita_artikels,slug'],
            'ringkasan' => ['nullable', 'string', 'max:500'],
            'isi' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'max:2048'],
            'status' => ['required', Rule::in(['draft', 'published', 'archived'])],
        ]);

        $slugDasar = Str::slug($validated['slug'] ?: $validated['judul']);

        if ($slugDasar === '') {
            return back()->withInput()->withErrors([
                'slug' => 'Judul atau slug harus menghasilkan alamat yang valid.',
            ]);
        }

        $validated['slug'] = $this->buatSlugUnik($slugDasar);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')
                ->store('berita-artikel', 'public');
        }

        $validated['published_at'] = $validated['status'] === 'published'
            ? now()
            : null;

        BeritaArtikel::create($validated);

        return redirect()
            ->route('admin.berita-artikel.index')
            ->with('success', 'Berita atau artikel berhasil ditambahkan.');
    }

    public function show(string $beritaArtikel): View
    {
        $berita = BeritaArtikel::findOrFail($beritaArtikel);

        return view('admin.berita-artikel.show', compact('berita'));
    }

    public function edit(string $beritaArtikel): View
    {
        $berita = BeritaArtikel::findOrFail($beritaArtikel);

        return view('admin.berita-artikel.edit', compact('berita'));
    }

    public function update(Request $request, string $beritaArtikel)
    {
        $berita = BeritaArtikel::findOrFail($beritaArtikel);

        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('berita_artikels', 'slug')->ignore($berita->id),
            ],
            'ringkasan' => ['nullable', 'string', 'max:500'],
            'isi' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'max:2048'],
            'status' => ['required', Rule::in(['draft', 'published', 'archived'])],
        ]);

        $slugDasar = Str::slug($validated['slug'] ?: $validated['judul']);

        if ($slugDasar === '') {
            return back()->withInput()->withErrors([
                'slug' => 'Judul atau slug harus menghasilkan alamat yang valid.',
            ]);
        }

        $validated['slug'] = $this->buatSlugUnik($slugDasar, $berita->id);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $validated['gambar'] = $request->file('gambar')
                ->store('berita-artikel', 'public');
        }

        if ($validated['status'] === 'published') {
            $validated['published_at'] = $berita->published_at ?? now();
        } else {
            $validated['published_at'] = null;
        }

        $berita->update($validated);

        return redirect()
            ->route('admin.berita-artikel.index')
            ->with('success', 'Berita atau artikel berhasil diperbarui.');
    }

    public function destroy(string $beritaArtikel)
    {
        $berita = BeritaArtikel::findOrFail($beritaArtikel);

        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita-artikel.index')
            ->with('success', 'Berita atau artikel berhasil dihapus.');
    }

    private function buatSlugUnik(string $slug, ?int $kecualiId = null): string
    {
        $slugDasar = $slug;
        $nomor = 2;

        while (
            BeritaArtikel::where('slug', $slug)
                ->when($kecualiId, fn ($query) => $query->where('id', '!=', $kecualiId))
                ->exists()
        ) {
            $slug = $slugDasar . '-' . $nomor;
            $nomor++;
        }

        return $slug;
    }
}
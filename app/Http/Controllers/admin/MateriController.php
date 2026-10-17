<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class MateriController extends Controller
{
    /**
     * Menampilkan daftar materi.
     */
    public function index(Request $request)
    {
        $query = Materi::query();

        // Pencarian judul, deskripsi, dan isi artikel
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%")
                    ->orWhere('isi', 'like', "%{$search}%");
            });
        }

        // Filter kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Statistik materi
        $totalMateri = Materi::count();

        $materiTerbit = Materi::where('status', 'published')->count();

        $materiDraft = Materi::where('status', 'draft')->count();

        // Daftar materi dengan pagination
        $materi = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $kategoriMateri = $this->daftarKategori();

        return view('admin.materi.index', compact(
            'materi',
            'totalMateri',
            'materiTerbit',
            'materiDraft',
            'kategoriMateri'
        ));
    }

    /**
     * Menampilkan formulir tambah materi.
     */
    public function create()
    {
        $kategoriMateri = $this->daftarKategori();

        return view('admin.materi.create', compact('kategoriMateri'));
    }

    /**
     * Menyimpan materi baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:materis,slug',
            ],

            'kategori' => [
                'required',
                Rule::in($this->daftarKategori()),
            ],

            'deskripsi' => ['nullable', 'string'],

            'isi' => ['required', 'string'],

            'gambar' => ['nullable', 'image', 'max:2048'],

            'status' => [
                'required',
                Rule::in(['draft', 'published']),
            ],
        ]);

        // Membuat slug dari judul jika tidak diisi
        $slugDasar = Str::slug(
            $validated['slug'] ?: $validated['judul']
        );

        if ($slugDasar === '') {
            return back()
                ->withInput()
                ->withErrors([
                    'slug' => 'Slug tidak valid. Silakan gunakan judul atau slug lain.',
                ]);
        }

        // Menghindari slug duplikat
        $validated['slug'] = $this->buatSlugUnik($slugDasar);

        // Upload gambar sampul jika tersedia
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')
                ->store('materi/gambar', 'public');
        }

        // Simpan materi sebagai artikel teks
        Materi::create($validated);

        return redirect()
            ->route('admin.materi.index')
            ->with('success', 'Materi artikel berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail materi di halaman admin.
     */
    public function show(string $materi)
    {
        $item = Materi::findOrFail($materi);

        return view('admin.materi.show', compact('item'));
    }

    /**
     * Menampilkan formulir edit materi.
     */
    public function edit(string $materi)
    {
        $item = Materi::findOrFail($materi);

        $kategoriMateri = $this->daftarKategori();

        return view('admin.materi.edit', compact(
            'item',
            'kategoriMateri'
        ));
    }

    /**
     * Memperbarui materi.
     */
    public function update(Request $request, string $materi)
    {
        $item = Materi::findOrFail($materi);

        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('materis', 'slug')->ignore($item->id),
            ],

            'kategori' => [
                'required',
                Rule::in($this->daftarKategori()),
            ],

            'deskripsi' => ['nullable', 'string'],

            'isi' => ['required', 'string'],

            'gambar' => ['nullable', 'image', 'max:2048'],

            'status' => [
                'required',
                Rule::in(['draft', 'published']),
            ],
        ]);

        // Membuat slug dari judul jika slug kosong
        $slugDasar = Str::slug(
            $validated['slug'] ?: $validated['judul']
        );

        if ($slugDasar === '') {
            return back()
                ->withInput()
                ->withErrors([
                    'slug' => 'Slug tidak valid. Silakan gunakan judul atau slug lain.',
                ]);
        }

        // Jika slug berubah dan sudah digunakan, buat slug unik
        $validated['slug'] = $this->buatSlugUnik(
            $slugDasar,
            $item->id
        );

        // Ganti gambar lama jika gambar baru diunggah
        if ($request->hasFile('gambar')) {
            $gambarBaru = $request->file('gambar')
                ->store('materi/gambar', 'public');

            if ($item->gambar) {
                Storage::disk('public')->delete($item->gambar);
            }

            $validated['gambar'] = $gambarBaru;
        }

        // Perbarui data artikel
        $item->update($validated);

        return redirect()
            ->route('admin.materi.index')
            ->with('success', 'Materi artikel berhasil diperbarui.');
    }

    /**
     * Menghapus materi.
     */
    public function destroy(string $materi)
    {
        $item = Materi::findOrFail($materi);

        // Hapus gambar sampul jika tersedia
        if ($item->gambar) {
            Storage::disk('public')->delete($item->gambar);
        }

        // Hapus data materi
        $item->delete();

        return redirect()
            ->route('admin.materi.index')
            ->with('success', 'Materi artikel berhasil dihapus.');
    }

    /**
     * Daftar kategori materi yang tersedia.
     */
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

    /**
     * Membuat slug unik.
     */
    private function buatSlugUnik(
        string $slugDasar,
        ?int $kecualiId = null
    ): string {
        $slug = $slugDasar;
        $nomor = 2;

        while (
            Materi::where('slug', $slug)
                ->when(
                    $kecualiId !== null,
                    fn ($query) => $query->where('id', '!=', $kecualiId)
                )
                ->exists()
        ) {
            $slug = $slugDasar . '-' . $nomor;
            $nomor++;
        }

        return $slug;
    }
}
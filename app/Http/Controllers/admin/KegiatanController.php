<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class KegiatanController extends Controller
{
    private function kategori(): array
    {
        return [
            'Seminar',
            'Workshop',
            'Pelatihan',
            'Diskusi',
            'Lainnya',
        ];
    }

    public function index(Request $request)
    {
        $query = Kegiatan::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_kegiatan', 'like', "%{$search}%")
                    ->orWhere('lokasi', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $totalKegiatan = Kegiatan::count();
        $kegiatanTerbit = Kegiatan::where('status', 'published')->count();
        $kegiatanDraft = Kegiatan::where('status', 'draft')->count();

        $kegiatan = $query
            ->latest('tanggal_mulai')
            ->paginate(10)
            ->withQueryString();

        $kategoriKegiatan = $this->kategori();

        return view('admin.kegiatan.index', compact(
            'kegiatan',
            'totalKegiatan',
            'kegiatanTerbit',
            'kegiatanDraft',
            'kategoriKegiatan'
        ));
    }

    public function create()
    {
        $kategoriKegiatan = $this->kategori();

        return view('admin.kegiatan.create', compact('kategoriKegiatan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kegiatan' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:kegiatans,slug'],
            'kategori' => ['required', Rule::in($this->kategori())],
            'deskripsi' => ['nullable', 'string'],
            'gambar' => ['nullable', 'image', 'max:2048'],
            'lokasi' => ['nullable', 'string', 'max:255'],
            'tanggal_mulai' => ['nullable', 'date'],
            'tanggal_selesai' => ['nullable', 'date', 'after_or_equal:tanggal_mulai'],
            'kuota' => ['nullable', 'integer', 'min:1'],
            'status' => ['required', Rule::in(['draft', 'published'])],
        ]);

        $validated['slug'] = $validated['slug']
            ?: Str::slug($validated['nama_kegiatan']);

        if (Kegiatan::where('slug', $validated['slug'])->exists()) {
            return back()->withInput()->withErrors([
                'slug' => 'Slug sudah digunakan. Silakan gunakan slug lain.',
            ]);
        }

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')
                ->store('kegiatan', 'public');
        }

        Kegiatan::create($validated);

        return redirect()
            ->route('admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function show(string $kegiatan)
    {
        $item = Kegiatan::with('peserta')->findOrFail($kegiatan);

        return view('admin.kegiatan.show', compact('item'));
    }

    public function edit(string $kegiatan)
    {
        $item = Kegiatan::findOrFail($kegiatan);
        $kategoriKegiatan = $this->kategori();

        return view('admin.kegiatan.edit', compact(
            'item',
            'kategoriKegiatan'
        ));
    }

    public function update(Request $request, string $kegiatan)
    {
        $item = Kegiatan::findOrFail($kegiatan);

        $validated = $request->validate([
            'nama_kegiatan' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('kegiatans', 'slug')->ignore($item->id),
            ],
            'kategori' => ['required', Rule::in($this->kategori())],
            'deskripsi' => ['nullable', 'string'],
            'gambar' => ['nullable', 'image', 'max:2048'],
            'lokasi' => ['nullable', 'string', 'max:255'],
            'tanggal_mulai' => ['nullable', 'date'],
            'tanggal_selesai' => ['nullable', 'date', 'after_or_equal:tanggal_mulai'],
            'kuota' => ['nullable', 'integer', 'min:1'],
            'status' => ['required', Rule::in(['draft', 'published'])],
        ]);

        if ($request->hasFile('gambar')) {
            if ($item->gambar) {
                Storage::disk('public')->delete($item->gambar);
            }

            $validated['gambar'] = $request->file('gambar')
                ->store('kegiatan', 'public');
        }

        $item->update($validated);

        return redirect()
            ->route('admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(string $kegiatan)
    {
        $item = Kegiatan::findOrFail($kegiatan);

        if ($item->gambar) {
            Storage::disk('public')->delete($item->gambar);
        }

        $item->delete();

        return redirect()
            ->route('admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil dihapus.');
    }
}
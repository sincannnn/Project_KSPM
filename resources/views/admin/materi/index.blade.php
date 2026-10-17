@extends('layouts.admin.app')

@section('title', 'Materi Edukasi')
@section('page-heading', 'Materi Edukasi')

@section('content')

<!-- HEADER -->
<div class="d-flex flex-column flex-md-row justify-content-between gap-3 mb-4">
    <div>
        <h1 class="admin-page-title mb-1">Materi Edukasi</h1>
        <p class="admin-muted mb-0">
            Kelola artikel edukasi investasi yang ditampilkan di website publik.
        </p>
    </div>

    <a href="{{ route('admin.materi.create') }}" class="btn btn-success align-self-md-center">
        <i class="bi bi-plus-lg me-2"></i>
        Tambah Materi
    </a>
</div>

<!-- NOTIFIKASI -->
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle me-2"></i>
    {{ session('success') }}

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <div class="fw-semibold mb-1">Terjadi kesalahan:</div>
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- STATISTIK -->
<div class="row g-3 mb-4">
    @foreach ([
    [
    'label' => 'Total Materi',
    'jumlah' => $totalMateri,
    'icon' => 'bi-journal-text',
    'warna' => '#e4f2e8',
    ],
    [
    'label' => 'Dipublikasikan',
    'jumlah' => $materiTerbit,
    'icon' => 'bi-check-circle',
    'warna' => '#e6edfb',
    ],
    [
    'label' => 'Draft',
    'jumlah' => $materiDraft,
    'icon' => 'bi-file-earmark-text',
    'warna' => '#fff1d7',
    ],
    ] as $stat)
    <div class="col-12 col-md-4">
        <div class="admin-card p-3 d-flex align-items-center justify-content-between h-100">
            <div>
                <div class="admin-muted small">
                    {{ $stat['label'] }}
                </div>
                <div class="fs-3 fw-bold">
                    {{ $stat['jumlah'] }}
                </div>
            </div>

            <div class="rounded-3 p-3" style="background: {{ $stat['warna'] }};">
                <i class="bi {{ $stat['icon'] }} fs-4 text-success"></i>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- TABEL MATERI -->
<div class="admin-card overflow-hidden">

    <!-- PENCARIAN DAN FILTER -->
    <form method="GET" action="{{ route('admin.materi.index') }}" class="p-3 border-bottom">

        <div class="row g-2">
            <div class="col-12 col-lg-5">
                <input type="search" name="search" class="form-control" value="{{ request('search') }}"
                    placeholder="Cari judul, deskripsi, atau isi artikel...">
            </div>

            <div class="col-6 col-lg-3">
                <select name="kategori" class="form-select">
                    <option value="">Semua Kategori</option>

                    @foreach ($kategoriMateri as $kategori)
                    <option value="{{ $kategori }}" @selected(request('kategori')===$kategori)>
                        {{ $kategori }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-6 col-lg-2">
                <select name="status" class="form-select">
                    <option value="">Semua Status</option>

                    <option value="published" @selected(request('status')==='published' )>
                        Terbit
                    </option>

                    <option value="draft" @selected(request('status')==='draft' )>
                        Draft
                    </option>
                </select>
            </div>

            <div class="col-12 col-lg-2 d-flex gap-2">
                <button type="submit" class="btn btn-success flex-grow-1">
                    <i class="bi bi-funnel me-1"></i>
                    Filter
                </button>

                <a href="{{ route('admin.materi.index') }}" class="btn btn-light border">
                    Reset
                </a>
            </div>
        </div>
    </form>

    <!-- TABEL -->
    <div class="table-responsive">
        <table class="table align-middle mb-0">

            <thead class="table-light">
                <tr>
                    <th class="px-3">Materi Artikel</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Konten</th>
                    <th class="text-end pe-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($materi as $item)
                <tr>
                    <!-- JUDUL DAN GAMBAR -->
                    <td class="px-3" style="min-width: 260px;">
                        <div class="d-flex align-items-center gap-3">

                            @if ($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" width="60"
                                height="55" class="rounded" style="object-fit: cover;">
                            @else
                            <div class="rounded d-flex align-items-center justify-content-center flex-shrink-0"
                                style="width: 60px; height: 55px; background: #e4f2e8; color: #176044;">
                                <i class="bi bi-journal-text fs-4"></i>
                            </div>
                            @endif

                            <div>
                                <div class="fw-semibold">
                                    {{ $item->judul }}
                                </div>

                                <div class="small admin-muted">
                                    {{ $item->slug }}
                                </div>

                                @if ($item->deskripsi)
                                <div class="small text-secondary mt-1">
                                    {{ \Illuminate\Support\Str::limit($item->deskripsi, 65) }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </td>

                    <!-- KATEGORI -->
                    <td>
                        <span class="badge bg-light text-dark border">
                            {{ $item->kategori ?: 'Tanpa kategori' }}
                        </span>
                    </td>

                    <!-- STATUS -->
                    <td>
                        @if ($item->status === 'published')
                        <span class="badge text-bg-success">
                            <i class="bi bi-check-circle me-1"></i>
                            Terbit
                        </span>
                        @else
                        <span class="badge text-bg-warning">
                            <i class="bi bi-pencil-square me-1"></i>
                            Draft
                        </span>
                        @endif
                    </td>

                    <!-- KONTEN ARTIKEL -->
                    <td>
                        @if (filled($item->isi))
                        <span class="badge bg-success-subtle text-success">
                            <i class="bi bi-file-text me-1"></i>
                            Artikel tersedia
                        </span>

                        <div class="small text-secondary mt-1">
                            {{ \Illuminate\Support\Str::words(strip_tags($item->isi), 8) }}
                        </div>
                        @else
                        <span class="badge bg-secondary-subtle text-secondary">
                            Belum ada isi
                        </span>
                        @endif
                    </td>

                    <!-- AKSI -->
                    <td class="text-end pe-3">
                        <div class="d-inline-flex gap-1">

                            <a href="{{ route('admin.materi.show', $item->id) }}" class="btn btn-sm btn-light border"
                                title="Lihat detail" aria-label="Lihat detail">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="{{ route('admin.materi.edit', $item->id) }}" class="btn btn-sm btn-light border"
                                title="Edit materi" aria-label="Edit materi">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form method="POST" action="{{ route('admin.materi.destroy', $item->id) }}"
                                onsubmit="return confirm('Yakin ingin menghapus materi ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-light border text-danger"
                                    title="Hapus materi" aria-label="Hapus materi">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-5">
                        <i class="bi bi-journal-text fs-1 text-secondary"></i>

                        <h6 class="mt-3">Belum ada materi artikel</h6>

                        <p class="admin-muted small">
                            @if (request()->hasAny(['search', 'kategori', 'status']))
                            Tidak ada materi yang sesuai dengan pencarian atau filter.
                            @else
                            Tambahkan artikel edukasi investasi pertama.
                            @endif
                        </p>

                        @if (request()->hasAny(['search', 'kategori', 'status']))
                        <a href="{{ route('admin.materi.index') }}" class="btn btn-outline-success btn-sm me-1">
                            Reset Filter
                        </a>
                        @endif

                        <a href="{{ route('admin.materi.create') }}" class="btn btn-success btn-sm">
                            <i class="bi bi-plus-lg me-1"></i>
                            Tambah Materi
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    <!-- PAGINATION -->
    @if ($materi->hasPages())
    <div class="p-3 border-top">
        {{ $materi->links() }}
    </div>
    @endif

</div>

@endsection
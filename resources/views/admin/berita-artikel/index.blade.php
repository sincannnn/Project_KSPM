@extends('layouts.admin.app')

@section('title', 'Berita & Artikel')
@section('page-heading', 'Berita & Artikel')

@section('content')

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <div>
        <h1 class="admin-page-title mb-1">Berita & Artikel</h1>
        <p class="admin-muted mb-0">Kelola informasi dan publikasi Galeri Investasi KSPM.</p>
    </div>

    <a href="{{ url('/admin/berita-artikel/create') }}" class="btn text-white px-4 py-2" style="background:#176044;">
        <i class="bi bi-plus-lg me-2"></i>Tambah Berita
    </a>
</div>

{{-- Statistik ringkas --}}
<div class="row g-3 mb-4">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="admin-card p-3 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="admin-muted small">Total Berita</div>
                    <div class="fs-3 fw-bold mt-1">{{ $totalBerita ?? 0 }}</div>
                </div>
                <div class="rounded-3 p-3" style="background:#e4f2e8;color:#176044;">
                    <i class="bi bi-newspaper fs-4"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="admin-card p-3 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="admin-muted small">Dipublikasikan</div>
                    <div class="fs-3 fw-bold mt-1">{{ $beritaTerbit ?? 0 }}</div>
                </div>
                <div class="rounded-3 p-3" style="background:#e6edfb;color:#3559a5;">
                    <i class="bi bi-check-circle fs-4"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="admin-card p-3 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="admin-muted small">Draft</div>
                    <div class="fs-3 fw-bold mt-1">{{ $beritaDraft ?? 0 }}</div>
                </div>
                <div class="rounded-3 p-3" style="background:#fff1d7;color:#9b6b08;">
                    <i class="bi bi-file-earmark-text fs-4"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="admin-card p-3 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="admin-muted small">Arsip</div>
                    <div class="fs-3 fw-bold mt-1">{{ $beritaArsip ?? 0 }}</div>
                </div>
                <div class="rounded-3 p-3" style="background:#f0e8f8;color:#7950a0;">
                    <i class="bi bi-archive fs-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Daftar berita --}}
<div class="admin-card overflow-hidden">

    <div class="p-3 p-md-4 border-bottom">
        <h5 class="fw-semibold mb-1">Daftar Berita</h5>
        <p class="admin-muted small mb-0">Cari dan kelola berita yang tersedia di website publik.</p>
    </div>

    <form method="GET" action="{{ url('/admin/berita-artikel') }}" class="p-3 border-bottom">
        <div class="row g-2">
            <div class="col-12 col-md-6">
                <div class="input-group">
                    <span class="input-group-text bg-white">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="search" name="search" class="form-control" placeholder="Cari judul berita..."
                        value="{{ request('search') }}">
                </div>
            </div>

            <div class="col-8 col-md-3">
                <select name="status" class="form-select">
                    <option value="">Semua Status</option>
                    <option value="published" @selected(request('status')==='published' )>
                        Dipublikasikan
                    </option>
                    <option value="draft" @selected(request('status')==='draft' )>
                        Draft
                    </option>
                    <option value="archived" @selected(request('status')==='archived' )>
                        Arsip
                    </option>
                </select>
            </div>

            <div class="col-4 col-md-3 d-flex gap-2">
                <button class="btn btn-success flex-grow-1" type="submit">
                    Filter
                </button>
                <a href="{{ url('/admin/berita-artikel') }}" class="btn btn-light border" title="Reset filter">
                    <i class="bi bi-arrow-counterclockwise"></i>
                </a>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead style="background:#f7f9f7;">
                <tr>
                    <th class="px-4 py-3 small text-secondary">BERITA</th>
                    <th class="py-3 small text-secondary">STATUS</th>
                    <th class="py-3 small text-secondary">TANGGAL</th>
                    <th class="py-3 small text-secondary text-end pe-4">AKSI</th>
                </tr>
            </thead>

            <tbody>
                @forelse(($berita ?? []) as $item)
                <tr>
                    <td class="px-4 py-3" style="min-width:260px;">
                        <div class="d-flex align-items-center gap-3">
                            @if($item->gambar)
                            <img src="{{ asset('storage/'.$item->gambar) }}" alt="Gambar berita"
                                style="width:65px;height:52px;object-fit:cover;border-radius:8px;">
                            @else
                            <div class="rounded-3 d-flex align-items-center justify-content-center"
                                style="width:65px;height:52px;background:#e8f1eb;color:#176044;">
                                <i class="bi bi-image fs-4"></i>
                            </div>
                            @endif

                            <div>
                                <div class="fw-semibold">{{ $item->judul }}</div>
                                <div class="admin-muted small">
                                    {{ \Illuminate\Support\Str::limit($item->ringkasan ?? '', 65) }}
                                </div>
                            </div>
                        </div>
                    </td>

                    <td>
                        @if($item->status === 'published')
                        <span class="badge text-bg-success">Terbit</span>
                        @elseif($item->status === 'draft')
                        <span class="badge text-bg-warning">Draft</span>
                        @else
                        <span class="badge text-bg-secondary">{{ ucfirst($item->status) }}</span>
                        @endif
                    </td>

                    <td class="small text-secondary">
                        {{ $item->created_at?->format('d/m/Y') ?? '-' }}
                    </td>

                    <td class="text-end pe-4">
                        <div class="d-inline-flex gap-1">

                            <a href="{{ route('admin.berita-artikel.show', $item->id) }}"
                                class="btn btn-sm btn-light border" title="Lihat detail berita">
                                <i class="bi bi-eye"></i>
                            </a>


                            <a href="{{ url('/admin/berita-artikel/'.$item->id.'/edit') }}"
                                class="btn btn-sm btn-light border" title="Edit berita">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form method="POST" action="{{ url('/admin/berita-artikel/'.$item->id) }}"
                                onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-light border text-danger"
                                    title="Hapus berita">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-5">
                        <i class="bi bi-newspaper fs-1 text-secondary"></i>
                        <h6 class="fw-semibold mt-3">Belum Ada Berita</h6>
                        <p class="admin-muted small mb-3">
                            Berita yang ditambahkan akan tampil di daftar ini.
                        </p>
                        <a href="{{ url('/admin/berita-artikel/create') }}" class="btn btn-success btn-sm">
                            <i class="bi bi-plus-lg me-1"></i>Tambah Berita
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(isset($berita) && method_exists($berita, 'links'))
    <div class="p-3 border-top">
        {{ $berita->links() }}
    </div>
    @endif

</div>

@endsection
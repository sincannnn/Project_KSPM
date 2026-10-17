@extends('layouts.admin.app')

@section('title', 'Detail Berita')
@section('page-heading', 'Detail Berita')

@section('content')

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <div>
        <a href="{{ route('admin.berita-artikel.index') }}" class="text-decoration-none admin-muted small">
            <i class="bi bi-arrow-left me-1"></i>Kembali ke Daftar Berita
        </a>

        <h1 class="admin-page-title mt-3 mb-1">Detail Berita</h1>
        <p class="admin-muted mb-0">Informasi lengkap berita dan artikel.</p>
    </div>

    <a href="{{ route('admin.berita-artikel.edit', $berita->id) }}" class="btn btn-success px-4">
        <i class="bi bi-pencil-square me-2"></i>Edit Berita
    </a>
</div>

<div class="row g-4">

    <div class="col-12 col-lg-8">
        <div class="admin-card overflow-hidden">

            @if($berita->gambar)
            <img src="{{ asset('storage/'.$berita->gambar) }}" alt="{{ $berita->judul }}" class="w-100"
                style="max-height:400px;object-fit:cover;">
            @else
            <div class="d-flex align-items-center justify-content-center"
                style="height:260px;background:#e8f1eb;color:#176044;">
                <div class="text-center">
                    <i class="bi bi-image fs-1"></i>
                    <p class="mb-0 mt-2">Tidak ada gambar berita</p>
                </div>
            </div>
            @endif

            <div class="p-3 p-md-4">
                <div class="d-flex flex-wrap gap-2 mb-3">
                    @if($berita->status === 'published')
                    <span class="badge text-bg-success">Terbit</span>
                    @elseif($berita->status === 'draft')
                    <span class="badge text-bg-warning">Draft</span>
                    @else
                    <span class="badge text-bg-secondary">
                        {{ ucfirst($berita->status) }}
                    </span>
                    @endif

                    <span class="badge bg-light text-secondary border">
                        <i class="bi bi-calendar3 me-1"></i>
                        {{ $berita->created_at?->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <h2 class="fw-bold mb-3" style="color:#103d2e;">
                    {{ $berita->judul }}
                </h2>

                <div class="admin-muted small mb-4">
                    Slug: {{ $berita->slug }}
                </div>

                @if($berita->ringkasan)
                <div class="p-3 rounded-3 mb-4" style="background:#f2f7f3;border-left:4px solid #176044;">
                    <div class="fw-semibold mb-1">Ringkasan</div>
                    <p class="mb-0">{{ $berita->ringkasan }}</p>
                </div>
                @endif

                <div class="fw-semibold mb-2">Isi Artikel</div>

                <div style="white-space:pre-line;line-height:1.9;">
                    {{ $berita->isi }}
                </div>
            </div>

        </div>
    </div>

    <div class="col-12 col-lg-4">

        <div class="admin-card p-3 p-md-4 mb-4">
            <h5 class="fw-semibold mb-3">Informasi Publikasi</h5>

            <div class="mb-3">
                <div class="admin-muted small mb-1">Status</div>
                <div class="fw-medium">{{ ucfirst($berita->status) }}</div>
            </div>

            <div class="mb-3">
                <div class="admin-muted small mb-1">Tanggal Dibuat</div>
                <div class="fw-medium">
                    {{ $berita->created_at?->format('d M Y, H:i') ?? '-' }}
                </div>
            </div>

            <div class="mb-3">
                <div class="admin-muted small mb-1">Terakhir Diperbarui</div>
                <div class="fw-medium">
                    {{ $berita->updated_at?->format('d M Y, H:i') ?? '-' }}
                </div>
            </div>

            <div>
                <div class="admin-muted small mb-1">Tanggal Publikasi</div>
                <div class="fw-medium">
                    {{ $berita->published_at?->format('d M Y, H:i') ?? 'Belum ditentukan' }}
                </div>
            </div>
        </div>

        <a href="{{ route('admin.berita-artikel.index') }}" class="btn btn-light border w-100">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>

    </div>
</div>

@endsection
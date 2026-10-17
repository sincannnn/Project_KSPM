@extends('layouts.admin.app')

@section('title', 'Detail Materi')
@section('page-heading', 'Detail Materi')

@section('content')
<div class="d-flex justify-content-between align-items-center gap-3 mb-4">
    <div>
        <a href="{{ route('admin.materi.index') }}" class="text-decoration-none admin-muted small">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke Materi
        </a>

        <h1 class="admin-page-title mt-3">Detail Materi</h1>
        <p class="admin-muted mb-0">
            Informasi lengkap materi edukasi.
        </p>
    </div>

    <a href="{{ route('admin.materi.edit', $item->id) }}" class="btn btn-success">
        <i class="bi bi-pencil me-2"></i>Edit Materi
    </a>
</div>

<div class="row g-4">
    {{-- Konten Artikel --}}
    <div class="col-lg-8">
        <div class="admin-card p-4">

            {{-- Gambar Sampul --}}
            @if($item->gambar)
            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                class="img-fluid rounded mb-4 w-100" style="max-height: 350px; object-fit: cover;">
            @else
            <div class="rounded mb-4 d-flex flex-column align-items-center justify-content-center"
                style="height: 200px; background: #f0f7f3; color: #198754;">
                <i class="bi bi-journal-richtext" style="font-size: 3rem;"></i>
                <span class="mt-2">Tidak ada gambar sampul</span>
            </div>
            @endif

            {{-- Kategori dan Status --}}
            <div class="d-flex flex-wrap gap-2 mb-3">
                <span class="badge text-bg-success">
                    {{ $item->kategori ?: 'Tanpa Kategori' }}
                </span>

                @if($item->status === 'published')
                <span class="badge text-bg-primary">
                    <i class="bi bi-check-circle me-1"></i>
                    Dipublikasikan
                </span>
                @else
                <span class="badge text-bg-secondary">
                    <i class="bi bi-pencil-square me-1"></i>
                    Draft
                </span>
                @endif
            </div>

            {{-- Judul --}}
            <h2 class="fw-bold mb-2" style="color: #103d2e;">
                {{ $item->judul }}
            </h2>

            <p class="admin-muted small mb-4">
                <i class="bi bi-link-45deg me-1"></i>
                Slug: {{ $item->slug }}
            </p>

            <hr>

            {{-- Deskripsi --}}
            <h5 class="fw-semibold mb-3">
                <i class="bi bi-card-text me-2 text-success"></i>
                Deskripsi Materi
            </h5>

            <div class="mb-4" style="white-space: pre-line; line-height: 1.8; color: #495057;">
                {{ $item->deskripsi ?: 'Belum ada deskripsi.' }}</div>

            <hr>

            {{-- Isi Artikel --}}
            <h5 class="fw-semibold mb-3">
                <i class="bi bi-journal-text me-2 text-success"></i>
                Isi Artikel
            </h5>

            @if($item->isi)
            <article class="materi-article"
                style="white-space: pre-wrap; overflow-wrap: anywhere; line-height: 1.9; color: #343a40;">
                {{ $item->isi }}</article>
            @else
            <div class="alert alert-warning mb-0">
                <i class="bi bi-exclamation-triangle me-2"></i>
                Isi artikel belum ditambahkan.
                Silakan klik <strong>Edit Materi</strong> untuk mengisinya.
            </div>
            @endif

        </div>
    </div>

    {{-- Informasi Materi --}}
    <div class="col-lg-4">
        <div class="admin-card p-4">
            <h5 class="fw-semibold mb-4">
                <i class="bi bi-info-circle me-2 text-success"></i>
                Informasi Materi
            </h5>

            <p class="admin-muted small mb-1">Status Publikasi</p>
            <p class="mb-3">
                @if($item->status === 'published')
                <span class="text-success fw-semibold">
                    <i class="bi bi-check-circle me-1"></i>
                    Dipublikasikan
                </span>
                @else
                <span class="text-secondary fw-semibold">
                    <i class="bi bi-file-earmark me-1"></i>
                    Draft
                </span>
                @endif
            </p>

            <p class="admin-muted small mb-1">Kategori</p>
            <p class="mb-3">
                {{ $item->kategori ?: 'Tidak ada kategori' }}
            </p>

            <p class="admin-muted small mb-1">Jumlah Karakter Artikel</p>
            <p class="mb-3">
                {{ $item->isi ? mb_strlen($item->isi) : 0 }} karakter
            </p>

            <p class="admin-muted small mb-1">Dibuat</p>
            <p class="mb-3">
                {{ $item->created_at?->format('d M Y, H:i') ?? '-' }}
            </p>

            <p class="admin-muted small mb-1">Terakhir Diperbarui</p>
            <p class="mb-0">
                {{ $item->updated_at?->format('d M Y, H:i') ?? '-' }}
            </p>

            <hr>

            <a href="{{ route('admin.materi.edit', $item->id) }}" class="btn btn-outline-success w-100 mb-2">
                <i class="bi bi-pencil-square me-2"></i>
                Edit Materi
            </a>

            <a href="{{ route('admin.materi.index') }}" class="btn btn-light border w-100">
                <i class="bi bi-arrow-left me-2"></i>
                Kembali ke Daftar
            </a>
        </div>
    </div>
</div>
@endsection
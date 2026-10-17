@extends('layouts.admin.app')

@section('title', 'Detail Materi')
@section('page-heading', 'Detail Materi')

@section('content')
<div class="d-flex justify-content-between align-items-center gap-3 mb-4">
    <div>
        <a href="{{ route('admin.materi.index') }}" class="text-decoration-none admin-muted small">
            <i class="bi bi-arrow-left me-1"></i>Kembali ke Materi
        </a>
        <h1 class="admin-page-title mt-3">Detail Materi</h1>
    </div>

    <a href="{{ route('admin.materi.edit', $item->id) }}" class="btn btn-success">
        <i class="bi bi-pencil me-2"></i>Edit
    </a>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="admin-card p-4">
            @if($item->gambar)
            <img src="{{ asset('storage/'.$item->gambar) }}" alt="{{ $item->judul }}"
                class="img-fluid rounded mb-4 w-100" style="max-height:350px;object-fit:cover">
            @endif

            <span class="badge text-bg-success mb-3">{{ $item->kategori }}</span>
            <h2 class="fw-bold" style="color:#103d2e">{{ $item->judul }}</h2>
            <p class="admin-muted small">Slug: {{ $item->slug }}</p>

            <hr>

            <h5 class="fw-semibold">Deskripsi Materi</h5>
            <div style="white-space:pre-line;line-height:1.8">
                {{ $item->deskripsi ?: 'Belum ada deskripsi.' }}
            </div>

            @if($item->file_materi)
            <a href="{{ asset('storage/'.$item->file_materi) }}" target="_blank" class="btn btn-outline-success mt-4">
                <i class="bi bi-file-earmark-pdf me-2"></i>Lihat PDF
            </a>
            @endif
        </div>
    </div>

    <div class="col-lg-4">
        <div class="admin-card p-4">
            <h5 class="fw-semibold mb-3">Informasi Materi</h5>
            <p class="admin-muted small mb-1">Status</p>
            <p>{{ $item->status === 'published' ? 'Dipublikasikan' : 'Draft' }}</p>

            <p class="admin-muted small mb-1">Dibuat</p>
            <p>{{ $item->created_at?->format('d M Y, H:i') }}</p>

            <p class="admin-muted small mb-1">Diperbarui</p>
            <p class="mb-0">{{ $item->updated_at?->format('d M Y, H:i') }}</p>
        </div>
    </div>
</div>
@endsection
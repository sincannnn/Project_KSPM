@extends('layouts.admin.app')

@section('title', 'Detail Galeri')

@section('content')
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h4 class="fw-bold mb-1">Detail Galeri</h4>
            <p class="text-muted mb-0">
                Informasi lengkap dokumentasi KSPM STMIK Adhi Guna.
            </p>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Kembali
            </a>

            <a href="{{ route('admin.galeri.edit', $item->id) }}" class="btn btn-success">
                <i class="bi bi-pencil-square me-2"></i>Edit Galeri
            </a>
        </div>
    </div>

    <div class="row g-4">

        {{-- FOTO DAN DESKRIPSI --}}
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                {{-- FOTO --}}
                <div class="bg-light text-center">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="img-fluid w-100"
                        style="max-height:500px;object-fit:contain;">
                </div>

                <div class="card-body p-4">

                    {{-- BADGE STATUS --}}
                    <div class="d-flex flex-wrap gap-2 mb-3">
                        @if($item->status === 'published')
                        <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">
                            <i class="bi bi-check-circle me-1"></i>
                            Published
                        </span>
                        @else
                        <span class="badge bg-secondary-subtle text-secondary px-3 py-2 rounded-pill">
                            <i class="bi bi-file-earmark me-1"></i>
                            Draft
                        </span>
                        @endif

                        @if($item->kegiatan)
                        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
                            <i class="bi bi-calendar-event me-1"></i>
                            Dokumentasi Kegiatan
                        </span>
                        @endif
                    </div>

                    {{-- JUDUL --}}
                    <h3 class="fw-bold mb-2">
                        {{ $item->judul }}
                    </h3>

                    <div class="text-muted small mb-4">
                        <i class="bi bi-link-45deg me-1"></i>
                        {{ $item->slug }}
                    </div>

                    <hr>

                    {{-- DESKRIPSI --}}
                    <h5 class="fw-bold mb-3">Deskripsi Dokumentasi</h5>

                    <div class="text-secondary" style="line-height:1.8;">
                        @if($item->deskripsi)
                        {!! nl2br(e($item->deskripsi)) !!}
                        @else
                        <span class="text-muted">
                            Belum ada deskripsi untuk dokumentasi ini.
                        </span>
                        @endif
                    </div>

                </div>
            </div>
        </div>

        {{-- INFORMASI DOKUMENTASI --}}
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">

                    <h5 class="fw-bold mb-4">
                        <i class="bi bi-info-circle me-2 text-success"></i>
                        Informasi Galeri
                    </h5>

                    {{-- TANGGAL --}}
                    <div class="d-flex gap-3 mb-4">
                        <div class="text-success fs-4">
                            <i class="bi bi-calendar3"></i>
                        </div>

                        <div>
                            <small class="text-muted d-block mb-1">
                                Tanggal Dokumentasi
                            </small>

                            <div class="fw-semibold">
                                {{ $item->tanggal_dokumentasi
                                    ? $item->tanggal_dokumentasi->format('d F Y')
                                    : 'Belum ditentukan' }}
                            </div>
                        </div>
                    </div>

                    {{-- KEGIATAN --}}
                    <div class="d-flex gap-3 mb-4">
                        <div class="text-success fs-4">
                            <i class="bi bi-people"></i>
                        </div>

                        <div>
                            <small class="text-muted d-block mb-1">
                                Kegiatan Terkait
                            </small>

                            <div class="fw-semibold">
                                @if($item->kegiatan)
                                {{ $item->kegiatan->nama_kegiatan }}
                                @else
                                Tidak dihubungkan dengan kegiatan
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- STATUS --}}
                    <div class="d-flex gap-3 mb-4">
                        <div class="text-success fs-4">
                            <i class="bi bi-globe"></i>
                        </div>

                        <div>
                            <small class="text-muted d-block mb-1">
                                Status Publikasi
                            </small>

                            <div class="fw-semibold">
                                {{ $item->status === 'published'
                                    ? 'Dipublikasikan'
                                    : 'Draft' }}
                            </div>
                        </div>
                    </div>

                    <hr>

                    {{-- DIBUAT --}}
                    <div class="mb-3">
                        <small class="text-muted d-block mb-1">
                            Dibuat pada
                        </small>

                        <span>
                            {{ $item->created_at
                                ? $item->created_at->format('d F Y, H:i')
                                : '-' }}
                        </span>
                    </div>

                    {{-- DIPERBARUI --}}
                    <div>
                        <small class="text-muted d-block mb-1">
                            Terakhir diperbarui
                        </small>

                        <span>
                            {{ $item->updated_at
                                ? $item->updated_at->format('d F Y, H:i')
                                : '-' }}
                        </span>
                    </div>

                </div>
            </div>

            {{-- AKSI --}}
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3">Aksi Dokumentasi</h6>

                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.galeri.edit', $item->id) }}" class="btn btn-outline-success">
                            <i class="bi bi-pencil-square me-2"></i>
                            Edit Dokumentasi
                        </a>

                        <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus dokumentasi ini? Tindakan ini tidak dapat dibatalkan.')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-outline-danger w-100">
                                <i class="bi bi-trash me-2"></i>
                                Hapus Dokumentasi
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
@extends('layouts.public.app')

@section('title', $item->judul . ' | Galeri KSPM STMIK Adhi Guna')

@section('content')

<!-- HEADER -->
<section class="py-5 text-white" style="background: linear-gradient(135deg, #0f3d2e, #176044);">
    <div class="container">
        <a href="{{ route('galeri.index') }}" class="text-white text-decoration-none small d-inline-block mb-4">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke Galeri
        </a>

        <div>
            <span class="badge bg-warning text-dark mb-3 px-3 py-2">
                <i class="bi bi-images me-1"></i>
                Dokumentasi Kegiatan
            </span>

            <h1 class="fw-bold display-5 mb-3">
                {{ $item->judul }}
            </h1>

            <div class="d-flex flex-wrap gap-3 opacity-75">
                <span>
                    <i class="bi bi-calendar3 me-1"></i>
                    {{ $item->tanggal_dokumentasi
                        ? \Carbon\Carbon::parse($item->tanggal_dokumentasi)->translatedFormat('d F Y')
                        : $item->created_at->translatedFormat('d F Y') }}
                </span>

                @if ($item->kegiatan)
                <span>
                    <i class="bi bi-calendar-event me-1"></i>
                    {{ $item->kegiatan->nama_kegiatan }}
                </span>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- DETAIL DOKUMENTASI -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    @if ($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-100"
                        style="max-height: 600px; object-fit: contain; background: #e9ecef;">
                    @endif

                    <div class="card-body p-4 p-lg-5">
                        <h2 class="fw-bold mb-3">
                            {{ $item->judul }}
                        </h2>

                        @if ($item->deskripsi)
                        <div class="text-muted" style="white-space: pre-line; line-height: 1.8;">
                            {{ $item->deskripsi }}
                        </div>
                        @else
                        <p class="text-muted">
                            Dokumentasi kegiatan KSPM STMIK Adhi Guna.
                        </p>
                        @endif

                        <hr class="my-4">

                        <h5 class="fw-bold mb-3">
                            <i class="bi bi-info-circle text-success me-2"></i>
                            Informasi Dokumentasi
                        </h5>

                        <div class="row g-4">
                            <div class="col-md-4">
                                <small class="text-muted d-block mb-1">
                                    Judul Dokumentasi
                                </small>
                                <strong>{{ $item->judul }}</strong>
                            </div>

                            <div class="col-md-4">
                                <small class="text-muted d-block mb-1">
                                    Tanggal Dokumentasi
                                </small>
                                <strong>
                                    {{ $item->tanggal_dokumentasi
                                        ? \Carbon\Carbon::parse($item->tanggal_dokumentasi)->translatedFormat('d F Y')
                                        : '-' }}
                                </strong>
                            </div>

                            <div class="col-md-4">
                                <small class="text-muted d-block mb-1">
                                    Kegiatan Terkait
                                </small>
                                <strong>
                                    {{ $item->kegiatan->nama_kegiatan ?? 'Tidak dikaitkan' }}
                                </strong>
                            </div>
                        </div>

                        <div class="mt-5">
                            <a href="{{ route('galeri.index') }}" class="btn btn-outline-success px-4 rounded-3">
                                <i class="bi bi-arrow-left me-1"></i>
                                Kembali ke Galeri
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
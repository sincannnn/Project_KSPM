@extends('layouts.public.app')

@section('title', $item->judul . ' | Materi Investasi KSPM')

@section('content')

{{-- HEADER ARTIKEL --}}
<section class="bg-success text-white">
    <div class="container py-5">
        <a href="{{ route('materi.index') }}" class="text-white text-decoration-none small">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke Materi Investasi
        </a>

        <div class="mt-4">
            <span class="badge bg-warning text-dark mb-3">
                {{ $item->kategori ?: 'Materi Investasi' }}
            </span>

            <h1 class="display-5 fw-bold mb-3">
                {{ $item->judul }}
            </h1>

            @if($item->deskripsi)
            <p class="lead text-white-50 mb-3">
                {{ $item->deskripsi }}
            </p>
            @endif

            <div class="small text-white-50">
                <i class="bi bi-calendar3 me-1"></i>
                {{ $item->created_at?->format('d F Y') }}

                <span class="mx-2">•</span>

                <i class="bi bi-journal-text me-1"></i>
                Artikel edukasi
            </div>
        </div>
    </div>
</section>

{{-- ISI ARTIKEL --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">

                <article class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">

                        {{-- GAMBAR SAMPUL --}}
                        @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                            class="img-fluid rounded w-100 mb-5" style="max-height: 430px; object-fit: cover;">
                        @endif

                        {{-- DESKRIPSI --}}
                        @if($item->deskripsi)
                        <div class="mb-4">
                            <h5 class="fw-bold text-success mb-3">
                                Tentang Materi
                            </h5>

                            <p class="text-secondary" style="line-height: 1.9; white-space: pre-line;">
                                {{ $item->deskripsi }}</p>
                        </div>

                        <hr class="my-4">
                        @endif

                        {{-- KONTEN ARTIKEL --}}
                        <div class="materi-content">
                            @if($item->isi)
                            <div
                                style="white-space: pre-wrap; overflow-wrap: anywhere; line-height: 2; color: #343a40;">
                                {{ $item->isi }}</div>
                            @else
                            <div class="alert alert-info">
                                Isi artikel ini belum tersedia.
                            </div>
                            @endif
                        </div>

                        {{-- KEMBALI --}}
                        <hr class="my-5">

                        <a href="{{ route('materi.index') }}" class="btn btn-outline-success">
                            <i class="bi bi-arrow-left me-2"></i>
                            Kembali ke Daftar Materi
                        </a>

                    </div>
                </article>

            </div>
        </div>
    </div>
</section>

@endsection
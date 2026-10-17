@extends('layouts.public.app')

@section('title', 'Berita & Artikel | KSPM STMIK Adhi Guna')

@section('content')

{{-- HERO --}}
<section class="text-white" style="background: linear-gradient(135deg, #0f3d2e, #176044);">
    <div class="container py-5">
        <span class="badge bg-warning text-dark mb-3 px-3 py-2">
            <i class="bi bi-newspaper me-1"></i>
            Informasi KSPM
        </span>

        <h1 class="display-5 fw-bold mb-3">Berita & Artikel</h1>

        <p class="lead mb-0 opacity-75">
            Temukan informasi terbaru, artikel edukasi, dan perkembangan
            seputar pasar modal dan investasi.
        </p>
    </div>
</section>

{{-- DAFTAR BERITA --}}
<section class="py-5 bg-light">
    <div class="container">

        {{-- PENCARIAN --}}
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body p-4">
                <form action="{{ route('berita.index') }}" method="GET">
                    <div class="input-group">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>

                        <input type="text" name="search" class="form-control" value="{{ request('search') }}"
                            placeholder="Cari berita atau artikel..." aria-label="Cari berita atau artikel">

                        <button type="submit" class="btn btn-success">
                            Cari
                        </button>

                        @if(request()->filled('search'))
                        <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary">
                            Reset
                        </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        {{-- JUDUL DAN JUMLAH --}}
        <div class="d-flex flex-wrap justify-content-between
                    align-items-center gap-3 mb-4">
            <div>
                <h2 class="fw-bold mb-1">Berita Terbaru</h2>
                <p class="text-muted mb-0">
                    Informasi dan edukasi pasar modal untuk anggota KSPM.
                </p>
            </div>

            <span class="badge bg-success-subtle text-success px-3 py-2">
                {{ $berita->total() }} Publikasi
            </span>
        </div>

        {{-- KARTU BERITA --}}
        <div class="row g-4">
            @forelse($berita as $item)
            <div class="col-md-6 col-lg-4">
                <article class="card border-0 shadow-sm rounded-4
                                   overflow-hidden h-100">

                    {{-- GAMBAR --}}
                    @if($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-100"
                        loading="lazy" style="height:220px; object-fit:cover;">
                    @else
                    <div class="bg-success bg-opacity-10
                                        d-flex align-items-center justify-content-center" style="height:220px;">
                        <i class="bi bi-newspaper text-success" style="font-size:5rem;"></i>
                    </div>
                    @endif

                    <div class="card-body p-4 d-flex flex-column">

                        <div class="mb-3">
                            <span class="badge bg-success">
                                {{ $item->status === 'published' ? 'Terbit' : $item->status }}
                            </span>

                            <small class="text-secondary ms-2">
                                @if($item->published_at)
                                {{ $item->published_at->locale('id')->translatedFormat('d F Y') }}
                                @endif
                            </small>
                        </div>

                        <h5 class="fw-bold mb-3">
                            {{ $item->judul }}
                        </h5>

                        <p class="text-secondary">
                            {{ \Illuminate\Support\Str::limit(
                                    $item->ringkasan ?: strip_tags($item->isi),
                                    140
                                ) }}
                        </p>

                        <div class="mt-auto pt-2">
                            <a href="{{ route('berita.show', ['slug' => $item->slug]) }}"
                                class="btn btn-outline-success btn-sm">
                                Baca Selengkapnya
                                <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>

                    </div>
                </article>
            </div>
            @empty
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-newspaper text-success" style="font-size:4rem;"></i>

                        <h5 class="fw-bold mt-3">
                            @if(request()->filled('search'))
                            Berita Tidak Ditemukan
                            @else
                            Belum Ada Berita
                            @endif
                        </h5>

                        <p class="text-muted mb-0">
                            @if(request()->filled('search'))
                            Coba gunakan kata kunci pencarian yang berbeda.
                            @else
                            Berita yang sudah dipublikasikan akan tampil di sini.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        @if($berita->hasPages())
        <div class="mt-5 d-flex justify-content-center">
            {{ $berita->links('pagination::bootstrap-5') }}
        </div>
        @endif

    </div>
</section>

@endsection
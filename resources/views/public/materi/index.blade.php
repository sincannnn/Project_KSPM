@extends('layouts.public.app')
@section('title', 'Materi Investasi | KSPM STMIK Adhi Guna')

@section('content')

{{-- HEADER --}}
<section class="bg-success text-white">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                    <i class="bi bi-book me-1"></i>
                    Pusat Edukasi
                </span>

                <h1 class="display-5 fw-bold mb-3">
                    Materi Investasi
                </h1>

                <p class="lead text-white-50 mb-0">
                    Pelajari investasi, saham, pasar modal, dan literasi
                    keuangan melalui artikel edukasi yang dapat dibaca
                    langsung di website.
                </p>
            </div>

            <div class="col-lg-4 text-center d-none d-lg-block">
                <i class="bi bi-journal-bookmark-fill text-warning" style="font-size: 130px;"></i>
            </div>
        </div>
    </div>
</section>

{{-- DAFTAR MATERI --}}
<section class="py-5 bg-light">
    <div class="container">

        {{-- PENCARIAN DAN FILTER --}}
        <form action="{{ route('materi.index') }}" method="GET" class="row g-3 mb-5">

            <div class="col-lg-8">
                <div class="input-group">
                    <span class="input-group-text bg-white">
                        <i class="bi bi-search"></i>
                    </span>

                    <input type="text" name="search" class="form-control" placeholder="Cari judul atau isi materi..."
                        value="{{ request('search') }}">

                    <button type="submit" class="btn btn-success">
                        Cari
                    </button>
                </div>
            </div>

            <div class="col-lg-4">
                <select name="kategori" class="form-select" onchange="this.form.submit()">

                    <option value="">Semua Kategori</option>

                    @foreach($kategoriMateri as $kategori)
                    <option value="{{ $kategori }}" @selected(request('kategori')===$kategori)>
                        {{ $kategori }}
                    </option>
                    @endforeach
                </select>
            </div>
        </form>

        {{-- JUDUL --}}
        <div class="mb-4">
            <span class="text-success fw-semibold">
                MATERI PEMBELAJARAN
            </span>

            <h2 class="fw-bold mt-2">
                Belajar Investasi
            </h2>

            <p class="text-secondary mb-0">
                @if(request('search') || request('kategori'))
                Hasil materi berdasarkan pencarian dan filter yang dipilih.
                @else
                Pilih materi yang ingin kamu pelajari.
                @endif
            </p>
        </div>

        {{-- KARTU MATERI --}}
        <div class="row g-4">

            @forelse($materi as $item)
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100">

                    {{-- GAMBAR SAMPUL --}}
                    @if($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="card-img-top"
                        style="height: 220px; object-fit: cover;" loading="lazy">
                    @else
                    <div class="bg-success bg-opacity-10
                                        text-center d-flex
                                        align-items-center
                                        justify-content-center" style="height: 220px;">

                        <i class="bi bi-journal-richtext text-success" style="font-size: 75px;"></i>
                    </div>
                    @endif

                    <div class="card-body p-4 d-flex flex-column">

                        <div class="mb-3">
                            <span class="badge bg-success">
                                {{ $item->kategori ?: 'Materi Investasi' }}
                            </span>
                        </div>

                        <h5 class="fw-bold">
                            {{ $item->judul }}
                        </h5>

                        <p class="text-secondary">
                            {{ $item->deskripsi
                                    ?: \Illuminate\Support\Str::limit(
                                        strip_tags($item->isi ?? ''),
                                        140
                                    )
                                }}
                        </p>

                        <div class="text-secondary small mb-3">
                            <i class="bi bi-journal-text me-2"></i>
                            Artikel edukasi

                            <span class="mx-2">•</span>

                            <i class="bi bi-calendar3 me-1"></i>
                            {{ $item->created_at?->format('d M Y') }}
                        </div>

                        <a href="{{ route('materi.show', $item->slug) }}" class="btn btn-outline-success w-100 mt-auto">
                            Pelajari Materi
                            <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            @empty
            <div class="col-12">
                <div class="bg-white rounded shadow-sm text-center p-5">
                    <i class="bi bi-journal-x text-secondary" style="font-size: 55px;"></i>

                    <h4 class="fw-bold mt-3">
                        Materi Belum Ditemukan
                    </h4>

                    <p class="text-secondary mb-4">
                        Belum ada materi yang sesuai dengan pencarian
                        atau kategori yang dipilih.
                    </p>

                    <a href="{{ route('materi.index') }}" class="btn btn-success">
                        <i class="bi bi-arrow-counterclockwise me-1"></i>
                        Tampilkan Semua Materi
                    </a>
                </div>
            </div>
            @endforelse

        </div>

        {{-- PAGINATION --}}
        @if($materi->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $materi->links() }}
        </div>
        @endif

    </div>
</section>

@endsection
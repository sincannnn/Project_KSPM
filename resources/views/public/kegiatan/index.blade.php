@extends('layouts.public.app')

@section('title', 'Kegiatan | KSPM STMIK Adhi Guna')

@section('content')

{{-- ======================================================
     HEADER / HERO
====================================================== --}}
<section class="py-5 text-white" style="background: linear-gradient(135deg, #0f3d2e, #176044);">

    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-8">
                <span class="badge bg-warning text-dark mb-3 px-3 py-2">
                    <i class="bi bi-calendar-event me-1"></i>
                    Kegiatan KSPM
                </span>

                <h1 class="fw-bold display-5 mb-3">
                    Kegiatan
                </h1>

                <p class="lead mb-0 opacity-75">
                    Temukan berbagai kegiatan edukasi, seminar,
                    pelatihan, dan aktivitas investasi yang diselenggarakan
                    oleh KSPM STMIK Adhi Guna.
                </p>
            </div>

            <div class="col-lg-4 text-center d-none d-lg-block">
                <i class="bi bi-calendar2-week" style="font-size: 8rem; opacity: .15;"></i>
            </div>

        </div>
    </div>
</section>


{{-- ======================================================
     CONTENT
====================================================== --}}
<section class="py-5 bg-light">
    <div class="container">

        {{-- SEARCH & FILTER --}}
        <div class="card border-0 shadow-sm rounded-4 mb-5">
            <div class="card-body p-4">

                <form action="{{ route('kegiatan.index') }}" method="GET">
                    <div class="row g-3">

                        <div class="col-lg-7">
                            <label for="search" class="form-label fw-semibold">
                                Cari Kegiatan
                            </label>

                            <div class="input-group">
                                <span class="input-group-text bg-white">
                                    <i class="bi bi-search"></i>
                                </span>

                                <input type="text" name="search" id="search" class="form-control"
                                    placeholder="Cari nama, deskripsi, atau lokasi kegiatan..."
                                    value="{{ request('search') }}">
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <label for="kategori" class="form-label fw-semibold">
                                Kategori Kegiatan
                            </label>

                            <select name="kategori" id="kategori" class="form-select">
                                <option value="">Semua Kegiatan</option>

                                @foreach($kategoriKegiatan as $kategori)
                                <option value="{{ $kategori }}" @selected(request('kategori')===$kategori)>
                                    {{ $kategori }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-search me-1"></i>
                                Cari Kegiatan
                            </button>

                            @if(request()->filled('search') || request()->filled('kategori'))
                            <a href="{{ route('kegiatan.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-counterclockwise me-1"></i>
                                Reset Filter
                            </a>
                            @endif
                        </div>

                    </div>
                </form>

            </div>
        </div>


        {{-- TITLE --}}
        <div class="d-flex flex-wrap justify-content-between
                    align-items-center gap-3 mb-4">

            <div>
                <h2 class="fw-bold mb-1">
                    Kegiatan Terbaru
                </h2>

                <p class="text-muted mb-0">
                    Ikuti kegiatan dan tingkatkan pengetahuanmu.
                </p>
            </div>

            <span class="badge bg-success-subtle text-success px-3 py-2">
                {{ $kegiatan->total() }} Kegiatan
            </span>

        </div>


        {{-- DAFTAR KEGIATAN --}}
        <div class="row g-4">

            @forelse($kegiatan as $item)

            <div class="col-md-6 col-lg-4">

                <div class="card h-100 border-0 shadow-sm
                                rounded-4 overflow-hidden">

                    {{-- GAMBAR --}}
                    <div class="position-relative">

                        @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_kegiatan }}"
                            class="w-100" loading="lazy" style="height:220px; object-fit:cover;">
                        @else
                        <div class="bg-success d-flex align-items-center
                                           justify-content-center" style="height:220px;">
                            <i class="bi bi-calendar-event text-white" style="font-size:5rem; opacity:.8;"></i>
                        </div>
                        @endif

                        <span class="badge bg-warning text-dark
                                         position-absolute top-0 end-0 m-3">
                            {{ $item->kategori ?: 'Lainnya' }}
                        </span>

                    </div>


                    {{-- INFORMASI KEGIATAN --}}
                    <div class="card-body p-4 d-flex flex-column">

                        <small class="text-success fw-semibold mb-2">
                            <i class="bi bi-calendar3 me-1"></i>

                            @if($item->tanggal_mulai)
                            {{ $item->tanggal_mulai->locale('id')->translatedFormat('d F Y') }}
                            @else
                            Tanggal belum ditentukan
                            @endif
                        </small>

                        <h5 class="fw-bold mt-1 mb-2">
                            {{ $item->nama_kegiatan }}
                        </h5>

                        <p class="text-muted small mb-3">
                            {{ \Illuminate\Support\Str::limit(
                                    strip_tags($item->deskripsi ?? 'Belum ada deskripsi kegiatan.'),
                                    120
                                ) }}
                        </p>

                        <div class="d-flex align-items-start
                                        text-muted small mb-3">

                            <i class="bi bi-geo-alt me-2 mt-1"></i>

                            <span>
                                {{ $item->lokasi ?: 'Lokasi belum ditentukan' }}
                            </span>
                        </div>

                        <a href="{{ route('kegiatan.show', ['slug' => $item->slug]) }}"
                            class="btn btn-outline-success w-100 rounded-3">
                            Lihat Detail
                            <i class="bi bi-arrow-right ms-1"></i>
                        </a>

                    </div>
                </div>

            </div>

            @empty

            {{-- EMPTY STATE --}}
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body text-center py-5 px-3">

                        <i class="bi bi-calendar-x text-success" style="font-size:4rem;"></i>

                        <h5 class="fw-bold mt-3">
                            @if(request()->filled('search') || request()->filled('kategori'))
                            Kegiatan Tidak Ditemukan
                            @else
                            Belum Ada Kegiatan
                            @endif
                        </h5>

                        <p class="text-muted mb-3">
                            @if(request()->filled('search') || request()->filled('kategori'))
                            Coba gunakan kata kunci atau kategori yang berbeda.
                            @else
                            Belum ada kegiatan yang dipublikasikan.
                            Silakan kunjungi halaman ini kembali nanti.
                            @endif
                        </p>

                        @if(request()->filled('search') || request()->filled('kategori'))
                        <a href="{{ route('kegiatan.index') }}" class="btn btn-success">
                            Lihat Semua Kegiatan
                        </a>
                        @endif

                    </div>
                </div>
            </div>

            @endforelse

        </div>


        {{-- PAGINATION --}}
        @if($kegiatan->hasPages())
        <div class="mt-5 d-flex justify-content-center">
            {{ $kegiatan->links('pagination::bootstrap-5') }}
        </div>
        @endif

    </div>
</section>

@endsection
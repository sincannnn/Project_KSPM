@extends('layouts.public.app')

@section('title', 'Galeri Kegiatan | KSPM STMIK Adhi Guna')

@section('content')

<!-- HEADER -->
<section class="py-5 text-white" style="background: linear-gradient(135deg, #0f3d2e, #176044);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="badge bg-warning text-dark mb-3 px-3 py-2">
                    <i class="bi bi-images me-1"></i>
                    Dokumentasi KSPM
                </span>

                <h1 class="fw-bold display-5 mb-3">Galeri Kegiatan</h1>

                <p class="lead mb-0 opacity-75">
                    Lihat dokumentasi seminar, pelatihan, dan berbagai
                    aktivitas KSPM STMIK Adhi Guna.
                </p>
            </div>

            <div class="col-lg-4 text-center d-none d-lg-block">
                <i class="bi bi-images" style="font-size: 8rem; opacity: .15;"></i>
            </div>
        </div>
    </div>
</section>

<!-- DAFTAR GALERI -->
<section class="py-5 bg-light">
    <div class="container">

        <!-- PENCARIAN -->
        <div class="card border-0 shadow-sm rounded-4 mb-5">
            <div class="card-body p-4">
                <form action="{{ route('galeri.index') }}" method="GET">
                    <div class="row g-3">
                        <div class="col-lg-9">
                            <div class="input-group">
                                <span class="input-group-text bg-white">
                                    <i class="bi bi-search"></i>
                                </span>

                                <input type="text" name="search" class="form-control"
                                    placeholder="Cari judul atau deskripsi dokumentasi..."
                                    value="{{ request('search') }}">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <button type="submit" class="btn btn-success w-100">
                                <i class="bi bi-search me-1"></i>
                                Cari Galeri
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- JUDUL -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
            <div>
                <h2 class="fw-bold mb-1">Dokumentasi Kegiatan</h2>
                <p class="text-muted mb-0">
                    Momen dan kegiatan KSPM STMIK Adhi Guna.
                </p>
            </div>

            <span class="badge bg-success-subtle text-success px-3 py-2">
                {{ $galeri->total() }} Dokumentasi
            </span>
        </div>

        <!-- KARTU GALERI -->
        <div class="row g-4">
            @forelse ($galeri as $item)
            <div class="col-6 col-md-4">
                <a href="{{ route('galeri.show', ['slug' => $item->slug]) }}" class="text-decoration-none text-dark">

                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                        @if ($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="card-img-top"
                            loading="lazy" style="height: 250px; object-fit: cover;">
                        @else
                        <div class="bg-success d-flex align-items-center justify-content-center" style="height: 250px;">
                            <i class="bi bi-image text-white" style="font-size: 5rem;"></i>
                        </div>
                        @endif

                        <div class="card-body p-3">
                            <span class="badge bg-success-subtle text-success mb-2">
                                {{ $item->kegiatan->nama_kegiatan ?? 'Dokumentasi KSPM' }}
                            </span>

                            <h5 class="fw-bold mb-2">
                                {{ $item->judul }}
                            </h5>

                            <p class="text-muted small mb-2">
                                {{ \Illuminate\Support\Str::limit($item->deskripsi ?? 'Dokumentasi kegiatan KSPM.', 100) }}
                            </p>

                            <small class="text-muted">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ $item->tanggal_dokumentasi
                                        ? \Carbon\Carbon::parse($item->tanggal_dokumentasi)->translatedFormat('d F Y')
                                        : $item->created_at->translatedFormat('d F Y') }}
                            </small>

                            <div class="mt-3 text-success fw-semibold small">
                                Lihat Dokumentasi
                                <i class="bi bi-arrow-right ms-1"></i>
                            </div>
                        </div>
                    </div>

                </a>
            </div>
            @empty
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-images text-success" style="font-size: 4rem;"></i>

                        <h4 class="fw-bold mt-3">Belum Ada Dokumentasi</h4>

                        <p class="text-muted mb-0">
                            @if (request('search'))
                            Dokumentasi dengan kata kunci tersebut tidak ditemukan.
                            @else
                            Dokumentasi kegiatan yang telah diterbitkan akan tampil di sini.
                            @endif
                        </p>

                        @if (request('search'))
                        <a href="{{ route('galeri.index') }}" class="btn btn-outline-success mt-3">
                            Tampilkan Semua Galeri
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforelse
        </div>

        <!-- PAGINATION -->
        @if ($galeri->hasPages())
        <div class="mt-5 d-flex justify-content-center">
            {{ $galeri->links('pagination::bootstrap-5') }}
        </div>
        @endif

    </div>
</section>

@endsection
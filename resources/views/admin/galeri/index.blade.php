@extends('layouts.admin.app')

@section('title', 'Galeri')

@section('content')
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h4 class="fw-bold mb-1">Galeri Dokumentasi</h4>
            <p class="text-muted mb-0">
                Kelola dokumentasi foto kegiatan KSPM STMIK Adhi Guna.
            </p>
        </div>

        <a href="{{ route('admin.galeri.create') }}" class="btn btn-success px-4">
            <i class="bi bi-plus-lg me-2"></i>Tambah Galeri
        </a>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show rounded-3" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    {{-- STATISTIK --}}
    <div class="row g-3 mb-4">

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4 d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-success-subtle text-success
                                d-flex align-items-center justify-content-center" style="width:54px;height:54px;">
                        <i class="bi bi-images fs-3"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-1">Total Galeri</p>
                        <h3 class="fw-bold mb-0">
                            {{ number_format($totalGaleri, 0, ',', '.') }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4 d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-primary-subtle text-primary
                                d-flex align-items-center justify-content-center" style="width:54px;height:54px;">
                        <i class="bi bi-check-circle fs-3"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-1">Dipublikasikan</p>
                        <h3 class="fw-bold mb-0">
                            {{ number_format($galeriTerbit, 0, ',', '.') }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4 d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-warning-subtle text-warning
                                d-flex align-items-center justify-content-center" style="width:54px;height:54px;">
                        <i class="bi bi-file-earmark-text fs-3"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-1">Draft</p>
                        <h3 class="fw-bold mb-0">
                            {{ number_format($galeriDraft, 0, ',', '.') }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- PENCARIAN DAN FILTER --}}
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-3 p-md-4">

            <form action="{{ route('admin.galeri.index') }}" method="GET">
                <div class="row g-3">

                    <div class="col-lg-7">
                        <label for="search" class="form-label fw-semibold">
                            Cari Dokumentasi
                        </label>

                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <i class="bi bi-search text-muted"></i>
                            </span>

                            <input type="text" name="search" id="search" class="form-control"
                                placeholder="Cari judul atau deskripsi..." value="{{ request('search') }}">
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <label for="status" class="form-label fw-semibold">
                            Status Publikasi
                        </label>

                        <select name="status" id="status" class="form-select">
                            <option value="">Semua Status</option>
                            <option value="published" @selected(request('status')==='published' )>
                                Dipublikasikan
                            </option>
                            <option value="draft" @selected(request('status')==='draft' )>
                                Draft
                            </option>
                        </select>
                    </div>

                    <div class="col-lg-2 d-flex align-items-end gap-2">
                        <button type="submit" class="btn btn-success flex-grow-1">
                            Cari
                        </button>

                        <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary"
                            title="Reset filter">
                            <i class="bi bi-arrow-counterclockwise"></i>
                        </a>
                    </div>

                </div>
            </form>

        </div>
    </div>

    {{-- DAFTAR GALERI --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header bg-white border-0 p-3 p-md-4">
            <div class="d-flex flex-wrap justify-content-between
                        align-items-center gap-2">
                <div>
                    <h5 class="fw-bold mb-1">Daftar Dokumentasi</h5>
                    <p class="text-muted small mb-0">
                        Kelola foto dan informasi dokumentasi kegiatan.
                    </p>
                </div>

                <span class="badge bg-success-subtle text-success px-3 py-2">
                    {{ $galeri->total() }} data
                </span>
            </div>
        </div>

        <div class="card-body p-3 p-md-4">

            @if($galeri->count())
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width:60px;">No.</th>
                            <th style="min-width:280px;">Dokumentasi</th>
                            <th style="min-width:180px;">Kegiatan</th>
                            <th style="min-width:150px;">Tanggal</th>
                            <th style="min-width:130px;">Status</th>
                            <th class="text-center" style="min-width:150px;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($galeri as $item)
                        <tr>
                            <td>
                                {{ $galeri->firstItem() + $loop->index }}
                            </td>

                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                        class="rounded-3 border" style="width:90px;height:65px;object-fit:cover;"
                                        onerror="this.style.display='none'">

                                    <div>
                                        <div class="fw-semibold text-dark">
                                            {{ $item->judul }}
                                        </div>
                                        <small class="text-muted">
                                            {{ \Illuminate\Support\Str::limit(
                                                        $item->deskripsi ?? 'Tidak ada deskripsi',
                                                        55
                                                    ) }}
                                        </small>
                                    </div>
                                </div>
                            </td>

                            <td>
                                @if($item->kegiatan)
                                <span class="text-dark">
                                    {{ $item->kegiatan->nama_kegiatan }}
                                </span>
                                @else
                                <span class="text-muted">-</span>
                                @endif
                            </td>

                            <td>
                                {{ $item->tanggal_dokumentasi
                                            ? $item->tanggal_dokumentasi->format('d M Y')
                                            : '-' }}
                            </td>

                            <td>
                                @if($item->status === 'published')
                                <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">
                                    <i class="bi bi-check-circle me-1"></i>
                                    Published
                                </span>
                                @else
                                <span class="badge bg-secondary-subtle text-secondary rounded-pill px-3 py-2">
                                    <i class="bi bi-file-earmark me-1"></i>
                                    Draft
                                </span>
                                @endif
                            </td>

                            <td>
                                <div class="d-flex justify-content-center gap-1">

                                    <a href="{{ route('admin.galeri.show', $item->id) }}"
                                        class="btn btn-sm btn-outline-info" title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="{{ route('admin.galeri.edit', $item->id) }}"
                                        class="btn btn-sm btn-outline-warning" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus dokumentasi ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            <div class="d-flex flex-wrap justify-content-between
                            align-items-center gap-3 mt-4">

                <small class="text-muted">
                    Menampilkan {{ $galeri->firstItem() }}
                    sampai {{ $galeri->lastItem() }}
                    dari {{ $galeri->total() }} dokumentasi
                </small>

                {{ $galeri->links() }}

            </div>

            @else
            <div class="text-center py-5">
                <div class="mb-3">
                    <i class="bi bi-images text-muted" style="font-size:4rem;"></i>
                </div>

                <h5 class="fw-bold">Belum Ada Dokumentasi</h5>

                <p class="text-muted mb-4">
                    Tambahkan foto kegiatan KSPM untuk ditampilkan di galeri.
                </p>

                <a href="{{ route('admin.galeri.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-lg me-2"></i>
                    Tambah Galeri Pertama
                </a>
            </div>
            @endif

        </div>
    </div>

</div>
@endsection
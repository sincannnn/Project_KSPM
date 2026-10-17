@extends('layouts.admin.app')

@section('title', 'Kelola Kegiatan')
@section('page-heading', 'Kelola Kegiatan')

@section('content')
<div class="container-fluid px-0">

    {{-- HEADER --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h3 class="fw-bold mb-1">Kelola Kegiatan</h3>
            <p class="text-muted mb-0">
                Kelola seminar, workshop, pelatihan, dan kegiatan KSPM.
            </p>
        </div>

        <a href="{{ route('admin.kegiatan.create') }}" class="btn btn-success rounded-3 px-4 py-2">
            <i class="bi bi-plus-lg me-2"></i>
            Tambah Kegiatan
        </a>
    </div>

    {{-- NOTIFIKASI --}}
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger rounded-3">
        <strong>Terjadi kesalahan:</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- STATISTIK --}}
    <div class="row g-3 mb-4">

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-2">Total Kegiatan</p>
                            <h3 class="fw-bold mb-0">
                                {{ number_format($totalKegiatan) }}
                            </h3>
                        </div>
                        <div class="rounded-3 bg-success-subtle text-success p-3">
                            <i class="bi bi-calendar-event fs-3"></i>
                        </div>
                    </div>
                    <small class="text-muted d-block mt-3">
                        Seluruh kegiatan yang tersimpan
                    </small>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-2">Kegiatan Terbit</p>
                            <h3 class="fw-bold text-success mb-0">
                                {{ number_format($kegiatanTerbit) }}
                            </h3>
                        </div>
                        <div class="rounded-3 bg-success-subtle text-success p-3">
                            <i class="bi bi-globe2 fs-3"></i>
                        </div>
                    </div>
                    <small class="text-muted d-block mt-3">
                        Kegiatan yang dipublikasikan
                    </small>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-2">Kegiatan Draft</p>
                            <h3 class="fw-bold text-warning mb-0">
                                {{ number_format($kegiatanDraft) }}
                            </h3>
                        </div>
                        <div class="rounded-3 bg-warning-subtle text-warning p-3">
                            <i class="bi bi-file-earmark-text fs-3"></i>
                        </div>
                    </div>
                    <small class="text-muted d-block mt-3">
                        Kegiatan yang belum diterbitkan
                    </small>
                </div>
            </div>
        </div>

    </div>

    {{-- FILTER DAN PENCARIAN --}}
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4">
            <form action="{{ route('admin.kegiatan.index') }}" method="GET">

                <div class="row g-3 align-items-end">

                    <div class="col-12 col-lg-4">
                        <label for="search" class="form-label fw-semibold">
                            Cari Kegiatan
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" name="search" id="search" class="form-control"
                                placeholder="Nama, lokasi, atau deskripsi..." value="{{ request('search') }}">
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-2">
                        <label for="kategori" class="form-label fw-semibold">
                            Kategori
                        </label>
                        <select name="kategori" id="kategori" class="form-select">
                            <option value="">Semua Kategori</option>
                            @foreach ($kategoriKegiatan as $kategori)
                            <option value="{{ $kategori }}" @selected(request('kategori')===$kategori)>
                                {{ $kategori }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-2">
                        <label for="status" class="form-label fw-semibold">
                            Status
                        </label>
                        <select name="status" id="status" class="form-select">
                            <option value="">Semua Status</option>
                            <option value="published" @selected(request('status')==='published' )>
                                Diterbitkan
                            </option>
                            <option value="draft" @selected(request('status')==='draft' )>
                                Draft
                            </option>
                        </select>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success flex-fill">
                                <i class="bi bi-funnel me-1"></i>
                                Terapkan
                            </button>

                            <a href="{{ route('admin.kegiatan.index') }}" class="btn btn-outline-secondary">
                                Reset
                            </a>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

    {{-- TABEL KEGIATAN --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header bg-white border-0 p-4">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                <div>
                    <h5 class="fw-bold mb-1">Daftar Kegiatan</h5>
                    <p class="text-muted small mb-0">
                        Data kegiatan yang dikelola oleh admin.
                    </p>
                </div>

                <span class="badge bg-success-subtle text-success px-3 py-2">
                    {{ $kegiatan->total() }} kegiatan
                </span>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">
                    <tr>
                        <th class="ps-4 py-3">No.</th>
                        <th class="py-3">Kegiatan</th>
                        <th class="py-3">Kategori</th>
                        <th class="py-3">Jadwal</th>
                        <th class="py-3">Lokasi</th>
                        <th class="py-3">Kuota</th>
                        <th class="py-3">Status</th>
                        <th class="text-center pe-4 py-3">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($kegiatan as $item)
                    <tr>
                        <td class="ps-4">
                            {{ $kegiatan->firstItem() + $loop->index }}
                        </td>

                        <td style="min-width: 230px;">
                            <div class="d-flex align-items-center gap-3">

                                @if ($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_kegiatan }}"
                                    class="rounded-3 border" style="width: 58px; height: 58px; object-fit: cover;">
                                @else
                                <div class="rounded-3 bg-success-subtle text-success d-flex align-items-center justify-content-center"
                                    style="width: 58px; height: 58px; flex-shrink: 0;">
                                    <i class="bi bi-calendar-event fs-3"></i>
                                </div>
                                @endif

                                <div>
                                    <div class="fw-semibold">
                                        {{ $item->nama_kegiatan }}
                                    </div>
                                    <small class="text-muted">
                                        {{ $item->slug }}
                                    </small>
                                </div>

                            </div>
                        </td>

                        <td>
                            <span class="badge bg-light text-dark border">
                                {{ $item->kategori ?: 'Lainnya' }}
                            </span>
                        </td>

                        <td style="min-width: 155px;">
                            @if ($item->tanggal_mulai)
                            <div class="fw-semibold">
                                {{ $item->tanggal_mulai->format('d M Y') }}
                            </div>
                            <small class="text-muted">
                                {{ $item->tanggal_mulai->format('H:i') }}
                                @if ($item->tanggal_selesai)
                                – {{ $item->tanggal_selesai->format('d M Y H:i') }}
                                @endif
                            </small>
                            @else
                            <span class="text-muted">Belum ditentukan</span>
                            @endif
                        </td>

                        <td style="min-width: 150px;">
                            <span class="text-muted">
                                <i class="bi bi-geo-alt me-1"></i>
                                {{ $item->lokasi ?: 'Belum ditentukan' }}
                            </span>
                        </td>

                        <td>
                            {{ $item->kuota ? number_format($item->kuota) . ' orang' : '—' }}
                        </td>

                        <td>
                            @if ($item->status === 'published')
                            <span class="badge bg-success-subtle text-success">
                                <i class="bi bi-check-circle me-1"></i>
                                Terbit
                            </span>
                            @else
                            <span class="badge bg-warning-subtle text-warning-emphasis">
                                <i class="bi bi-pencil me-1"></i>
                                Draft
                            </span>
                            @endif
                        </td>

                        <td class="text-center pe-4">
                            <div class="d-flex justify-content-center gap-1">

                                <a href="{{ route('admin.kegiatan.show', $item->id) }}"
                                    class="btn btn-sm btn-outline-info" title="Detail" aria-label="Detail kegiatan">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('admin.kegiatan.edit', $item->id) }}"
                                    class="btn btn-sm btn-outline-primary" title="Edit" aria-label="Edit kegiatan">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('admin.kegiatan.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus kegiatan ini? Data peserta yang terkait juga perlu diperiksa sebelum penghapusan.');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus"
                                        aria-label="Hapus kegiatan">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5">
                            <div class="mb-3">
                                <i class="bi bi-calendar-x text-muted" style="font-size: 3rem;"></i>
                            </div>

                            <h6 class="fw-bold">Belum ada kegiatan</h6>
                            <p class="text-muted mb-3">
                                Tambahkan kegiatan pertama atau ubah filter pencarian.
                            </p>

                            <a href="{{ route('admin.kegiatan.create') }}" class="btn btn-success btn-sm">
                                <i class="bi bi-plus-lg me-1"></i>
                                Tambah Kegiatan
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        {{-- PAGINATION --}}
        @if ($kegiatan->hasPages())
        <div class="card-footer bg-white border-0 p-4">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <small class="text-muted">
                    Menampilkan {{ $kegiatan->firstItem() }}
                    sampai {{ $kegiatan->lastItem() }}
                    dari {{ $kegiatan->total() }} kegiatan
                </small>

                {{ $kegiatan->links() }}
            </div>
        </div>
        @endif

    </div>

</div>
@endsection
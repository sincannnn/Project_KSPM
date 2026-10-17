@extends('layouts.admin.app')

@section('title', 'Materi Edukasi')
@section('page-heading', 'Materi Edukasi')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between gap-3 mb-4">
    <div>
        <h1 class="admin-page-title mb-1">Materi Edukasi</h1>
        <p class="admin-muted mb-0">
            Kelola materi investasi yang ditampilkan di website publik.
        </p>
    </div>

    <a href="{{ route('admin.materi.create') }}" class="btn btn-success align-self-md-center">
        <i class="bi bi-plus-lg me-2"></i>Tambah Materi
    </a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row g-3 mb-4">
    @foreach([
    ['Total Materi', $totalMateri, 'bi-book', '#e4f2e8'],
    ['Dipublikasikan', $materiTerbit, 'bi-check-circle', '#e6edfb'],
    ['Draft', $materiDraft, 'bi-file-earmark', '#fff1d7'],
    ] as $stat)
    <div class="col-12 col-md-4">
        <div class="admin-card p-3 d-flex align-items-center justify-content-between">
            <div>
                <div class="admin-muted small">{{ $stat[0] }}</div>
                <div class="fs-3 fw-bold">{{ $stat[1] }}</div>
            </div>
            <div class="rounded-3 p-3" style="background:{{ $stat[3] }}">
                <i class="bi {{ $stat[2] }} fs-4 text-success"></i>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="admin-card overflow-hidden">
    <form method="GET" action="{{ route('admin.materi.index') }}" class="p-3 border-bottom">
        <div class="row g-2">
            <div class="col-12 col-lg-5">
                <input type="search" name="search" class="form-control" value="{{ request('search') }}"
                    placeholder="Cari judul atau deskripsi...">
            </div>

            <div class="col-6 col-lg-3">
                <select name="kategori" class="form-select">
                    <option value="">Semua Kategori</option>
                    @foreach($kategoriMateri as $kategori)
                    <option value="{{ $kategori }}" @selected(request('kategori')===$kategori)>
                        {{ $kategori }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-6 col-lg-2">
                <select name="status" class="form-select">
                    <option value="">Semua Status</option>
                    <option value="published" @selected(request('status')==='published' )>Terbit</option>
                    <option value="draft" @selected(request('status')==='draft' )>Draft</option>
                </select>
            </div>

            <div class="col-12 col-lg-2 d-flex gap-2">
                <button class="btn btn-success flex-grow-1">Filter</button>
                <a href="{{ route('admin.materi.index') }}" class="btn btn-light border">Reset</a>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="px-3">Materi</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>File</th>
                    <th class="text-end pe-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($materi as $item)
                <tr>
                    <td class="px-3" style="min-width:240px">
                        <div class="d-flex align-items-center gap-3">
                            @if($item->gambar)
                            <img src="{{ asset('storage/'.$item->gambar) }}" alt="" width="60" height="48"
                                class="rounded" style="object-fit:cover">
                            @else
                            <div class="rounded d-flex align-items-center justify-content-center"
                                style="width:60px;height:48px;background:#e4f2e8;color:#176044">
                                <i class="bi bi-book fs-4"></i>
                            </div>
                            @endif
                            <div>
                                <div class="fw-semibold">{{ $item->judul }}</div>
                                <div class="small admin-muted">{{ $item->slug }}</div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $item->kategori }}</td>
                    <td>
                        @if($item->status === 'published')
                        <span class="badge text-bg-success">Terbit</span>
                        @else
                        <span class="badge text-bg-warning">Draft</span>
                        @endif
                    </td>
                    <td>
                        @if($item->file_materi)
                        <i class="bi bi-file-earmark-pdf text-danger me-1"></i> PDF
                        @else
                        <span class="text-secondary small">Belum ada</span>
                        @endif
                    </td>
                    <td class="text-end pe-3">
                        <div class="d-inline-flex gap-1">
                            <a href="{{ route('admin.materi.show', $item->id) }}" class="btn btn-sm btn-light border"
                                title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('admin.materi.edit', $item->id) }}" class="btn btn-sm btn-light border"
                                title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.materi.destroy', $item->id) }}"
                                onsubmit="return confirm('Hapus materi ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-light border text-danger" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-5">
                        <i class="bi bi-journal-bookmark fs-1 text-secondary"></i>
                        <h6 class="mt-3">Belum ada materi</h6>
                        <p class="admin-muted small">Tambahkan materi investasi pertama.</p>
                        <a href="{{ route('admin.materi.create') }}" class="btn btn-success btn-sm">
                            Tambah Materi
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="p-3">
        {{ $materi->links() }}
    </div>
</div>
@endsection
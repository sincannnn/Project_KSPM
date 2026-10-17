@extends('layouts.admin.app')

@section('title', 'Detail Kegiatan')

@section('content')
<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
        <div>
            <h4 class="fw-bold mb-1">Detail Kegiatan</h4>
            <p class="text-muted mb-0">
                Informasi lengkap kegiatan KSPM.
            </p>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('admin.kegiatan.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>

            <a href="{{ route('admin.kegiatan.edit', $item->id) }}" class="btn btn-success">
                <i class="bi bi-pencil-square me-1"></i> Edit Kegiatan
            </a>
        </div>
    </div>

    {{-- Notifikasi --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="row g-4">

        {{-- Informasi utama --}}
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                @if($item->gambar)
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_kegiatan }}" class="card-img-top"
                    style="height: 300px; object-fit: cover;">
                @else
                <div class="d-flex flex-column justify-content-center
                                align-items-center bg-light text-muted" style="height: 220px;">
                    <i class="bi bi-image fs-1 mb-2"></i>
                    <span>Belum ada gambar kegiatan</span>
                </div>
                @endif

                <div class="card-body p-4">
                    <div class="d-flex flex-wrap gap-2 mb-3">
                        <span class="badge bg-success-subtle text-success">
                            {{ $item->kategori }}
                        </span>

                        @if($item->status === 'published')
                        <span class="badge bg-primary-subtle text-primary">
                            Dipublikasikan
                        </span>
                        @else
                        <span class="badge bg-secondary-subtle text-secondary">
                            Draft
                        </span>
                        @endif
                    </div>

                    <h3 class="fw-bold mb-2">
                        {{ $item->nama_kegiatan }}
                    </h3>

                    <p class="text-muted small mb-4">
                        Slug: {{ $item->slug }}
                    </p>

                    <hr>

                    <h6 class="fw-bold mb-3">Deskripsi Kegiatan</h6>

                    <div class="text-secondary" style="line-height: 1.8;">
                        @if($item->deskripsi)
                        {!! nl2br(e($item->deskripsi)) !!}
                        @else
                        <span class="text-muted">
                            Belum ada deskripsi kegiatan.
                        </span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Daftar peserta --}}
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white border-0 p-4 pb-2">
                    <h5 class="fw-bold mb-1">Peserta Kegiatan</h5>
                    <p class="text-muted small mb-0">
                        Daftar peserta yang terhubung dengan kegiatan ini.
                    </p>
                </div>

                <div class="card-body p-4">
                    @if($item->peserta->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 60px;">No.</th>
                                    <th>Informasi Peserta</th>
                                    <th>Tanggal Daftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($item->peserta as $index => $peserta)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <div class="fw-semibold">
                                            {{ $peserta->nama
                                                        ?? $peserta->nama_peserta
                                                        ?? $peserta->name
                                                        ?? 'Peserta' }}
                                        </div>
                                        @if($peserta->email)
                                        <small class="text-muted">
                                            {{ $peserta->email }}
                                        </small>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $peserta->created_at
                                                    ? $peserta->created_at->format('d M Y H:i')
                                                    : '-' }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-4">
                        <i class="bi bi-people fs-1 text-muted"></i>
                        <p class="text-muted mt-2 mb-0">
                            Belum ada peserta yang terdaftar.
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Informasi tambahan --}}
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Informasi Kegiatan</h5>

                    <div class="d-flex gap-3 mb-4">
                        <div class="text-success fs-4">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div>
                            <small class="text-muted d-block">Lokasi</small>
                            <span class="fw-semibold">
                                {{ $item->lokasi ?: 'Belum ditentukan' }}
                            </span>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mb-4">
                        <div class="text-success fs-4">
                            <i class="bi bi-calendar-event"></i>
                        </div>
                        <div>
                            <small class="text-muted d-block">Tanggal Mulai</small>
                            <span class="fw-semibold">
                                {{ $item->tanggal_mulai
                                    ? $item->tanggal_mulai->format('d M Y, H:i')
                                    : 'Belum ditentukan' }}
                            </span>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mb-4">
                        <div class="text-success fs-4">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <div>
                            <small class="text-muted d-block">Tanggal Selesai</small>
                            <span class="fw-semibold">
                                {{ $item->tanggal_selesai
                                    ? $item->tanggal_selesai->format('d M Y, H:i')
                                    : 'Belum ditentukan' }}
                            </span>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mb-4">
                        <div class="text-success fs-4">
                            <i class="bi bi-people"></i>
                        </div>
                        <div>
                            <small class="text-muted d-block">Kuota Peserta</small>
                            <span class="fw-semibold">
                                {{ $item->kuota
                                    ? number_format($item->kuota, 0, ',', '.') . ' orang'
                                    : 'Tidak dibatasi' }}
                            </span>
                        </div>
                    </div>

                    <div class="d-flex gap-3">
                        <div class="text-success fs-4">
                            <i class="bi bi-person-check"></i>
                        </div>
                        <div>
                            <small class="text-muted d-block">Jumlah Peserta</small>
                            <span class="fw-semibold">
                                {{ $item->peserta->count() }} orang
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Metadata --}}
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3">Metadata</h6>

                    <div class="mb-3">
                        <small class="text-muted d-block">Dibuat pada</small>
                        <span>
                            {{ $item->created_at
                                ? $item->created_at->format('d M Y, H:i')
                                : '-' }}
                        </span>
                    </div>

                    <div>
                        <small class="text-muted d-block">Terakhir diperbarui</small>
                        <span>
                            {{ $item->updated_at
                                ? $item->updated_at->format('d M Y, H:i')
                                : '-' }}
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
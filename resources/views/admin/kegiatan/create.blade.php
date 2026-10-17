@extends('layouts.admin.app')

@section('title', 'Tambah Kegiatan')
@section('page-heading', 'Tambah Kegiatan')

@section('content')
<div class="container-fluid px-0">

    {{-- HEADER --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h3 class="fw-bold mb-1">Tambah Kegiatan</h3>
            <p class="text-muted mb-0">
                Tambahkan kegiatan baru ke Galeri Investasi KSPM.
            </p>
        </div>

        <a href="{{ route('admin.kegiatan.index') }}" class="btn btn-outline-secondary rounded-3 px-3 py-2">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>
    </div>

    {{-- ERROR VALIDASI --}}
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show rounded-3" role="alert">
        <strong>Data belum dapat disimpan.</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
    </div>
    @endif

    <form action="{{ route('admin.kegiatan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- INFORMASI UTAMA --}}
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-header bg-white border-0 pt-4 px-4">
                <h5 class="fw-bold mb-1">
                    <i class="bi bi-calendar-event text-success me-2"></i>
                    Informasi Kegiatan
                </h5>
                <p class="text-muted small mb-0">
                    Masukkan informasi utama kegiatan yang akan diselenggarakan.
                </p>
            </div>

            <div class="card-body p-4">
                <div class="row g-4">

                    {{-- NAMA KEGIATAN --}}
                    <div class="col-md-8">
                        <label for="nama_kegiatan" class="form-label fw-semibold">
                            Nama Kegiatan <span class="text-danger">*</span>
                        </label>

                        <input type="text" name="nama_kegiatan" id="nama_kegiatan"
                            class="form-control @error('nama_kegiatan') is-invalid @enderror"
                            value="{{ old('nama_kegiatan') }}" placeholder="Contoh: Seminar Pengenalan Pasar Modal"
                            maxlength="255" required>

                        @error('nama_kegiatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- KATEGORI --}}
                    <div class="col-md-4">
                        <label for="kategori" class="form-label fw-semibold">
                            Kategori <span class="text-danger">*</span>
                        </label>

                        <select name="kategori" id="kategori"
                            class="form-select @error('kategori') is-invalid @enderror" required>
                            <option value="">Pilih kategori</option>

                            @foreach ($kategoriKegiatan as $kategori)
                            <option value="{{ $kategori }}" @selected(old('kategori')===$kategori)>
                                {{ $kategori }}
                            </option>
                            @endforeach
                        </select>

                        @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- SLUG --}}
                    <div class="col-12">
                        <label for="slug" class="form-label fw-semibold">
                            Slug URL
                        </label>

                        <input type="text" name="slug" id="slug"
                            class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}"
                            placeholder="seminar-pengenalan-pasar-modal" maxlength="255">

                        <div class="form-text">
                            Slug digunakan untuk alamat detail kegiatan.
                            Kosongkan untuk membuat slug otomatis dari nama kegiatan.
                        </div>

                        @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- DESKRIPSI --}}
                    <div class="col-12">
                        <label for="deskripsi" class="form-label fw-semibold">
                            Deskripsi Kegiatan
                        </label>

                        <textarea name="deskripsi" id="deskripsi" rows="5"
                            class="form-control @error('deskripsi') is-invalid @enderror"
                            placeholder="Jelaskan tujuan, rangkaian, dan informasi kegiatan...">{{ old('deskripsi') }}</textarea>

                        @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>
        </div>

        {{-- JADWAL DAN LOKASI --}}
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-header bg-white border-0 pt-4 px-4">
                <h5 class="fw-bold mb-1">
                    <i class="bi bi-clock text-success me-2"></i>
                    Jadwal dan Lokasi
                </h5>
                <p class="text-muted small mb-0">
                    Tentukan waktu pelaksanaan dan tempat kegiatan.
                </p>
            </div>

            <div class="card-body p-4">
                <div class="row g-4">

                    <div class="col-md-6">
                        <label for="tanggal_mulai" class="form-label fw-semibold">
                            Tanggal dan Waktu Mulai
                        </label>

                        <input type="datetime-local" name="tanggal_mulai" id="tanggal_mulai"
                            class="form-control @error('tanggal_mulai') is-invalid @enderror"
                            value="{{ old('tanggal_mulai') }}">

                        @error('tanggal_mulai')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="tanggal_selesai" class="form-label fw-semibold">
                            Tanggal dan Waktu Selesai
                        </label>

                        <input type="datetime-local" name="tanggal_selesai" id="tanggal_selesai"
                            class="form-control @error('tanggal_selesai') is-invalid @enderror"
                            value="{{ old('tanggal_selesai') }}">

                        @error('tanggal_selesai')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-8">
                        <label for="lokasi" class="form-label fw-semibold">
                            Lokasi Kegiatan
                        </label>

                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <i class="bi bi-geo-alt"></i>
                            </span>

                            <input type="text" name="lokasi" id="lokasi"
                                class="form-control @error('lokasi') is-invalid @enderror" value="{{ old('lokasi') }}"
                                placeholder="Contoh: Aula STMIK Adhi Guna" maxlength="255">

                            @error('lokasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="kuota" class="form-label fw-semibold">
                            Kuota Peserta
                        </label>

                        <div class="input-group">
                            <input type="number" name="kuota" id="kuota"
                                class="form-control @error('kuota') is-invalid @enderror" value="{{ old('kuota') }}"
                                min="1" placeholder="Contoh: 100">
                            <span class="input-group-text">Orang</span>

                            @error('kuota')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-text">
                            Kosongkan jika kuota tidak dibatasi.
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- GAMBAR DAN PUBLIKASI --}}
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-header bg-white border-0 pt-4 px-4">
                <h5 class="fw-bold mb-1">
                    <i class="bi bi-image text-success me-2"></i>
                    Gambar dan Publikasi
                </h5>
                <p class="text-muted small mb-0">
                    Tambahkan poster kegiatan dan tentukan status publikasinya.
                </p>
            </div>

            <div class="card-body p-4">
                <div class="row g-4">

                    <div class="col-md-7">
                        <label for="gambar" class="form-label fw-semibold">
                            Poster atau Gambar Kegiatan
                        </label>

                        <input type="file" name="gambar" id="gambar" accept="image/*"
                            class="form-control @error('gambar') is-invalid @enderror">

                        <div class="form-text">
                            Format gambar JPG, JPEG, PNG, atau WebP. Maksimal 2 MB.
                        </div>

                        @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <div id="preview-container" class="mt-3 d-none">
                            <p class="small fw-semibold mb-2">Pratinjau gambar</p>
                            <img id="preview-gambar" src="" alt="Pratinjau poster kegiatan"
                                class="img-thumbnail rounded-3" style="max-width: 300px; max-height: 220px;">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <label for="status" class="form-label fw-semibold">
                            Status Publikasi <span class="text-danger">*</span>
                        </label>

                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror"
                            required>
                            <option value="draft" @selected(old('status', 'draft' )==='draft' )>
                                Draft
                            </option>

                            <option value="published" @selected(old('status')==='published' )>
                                Terbitkan
                            </option>
                        </select>

                        <div class="form-text">
                            Draft tidak ditujukan untuk ditampilkan di halaman publik.
                            Pilih Terbitkan untuk memublikasikan kegiatan.
                        </div>

                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>
        </div>

        {{-- TOMBOL AKSI --}}
        <div class="d-flex flex-wrap justify-content-end gap-2 mb-4">
            <a href="{{ route('admin.kegiatan.index') }}" class="btn btn-light border rounded-3 px-4 py-2">
                Batal
            </a>

            <button type="submit" class="btn btn-success rounded-3 px-4 py-2">
                <i class="bi bi-save me-2"></i>
                Simpan Kegiatan
            </button>
        </div>

    </form>
</div>

{{-- SLUG OTOMATIS --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const namaInput = document.getElementById('nama_kegiatan');
    const slugInput = document.getElementById('slug');
    const gambarInput = document.getElementById('gambar');
    const previewContainer = document.getElementById('preview-container');
    const previewGambar = document.getElementById('preview-gambar');

    let slugDiubahManual = slugInput.value.trim() !== '';

    slugInput.addEventListener('input', function() {
        slugDiubahManual = slugInput.value.trim() !== '';
    });

    namaInput.addEventListener('input', function() {
        if (!slugDiubahManual) {
            slugInput.value = namaInput.value
                .toLowerCase()
                .trim()
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-+|-+$/g, '');
        }
    });

    gambarInput.addEventListener('change', function() {
        const file = gambarInput.files[0];

        if (!file) {
            previewContainer.classList.add('d-none');
            previewGambar.removeAttribute('src');
            return;
        }

        if (!file.type.startsWith('image/')) {
            gambarInput.value = '';
            previewContainer.classList.add('d-none');
            alert('Silakan pilih file gambar yang valid.');
            return;
        }

        previewGambar.src = URL.createObjectURL(file);
        previewContainer.classList.remove('d-none');
    });
});
</script>
@endsection
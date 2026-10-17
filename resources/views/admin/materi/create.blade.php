@extends('layouts.admin.app')

@section('title', 'Tambah Materi')
@section('page-heading', 'Tambah Materi')

@section('content')

<!-- HEADER -->
<div class="mb-4">
    <a href="{{ route('admin.materi.index') }}" class="text-decoration-none admin-muted small">
        <i class="bi bi-arrow-left me-1"></i>
        Kembali ke Materi
    </a>

    <h1 class="admin-page-title mt-3">Tambah Materi Edukasi</h1>

    <p class="admin-muted">
        Buat artikel edukasi investasi yang akan ditampilkan di website publik.
    </p>
</div>

<!-- NOTIFIKASI VALIDASI -->
@if ($errors->any())
<div class="alert alert-danger">
    <div class="fw-semibold mb-2">
        Periksa kembali data berikut:
    </div>

    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('admin.materi.store') }}" enctype="multipart/form-data">

    @csrf

    <div class="row g-4">

        <!-- KOLOM UTAMA -->
        <div class="col-lg-8">

            <div class="admin-card p-4">

                <h5 class="fw-semibold mb-4">
                    <i class="bi bi-journal-text text-success me-2"></i>
                    Konten Artikel
                </h5>

                <!-- JUDUL -->
                <div class="mb-3">
                    <label for="judul" class="form-label">
                        Judul Materi
                        <span class="text-danger">*</span>
                    </label>

                    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul') }}" placeholder="Contoh: Pengenalan Investasi untuk Pemula"
                        maxlength="255" required>

                    @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- SLUG -->
                <div class="mb-3">
                    <label for="slug" class="form-label">
                        Slug URL
                    </label>

                    <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                        value="{{ old('slug') }}" placeholder="pengenalan-investasi-untuk-pemula" maxlength="255">

                    <div class="form-text">
                        Digunakan sebagai alamat artikel. Slug dibuat otomatis
                        dari judul jika kolom ini dikosongkan.
                    </div>

                    @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- KATEGORI -->
                <div class="mb-3">
                    <label for="kategori" class="form-label">
                        Kategori
                        <span class="text-danger">*</span>
                    </label>

                    <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror"
                        required>
                        <option value="">Pilih kategori</option>

                        @foreach ($kategoriMateri as $kategori)
                        <option value="{{ $kategori }}" @selected(old('kategori')===$kategori)>
                            {{ $kategori }}
                        </option>
                        @endforeach
                    </select>

                    @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- DESKRIPSI -->
                <div class="mb-4">
                    <label for="deskripsi" class="form-label">
                        Ringkasan Materi
                    </label>

                    <textarea name="deskripsi" id="deskripsi"
                        class="form-control @error('deskripsi') is-invalid @enderror" rows="3"
                        placeholder="Tuliskan ringkasan singkat tentang artikel ini...">{{ old('deskripsi') }}</textarea>

                    <div class="form-text">
                        Ringkasan dapat digunakan sebagai pengantar pada kartu materi publik.
                    </div>

                    @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- ISI ARTIKEL -->
                <div class="mb-0">
                    <label for="isi" class="form-label">
                        Isi Materi / Artikel
                        <span class="text-danger">*</span>
                    </label>

                    <textarea name="isi" id="isi" class="form-control @error('isi') is-invalid @enderror" rows="16"
                        placeholder="Tuliskan isi artikel edukasi investasi di sini..."
                        required>{{ old('isi') }}</textarea>

                    <div class="form-text">
                        Isi materi akan dibaca langsung oleh pengunjung di halaman website.
                        Gunakan paragraf dan pemisah baris agar artikel mudah dibaca.
                    </div>

                    @error('isi')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>

        <!-- SIDEBAR -->
        <div class="col-lg-4">

            <!-- PUBLIKASI -->
            <div class="admin-card p-4 mb-4">

                <h5 class="fw-semibold mb-3">
                    <i class="bi bi-globe text-success me-2"></i>
                    Publikasi
                </h5>

                <label for="status" class="form-label">
                    Status Materi
                    <span class="text-danger">*</span>
                </label>

                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror mb-2"
                    required>
                    <option value="draft" @selected(old('status', 'draft' )==='draft' )>
                        Draft
                    </option>

                    <option value="published" @selected(old('status')==='published' )>
                        Dipublikasikan
                    </option>
                </select>

                <div class="form-text mb-4">
                    Draft tidak ditampilkan kepada pengunjung.
                    Pilih Dipublikasikan agar artikel dapat tampil di website publik.
                </div>

                @error('status')
                <div class="text-danger small mb-3">{{ $message }}</div>
                @enderror

                <hr>

                <!-- GAMBAR SAMPUL -->
                <label for="gambar" class="form-label">
                    Gambar Sampul
                </label>

                <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror"
                    accept="image/jpeg,image/png,image/webp">

                <div class="form-text mb-3">
                    Format JPG, PNG, atau WebP. Ukuran maksimal 2 MB.
                    Gambar bersifat opsional.
                </div>

                @error('gambar')
                <div class="text-danger small mb-3">{{ $message }}</div>
                @enderror

                <!-- PREVIEW GAMBAR -->
                <div id="preview-container" class="d-none mb-4">
                    <img id="preview-gambar" src="" alt="Preview gambar sampul" class="img-fluid rounded border w-100"
                        style="max-height: 220px; object-fit: cover;">

                    <button type="button" id="hapus-preview" class="btn btn-sm btn-outline-danger mt-2">
                        <i class="bi bi-x-circle me-1"></i>
                        Hapus pilihan gambar
                    </button>
                </div>

                <!-- TOMBOL -->
                <button type="submit" class="btn btn-success w-100">
                    <i class="bi bi-save me-2"></i>
                    Simpan Materi
                </button>

                <a href="{{ route('admin.materi.index') }}" class="btn btn-light border w-100 mt-2">
                    Batal
                </a>

            </div>

            <!-- PETUNJUK -->
            <div class="admin-card p-3">
                <h6 class="fw-semibold">
                    <i class="bi bi-info-circle text-success me-2"></i>
                    Petunjuk
                </h6>

                <ul class="small admin-muted mb-0 ps-3">
                    <li class="mb-2">Judul harus jelas dan sesuai isi artikel.</li>
                    <li class="mb-2">Pilih kategori yang sesuai dengan materi.</li>
                    <li class="mb-2">Isi artikel wajib diisi.</li>
                    <li>File PDF tidak diperlukan karena materi dibaca langsung di website.</li>
                </ul>
            </div>

        </div>
    </div>
</form>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const judul = document.getElementById('judul');
    const slug = document.getElementById('slug');

    const gambar = document.getElementById('gambar');
    const previewContainer = document.getElementById('preview-container');
    const previewGambar = document.getElementById('preview-gambar');
    const hapusPreview = document.getElementById('hapus-preview');

    // Membuat slug otomatis dari judul.
    // Slug otomatis diperbarui selama pengguna belum mengeditnya manual.
    let slugDieditManual = slug.value.trim() !== '';

    function buatSlug(teks) {
        return teks
            .toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/[^a-z0-9\s-]/g, '')
            .trim()
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
    }

    judul.addEventListener('input', function() {
        if (!slugDieditManual) {
            slug.value = buatSlug(this.value);
        }
    });

    slug.addEventListener('input', function() {
        slugDieditManual = this.value.trim() !== '';
    });

    // Preview gambar sampul sebelum disimpan.
    gambar.addEventListener('change', function() {
        const file = this.files[0];

        if (!file) {
            previewContainer.classList.add('d-none');
            previewGambar.removeAttribute('src');
            return;
        }

        if (!file.type.startsWith('image/')) {
            alert('Silakan pilih file gambar.');
            this.value = '';
            return;
        }

        const url = URL.createObjectURL(file);

        previewGambar.src = url;
        previewContainer.classList.remove('d-none');
    });

    // Menghapus pilihan gambar sebelum formulir dikirim.
    hapusPreview.addEventListener('click', function() {
        gambar.value = '';
        previewGambar.removeAttribute('src');
        previewContainer.classList.add('d-none');
    });
});
</script>
@endpush
@extends('layouts.admin.app')

@section('title', 'Edit Materi')
@section('page-heading', 'Edit Materi')

@section('content')

<!-- HEADER -->
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="admin-page-title mb-1">Edit Materi Edukasi</h1>
        <p class="admin-muted mb-0">
            Perbarui informasi dan isi artikel edukasi investasi.
        </p>
    </div>

    <a href="{{ route('admin.materi.index') }}" class="btn btn-outline-secondary rounded-3 px-3 py-2">
        <i class="bi bi-arrow-left me-1"></i>
        Kembali
    </a>
</div>

<!-- NOTIFIKASI VALIDASI -->
@if ($errors->any())
<div class="alert alert-danger rounded-3">
    <strong>Periksa kembali data berikut:</strong>

    <ul class="mb-0 mt-2">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.materi.update', $item->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row g-4">

        <!-- KOLOM UTAMA -->
        <div class="col-lg-8">

            <!-- INFORMASI MATERI -->
            <div class="admin-card p-4 mb-4">
                <h5 class="fw-semibold mb-1">Informasi Materi</h5>

                <p class="admin-muted small mb-4">
                    Perbarui identitas dan ringkasan materi edukasi.
                </p>

                <!-- JUDUL -->
                <div class="mb-3">
                    <label for="judul" class="form-label">
                        Judul Materi <span class="text-danger">*</span>
                    </label>

                    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul', $item->judul) }}" maxlength="255" required>

                    @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- SLUG -->
                <div class="mb-3">
                    <label for="slug" class="form-label">
                        Slug URL <span class="text-danger">*</span>
                    </label>

                    <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                        value="{{ old('slug', $item->slug) }}" maxlength="255" required>

                    <div class="form-text">
                        Slug digunakan sebagai alamat URL artikel.
                    </div>

                    @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- KATEGORI -->
                <div class="mb-3">
                    <label for="kategori" class="form-label">
                        Kategori <span class="text-danger">*</span>
                    </label>

                    <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror"
                        required>
                        <option value="">Pilih kategori</option>

                        @foreach ($kategoriMateri as $kategori)
                        <option value="{{ $kategori }}" @selected(old('kategori', $item->kategori) === $kategori)
                            >
                            {{ $kategori }}
                        </option>
                        @endforeach
                    </select>

                    @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- DESKRIPSI -->
                <div class="mb-0">
                    <label for="deskripsi" class="form-label">
                        Ringkasan Materi
                    </label>

                    <textarea name="deskripsi" id="deskripsi" rows="4"
                        class="form-control @error('deskripsi') is-invalid @enderror"
                        placeholder="Tuliskan ringkasan materi...">{{ old('deskripsi', $item->deskripsi) }}</textarea>

                    <div class="form-text">
                        Ringkasan singkat yang dapat ditampilkan pada kartu materi publik.
                    </div>

                    @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- ISI ARTIKEL -->
            <div class="admin-card p-4 mb-4">
                <h5 class="fw-semibold mb-1">
                    <i class="bi bi-journal-text text-success me-2"></i>
                    Isi Materi / Artikel
                </h5>

                <p class="admin-muted small mb-4">
                    Konten ini akan dibaca langsung oleh pengunjung di website.
                </p>

                <label for="isi" class="form-label">
                    Konten Artikel <span class="text-danger">*</span>
                </label>

                <textarea name="isi" id="isi" rows="18" class="form-control @error('isi') is-invalid @enderror"
                    placeholder="Tuliskan isi lengkap artikel edukasi investasi..."
                    required>{{ old('isi', $item->isi) }}</textarea>

                <div class="form-text">
                    Gunakan paragraf dan baris baru agar artikel mudah dibaca.
                    PDF tidak diperlukan.
                </div>

                @error('isi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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
                    Status Materi <span class="text-danger">*</span>
                </label>

                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                    <option value="draft" @selected(old('status', $item->status) === 'draft')
                        >
                        Draft
                    </option>

                    <option value="published" @selected(old('status', $item->status) === 'published')
                        >
                        Dipublikasikan
                    </option>
                </select>

                @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="form-text mt-2">
                    Materi berstatus Draft tidak ditampilkan kepada pengunjung.
                </div>
            </div>

            <!-- GAMBAR SAMPUL -->
            <div class="admin-card p-4 mb-4">
                <h5 class="fw-semibold mb-3">
                    <i class="bi bi-image text-success me-2"></i>
                    Gambar Sampul
                </h5>

                @if ($item->gambar)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar {{ $item->judul }}"
                        class="img-fluid rounded-3 border w-100" style="max-height: 240px; object-fit: cover;">

                    <div class="small admin-muted mt-2">
                        Gambar sampul saat ini
                    </div>
                </div>
                @else
                <div class="rounded-3 d-flex flex-column align-items-center justify-content-center mb-3"
                    style="height: 150px; background: #e4f2e8; color: #176044;">
                    <i class="bi bi-image fs-1"></i>
                    <span class="small mt-2">Belum ada gambar</span>
                </div>
                @endif

                <label for="gambar" class="form-label">
                    Pilih Gambar Baru
                </label>

                <input type="file" name="gambar" id="gambar" accept="image/jpeg,image/png,image/webp"
                    class="form-control @error('gambar') is-invalid @enderror">

                <div class="form-text">
                    JPG, PNG, atau WebP. Maksimal 2 MB.
                    Kosongkan jika gambar tidak ingin diganti.
                </div>

                @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <!-- PREVIEW GAMBAR BARU -->
                <div id="preview-container" class="d-none mt-3">
                    <div class="small fw-semibold mb-2">
                        Preview gambar baru
                    </div>

                    <img id="preview-gambar" src="" alt="Preview gambar baru" class="img-fluid rounded-3 border w-100"
                        style="max-height: 220px; object-fit: cover;">
                </div>
            </div>

            <!-- TOMBOL AKSI -->
            <div class="admin-card p-4">
                <button type="submit" class="btn btn-success w-100">
                    <i class="bi bi-save me-2"></i>
                    Simpan Perubahan
                </button>

                <a href="{{ route('admin.materi.index') }}" class="btn btn-light border w-100 mt-2">
                    Batal
                </a>
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

    // Slug yang sudah tersimpan tidak diubah otomatis.
    // Pengguna dapat mengedit slug secara manual jika diperlukan.
    judul.addEventListener('input', function() {
        // Tidak mengubah slug yang sudah ada saat mengedit materi.
    });

    // Preview gambar baru sebelum formulir disimpan.
    let previewUrl = null;

    gambar.addEventListener('change', function() {
        const file = this.files[0];

        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
            previewUrl = null;
        }

        if (!file) {
            previewContainer.classList.add('d-none');
            previewGambar.removeAttribute('src');
            return;
        }

        if (!file.type.startsWith('image/')) {
            alert('Silakan pilih file gambar yang valid.');
            this.value = '';
            previewContainer.classList.add('d-none');
            return;
        }

        previewUrl = URL.createObjectURL(file);
        previewGambar.src = previewUrl;
        previewContainer.classList.remove('d-none');
    });
});
</script>
@endpush
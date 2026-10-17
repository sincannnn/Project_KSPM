@extends('layouts.admin.app')

@section('title', 'Tambah Berita')
@section('page-heading', 'Tambah Berita')

@section('content')

<div class="mb-4">
    <a href="{{ url('/admin/berita-artikel') }}" class="text-decoration-none admin-muted small">
        <i class="bi bi-arrow-left me-1"></i>Kembali ke Daftar Berita
    </a>

    <h1 class="admin-page-title mt-3 mb-1">Tambah Berita & Artikel</h1>
    <p class="admin-muted mb-0">Buat konten baru untuk website Galeri Investasi.</p>
</div>

@if($errors->any())
<div class="alert alert-danger">
    <strong>Periksa kembali data berikut:</strong>
    <ul class="mb-0 mt-2">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ url('/admin/berita-artikel') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row g-4">
        <div class="col-12 col-lg-8">

            <div class="admin-card p-3 p-md-4 mb-4">
                <h5 class="fw-semibold mb-4">Informasi Artikel</h5>

                <div class="mb-3">
                    <label for="judul" class="form-label fw-medium">Judul Berita</label>
                    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul') }}" placeholder="Masukkan judul berita" required>
                    @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label fw-medium">Slug URL</label>
                    <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                        value="{{ old('slug') }}" placeholder="contoh: kegiatan-literasi-investasi">
                    <div class="form-text">Digunakan sebagai alamat berita di website.</div>
                    @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="ringkasan" class="form-label fw-medium">Ringkasan</label>
                    <textarea name="ringkasan" id="ringkasan" rows="3" maxlength="500"
                        class="form-control @error('ringkasan') is-invalid @enderror"
                        placeholder="Tuliskan ringkasan singkat berita">{{ old('ringkasan') }}</textarea>
                    @error('ringkasan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-0">
                    <label for="isi" class="form-label fw-medium">Isi Artikel</label>
                    <textarea name="isi" id="isi" rows="12" class="form-control @error('isi') is-invalid @enderror"
                        placeholder="Tuliskan isi berita secara lengkap..." required>{{ old('isi') }}</textarea>
                    @error('isi')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>

        <div class="col-12 col-lg-4">

            <div class="admin-card p-3 p-md-4 mb-4">
                <h5 class="fw-semibold mb-3">Publikasi</h5>

                <div class="mb-3">
                    <label for="status" class="form-label fw-medium">Status</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="draft" @selected(old('status', 'draft' )==='draft' )>Draft</option>
                        <option value="published" @selected(old('status')==='published' )>Publikasikan</option>
                        <option value="archived" @selected(old('status')==='archived' )>Arsip</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="published_at" class="form-label fw-medium">Tanggal Publikasi</label>
                    <input type="datetime-local" name="published_at" id="published_at" class="form-control"
                        value="{{ old('published_at') }}">
                </div>

                <button type="submit" class="btn btn-success w-100 py-2">
                    <i class="bi bi-check-lg me-2"></i>Simpan Berita
                </button>

                <a href="{{ url('/admin/berita-artikel') }}" class="btn btn-light border w-100 mt-2">
                    Batal
                </a>
            </div>

            <div class="admin-card p-3 p-md-4">
                <h5 class="fw-semibold mb-3">Gambar Berita</h5>

                <div class="border rounded-3 p-3 text-center mb-3" style="background:#f8faf8;">
                    <img id="previewGambar" src="" alt="Pratinjau gambar" class="img-fluid rounded d-none"
                        style="max-height:220px;object-fit:cover;">

                    <div id="placeholderGambar" class="py-4 text-secondary">
                        <i class="bi bi-image fs-1"></i>
                        <p class="small mb-0 mt-2">Pratinjau gambar</p>
                    </div>
                </div>

                <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror"
                    accept="image/*">

                <div class="form-text">Pilih gambar untuk sampul berita.</div>

                @error('gambar')
                <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

        </div>
    </div>
</form>

@endsection

@push('scripts')
<script>
const inputGambar = document.getElementById('gambar');
const previewGambar = document.getElementById('previewGambar');
const placeholderGambar = document.getElementById('placeholderGambar');

inputGambar?.addEventListener('change', function() {
    const file = this.files[0];

    if (!file) return;

    previewGambar.src = URL.createObjectURL(file);
    previewGambar.classList.remove('d-none');
    placeholderGambar.classList.add('d-none');
});

const judul = document.getElementById('judul');
const slug = document.getElementById('slug');

judul?.addEventListener('input', function() {
    if (slug.dataset.edited === 'true') return;

    slug.value = this.value
        .toLowerCase()
        .trim()
        .replace(/[^a-z0-9\s-]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-');
});

slug?.addEventListener('input', function() {
    this.dataset.edited = 'true';
});
</script>
@endpush
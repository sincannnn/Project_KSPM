@extends('layouts.admin.app')

@section('title', 'Tambah Materi')
@section('page-heading', 'Tambah Materi')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.materi.index') }}" class="text-decoration-none admin-muted small">
        <i class="bi bi-arrow-left me-1"></i>Kembali ke Materi
    </a>
    <h1 class="admin-page-title mt-3">Tambah Materi Edukasi</h1>
    <p class="admin-muted">Lengkapi materi yang akan dikelola oleh admin.</p>
</div>

@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('admin.materi.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="admin-card p-4">
                <h5 class="fw-semibold mb-4">Informasi Materi</h5>

                <div class="mb-3">
                    <label class="form-label">Judul Materi</label>
                    <input name="judul" id="judul" class="form-control" value="{{ old('judul') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Slug URL</label>
                    <input name="slug" id="slug" class="form-control" value="{{ old('slug') }}"
                        placeholder="Dibuat otomatis dari judul">
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="">Pilih kategori</option>
                        @foreach($kategoriMateri as $kategori)
                        <option value="{{ $kategori }}" @selected(old('kategori')===$kategori)>
                            {{ $kategori }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-0">
                    <label class="form-label">Deskripsi Materi</label>
                    <textarea name="deskripsi" class="form-control" rows="5"
                        placeholder="Jelaskan isi dan tujuan materi...">{{ old('deskripsi') }}</textarea>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="admin-card p-4 mb-4">
                <h5 class="fw-semibold mb-3">Publikasi</h5>

                <label class="form-label">Status</label>
                <select name="status" class="form-select mb-3" required>
                    <option value="draft" @selected(old('status', 'draft' )==='draft' )>Draft</option>
                    <option value="published" @selected(old('status')==='published' )>Dipublikasikan</option>
                </select>

                <label class="form-label">Gambar Sampul</label>
                <input type="file" name="gambar" class="form-control mb-3" accept="image/*">

                <label class="form-label">File Materi (PDF)</label>
                <input type="file" name="file_materi" class="form-control mb-2" accept=".pdf">
                <div class="form-text mb-4">Gambar maksimal 2 MB dan PDF maksimal 10 MB.</div>

                <button class="btn btn-success w-100">
                    <i class="bi bi-save me-2"></i>Simpan Materi
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
const judul = document.getElementById('judul');
const slug = document.getElementById('slug');

judul?.addEventListener('input', function() {
    if (slug.dataset.edited === 'true') return;

    slug.value = this.value.toLowerCase().trim()
        .replace(/[^a-z0-9\s-]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-');
});

slug?.addEventListener('input', function() {
    this.dataset.edited = 'true';
});
</script>
@endpush
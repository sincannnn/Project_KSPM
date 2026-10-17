@extends('layouts.admin.app')

@section('title', 'Edit Berita')
@section('page-heading', 'Edit Berita')

@section('content')

<div class="mb-4">
    <a href="{{ url('/admin/berita-artikel') }}" class="text-decoration-none admin-muted small">
        <i class="bi bi-arrow-left me-1"></i>Kembali ke Daftar Berita
    </a>

    <h1 class="admin-page-title mt-3 mb-1">Edit Berita & Artikel</h1>
    <p class="admin-muted mb-0">Perbarui informasi dan publikasi berita.</p>
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

<form action="{{ url('/admin/berita-artikel/'.$berita->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row g-4">
        <div class="col-12 col-lg-8">

            <div class="admin-card p-3 p-md-4">
                <h5 class="fw-semibold mb-4">Informasi Artikel</h5>

                <div class="mb-3">
                    <label for="judul" class="form-label fw-medium">Judul Berita</label>
                    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul', $berita->judul) }}" required>
                    @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label fw-medium">Slug URL</label>
                    <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                        value="{{ old('slug', $berita->slug) }}" required>
                    @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="ringkasan" class="form-label fw-medium">Ringkasan</label>
                    <textarea name="ringkasan" id="ringkasan" rows="3" maxlength="500"
                        class="form-control @error('ringkasan') is-invalid @enderror">{{ old('ringkasan', $berita->ringkasan) }}</textarea>
                    @error('ringkasan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="isi" class="form-label fw-medium">Isi Artikel</label>
                    <textarea name="isi" id="isi" rows="12" class="form-control @error('isi') is-invalid @enderror"
                        required>{{ old('isi', $berita->isi) }}</textarea>
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
                        <option value="draft" @selected(old('status', $berita->status) === 'draft')>Draft</option>
                        <option value="published" @selected(old('status', $berita->status) === 'published')>Publikasikan
                        </option>
                        <option value="archived" @selected(old('status', $berita->status) === 'archived')>Arsip</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="published_at" class="form-label fw-medium">Tanggal Publikasi</label>
                    <input type="datetime-local" name="published_at" id="published_at" class="form-control"
                        value="{{ old('published_at', $berita->published_at?->format('Y-m-d\TH:i')) }}">
                </div>

                <button type="submit" class="btn btn-success w-100 py-2">
                    <i class="bi bi-save me-2"></i>Simpan Perubahan
                </button>

                <a href="{{ url('/admin/berita-artikel') }}" class="btn btn-light border w-100 mt-2">
                    Batal
                </a>
            </div>

            <div class="admin-card p-3 p-md-4">
                <h5 class="fw-semibold mb-3">Gambar Berita</h5>

                @if($berita->gambar)
                <img id="previewGambar" src="{{ asset('storage/'.$berita->gambar) }}" alt="Gambar berita saat ini"
                    class="img-fluid rounded mb-3 w-100" style="max-height:220px;object-fit:cover;">
                @else
                <div id="placeholderGambar" class="border rounded-3 text-center py-4 mb-3 text-secondary">
                    <i class="bi bi-image fs-1"></i>
                    <p class="small mb-0 mt-2">Belum ada gambar</p>
                </div>

                <img id="previewGambar" src="" alt="Pratinjau gambar baru" class="img-fluid rounded mb-3 w-100 d-none"
                    style="max-height:220px;object-fit:cover;">
                @endif

                <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror"
                    accept="image/*">

                <div class="form-text">Kosongkan jika tidak ingin mengganti gambar.</div>

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
document.getElementById('gambar')?.addEventListener('change', function() {
    const file = this.files[0];
    const preview = document.getElementById('previewGambar');
    const placeholder = document.getElementById('placeholderGambar');

    if (!file || !preview) return;

    preview.src = URL.createObjectURL(file);
    preview.classList.remove('d-none');
    placeholder?.classList.add('d-none');
});
</script>
@endpush
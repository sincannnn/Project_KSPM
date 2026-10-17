@extends('layouts.admin.app')

@section('title', 'Tambah Galeri')

@section('content')
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h4 class="fw-bold mb-1">Tambah Galeri</h4>
            <p class="text-muted mb-0">
                Tambahkan dokumentasi foto kegiatan KSPM STMIK Adhi Guna.
            </p>
        </div>

        <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>

    {{-- VALIDATION ERROR --}}
    @if($errors->any())
    <div class="alert alert-danger rounded-3">
        <div class="fw-bold mb-2">
            <i class="bi bi-exclamation-circle me-2"></i>
            Periksa kembali isian berikut:
        </div>
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-4">

            {{-- FORM UTAMA --}}
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-white border-0 p-4 pb-0">
                        <h5 class="fw-bold mb-1">Informasi Dokumentasi</h5>
                        <p class="text-muted small mb-0">
                            Lengkapi informasi foto yang akan disimpan.
                        </p>
                    </div>

                    <div class="card-body p-4">

                        {{-- JUDUL --}}
                        <div class="mb-4">
                            <label for="judul" class="form-label fw-semibold">
                                Judul Dokumentasi
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="judul" id="judul"
                                class="form-control @error('judul') is-invalid @enderror"
                                placeholder="Contoh: Seminar Pengenalan Pasar Modal" value="{{ old('judul') }}"
                                required>
                            @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- SLUG --}}
                        <div class="mb-4">
                            <label for="slug" class="form-label fw-semibold">
                                Slug URL
                            </label>
                            <input type="text" name="slug" id="slug"
                                class="form-control @error('slug') is-invalid @enderror"
                                placeholder="seminar-pengenalan-pasar-modal" value="{{ old('slug') }}">
                            <div class="form-text">
                                Dibuat otomatis dari judul, tetapi bisa diubah.
                            </div>
                            @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- DESKRIPSI --}}
                        <div class="mb-4">
                            <label for="deskripsi" class="form-label fw-semibold">
                                Deskripsi
                            </label>
                            <textarea name="deskripsi" id="deskripsi" rows="5"
                                class="form-control @error('deskripsi') is-invalid @enderror"
                                placeholder="Tuliskan keterangan dokumentasi...">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- KEGIATAN --}}
                        <div class="mb-4">
                            <label for="kegiatan_id" class="form-label fw-semibold">
                                Kegiatan Terkait
                            </label>
                            <select name="kegiatan_id" id="kegiatan_id"
                                class="form-select @error('kegiatan_id') is-invalid @enderror">
                                <option value="">Tidak dihubungkan dengan kegiatan</option>

                                @foreach($kegiatan as $k)
                                <option value="{{ $k->id }}" @selected(old('kegiatan_id')==$k->id)
                                    >
                                    {{ $k->nama_kegiatan }}
                                </option>
                                @endforeach
                            </select>
                            <div class="form-text">
                                Pilih kegiatan jika foto merupakan dokumentasi
                                dari kegiatan yang sudah tercatat.
                            </div>
                            @error('kegiatan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- TANGGAL --}}
                        <div class="mb-4">
                            <label for="tanggal_dokumentasi" class="form-label fw-semibold">
                                Tanggal Dokumentasi
                            </label>
                            <input type="date" name="tanggal_dokumentasi" id="tanggal_dokumentasi"
                                class="form-control @error('tanggal_dokumentasi') is-invalid @enderror"
                                value="{{ old('tanggal_dokumentasi') }}">
                            @error('tanggal_dokumentasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>

            {{-- SIDEBAR FORM --}}
            <div class="col-lg-4">

                {{-- UPLOAD GAMBAR --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-0 p-4 pb-0">
                        <h5 class="fw-bold mb-1">Foto Dokumentasi</h5>
                        <p class="text-muted small mb-0">
                            Unggah gambar utama galeri.
                        </p>
                    </div>

                    <div class="card-body p-4">

                        <div class="border rounded-4 p-3 text-center bg-light mb-3">
                            <img id="preview-gambar" src="" alt="Preview gambar" class="img-fluid rounded-3 d-none"
                                style="width:100%;max-height:260px;object-fit:cover;">

                            <div id="placeholder-gambar" class="py-4">
                                <i class="bi bi-cloud-arrow-up text-success" style="font-size:3rem;"></i>
                                <p class="fw-semibold mt-2 mb-1">
                                    Belum ada gambar
                                </p>
                                <small class="text-muted">
                                    Preview akan muncul di sini
                                </small>
                            </div>
                        </div>

                        <label for="gambar" class="form-label fw-semibold">
                            Pilih Gambar <span class="text-danger">*</span>
                        </label>

                        <input type="file" name="gambar" id="gambar"
                            class="form-control @error('gambar') is-invalid @enderror" accept="image/*" required>

                        <div class="form-text">
                            Format gambar harus valid. Ukuran maksimal 5 MB.
                        </div>

                        @error('gambar')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                {{-- STATUS --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">Publikasi</h5>

                        <label for="status" class="form-label fw-semibold">
                            Status Dokumentasi
                            <span class="text-danger">*</span>
                        </label>

                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror"
                            required>
                            <option value="draft" @selected(old('status', 'draft' )==='draft' )>
                                Draft
                            </option>
                            <option value="published" @selected(old('status')==='published' )>
                                Published
                            </option>
                        </select>

                        <div class="form-text">
                            Draft tidak ditampilkan pada halaman publik.
                            Published akan tersedia untuk pengunjung.
                        </div>

                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- BUTTON --}}
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success py-2">
                        <i class="bi bi-save me-2"></i>Simpan Galeri
                    </button>

                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-light border py-2">
                        Batal
                    </a>
                </div>

            </div>
        </div>
    </form>
</div>

{{-- PREVIEW GAMBAR DAN SLUG OTOMATIS --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const judul = document.getElementById('judul');
    const slug = document.getElementById('slug');
    const gambar = document.getElementById('gambar');
    const preview = document.getElementById('preview-gambar');
    const placeholder = document.getElementById('placeholder-gambar');

    let slugDiubahManual = slug.value.trim() !== '';

    function buatSlug(teks) {
        return teks
            .toLowerCase()
            .trim()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '');
    }

    judul.addEventListener('input', function() {
        if (!slugDiubahManual) {
            slug.value = buatSlug(judul.value);
        }
    });

    slug.addEventListener('input', function() {
        slugDiubahManual = slug.value.trim() !== '';
        slug.value = buatSlug(slug.value);
    });

    gambar.addEventListener('change', function() {
        const file = gambar.files[0];

        if (!file) {
            preview.src = '';
            preview.classList.add('d-none');
            placeholder.classList.remove('d-none');
            return;
        }

        if (!file.type.startsWith('image/')) {
            alert('Silakan pilih file gambar yang valid.');
            gambar.value = '';
            return;
        }

        if (file.size > 5 * 1024 * 1024) {
            alert('Ukuran gambar maksimal 5 MB.');
            gambar.value = '';
            return;
        }

        preview.src = URL.createObjectURL(file);
        preview.classList.remove('d-none');
        placeholder.classList.add('d-none');
    });
});
</script>
@endsection
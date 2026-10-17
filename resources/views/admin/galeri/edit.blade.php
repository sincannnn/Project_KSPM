@extends('layouts.admin.app')

@section('title', 'Edit Galeri')

@section('content')
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h4 class="fw-bold mb-1">Edit Galeri</h4>
            <p class="text-muted mb-0">
                Perbarui informasi dan foto dokumentasi KSPM.
            </p>
        </div>

        <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>

    {{-- VALIDATION ERRORS --}}
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

    <form action="{{ route('admin.galeri.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-4">

            {{-- INFORMASI DOKUMENTASI --}}
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-white border-0 p-4 pb-0">
                        <h5 class="fw-bold mb-1">Informasi Dokumentasi</h5>
                        <p class="text-muted small mb-0">
                            Ubah informasi dokumentasi sesuai kebutuhan.
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
                                value="{{ old('judul', $item->judul) }}" required>

                            @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- SLUG --}}
                        <div class="mb-4">
                            <label for="slug" class="form-label fw-semibold">
                                Slug URL
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="slug" id="slug"
                                class="form-control @error('slug') is-invalid @enderror"
                                value="{{ old('slug', $item->slug) }}" required>

                            <div class="form-text">
                                Digunakan sebagai alamat URL detail galeri.
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
                                placeholder="Tuliskan keterangan dokumentasi...">{{ old('deskripsi', $item->deskripsi) }}</textarea>

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
                                <option value="">
                                    Tidak dihubungkan dengan kegiatan
                                </option>

                                @foreach($kegiatan as $k)
                                <option value="{{ $k->id }}" @selected( (string) old('kegiatan_id', $item->kegiatan_id)
                                    === (string) $k->id
                                    )
                                    >
                                    {{ $k->nama_kegiatan }}
                                </option>
                                @endforeach
                            </select>

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
                                class="form-control @error('tanggal_dokumentasi') is-invalid @enderror" value="{{ old(
                                    'tanggal_dokumentasi',
                                    $item->tanggal_dokumentasi
                                        ? $item->tanggal_dokumentasi->format('Y-m-d')
                                        : ''
                                ) }}">

                            @error('tanggal_dokumentasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-4">

                {{-- GAMBAR --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-0 p-4 pb-0">
                        <h5 class="fw-bold mb-1">Foto Dokumentasi</h5>
                        <p class="text-muted small mb-0">
                            Ganti foto jika diperlukan.
                        </p>
                    </div>

                    <div class="card-body p-4">

                        <div class="border rounded-4 p-2 bg-light mb-3">
                            <img id="preview-gambar" src="{{ asset('storage/' . $item->gambar) }}"
                                alt="{{ $item->judul }}" class="img-fluid rounded-3 w-100"
                                style="max-height:280px;object-fit:cover;">
                        </div>

                        <label for="gambar" class="form-label fw-semibold">
                            Ganti Gambar
                        </label>

                        <input type="file" name="gambar" id="gambar"
                            class="form-control @error('gambar') is-invalid @enderror" accept="image/*">

                        <div class="form-text">
                            Kosongkan jika tetap menggunakan foto lama.
                            Maksimal 5 MB.
                        </div>

                        @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
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
                            <option value="draft" @selected(old('status', $item->status) === 'draft')>
                                Draft
                            </option>

                            <option value="published" @selected(old('status', $item->status) === 'published')>
                                Published
                            </option>
                        </select>

                        <div class="form-text">
                            Published akan menampilkan dokumentasi di halaman publik.
                        </div>

                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- TOMBOL --}}
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success py-2">
                        <i class="bi bi-save me-2"></i>Simpan Perubahan
                    </button>

                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-light border py-2">
                        Batal
                    </a>
                </div>

            </div>
        </div>
    </form>
</div>

{{-- PREVIEW GAMBAR BARU --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const gambar = document.getElementById('gambar');
    const preview = document.getElementById('preview-gambar');

    let previewUrl = null;

    gambar.addEventListener('change', function() {
        const file = gambar.files[0];

        if (!file) {
            if (previewUrl) {
                URL.revokeObjectURL(previewUrl);
                previewUrl = null;
            }

            preview.src = @json(asset('storage/'.$item - > gambar));
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

        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
        }

        previewUrl = URL.createObjectURL(file);
        preview.src = previewUrl;
    });
});
</script>
@endsection
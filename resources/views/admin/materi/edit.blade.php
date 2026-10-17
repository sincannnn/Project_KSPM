@extends('layouts.admin.app')

@section('title', 'Edit Materi')
@section('page-heading', 'Edit Materi')

@section('content')
<div class="container-fluid px-0">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h3 class="fw-bold mb-1">Edit Materi</h3>
            <p class="text-muted mb-0">
                Perbarui informasi dan file materi edukasi.
            </p>
        </div>

        <a href="{{ route('admin.materi.index') }}" class="btn btn-outline-secondary rounded-3 px-3 py-2">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

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

        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-header bg-white border-0 pt-4 px-4">
                <h5 class="fw-bold mb-1">Informasi Materi</h5>
                <p class="text-muted small mb-0">
                    Lengkapi informasi utama materi edukasi.
                </p>
            </div>

            <div class="card-body p-4">
                <div class="row g-4">

                    <div class="col-md-8">
                        <label for="judul" class="form-label fw-semibold">
                            Judul Materi <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="judul" id="judul"
                            class="form-control @error('judul') is-invalid @enderror"
                            value="{{ old('judul', $item->judul) }}" required>
                        @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="kategori" class="form-label fw-semibold">
                            Kategori <span class="text-danger">*</span>
                        </label>
                        <select name="kategori" id="kategori"
                            class="form-select @error('kategori') is-invalid @enderror" required>
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

                    <div class="col-12">
                        <label for="slug" class="form-label fw-semibold">
                            Slug <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="slug" id="slug"
                            class="form-control @error('slug') is-invalid @enderror"
                            value="{{ old('slug', $item->slug) }}" required>
                        <div class="form-text">
                            Slug digunakan sebagai identitas URL materi.
                        </div>
                        @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="deskripsi" class="form-label fw-semibold">
                            Deskripsi Materi
                        </label>
                        <textarea name="deskripsi" id="deskripsi" rows="5"
                            class="form-control @error('deskripsi') is-invalid @enderror"
                            placeholder="Tuliskan deskripsi materi...">{{ old('deskripsi', $item->deskripsi) }}</textarea>
                        @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="status" class="form-label fw-semibold">
                            Status Publikasi <span class="text-danger">*</span>
                        </label>
                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror"
                            required>
                            <option value="draft" @selected(old('status', $item->status) === 'draft')>
                                Draft
                            </option>
                            <option value="published" @selected(old('status', $item->status) === 'published')>
                                Diterbitkan
                            </option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-header bg-white border-0 pt-4 px-4">
                <h5 class="fw-bold mb-1">Media Materi</h5>
                <p class="text-muted small mb-0">
                    Ganti gambar atau PDF jika diperlukan.
                </p>
            </div>

            <div class="card-body p-4">
                <div class="row g-4">

                    <div class="col-md-6">
                        <label for="gambar" class="form-label fw-semibold">
                            Gambar Materi
                        </label>

                        @if ($item->gambar)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar {{ $item->judul }}"
                                class="img-thumbnail rounded-3" style="max-width: 220px; max-height: 180px;">
                            <div class="small text-muted mt-1">
                                Gambar saat ini
                            </div>
                        </div>
                        @else
                        <p class="small text-muted">
                            Belum ada gambar.
                        </p>
                        @endif

                        <input type="file" name="gambar" id="gambar" accept="image/*"
                            class="form-control @error('gambar') is-invalid @enderror">
                        <div class="form-text">
                            Format gambar yang didukung, maksimal 2 MB.
                        </div>
                        @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="file_materi" class="form-label fw-semibold">
                            File Materi PDF
                        </label>

                        @if ($item->file_materi)
                        <div class="mb-3 p-3 border rounded-3">
                            <i class="bi bi-file-earmark-pdf text-danger fs-3"></i>
                            <div class="fw-semibold mt-2">
                                File PDF tersedia
                            </div>
                            <a href="{{ asset('storage/' . $item->file_materi) }}" target="_blank"
                                rel="noopener noreferrer" class="small">
                                Lihat PDF saat ini
                            </a>
                        </div>
                        @else
                        <p class="small text-muted">
                            Belum ada file PDF.
                        </p>
                        @endif

                        <input type="file" name="file_materi" id="file_materi" accept=".pdf,application/pdf"
                            class="form-control @error('file_materi') is-invalid @enderror">
                        <div class="form-text">
                            Format PDF, maksimal 10 MB. Kosongkan jika tidak diganti.
                        </div>
                        @error('file_materi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>
        </div>

        <div class="d-flex flex-wrap justify-content-end gap-2 mb-4">
            <a href="{{ route('admin.materi.index') }}" class="btn btn-light border rounded-3 px-4 py-2">
                Batal
            </a>

            <button type="submit" class="btn btn-success rounded-3 px-4 py-2">
                <i class="bi bi-save me-1"></i>
                Simpan Perubahan
            </button>
        </div>

    </form>
</div>
@endsection
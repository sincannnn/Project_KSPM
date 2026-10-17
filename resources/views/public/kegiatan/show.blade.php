@extends('layouts.public.app')

@section('title', $item->nama_kegiatan . ' | KSPM STMIK Adhi Guna')

@section('content')

{{-- ======================================================
     HERO / HEADER
====================================================== --}}
<section class="py-5 text-white" style="background: linear-gradient(135deg, #0f3d2e, #176044);">

    <div class="container">

        <span class="badge bg-warning text-dark mb-3 px-3 py-2">
            <i class="bi bi-calendar-event me-1"></i>
            {{ $item->kategori ?: 'Kegiatan KSPM' }}
        </span>

        <h1 class="fw-bold display-5 mb-3">
            {{ $item->nama_kegiatan }}
        </h1>

        <div class="d-flex flex-wrap gap-3 opacity-75">

            <span>
                <i class="bi bi-calendar3 me-1"></i>
                @if($item->tanggal_mulai)
                {{ $item->tanggal_mulai->locale('id')->translatedFormat('d F Y') }}
                @else
                Tanggal belum ditentukan
                @endif
            </span>

            <span>
                <i class="bi bi-geo-alt me-1"></i>
                {{ $item->lokasi ?: 'Lokasi belum ditentukan' }}
            </span>

        </div>

    </div>
</section>


{{-- ======================================================
     DETAIL KEGIATAN
====================================================== --}}
<section class="py-5 bg-light">
    <div class="container">

        <div class="row g-4">

            {{-- KOLOM UTAMA --}}
            <div class="col-lg-8">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                    {{-- GAMBAR KEGIATAN --}}
                    @if($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_kegiatan }}" class="w-100"
                        style="max-height: 450px; object-fit: cover;">
                    @else
                    <div class="bg-success d-flex align-items-center justify-content-center" style="height: 350px;">
                        <i class="bi bi-calendar-event text-white" style="font-size: 8rem; opacity: .8;"></i>
                    </div>
                    @endif

                    {{-- DESKRIPSI --}}
                    <div class="card-body p-4 p-lg-5">

                        <h3 class="fw-bold mb-4">
                            <i class="bi bi-info-circle text-success me-2"></i>
                            Tentang Kegiatan
                        </h3>

                        <div class="text-muted mb-4" style="line-height: 1.9; overflow-wrap: anywhere;">
                            @if($item->deskripsi)
                            {!! nl2br(e($item->deskripsi)) !!}
                            @else
                            Belum ada deskripsi untuk kegiatan ini.
                            @endif
                        </div>

                        {{-- PERIODE KEGIATAN --}}
                        @if($item->tanggal_mulai || $item->tanggal_selesai)
                        <div class="rounded-3 bg-light border p-3 mb-4">

                            <h6 class="fw-bold mb-3">
                                <i class="bi bi-calendar-range text-success me-2"></i>
                                Jadwal Kegiatan
                            </h6>

                            @if($item->tanggal_mulai)
                            <div class="mb-2">
                                <small class="text-muted d-block">Tanggal Mulai</small>
                                <strong>
                                    {{ $item->tanggal_mulai->locale('id')->translatedFormat('d F Y, H:i') }}
                                </strong>
                            </div>
                            @endif

                            @if($item->tanggal_selesai)
                            <div>
                                <small class="text-muted d-block">Tanggal Selesai</small>
                                <strong>
                                    {{ $item->tanggal_selesai->locale('id')->translatedFormat('d F Y, H:i') }}
                                </strong>
                            </div>
                            @endif

                        </div>
                        @endif

                        {{-- INFORMASI TAMBAHAN --}}
                        <h4 class="fw-bold mt-4 mb-3">
                            Informasi Tambahan
                        </h4>

                        <div class="list-group list-group-flush">

                            <div class="list-group-item px-0 bg-transparent">
                                <i class="bi bi-tag-fill text-success me-2"></i>
                                <strong>Kategori:</strong>
                                {{ $item->kategori ?: 'Lainnya' }}
                            </div>

                            <div class="list-group-item px-0 bg-transparent">
                                <i class="bi bi-geo-alt-fill text-success me-2"></i>
                                <strong>Lokasi:</strong>
                                {{ $item->lokasi ?: 'Belum ditentukan' }}
                            </div>

                            @if($item->kuota)
                            <div class="list-group-item px-0 bg-transparent">
                                <i class="bi bi-people-fill text-success me-2"></i>
                                <strong>Kuota:</strong>
                                {{ number_format($item->kuota, 0, ',', '.') }} peserta
                            </div>
                            @endif

                        </div>

                    </div>
                </div>

            </div>


            {{-- SIDEBAR --}}
            <div class="col-lg-4">

                {{-- INFORMASI KEGIATAN --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">

                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-4">
                            <i class="bi bi-card-list text-success me-2"></i>
                            Informasi Kegiatan
                        </h5>

                        <div class="mb-3">
                            <small class="text-muted d-block mb-1">
                                Nama Kegiatan
                            </small>
                            <strong>{{ $item->nama_kegiatan }}</strong>
                        </div>

                        <div class="mb-3">
                            <small class="text-muted d-block mb-1">
                                Tanggal Mulai
                            </small>
                            <strong>
                                @if($item->tanggal_mulai)
                                {{ $item->tanggal_mulai->locale('id')->translatedFormat('d F Y, H:i') }}
                                @else
                                Belum ditentukan
                                @endif
                            </strong>
                        </div>

                        <div class="mb-3">
                            <small class="text-muted d-block mb-1">
                                Tanggal Selesai
                            </small>
                            <strong>
                                @if($item->tanggal_selesai)
                                {{ $item->tanggal_selesai->locale('id')->translatedFormat('d F Y, H:i') }}
                                @else
                                Belum ditentukan
                                @endif
                            </strong>
                        </div>

                        <div class="mb-3">
                            <small class="text-muted d-block mb-1">
                                Lokasi
                            </small>
                            <strong>
                                {{ $item->lokasi ?: 'Belum ditentukan' }}
                            </strong>
                        </div>

                        <div class="mb-4">
                            <small class="text-muted d-block mb-1">
                                Kuota Peserta
                            </small>
                            <strong>
                                {{ $item->kuota
                                    ? number_format($item->kuota, 0, ',', '.') . ' peserta'
                                    : 'Tidak ditentukan' }}
                            </strong>
                        </div>

                        {{-- TOMBOL DAFTAR --}}
                        <a href="{{ route('kegiatan.daftar', ['slug' => $item->slug]) }}"
                            class="btn btn-success w-100 py-2 rounded-3">
                            <i class="bi bi-pencil-square me-1"></i>
                            Daftar Kegiatan
                        </a>

                    </div>
                </div>


                {{-- BAGIKAN KEGIATAN --}}
                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-2">
                            Bagikan Kegiatan
                        </h5>

                        <p class="text-muted small">
                            Bagikan informasi kegiatan ini kepada temanmu.
                        </p>

                        <div class="d-flex gap-2">

                            <a href="https://wa.me/?text={{ urlencode($item->nama_kegiatan . ' - ' . url()->current()) }}"
                                target="_blank" rel="noopener noreferrer" class="btn btn-outline-success"
                                aria-label="Bagikan ke WhatsApp">
                                <i class="bi bi-whatsapp"></i>
                            </a>

                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary"
                                aria-label="Bagikan ke Facebook">
                                <i class="bi bi-facebook"></i>
                            </a>

                            <button type="button" class="btn btn-outline-dark" onclick="salinLinkKegiatan()"
                                aria-label="Salin tautan kegiatan">
                                <i class="bi bi-link-45deg"></i>
                            </button>

                        </div>

                        <div id="pesanSalinLink" class="small text-success mt-2" role="status" aria-live="polite"></div>

                    </div>
                </div>

            </div>

        </div>


        {{-- TOMBOL KEMBALI --}}
        <div class="mt-4">
            <a href="{{ route('kegiatan.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i>
                Kembali ke Kegiatan
            </a>
        </div>

    </div>
</section>


{{-- SCRIPT SALIN LINK --}}
<script>
function salinLinkKegiatan() {
    const link = window.location.href;
    const pesan = document.getElementById('pesanSalinLink');

    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(link)
            .then(() => {
                pesan.textContent = 'Tautan berhasil disalin.';
            })
            .catch(() => {
                pesan.textContent = 'Gagal menyalin tautan. Silakan salin URL dari browser.';
            });
    } else {
        const input = document.createElement('textarea');
        input.value = link;
        input.style.position = 'fixed';
        input.style.opacity = '0';
        document.body.appendChild(input);
        input.select();

        try {
            const berhasil = document.execCommand('copy');
            pesan.textContent = berhasil ?
                'Tautan berhasil disalin.' :
                'Gagal menyalin tautan. Silakan salin URL dari browser.';
        } catch (error) {
            pesan.textContent = 'Silakan salin URL dari browser.';
        }

        input.remove();
    }
}
</script>

@endsection
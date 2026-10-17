@extends('layouts.public.app')

@section('title', $berita->judul . ' | KSPM STMIK Adhi Guna')

@section('content')

<section class="py-5 text-white" style="background: linear-gradient(135deg, #0f3d2e, #176044);">
    <div class="container">
        <span class="badge bg-warning text-dark mb-3 px-3 py-2">
            <i class="bi bi-newspaper me-1"></i>
            Berita & Artikel KSPM
        </span>

        <h1 class="fw-bold display-5 mb-3">
            {{ $berita->judul }}
        </h1>

        @if($berita->published_at)
        <p class="mb-0 opacity-75">
            <i class="bi bi-calendar3 me-1"></i>
            {{ $berita->published_at->locale('id')->translatedFormat('d F Y') }}
        </p>
        @endif
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">

                <article class="card border-0 shadow-sm rounded-4 overflow-hidden">

                    @if($berita->gambar)
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-100"
                        style="max-height:480px; object-fit:cover;">
                    @endif

                    <div class="card-body p-4 p-lg-5">

                        @if($berita->ringkasan)
                        <p class="lead text-secondary mb-4">
                            {{ $berita->ringkasan }}
                        </p>
                        @endif

                        <div class="text-dark" style="line-height:1.9; overflow-wrap:anywhere;">
                            {!! nl2br(e($berita->isi)) !!}
                        </div>

                    </div>
                </article>

                <div class="mt-4">
                    <a href="{{ route('berita.index') }}" class="btn btn-outline-success">
                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali ke Berita
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
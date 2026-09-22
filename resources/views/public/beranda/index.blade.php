@extends('layouts.public.app')

@section('title', 'Beranda | KSPM STMIK Adhi Guna')


@section('content')

{{-- =========================================================
     HERO
========================================================= --}}

<section class="bg-success text-white" style="background: linear-gradient(135deg, #0f5132, #198754);">

    <div class="container">

        <div class="row align-items-center min-vh-75 py-5">

            {{-- TEXT --}}
            <div class="col-lg-7 py-5">

                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill mb-3">

                    <i class="bi bi-graph-up-arrow me-1"></i>

                    Galeri Investasi KSPM

                </span>


                <h1 class="display-4 fw-bold mb-4">

                    Belajar Investasi.

                    <span class="text-warning">
                        Bertumbuh Bersama.
                    </span>

                </h1>


                <p class="lead text-white-50 mb-4">

                    Selamat datang di Galeri Investasi
                    KSPM STMIK Adhi Guna.

                    Temukan informasi, edukasi, kegiatan,
                    dan berbagai materi seputar pasar modal
                    dan investasi.

                </p>


                <div class="d-flex flex-wrap gap-2">

                    <a href="{{ url('/materi') }}" class="btn btn-warning btn-lg px-4">

                        <i class="bi bi-book me-2"></i>

                        Mulai Belajar

                    </a>


                    <a href="{{ url('/kegiatan') }}" class="btn btn-outline-light btn-lg px-4">

                        <i class="bi bi-calendar-event me-2"></i>

                        Lihat Kegiatan

                    </a>

                </div>

            </div>


            {{-- ICON / VISUAL --}}
            <div class="col-lg-5 text-center py-5">

                <div class="bg-white bg-opacity-10 rounded-4 p-5">

                    <i class="bi bi-bar-chart-line-fill text-warning" style="font-size: 150px;"></i>


                    <h4 class="fw-bold mt-4">
                        Investasi untuk Masa Depan
                    </h4>


                    <p class="text-white-50 mb-0">

                        Belajar memahami pasar modal
                        bersama KSPM.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
     STATISTIK
========================================================= --}}

<section class="py-5 bg-light">

    <div class="container">

        <div class="row g-4">

            {{-- Berita --}}
            <div class="col-6 col-lg-3">

                <div class="card border-0 shadow-sm h-100 text-center">

                    <div class="card-body p-4">

                        <i class="bi bi-newspaper text-success" style="font-size: 40px;"></i>

                        <h3 class="fw-bold mt-3 mb-1">
                            25+
                        </h3>

                        <p class="text-secondary mb-0">
                            Berita & Artikel
                        </p>

                    </div>

                </div>

            </div>


            {{-- Materi --}}
            <div class="col-6 col-lg-3">

                <div class="card border-0 shadow-sm h-100 text-center">

                    <div class="card-body p-4">

                        <i class="bi bi-book text-success" style="font-size: 40px;"></i>

                        <h3 class="fw-bold mt-3 mb-1">
                            15+
                        </h3>

                        <p class="text-secondary mb-0">
                            Materi Investasi
                        </p>

                    </div>

                </div>

            </div>


            {{-- Kegiatan --}}
            <div class="col-6 col-lg-3">

                <div class="card border-0 shadow-sm h-100 text-center">

                    <div class="card-body p-4">

                        <i class="bi bi-calendar-event text-success" style="font-size: 40px;"></i>

                        <h3 class="fw-bold mt-3 mb-1">
                            10+
                        </h3>

                        <p class="text-secondary mb-0">
                            Kegiatan
                        </p>

                    </div>

                </div>

            </div>


            {{-- Galeri --}}
            <div class="col-6 col-lg-3">

                <div class="card border-0 shadow-sm h-100 text-center">

                    <div class="card-body p-4">

                        <i class="bi bi-images text-success" style="font-size: 40px;"></i>

                        <h3 class="fw-bold mt-3 mb-1">
                            100+
                        </h3>

                        <p class="text-secondary mb-0">
                            Dokumentasi
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
     TENTANG KAMI
========================================================= --}}

<section class="py-5">

    <div class="container py-lg-4">

        <div class="row align-items-center g-5">

            {{-- ICON --}}
            <div class="col-lg-5">

                <div class="bg-success bg-opacity-10 rounded-4 text-center p-5">

                    <i class="bi bi-building text-success" style="font-size: 120px;"></i>

                </div>

            </div>


            {{-- TEXT --}}
            <div class="col-lg-7">

                <span class="text-success fw-semibold">
                    TENTANG KAMI
                </span>


                <h2 class="display-6 fw-bold mt-2 mb-4">

                    Pusat Informasi
                    Investasi Mahasiswa

                </h2>


                <p class="text-secondary">

                    Galeri Investasi KSPM STMIK Adhi Guna
                    hadir sebagai media informasi dan edukasi
                    bagi mahasiswa untuk mengenal dunia pasar
                    modal dan investasi.

                </p>


                <p class="text-secondary">

                    Melalui website ini, mahasiswa dapat
                    memperoleh informasi mengenai berita,
                    materi pembelajaran, kegiatan, serta
                    dokumentasi aktivitas KSPM.

                </p>


                <a href="{{ url('/materi') }}" class="btn btn-success px-4">

                    Pelajari Materi

                    <i class="bi bi-arrow-right ms-2"></i>

                </a>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
     BERITA TERBARU
========================================================= --}}

<section class="py-5 bg-light">

    <div class="container">

        <div class="d-flex justify-content-between align-items-end mb-4">

            <div>

                <span class="text-success fw-semibold">
                    INFORMASI TERKINI
                </span>

                <h2 class="fw-bold mt-2 mb-0">
                    Berita & Artikel
                </h2>

            </div>


            <a href="{{ url('/berita') }}" class="btn btn-outline-success">

                Lihat Semua

                <i class="bi bi-arrow-right ms-1"></i>

            </a>

        </div>


        <div class="row g-4">

            {{-- CARD 1 --}}
            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="bg-success bg-opacity-10 d-flex align-items-center justify-content-center"
                        style="height: 200px;">

                        <i class="bi bi-newspaper text-success" style="font-size: 70px;"></i>

                    </div>


                    <div class="card-body p-4">

                        <span class="badge bg-success mb-2">
                            Berita
                        </span>


                        <h5 class="fw-bold">
                            Informasi Pasar Modal
                        </h5>


                        <p class="text-secondary small">

                            Informasi dan perkembangan terbaru
                            seputar pasar modal Indonesia.

                        </p>


                        <a href="{{ url('/berita') }}" class="text-success fw-semibold text-decoration-none">

                            Baca Selengkapnya

                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- CARD 2 --}}
            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="bg-warning bg-opacity-10 d-flex align-items-center justify-content-center"
                        style="height: 200px;">

                        <i class="bi bi-graph-up-arrow text-warning" style="font-size: 70px;"></i>

                    </div>


                    <div class="card-body p-4">

                        <span class="badge bg-warning text-dark mb-2">
                            Artikel
                        </span>


                        <h5 class="fw-bold">
                            Mengenal Investasi
                        </h5>


                        <p class="text-secondary small">

                            Pelajari dasar-dasar investasi
                            dan pasar modal.

                        </p>


                        <a href="{{ url('/berita') }}" class="text-success fw-semibold text-decoration-none">

                            Baca Selengkapnya

                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- CARD 3 --}}
            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="bg-primary bg-opacity-10 d-flex align-items-center justify-content-center"
                        style="height: 200px;">

                        <i class="bi bi-lightbulb text-primary" style="font-size: 70px;"></i>

                    </div>


                    <div class="card-body p-4">

                        <span class="badge bg-primary mb-2">
                            Edukasi
                        </span>


                        <h5 class="fw-bold">
                            Literasi Investasi
                        </h5>


                        <p class="text-secondary small">

                            Tingkatkan pemahaman mengenai
                            investasi secara bertahap.

                        </p>


                        <a href="{{ url('/berita') }}" class="text-success fw-semibold text-decoration-none">

                            Baca Selengkapnya

                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
     KEGIATAN
========================================================= --}}

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-success fw-semibold">
                KEGIATAN KSPM
            </span>

            <h2 class="fw-bold mt-2">
                Kegiatan Terbaru
            </h2>

            <p class="text-secondary">
                Ikuti berbagai kegiatan edukasi dan pengembangan
                wawasan investasi bersama KSPM.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="bg-success text-white text-center p-5">

                        <i class="bi bi-calendar-check" style="font-size: 60px;"></i>

                    </div>


                    <div class="card-body p-4">

                        <span class="badge bg-success mb-2">
                            Kegiatan
                        </span>


                        <h5 class="fw-bold">
                            Seminar Pasar Modal
                        </h5>


                        <p class="text-secondary small">
                            Kegiatan edukasi mengenai
                            pasar modal dan investasi.
                        </p>


                        <a href="{{ url('/kegiatan') }}" class="btn btn-outline-success btn-sm">
                            Lihat Kegiatan
                        </a>

                    </div>

                </div>

            </div>


            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="bg-warning text-dark text-center p-5">

                        <i class="bi bi-mortarboard" style="font-size: 60px;"></i>

                    </div>


                    <div class="card-body p-4">

                        <span class="badge bg-warning text-dark mb-2">
                            Edukasi
                        </span>


                        <h5 class="fw-bold">
                            Coaching Investasi
                        </h5>


                        <p class="text-secondary small">
                            Belajar memahami investasi
                            bersama pemateri.
                        </p>


                        <a href="{{ url('/kegiatan') }}" class="btn btn-outline-success btn-sm">
                            Lihat Kegiatan
                        </a>

                    </div>

                </div>

            </div>


            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="bg-primary text-white text-center p-5">

                        <i class="bi bi-people" style="font-size: 60px;"></i>

                    </div>


                    <div class="card-body p-4">

                        <span class="badge bg-primary mb-2">
                            KSPM
                        </span>


                        <h5 class="fw-bold">
                            Kegiatan Organisasi
                        </h5>


                        <p class="text-secondary small">
                            Berbagai aktivitas dan program
                            KSPM STMIK Adhi Guna.
                        </p>


                        <a href="{{ url('/kegiatan') }}" class="btn btn-outline-success btn-sm">
                            Lihat Kegiatan
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
     CTA CHATBOT
========================================================= --}}

<section class="py-5">

    <div class="container">

        <div class="rounded-4 p-5 text-white" style="background: linear-gradient(135deg, #0f5132, #198754);">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <div class="d-flex align-items-center gap-3">

                        <div>

                            <i class="bi bi-robot" style="font-size: 60px;"></i>

                        </div>


                        <div>

                            <h3 class="fw-bold mb-2">
                                Punya Pertanyaan Seputar Investasi?
                            </h3>

                            <p class="text-white-50 mb-0">

                                Gunakan chatbot untuk mendapatkan
                                informasi dan bantuan seputar
                                Galeri Investasi KSPM.

                            </p>

                        </div>

                    </div>

                </div>


                <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">

                    <a href="{{ url('/chatbot') }}" class="btn btn-warning btn-lg px-4">

                        <i class="bi bi-chat-dots me-2"></i>

                        Tanya Chatbot

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
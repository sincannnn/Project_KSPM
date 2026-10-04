@extends('layouts.public.app')

@section('title', 'Galeri | KSPM STMIK Adhi Guna')

@section('content')

<!-- HEADER -->
<section class="py-5 text-white"
    style="background: linear-gradient(135deg, #0f3d2e, #176044);">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <span class="badge bg-warning text-dark mb-3 px-3 py-2">

                    <i class="bi bi-images me-1"></i>

                    Dokumentasi KSPM

                </span>

                <h1 class="fw-bold display-5 mb-3">
                    Galeri Kegiatan
                </h1>

                <p class="lead mb-0 opacity-75">

                    Lihat berbagai dokumentasi kegiatan,
                    seminar, pelatihan, dan aktivitas KSPM
                    STMIK Adhi Guna.

                </p>

            </div>


            <div class="col-lg-4 text-center d-none d-lg-block">

                <i class="bi bi-images"
                    style="font-size: 8rem; opacity: .15;">
                </i>

            </div>

        </div>

    </div>

</section>


<!-- CONTENT -->
<section class="py-5 bg-light">

    <div class="container">


        <!-- SEARCH & FILTER -->

        <div class="card border-0 shadow-sm rounded-4 mb-5">

            <div class="card-body p-4">

                <div class="row g-3">

                    <!-- SEARCH -->

                    <div class="col-lg-7">

                        <div class="input-group">

                            <span class="input-group-text bg-white">

                                <i class="bi bi-search"></i>

                            </span>

                            <input
                                type="text"
                                class="form-control"
                                placeholder="Cari dokumentasi..."
                            >

                        </div>

                    </div>


                    <!-- FILTER -->

                    <div class="col-lg-5">

                        <select class="form-select">

                            <option selected>
                                Semua Kategori
                            </option>

                            <option>
                                Seminar
                            </option>

                            <option>
                                Workshop
                            </option>

                            <option>
                                Pelatihan
                            </option>

                            <option>
                                Kegiatan KSPM
                            </option>

                            <option>
                                Organisasi
                            </option>

                        </select>

                    </div>

                </div>

            </div>

        </div>


        <!-- TITLE -->

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold mb-1">
                    Dokumentasi Terbaru
                </h2>

                <p class="text-muted mb-0">

                    Momen dan kegiatan KSPM STMIK Adhi Guna.

                </p>

            </div>

            <span class="badge bg-success-subtle text-success px-3 py-2">

                6 Galeri

            </span>

        </div>


        <!-- GALERI GRID -->

        <div class="row g-4">


            <!-- GALERI 1 -->

            <div class="col-6 col-md-4">

                <a
                    href="/galeri/seminar-pengenalan-pasar-modal"
                    class="text-decoration-none">

                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">

                        <div
                            class="position-relative bg-success d-flex align-items-center justify-content-center"
                            style="height:250px;">

                            <i class="bi bi-bar-chart-line text-white"
                                style="font-size:5rem; opacity:.8;">
                            </i>


                            <span
                                class="badge bg-warning text-dark position-absolute top-0 end-0 m-3">

                                Seminar

                            </span>


                            <div
                                class="position-absolute bottom-0 start-0 end-0 p-3 text-white"
                                style="background: linear-gradient(transparent, rgba(0,0,0,.8));">

                                <h5 class="fw-bold mb-1">

                                    Seminar Pengenalan Pasar Modal

                                </h5>

                                <small>

                                    20 September 2026

                                </small>

                            </div>

                        </div>

                    </div>

                </a>

            </div>


            <!-- GALERI 2 -->

            <div class="col-6 col-md-4">

                <a
                    href="/galeri/workshop-analisis-saham"
                    class="text-decoration-none">

                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">

                        <div
                            class="position-relative bg-dark d-flex align-items-center justify-content-center"
                            style="height:250px;">

                            <i class="bi bi-graph-up-arrow text-white"
                                style="font-size:5rem; opacity:.8;">
                            </i>


                            <span
                                class="badge bg-warning text-dark position-absolute top-0 end-0 m-3">

                                Workshop

                            </span>


                            <div
                                class="position-absolute bottom-0 start-0 end-0 p-3 text-white"
                                style="background: linear-gradient(transparent, rgba(0,0,0,.8));">

                                <h5 class="fw-bold mb-1">

                                    Workshop Analisis Saham

                                </h5>

                                <small>

                                    27 September 2026

                                </small>

                            </div>

                        </div>

                    </div>

                </a>

            </div>


            <!-- GALERI 3 -->

            <div class="col-6 col-md-4">

                <a
                    href="/galeri/pelatihan-investasi-pemula"
                    class="text-decoration-none">

                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">

                        <div
                            class="position-relative bg-success d-flex align-items-center justify-content-center"
                            style="height:250px;">

                            <i class="bi bi-mortarboard text-white"
                                style="font-size:5rem; opacity:.8;">
                            </i>


                            <span
                                class="badge bg-warning text-dark position-absolute top-0 end-0 m-3">

                                Pelatihan

                            </span>


                            <div
                                class="position-absolute bottom-0 start-0 end-0 p-3 text-white"
                                style="background: linear-gradient(transparent, rgba(0,0,0,.8));">

                                <h5 class="fw-bold mb-1">

                                    Pelatihan Investasi Pemula

                                </h5>

                                <small>

                                    5 Oktober 2026

                                </small>

                            </div>

                        </div>

                    </div>

                </a>

            </div>


            <!-- GALERI 4 -->

            <div class="col-6 col-md-4">

                <a
                    href="/galeri/diskusi-pasar-modal"
                    class="text-decoration-none">

                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">

                        <div
                            class="position-relative bg-secondary d-flex align-items-center justify-content-center"
                            style="height:250px;">

                            <i class="bi bi-chat-square-text text-white"
                                style="font-size:5rem; opacity:.8;">
                            </i>


                            <span
                                class="badge bg-warning text-dark position-absolute top-0 end-0 m-3">

                                Diskusi

                            </span>


                            <div
                                class="position-absolute bottom-0 start-0 end-0 p-3 text-white"
                                style="background: linear-gradient(transparent, rgba(0,0,0,.8));">

                                <h5 class="fw-bold mb-1">

                                    Diskusi Pasar Modal

                                </h5>

                                <small>

                                    12 Oktober 2026

                                </small>

                            </div>

                        </div>

                    </div>

                </a>

            </div>


            <!-- GALERI 5 -->

            <div class="col-6 col-md-4">

                <a
                    href="/galeri/seminar-investasi-syariah"
                    class="text-decoration-none">

                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">

                        <div
                            class="position-relative bg-dark d-flex align-items-center justify-content-center"
                            style="height:250px;">

                            <i class="bi bi-buildings text-white"
                                style="font-size:5rem; opacity:.8;">
                            </i>


                            <span
                                class="badge bg-warning text-dark position-absolute top-0 end-0 m-3">

                                Seminar

                            </span>


                            <div
                                class="position-absolute bottom-0 start-0 end-0 p-3 text-white"
                                style="background: linear-gradient(transparent, rgba(0,0,0,.8));">

                                <h5 class="fw-bold mb-1">

                                    Seminar Investasi Syariah

                                </h5>

                                <small>

                                    19 Oktober 2026

                                </small>

                            </div>

                        </div>

                    </div>

                </a>

            </div>


            <!-- GALERI 6 -->

            <div class="col-6 col-md-4">

                <a
                    href="/galeri/gathering-anggota-kspm"
                    class="text-decoration-none">

                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">

                        <div
                            class="position-relative bg-success d-flex align-items-center justify-content-center"
                            style="height:250px;">

                            <i class="bi bi-people text-white"
                                style="font-size:5rem; opacity:.8;">
                            </i>


                            <span
                                class="badge bg-warning text-dark position-absolute top-0 end-0 m-3">

                                Organisasi

                            </span>


                            <div
                                class="position-absolute bottom-0 start-0 end-0 p-3 text-white"
                                style="background: linear-gradient(transparent, rgba(0,0,0,.8));">

                                <h5 class="fw-bold mb-1">

                                    Gathering Anggota KSPM

                                </h5>

                                <small>

                                    26 Oktober 2026

                                </small>

                            </div>

                        </div>

                    </div>

                </a>

            </div>

        </div>


        <!-- PAGINATION -->

        <nav class="mt-5">

            <ul class="pagination justify-content-center">

                <li class="page-item disabled">

                    <a class="page-link">
                        Previous
                    </a>

                </li>

                <li class="page-item active">

                    <a class="page-link bg-success border-success">
                        1
                    </a>

                </li>

                <li class="page-item">

                    <a class="page-link">
                        2
                    </a>

                </li>

                <li class="page-item">

                    <a class="page-link">
                        3
                    </a>

                </li>

                <li class="page-item">

                    <a class="page-link">
                        Next
                    </a>

                </li>

            </ul>

        </nav>

    </div>

</section>

@endsection
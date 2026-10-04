@extends('layouts.public.app')

@section('title', 'Detail Galeri | KSPM STMIK Adhi Guna')

@section('content')

<!-- HEADER -->

<section class="py-5 text-white"
    style="background: linear-gradient(135deg, #0f3d2e, #176044);">

    <div class="container">

        <span class="badge bg-warning text-dark mb-3 px-3 py-2">

            <i class="bi bi-images me-1"></i>

            Dokumentasi Kegiatan

        </span>

        <h1 class="fw-bold display-5 mb-3">

            Seminar Pengenalan Pasar Modal

        </h1>

        <div class="d-flex flex-wrap gap-3 opacity-75">

            <span>

                <i class="bi bi-calendar3 me-1"></i>

                20 September 2026

            </span>

            <span>

                <i class="bi bi-geo-alt me-1"></i>

                STMIK Adhi Guna

            </span>

        </div>

    </div>

</section>


<!-- CONTENT -->

<section class="py-5 bg-light">

    <div class="container">

        <!-- DESCRIPTION -->

        <div class="row justify-content-center mb-5">

            <div class="col-lg-9 text-center">

                <h2 class="fw-bold mb-3">

                    Dokumentasi Kegiatan

                </h2>

                <p class="text-muted">

                    Dokumentasi Seminar Pengenalan Pasar Modal
                    yang diselenggarakan oleh KSPM STMIK Adhi Guna.

                </p>

            </div>

        </div>


        <!-- PHOTO GRID -->

        <div class="row g-4">


            <!-- FOTO 1 -->

            <div class="col-6 col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                    <div
                        class="bg-success d-flex align-items-center justify-content-center"
                        style="height:280px;">

                        <i class="bi bi-image text-white"
                            style="font-size:5rem; opacity:.7;">
                        </i>

                    </div>

                </div>

            </div>


            <!-- FOTO 2 -->

            <div class="col-6 col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                    <div
                        class="bg-dark d-flex align-items-center justify-content-center"
                        style="height:280px;">

                        <i class="bi bi-image text-white"
                            style="font-size:5rem; opacity:.7;">
                        </i>

                    </div>

                </div>

            </div>


            <!-- FOTO 3 -->

            <div class="col-6 col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                    <div
                        class="bg-secondary d-flex align-items-center justify-content-center"
                        style="height:280px;">

                        <i class="bi bi-image text-white"
                            style="font-size:5rem; opacity:.7;">
                        </i>

                    </div>

                </div>

            </div>


            <!-- FOTO 4 -->

            <div class="col-6 col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                    <div
                        class="bg-success d-flex align-items-center justify-content-center"
                        style="height:280px;">

                        <i class="bi bi-image text-white"
                            style="font-size:5rem; opacity:.7;">
                        </i>

                    </div>

                </div>

            </div>


            <!-- FOTO 5 -->

            <div class="col-6 col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                    <div
                        class="bg-dark d-flex align-items-center justify-content-center"
                        style="height:280px;">

                        <i class="bi bi-image text-white"
                            style="font-size:5rem; opacity:.7;">
                        </i>

                    </div>

                </div>

            </div>


            <!-- FOTO 6 -->

            <div class="col-6 col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                    <div
                        class="bg-secondary d-flex align-items-center justify-content-center"
                        style="height:280px;">

                        <i class="bi bi-image text-white"
                            style="font-size:5rem; opacity:.7;">
                        </i>

                    </div>

                </div>

            </div>

        </div>


        <!-- INFORMATION -->

        <div class="row justify-content-center mt-5">

            <div class="col-lg-8">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-4">

                            Informasi Dokumentasi

                        </h5>


                        <div class="row g-4">

                            <div class="col-md-4">

                                <small class="text-muted d-block">

                                    Kegiatan

                                </small>

                                <strong>

                                    Seminar

                                </strong>

                            </div>


                            <div class="col-md-4">

                                <small class="text-muted d-block">

                                    Tanggal

                                </small>

                                <strong>

                                    20 September 2026

                                </strong>

                            </div>


                            <div class="col-md-4">

                                <small class="text-muted d-block">

                                    Lokasi

                                </small>

                                <strong>

                                    STMIK Adhi Guna

                                </strong>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- BACK BUTTON -->

        <div class="text-center mt-5">

            <a
                href="/galeri"
                class="btn btn-outline-success px-4 rounded-3">

                <i class="bi bi-arrow-left me-1"></i>

                Kembali ke Galeri

            </a>

        </div>

    </div>

</section>

@endsection
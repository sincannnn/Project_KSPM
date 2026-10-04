@extends('layouts.public.app')

@section('title', 'Detail Kegiatan | KSPM STMIK Adhi Guna')

@section('content')

<!-- HEADER -->

<section class="py-5 text-white"
    style="background: linear-gradient(135deg, #0f3d2e, #176044);">

    <div class="container">

        <span class="badge bg-warning text-dark mb-3 px-3 py-2">
            Seminar
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
                <i class="bi bi-clock me-1"></i>
                09.00 WITA
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

        <div class="row g-4">


            <!-- MAIN CONTENT -->

            <div class="col-lg-8">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">


                    <!-- IMAGE / COVER -->

                    <div
                        class="bg-success d-flex align-items-center justify-content-center"
                        style="height:350px;">

                        <i class="bi bi-bar-chart-line text-white"
                            style="font-size:8rem; opacity:.8;">
                        </i>

                    </div>


                    <!-- DESCRIPTION -->

                    <div class="card-body p-4 p-lg-5">

                        <h3 class="fw-bold mb-4">
                            Tentang Kegiatan
                        </h3>


                        <p class="text-muted">

                            Seminar Pengenalan Pasar Modal merupakan kegiatan
                            edukasi yang diselenggarakan oleh KSPM STMIK Adhi
                            Guna untuk memberikan pemahaman dasar mengenai
                            pasar modal kepada mahasiswa.

                        </p>


                        <p class="text-muted">

                            Melalui kegiatan ini, peserta akan mendapatkan
                            pengetahuan mengenai investasi, saham, risiko
                            investasi, serta bagaimana cara memulai investasi
                            secara bijak.

                        </p>


                        <!-- MATERI -->

                        <h4 class="fw-bold mt-5 mb-3">

                            Materi Kegiatan

                        </h4>


                        <ul class="list-group list-group-flush mb-4">

                            <li class="list-group-item px-0">

                                <i class="bi bi-check-circle-fill text-success me-2"></i>

                                Pengenalan pasar modal

                            </li>

                            <li class="list-group-item px-0">

                                <i class="bi bi-check-circle-fill text-success me-2"></i>

                                Mengenal saham

                            </li>

                            <li class="list-group-item px-0">

                                <i class="bi bi-check-circle-fill text-success me-2"></i>

                                Risiko dan keuntungan investasi

                            </li>

                            <li class="list-group-item px-0">

                                <i class="bi bi-check-circle-fill text-success me-2"></i>

                                Cara memulai investasi

                            </li>

                        </ul>


                        <!-- NARASUMBER -->

                        <h4 class="fw-bold mt-5 mb-3">

                            Narasumber

                        </h4>


                        <div class="d-flex align-items-center gap-3">

                            <div
                                class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center"
                                style="width:55px;height:55px;">

                                <i class="bi bi-person fs-4"></i>

                            </div>


                            <div>

                                <h6 class="fw-bold mb-1">

                                    Pemateri Investasi

                                </h6>

                                <small class="text-muted">

                                    Praktisi Pasar Modal

                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- SIDEBAR -->

            <div class="col-lg-4">


                <!-- INFORMATION -->

                <div class="card border-0 shadow-sm rounded-4 mb-4">

                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-4">

                            Informasi Kegiatan

                        </h5>


                        <div class="mb-3">

                            <small class="text-muted d-block">
                                Tanggal
                            </small>

                            <strong>
                                20 September 2026
                            </strong>

                        </div>


                        <div class="mb-3">

                            <small class="text-muted d-block">
                                Waktu
                            </small>

                            <strong>
                                09.00 – 12.00 WITA
                            </strong>

                        </div>


                        <div class="mb-3">

                            <small class="text-muted d-block">
                                Lokasi
                            </small>

                            <strong>
                                STMIK Adhi Guna
                            </strong>

                        </div>


                        <div class="mb-4">

                            <small class="text-muted d-block">
                                Kuota
                            </small>

                            <strong>
                                50 Peserta
                            </strong>

                        </div>


                        <!-- BUTTON DAFTAR -->

                        <a
                            href="/kegiatan/seminar-pengenalan-pasar-modal/daftar"
                            class="btn btn-success w-100 py-2 rounded-3">

                            <i class="bi bi-pencil-square me-1"></i>

                            Daftar Kegiatan

                        </a>

                    </div>

                </div>


                <!-- SHARE -->

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4">

                        <h5 class="fw-bold">

                            Bagikan Kegiatan

                        </h5>

                        <p class="text-muted small">

                            Bagikan informasi kegiatan kepada temanmu.

                        </p>


                        <div class="d-flex gap-2">

                            <button class="btn btn-outline-success">

                                <i class="bi bi-whatsapp"></i>

                            </button>


                            <button class="btn btn-outline-primary">

                                <i class="bi bi-facebook"></i>

                            </button>


                            <button class="btn btn-outline-dark">

                                <i class="bi bi-link-45deg"></i>

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- BACK BUTTON -->

        <div class="mt-4">

            <a
                href="/kegiatan"
                class="btn btn-outline-secondary">

                <i class="bi bi-arrow-left me-1"></i>

                Kembali ke Kegiatan

            </a>

        </div>

    </div>

</section>

@endsection
@extends('layouts.public.app')

@section('title', 'Kegiatan | KSPM STMIK Adhi Guna')

@section('content')

<!-- HEADER -->
<section class="py-5 text-white"
    style="background: linear-gradient(135deg, #0f3d2e, #176044);">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <span class="badge bg-warning text-dark mb-3 px-3 py-2">
                    <i class="bi bi-calendar-event me-1"></i>
                    Kegiatan KSPM
                </span>

                <h1 class="fw-bold display-5 mb-3">
                    Kegiatan
                </h1>

                <p class="lead mb-0 opacity-75">
                    Temukan berbagai kegiatan edukasi, seminar,
                    pelatihan, dan aktivitas investasi yang diselenggarakan
                    oleh KSPM STMIK Adhi Guna.
                </p>

            </div>

            <div class="col-lg-4 text-center d-none d-lg-block">

                <i class="bi bi-calendar2-week"
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

                    <div class="col-lg-7">

                        <div class="input-group">

                            <span class="input-group-text bg-white">
                                <i class="bi bi-search"></i>
                            </span>

                            <input
                                type="text"
                                class="form-control"
                                placeholder="Cari kegiatan..."
                            >

                        </div>

                    </div>

                    <div class="col-lg-5">

                        <select class="form-select">

                            <option selected>
                                Semua Kegiatan
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
                                Diskusi
                            </option>

                            <option>
                                Lainnya
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
                    Kegiatan Terbaru
                </h2>

                <p class="text-muted mb-0">
                    Ikuti kegiatan dan tingkatkan pengetahuanmu.
                </p>

            </div>

            <span class="badge bg-success-subtle text-success px-3 py-2">
                6 Kegiatan
            </span>

        </div>


        <!-- KEGIATAN -->

        <div class="row g-4">


            <!-- KEGIATAN 1 -->

            <div class="col-md-6 col-lg-4">

                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                    <div class="position-relative">

                        <div
                            class="bg-success d-flex align-items-center justify-content-center"
                            style="height:220px;">

                            <i class="bi bi-bar-chart-line text-white"
                                style="font-size:5rem; opacity:.8;">
                            </i>

                        </div>

                        <span
                            class="badge bg-warning text-dark position-absolute top-0 end-0 m-3">

                            Seminar

                        </span>

                    </div>


                    <div class="card-body p-4">

                        <small class="text-success fw-semibold">

                            <i class="bi bi-calendar3 me-1"></i>

                            20 September 2026

                        </small>


                        <h5 class="fw-bold mt-2">

                            Seminar Pengenalan Pasar Modal

                        </h5>


                        <p class="text-muted small">

                            Pengenalan dasar pasar modal dan investasi
                            bagi mahasiswa.

                        </p>


                        <div class="d-flex align-items-center text-muted small mb-3">

                            <i class="bi bi-geo-alt me-2"></i>

                            STMIK Adhi Guna

                        </div>


                        <a
                            href="/kegiatan/seminar-pengenalan-pasar-modal"
                            class="btn btn-outline-success w-100 rounded-3">

                            Lihat Detail

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>


            <!-- KEGIATAN 2 -->

            <div class="col-md-6 col-lg-4">

                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                    <div class="position-relative">

                        <div
                            class="bg-dark d-flex align-items-center justify-content-center"
                            style="height:220px;">

                            <i class="bi bi-graph-up-arrow text-white"
                                style="font-size:5rem; opacity:.8;">
                            </i>

                        </div>

                        <span
                            class="badge bg-warning text-dark position-absolute top-0 end-0 m-3">

                            Workshop

                        </span>

                    </div>


                    <div class="card-body p-4">

                        <small class="text-success fw-semibold">

                            <i class="bi bi-calendar3 me-1"></i>

                            27 September 2026

                        </small>


                        <h5 class="fw-bold mt-2">

                            Workshop Analisis Saham

                        </h5>


                        <p class="text-muted small">

                            Belajar mengenal analisis fundamental dan
                            teknikal saham.

                        </p>


                        <div class="d-flex align-items-center text-muted small mb-3">

                            <i class="bi bi-geo-alt me-2"></i>

                            Laboratorium STMIK Adhi Guna

                        </div>


                        <a
                            href="/kegiatan/workshop-analisis-saham"
                            class="btn btn-outline-success w-100 rounded-3">

                            Lihat Detail

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>


            <!-- KEGIATAN 3 -->

            <div class="col-md-6 col-lg-4">

                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                    <div class="position-relative">

                        <div
                            class="bg-success d-flex align-items-center justify-content-center"
                            style="height:220px;">

                            <i class="bi bi-mortarboard text-white"
                                style="font-size:5rem; opacity:.8;">
                            </i>

                        </div>

                        <span
                            class="badge bg-warning text-dark position-absolute top-0 end-0 m-3">

                            Pelatihan

                        </span>

                    </div>


                    <div class="card-body p-4">

                        <small class="text-success fw-semibold">

                            <i class="bi bi-calendar3 me-1"></i>

                            5 Oktober 2026

                        </small>


                        <h5 class="fw-bold mt-2">

                            Pelatihan Investasi untuk Pemula

                        </h5>


                        <p class="text-muted small">

                            Pelatihan dasar untuk mahasiswa yang ingin
                            mulai mengenal dunia investasi.

                        </p>


                        <div class="d-flex align-items-center text-muted small mb-3">

                            <i class="bi bi-geo-alt me-2"></i>

                            STMIK Adhi Guna

                        </div>


                        <a
                            href="/kegiatan/pelatihan-investasi-pemula"
                            class="btn btn-outline-success w-100 rounded-3">

                            Lihat Detail

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>


            <!-- KEGIATAN 4 -->

            <div class="col-md-6 col-lg-4">

                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                    <div class="position-relative">

                        <div
                            class="bg-secondary d-flex align-items-center justify-content-center"
                            style="height:220px;">

                            <i class="bi bi-chat-square-text text-white"
                                style="font-size:5rem; opacity:.8;">
                            </i>

                        </div>

                        <span
                            class="badge bg-warning text-dark position-absolute top-0 end-0 m-3">

                            Diskusi

                        </span>

                    </div>


                    <div class="card-body p-4">

                        <small class="text-success fw-semibold">

                            <i class="bi bi-calendar3 me-1"></i>

                            12 Oktober 2026

                        </small>


                        <h5 class="fw-bold mt-2">

                            Diskusi Pasar Modal

                        </h5>


                        <p class="text-muted small">

                            Forum diskusi mahasiswa mengenai perkembangan
                            pasar modal.

                        </p>


                        <div class="d-flex align-items-center text-muted small mb-3">

                            <i class="bi bi-geo-alt me-2"></i>

                            Ruang KSPM

                        </div>


                        <a
                            href="/kegiatan/diskusi-pasar-modal"
                            class="btn btn-outline-success w-100 rounded-3">

                            Lihat Detail

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>


            <!-- KEGIATAN 5 -->

            <div class="col-md-6 col-lg-4">

                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                    <div class="position-relative">

                        <div
                            class="bg-dark d-flex align-items-center justify-content-center"
                            style="height:220px;">

                            <i class="bi bi-buildings text-white"
                                style="font-size:5rem; opacity:.8;">
                            </i>

                        </div>

                        <span
                            class="badge bg-warning text-dark position-absolute top-0 end-0 m-3">

                            Seminar

                        </span>

                    </div>


                    <div class="card-body p-4">

                        <small class="text-success fw-semibold">

                            <i class="bi bi-calendar3 me-1"></i>

                            19 Oktober 2026

                        </small>


                        <h5 class="fw-bold mt-2">

                            Seminar Investasi Syariah

                        </h5>


                        <p class="text-muted small">

                            Mengenal prinsip dan instrumen investasi
                            berdasarkan prinsip syariah.

                        </p>


                        <div class="d-flex align-items-center text-muted small mb-3">

                            <i class="bi bi-geo-alt me-2"></i>

                            Aula STMIK Adhi Guna

                        </div>


                        <a
                            href="/kegiatan/seminar-investasi-syariah"
                            class="btn btn-outline-success w-100 rounded-3">

                            Lihat Detail

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>


            <!-- KEGIATAN 6 -->

            <div class="col-md-6 col-lg-4">

                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                    <div class="position-relative">

                        <div
                            class="bg-success d-flex align-items-center justify-content-center"
                            style="height:220px;">

                            <i class="bi bi-people text-white"
                                style="font-size:5rem; opacity:.8;">
                            </i>

                        </div>

                        <span
                            class="badge bg-warning text-dark position-absolute top-0 end-0 m-3">

                            Kegiatan

                        </span>

                    </div>


                    <div class="card-body p-4">

                        <small class="text-success fw-semibold">

                            <i class="bi bi-calendar3 me-1"></i>

                            26 Oktober 2026

                        </small>


                        <h5 class="fw-bold mt-2">

                            Gathering Anggota KSPM

                        </h5>


                        <p class="text-muted small">

                            Kegiatan kebersamaan dan pengembangan anggota
                            KSPM STMIK Adhi Guna.

                        </p>


                        <div class="d-flex align-items-center text-muted small mb-3">

                            <i class="bi bi-geo-alt me-2"></i>

                            STMIK Adhi Guna

                        </div>


                        <a
                            href="/kegiatan/gathering-anggota-kspm"
                            class="btn btn-outline-success w-100 rounded-3">

                            Lihat Detail

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

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
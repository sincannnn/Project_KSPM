@extends('layouts.public.app')

@section('title', 'Materi Investasi | KSPM STMIK Adhi Guna')


@section('content')

{{-- =========================================================
     HEADER
========================================================= --}}

<section class="bg-success text-white">

    <div class="container py-5">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <span class="badge bg-warning text-dark px-3 py-2 mb-3">

                    <i class="bi bi-book me-1"></i>

                    Pusat Edukasi

                </span>


                <h1 class="display-5 fw-bold mb-3">
                    Materi Investasi
                </h1>


                <p class="lead text-white-50 mb-0">

                    Pelajari berbagai materi mengenai investasi,
                    pasar modal, saham, dan literasi keuangan
                    secara bertahap.

                </p>

            </div>


            <div class="col-lg-4 text-center d-none d-lg-block">

                <i
                    class="bi bi-journal-bookmark-fill text-warning"
                    style="font-size: 130px;"
                ></i>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
     MATERI
========================================================= --}}

<section class="py-5 bg-light">

    <div class="container">


        {{-- SEARCH & FILTER --}}

        <div class="row g-3 mb-5">

            <div class="col-lg-8">

                <form>

                    <div class="input-group">

                        <span class="input-group-text bg-white">

                            <i class="bi bi-search"></i>

                        </span>


                        <input
                            type="text"
                            class="form-control"
                            placeholder="Cari materi investasi..."
                        >


                        <button
                            type="submit"
                            class="btn btn-success"
                        >
                            Cari
                        </button>

                    </div>

                </form>

            </div>


            <div class="col-lg-4">

                <select class="form-select">

                    <option selected>
                        Semua Materi
                    </option>

                    <option>
                        Dasar Investasi
                    </option>

                    <option>
                        Saham
                    </option>

                    <option>
                        Pasar Modal
                    </option>

                    <option>
                        Investasi Syariah
                    </option>

                    <option>
                        Analisis Saham
                    </option>

                </select>

            </div>

        </div>



        {{-- JUDUL --}}

        <div class="mb-4">

            <span class="text-success fw-semibold">
                MATERI PEMBELAJARAN
            </span>

            <h2 class="fw-bold mt-2">
                Belajar Investasi
            </h2>

            <p class="text-secondary mb-0">

                Pilih materi yang ingin kamu pelajari.

            </p>

        </div>



        {{-- CARD MATERI --}}

        <div class="row g-4">


            {{-- MATERI 1 --}}

            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div
                        class="bg-success bg-opacity-10 text-center p-5"
                    >

                        <i
                            class="bi bi-graph-up-arrow text-success"
                            style="font-size: 75px;"
                        ></i>

                    </div>


                    <div class="card-body p-4">

                        <span class="badge bg-success mb-3">
                            Dasar Investasi
                        </span>


                        <h5 class="fw-bold">
                            Pengenalan Investasi
                        </h5>


                        <p class="text-secondary">

                            Memahami pengertian investasi,
                            tujuan investasi, manfaat, dan risiko
                            yang perlu diketahui oleh pemula.

                        </p>


                        <div class="d-flex align-items-center text-secondary small mb-3">

                            <i class="bi bi-file-earmark-pdf me-2"></i>

                            PDF

                        </div>


                        <a
                            href="{{ url('/materi/pengenalan-investasi') }}"
                            class="btn btn-outline-success w-100"
                        >

                            Pelajari Materi

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>



            {{-- MATERI 2 --}}

            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div
                        class="bg-warning bg-opacity-10 text-center p-5"
                    >

                        <i
                            class="bi bi-bar-chart-fill text-warning"
                            style="font-size: 75px;"
                        ></i>

                    </div>


                    <div class="card-body p-4">

                        <span class="badge bg-warning text-dark mb-3">
                            Saham
                        </span>


                        <h5 class="fw-bold">
                            Mengenal Saham
                        </h5>


                        <p class="text-secondary">

                            Pelajari pengertian saham,
                            keuntungan, risiko, dan cara kerja
                            investasi saham.

                        </p>


                        <div class="d-flex align-items-center text-secondary small mb-3">

                            <i class="bi bi-file-earmark-pdf me-2"></i>

                            PDF

                        </div>


                        <a
                            href="{{ url('/materi/mengenal-saham') }}"
                            class="btn btn-outline-success w-100"
                        >

                            Pelajari Materi

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>



            {{-- MATERI 3 --}}

            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div
                        class="bg-primary bg-opacity-10 text-center p-5"
                    >

                        <i
                            class="bi bi-building text-primary"
                            style="font-size: 75px;"
                        ></i>

                    </div>


                    <div class="card-body p-4">

                        <span class="badge bg-primary mb-3">
                            Pasar Modal
                        </span>


                        <h5 class="fw-bold">
                            Pengenalan Pasar Modal
                        </h5>


                        <p class="text-secondary">

                            Mengenal pasar modal, fungsi,
                            pelaku pasar, dan instrumen yang
                            diperdagangkan.

                        </p>


                        <div class="d-flex align-items-center text-secondary small mb-3">

                            <i class="bi bi-file-earmark-pdf me-2"></i>

                            PDF

                        </div>


                        <a
                            href="{{ url('/materi/pengenalan-pasar-modal') }}"
                            class="btn btn-outline-success w-100"
                        >

                            Pelajari Materi

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>



            {{-- MATERI 4 --}}

            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div
                        class="bg-info bg-opacity-10 text-center p-5"
                    >

                        <i
                            class="bi bi-shield-check text-info"
                            style="font-size: 75px;"
                        ></i>

                    </div>


                    <div class="card-body p-4">

                        <span class="badge bg-info mb-3">
                            Investasi Syariah
                        </span>


                        <h5 class="fw-bold">
                            Saham Syariah
                        </h5>


                        <p class="text-secondary">

                            Memahami konsep saham syariah,
                            prinsip syariah, dan indeks saham
                            syariah di Indonesia.

                        </p>


                        <div class="d-flex align-items-center text-secondary small mb-3">

                            <i class="bi bi-file-earmark-pdf me-2"></i>

                            PDF

                        </div>


                        <a
                            href="{{ url('/materi/saham-syariah') }}"
                            class="btn btn-outline-success w-100"
                        >

                            Pelajari Materi

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>



            {{-- MATERI 5 --}}

            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div
                        class="bg-danger bg-opacity-10 text-center p-5"
                    >

                        <i
                            class="bi bi-pie-chart-fill text-danger"
                            style="font-size: 75px;"
                        ></i>

                    </div>


                    <div class="card-body p-4">

                        <span class="badge bg-danger mb-3">
                            Analisis
                        </span>


                        <h5 class="fw-bold">
                            Analisis Fundamental
                        </h5>


                        <p class="text-secondary">

                            Pengenalan analisis fundamental
                            untuk membantu memahami kondisi
                            perusahaan.

                        </p>


                        <div class="d-flex align-items-center text-secondary small mb-3">

                            <i class="bi bi-file-earmark-pdf me-2"></i>

                            PDF

                        </div>


                        <a
                            href="{{ url('/materi/analisis-fundamental') }}"
                            class="btn btn-outline-success w-100"
                        >

                            Pelajari Materi

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>



            {{-- MATERI 6 --}}

            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div
                        class="bg-secondary bg-opacity-10 text-center p-5"
                    >

                        <i
                            class="bi bi-bar-chart-line text-secondary"
                            style="font-size: 75px;"
                        ></i>

                    </div>


                    <div class="card-body p-4">

                        <span class="badge bg-secondary mb-3">
                            Analisis
                        </span>


                        <h5 class="fw-bold">
                            Analisis Teknikal
                        </h5>


                        <p class="text-secondary">

                            Mengenal dasar analisis teknikal,
                            grafik harga, tren, dan indikator
                            dalam perdagangan saham.

                        </p>


                        <div class="d-flex align-items-center text-secondary small mb-3">

                            <i class="bi bi-file-earmark-pdf me-2"></i>

                            PDF

                        </div>


                        <a
                            href="{{ url('/materi/analisis-teknikal') }}"
                            class="btn btn-outline-success w-100"
                        >

                            Pelajari Materi

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>

        </div>



        {{-- PAGINATION --}}

        <div class="d-flex justify-content-center mt-5">

            <nav>

                <ul class="pagination">

                    <li class="page-item disabled">

                        <a class="page-link">
                            Sebelumnya
                        </a>

                    </li>


                    <li class="page-item active">

                        <a
                            class="page-link bg-success border-success"
                            href="#"
                        >
                            1
                        </a>

                    </li>


                    <li class="page-item">

                        <a
                            class="page-link"
                            href="#"
                        >
                            2
                        </a>

                    </li>


                    <li class="page-item">

                        <a
                            class="page-link"
                            href="#"
                        >
                            3
                        </a>

                    </li>


                    <li class="page-item">

                        <a
                            class="page-link"
                            href="#"
                        >
                            Selanjutnya
                        </a>

                    </li>

                </ul>

            </nav>

        </div>

    </div>

</section>

@endsection
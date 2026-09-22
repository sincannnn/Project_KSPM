@extends('layouts.public.app')

@section('title', 'Berita & Artikel | KSPM STMIK Adhi Guna')


@section('content')

{{-- HEADER --}}
<section class="bg-success text-white">

    <div class="container py-5">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <span class="badge bg-warning text-dark mb-3 px-3 py-2">
                    <i class="bi bi-newspaper me-1"></i>
                    Informasi KSPM
                </span>

                <h1 class="display-5 fw-bold mb-3">
                    Berita & Artikel
                </h1>

                <p class="lead text-white-50 mb-0">
                    Temukan informasi terbaru, artikel edukasi,
                    dan perkembangan seputar pasar modal dan investasi.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- CONTENT --}}
<section class="py-5 bg-light">

    <div class="container">

        {{-- SEARCH --}}
        <div class="row mb-4">

            <div class="col-lg-8">

                <form>

                    <div class="input-group">

                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>

                        <input
                            type="text"
                            class="form-control"
                            placeholder="Cari berita atau artikel..."
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


            {{-- FILTER --}}
            <div class="col-lg-4 mt-3 mt-lg-0">

                <select class="form-select">

                    <option selected>
                        Semua Kategori
                    </option>

                    <option>
                        Berita
                    </option>

                    <option>
                        Artikel
                    </option>

                </select>

            </div>

        </div>


        {{-- LIST --}}
        <div class="row g-4">

            {{-- CARD 1 --}}
            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div
                        class="bg-success bg-opacity-10 d-flex align-items-center justify-content-center"
                        style="height: 220px;"
                    >

                        <i
                            class="bi bi-newspaper text-success"
                            style="font-size: 80px;"
                        ></i>

                    </div>


                    <div class="card-body p-4">

                        <div class="mb-2">

                            <span class="badge bg-success">
                                Berita
                            </span>

                            <small class="text-secondary ms-2">
                                22 September 2026
                            </small>

                        </div>


                        <h5 class="fw-bold">
                            Mengenal Pasar Modal Indonesia
                        </h5>


                        <p class="text-secondary">

                            Informasi dasar mengenai pasar modal
                            dan perannya dalam perekonomian Indonesia.

                        </p>


                        <a
                            href="{{ url('/berita/mengenal-pasar-modal-indonesia') }}"
                            class="btn btn-outline-success btn-sm"
                        >

                            Baca Selengkapnya

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- CARD 2 --}}
            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div
                        class="bg-warning bg-opacity-10 d-flex align-items-center justify-content-center"
                        style="height: 220px;"
                    >

                        <i
                            class="bi bi-graph-up-arrow text-warning"
                            style="font-size: 80px;"
                        ></i>

                    </div>


                    <div class="card-body p-4">

                        <div class="mb-2">

                            <span class="badge bg-warning text-dark">
                                Artikel
                            </span>

                            <small class="text-secondary ms-2">
                                20 September 2026
                            </small>

                        </div>


                        <h5 class="fw-bold">
                            Dasar-Dasar Investasi untuk Pemula
                        </h5>


                        <p class="text-secondary">

                            Panduan sederhana memahami investasi
                            sebelum mulai berinvestasi.

                        </p>


                        <a
                            href="{{ url('/berita/dasar-investasi-pemula') }}"
                            class="btn btn-outline-success btn-sm"
                        >

                            Baca Selengkapnya

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- CARD 3 --}}
            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div
                        class="bg-primary bg-opacity-10 d-flex align-items-center justify-content-center"
                        style="height: 220px;"
                    >

                        <i
                            class="bi bi-lightbulb text-primary"
                            style="font-size: 80px;"
                        ></i>

                    </div>


                    <div class="card-body p-4">

                        <div class="mb-2">

                            <span class="badge bg-success">
                                Edukasi
                            </span>

                            <small class="text-secondary ms-2">
                                18 September 2026
                            </small>

                        </div>


                        <h5 class="fw-bold">
                            Pentingnya Literasi Keuangan
                        </h5>


                        <p class="text-secondary">

                            Memahami pentingnya literasi keuangan
                            dalam mengelola keuangan pribadi.

                        </p>


                        <a
                            href="{{ url('/berita/pentingnya-literasi-keuangan') }}"
                            class="btn btn-outline-success btn-sm"
                        >

                            Baca Selengkapnya

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- CARD 4 --}}
            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div
                        class="bg-danger bg-opacity-10 d-flex align-items-center justify-content-center"
                        style="height: 220px;"
                    >

                        <i
                            class="bi bi-bar-chart text-danger"
                            style="font-size: 80px;"
                        ></i>

                    </div>


                    <div class="card-body p-4">

                        <div class="mb-2">

                            <span class="badge bg-success">
                                Berita
                            </span>

                            <small class="text-secondary ms-2">
                                15 September 2026
                            </small>

                        </div>


                        <h5 class="fw-bold">
                            Perkembangan Pasar Modal
                        </h5>


                        <p class="text-secondary">

                            Informasi mengenai perkembangan
                            pasar modal dan aktivitas investasi.

                        </p>


                        <a
                            href="{{ url('/berita/perkembangan-pasar-modal') }}"
                            class="btn btn-outline-success btn-sm"
                        >

                            Baca Selengkapnya

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- CARD 5 --}}
            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div
                        class="bg-info bg-opacity-10 d-flex align-items-center justify-content-center"
                        style="height: 220px;"
                    >

                        <i
                            class="bi bi-book text-info"
                            style="font-size: 80px;"
                        ></i>

                    </div>


                    <div class="card-body p-4">

                        <div class="mb-2">

                            <span class="badge bg-warning text-dark">
                                Artikel
                            </span>

                            <small class="text-secondary ms-2">
                                12 September 2026
                            </small>

                        </div>


                        <h5 class="fw-bold">
                            Mengenal Saham
                        </h5>


                        <p class="text-secondary">

                            Memahami konsep dasar saham
                            bagi investor pemula.

                        </p>


                        <a
                            href="{{ url('/berita/mengenal-saham') }}"
                            class="btn btn-outline-success btn-sm"
                        >

                            Baca Selengkapnya

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- CARD 6 --}}
            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div
                        class="bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center"
                        style="height: 220px;"
                    >

                        <i
                            class="bi bi-pie-chart text-secondary"
                            style="font-size: 80px;"
                        ></i>

                    </div>


                    <div class="card-body p-4">

                        <div class="mb-2">

                            <span class="badge bg-success">
                                Berita
                            </span>

                            <small class="text-secondary ms-2">
                                10 September 2026
                            </small>

                        </div>


                        <h5 class="fw-bold">
                            Edukasi Investasi Mahasiswa
                        </h5>


                        <p class="text-secondary">

                            Peran mahasiswa dalam meningkatkan
                            literasi investasi di lingkungan kampus.

                        </p>


                        <a
                            href="{{ url('/berita/edukasi-investasi-mahasiswa') }}"
                            class="btn btn-outline-success btn-sm"
                        >

                            Baca Selengkapnya

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

                        <a class="page-link bg-success border-success">
                            1
                        </a>

                    </li>

                    <li class="page-item">

                        <a class="page-link" href="#">
                            2
                        </a>

                    </li>

                    <li class="page-item">

                        <a class="page-link" href="#">
                            3
                        </a>

                    </li>

                    <li class="page-item">

                        <a class="page-link" href="#">
                            Selanjutnya
                        </a>

                    </li>

                </ul>

            </nav>

        </div>

    </div>

</section>

@endsection
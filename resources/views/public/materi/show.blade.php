@extends('layouts.public.app')

@section('title', 'Detail Materi | KSPM STMIK Adhi Guna')


@section('content')

{{-- HEADER --}}

<section class="bg-success text-white">

    <div class="container py-5">

        <div class="row">

            <div class="col-lg-9">

                <span class="badge bg-warning text-dark mb-3">

                    Dasar Investasi

                </span>


                <h1 class="display-5 fw-bold mb-3">

                    Pengenalan Investasi

                </h1>


                <p class="text-white-50 mb-0">

                    Materi pembelajaran dasar mengenai
                    investasi untuk pemula.

                </p>

            </div>

        </div>

    </div>

</section>



{{-- DETAIL --}}

<section class="py-5">

    <div class="container">

        <div class="row g-5">


            {{-- MAIN CONTENT --}}

            <div class="col-lg-8">

                <div class="card border-0 shadow-sm">

                    <div class="card-body p-4 p-lg-5">


                        <div class="text-center mb-5">

                            <div
                                class="bg-success bg-opacity-10 rounded-4 p-5"
                            >

                                <i
                                    class="bi bi-book text-success"
                                    style="font-size: 100px;"
                                ></i>

                            </div>

                        </div>


                        <h3 class="fw-bold mb-4">
                            Tentang Materi
                        </h3>


                        <p class="text-secondary">

                            Materi ini memberikan pemahaman dasar
                            mengenai investasi dan hal-hal yang perlu
                            diperhatikan sebelum seseorang memulai
                            aktivitas investasi.

                        </p>


                        <h4 class="fw-bold mt-5 mb-3">
                            Materi yang Dipelajari
                        </h4>


                        <ul class="list-group list-group-flush mb-4">

                            <li class="list-group-item px-0">

                                <i
                                    class="bi bi-check-circle-fill text-success me-2"
                                ></i>

                                Pengertian investasi

                            </li>


                            <li class="list-group-item px-0">

                                <i
                                    class="bi bi-check-circle-fill text-success me-2"
                                ></i>

                                Tujuan investasi

                            </li>


                            <li class="list-group-item px-0">

                                <i
                                    class="bi bi-check-circle-fill text-success me-2"
                                ></i>

                                Manfaat investasi

                            </li>


                            <li class="list-group-item px-0">

                                <i
                                    class="bi bi-check-circle-fill text-success me-2"
                                ></i>

                                Risiko investasi

                            </li>


                            <li class="list-group-item px-0">

                                <i
                                    class="bi bi-check-circle-fill text-success me-2"
                                ></i>

                                Jenis-jenis instrumen investasi

                            </li>

                        </ul>


                        <h4 class="fw-bold mt-5 mb-3">
                            Deskripsi
                        </h4>


                        <p class="text-secondary">

                            Investasi merupakan aktivitas menempatkan
                            sejumlah dana atau aset pada instrumen tertentu
                            dengan tujuan memperoleh manfaat atau hasil
                            pada masa yang akan datang.

                        </p>


                        <p class="text-secondary">

                            Sebelum melakukan investasi, investor perlu
                            memahami tujuan investasi, karakteristik
                            instrumen, tingkat risiko, dan jangka waktu
                            investasi.

                        </p>


                    </div>

                </div>

            </div>



            {{-- SIDEBAR --}}

            <div class="col-lg-4">


                {{-- INFO MATERI --}}

                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-4">
                            Informasi Materi
                        </h5>


                        <div class="d-flex mb-3">

                            <i
                                class="bi bi-folder2-open text-success me-3"
                            ></i>

                            <div>

                                <small class="text-secondary">
                                    Kategori
                                </small>

                                <div class="fw-semibold">
                                    Dasar Investasi
                                </div>

                            </div>

                        </div>


                        <div class="d-flex mb-3">

                            <i
                                class="bi bi-file-earmark-pdf text-danger me-3"
                            ></i>

                            <div>

                                <small class="text-secondary">
                                    Format
                                </small>

                                <div class="fw-semibold">
                                    PDF
                                </div>

                            </div>

                        </div>


                        <div class="d-flex mb-4">

                            <i
                                class="bi bi-calendar3 text-success me-3"
                            ></i>

                            <div>

                                <small class="text-secondary">
                                    Dipublikasikan
                                </small>

                                <div class="fw-semibold">
                                    22 September 2026
                                </div>

                            </div>

                        </div>


                        {{-- BUTTON DOWNLOAD --}}

                        <a
                            href="#"
                            class="btn btn-success w-100 mb-2"
                        >

                            <i class="bi bi-download me-2"></i>

                            Download Materi

                        </a>


                        <a
                            href="#"
                            class="btn btn-outline-success w-100"
                        >

                            <i class="bi bi-eye me-2"></i>

                            Lihat Materi

                        </a>

                    </div>

                </div>



                {{-- KEMBALI --}}

                <a
                    href="{{ url('/materi') }}"
                    class="btn btn-outline-secondary w-100"
                >

                    <i class="bi bi-arrow-left me-2"></i>

                    Kembali ke Materi

                </a>

            </div>

        </div>

    </div>

</section>

@endsection
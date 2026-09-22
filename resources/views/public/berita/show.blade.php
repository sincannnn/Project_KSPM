@extends('layouts.public.app')

@section('title', 'Detail Berita | KSPM STMIK Adhi Guna')


@section('content')

<section class="bg-success text-white">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                <span class="badge bg-warning text-dark mb-3">
                    Berita
                </span>

                <h1 class="display-5 fw-bold mb-3">
                    Mengenal Pasar Modal Indonesia
                </h1>

                <p class="text-white-50 mb-0">

                    <i class="bi bi-calendar3 me-1"></i>

                    22 September 2026

                </p>

            </div>

        </div>

    </div>

</section>


<section class="py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                {{-- GAMBAR --}}

                <div
                    class="bg-success bg-opacity-10 rounded-4 d-flex align-items-center justify-content-center mb-4"
                    style="height: 350px;"
                >

                    <i
                        class="bi bi-newspaper text-success"
                        style="font-size: 120px;"
                    ></i>

                </div>


                {{-- ISI --}}

                <article>

                    <p class="lead">

                        Pasar modal merupakan salah satu bagian
                        penting dalam sistem keuangan yang mempertemukan
                        pihak yang membutuhkan dana dengan pihak yang
                        memiliki dana.

                    </p>


                    <p>

                        Melalui pasar modal, masyarakat dapat
                        berinvestasi pada berbagai instrumen seperti
                        saham, obligasi, dan reksa dana.

                    </p>


                    <h3 class="fw-bold mt-5 mb-3">
                        Apa Itu Pasar Modal?
                    </h3>


                    <p>

                        Pasar modal adalah tempat berlangsungnya
                        kegiatan yang berkaitan dengan penawaran umum
                        dan perdagangan efek.

                    </p>


                    <p>

                        Pemahaman mengenai pasar modal menjadi penting
                        bagi mahasiswa yang ingin mulai mengenal dunia
                        investasi.

                    </p>


                    <h3 class="fw-bold mt-5 mb-3">
                        Pentingnya Edukasi Investasi
                    </h3>


                    <p>

                        Edukasi investasi membantu masyarakat memahami
                        risiko, tujuan, dan karakteristik setiap instrumen
                        investasi sebelum mengambil keputusan.

                    </p>

                </article>


                <hr class="my-5">


                <a
                    href="{{ url('/berita') }}"
                    class="btn btn-outline-success"
                >

                    <i class="bi bi-arrow-left me-2"></i>

                    Kembali ke Berita

                </a>

            </div>

        </div>

    </div>

</section>

@endsection
@extends('layouts.public.app')

@section('title', 'Pendaftaran Kegiatan | KSPM STMIK Adhi Guna')

@section('content')


<!-- HEADER -->

<section class="py-5 text-white"
    style="background: linear-gradient(135deg, #0f3d2e, #176044);">

    <div class="container">

        <span class="badge bg-warning text-dark mb-3 px-3 py-2">

            <i class="bi bi-pencil-square me-1"></i>

            Pendaftaran

        </span>


        <h1 class="fw-bold mb-2">

            Pendaftaran Kegiatan

        </h1>


        <p class="mb-0 opacity-75">

            Seminar Pengenalan Pasar Modal

        </p>

    </div>

</section>



<!-- FORM -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8">


                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4 p-lg-5">


                        <!-- TITLE -->

                        <div class="text-center mb-5">

                            <div
                                class="bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                style="width:70px;height:70px;">

                                <i class="bi bi-person-plus fs-2"></i>

                            </div>


                            <h3 class="fw-bold">

                                Form Pendaftaran

                            </h3>


                            <p class="text-muted">

                                Silakan lengkapi data berikut untuk
                                mengikuti kegiatan.

                            </p>

                        </div>



                        <!-- FORM -->

                        <form>


                            <!-- NAMA -->

                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    Nama Lengkap

                                </label>


                                <input
                                    type="text"
                                    class="form-control form-control-lg"
                                    placeholder="Masukkan nama lengkap"
                                    required
                                >

                            </div>



                            <!-- EMAIL -->

                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    Email

                                </label>


                                <input
                                    type="email"
                                    class="form-control form-control-lg"
                                    placeholder="contoh@email.com"
                                    required
                                >

                            </div>



                            <!-- NIM -->

                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    NIM

                                </label>


                                <input
                                    type="text"
                                    class="form-control form-control-lg"
                                    placeholder="Masukkan NIM"
                                    required
                                >

                            </div>



                            <!-- WHATSAPP -->

                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    Nomor WhatsApp

                                </label>


                                <input
                                    type="tel"
                                    class="form-control form-control-lg"
                                    placeholder="08xxxxxxxxxx"
                                    required
                                >

                            </div>



                            <!-- PROGRAM STUDI -->

                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    Program Studi

                                </label>


                                <select
                                    class="form-select form-select-lg"
                                    required>

                                    <option value="">

                                        Pilih Program Studi

                                    </option>

                                    <option>

                                        Sistem Informasi

                                    </option>

                                    <option>

                                        Teknik Informatika

                                    </option>

                                    <option>

                                        Manajemen Informatika

                                    </option>

                                </select>

                            </div>



                            <!-- CATATAN -->

                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    Catatan

                                    <span class="text-muted fw-normal">

                                        (Opsional)

                                    </span>

                                </label>


                                <textarea
                                    class="form-control"
                                    rows="4"
                                    placeholder="Tambahkan catatan jika diperlukan..."
                                ></textarea>

                            </div>



                            <!-- CHECKBOX -->

                            <div class="form-check mb-4">

                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="agreement"
                                    required
                                >


                                <label
                                    class="form-check-label text-muted"
                                    for="agreement">

                                    Saya menyatakan bahwa data yang saya
                                    masukkan sudah benar.

                                </label>

                            </div>



                            <!-- BUTTON -->

                            <button
                                type="submit"
                                class="btn btn-success btn-lg w-100 rounded-3">

                                <i class="bi bi-check-circle me-1"></i>

                                Daftar Sekarang

                            </button>

                        </form>

                    </div>

                </div>



                <!-- INFO -->

                <div class="alert alert-warning border-0 rounded-4 mt-4">

                    <i class="bi bi-info-circle me-2"></i>


                    <strong>Catatan:</strong>

                    Pendaftaran kegiatan akan terhubung dengan akun peserta
                    setelah sistem autentikasi selesai dibuat.

                </div>



                <!-- BACK -->

                <div class="text-center mt-4">

                    <a
                        href="/kegiatan/seminar-pengenalan-pasar-modal"
                        class="text-decoration-none text-success">

                        <i class="bi bi-arrow-left me-1"></i>

                        Kembali ke Detail Kegiatan

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
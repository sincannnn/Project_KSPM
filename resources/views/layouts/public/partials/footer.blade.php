<footer class="bg-dark text-white pt-5 pb-3 mt-5">

    <div class="container">

        <div class="row g-4">

            {{-- Tentang --}}
            <div class="col-lg-5 col-md-6">

                <div class="d-flex align-items-center gap-3 mb-3">

                    @if(file_exists(public_path('images/logo/logo.png')))

                    <img src="{{ asset('images/logo/logo.png') }}" alt="Logo KSPM" width="50" height="50"
                        class="rounded">

                    @endif

                    <div>
                        <h5 class="fw-bold mb-0">
                            KSPM STMIK Adhi Guna
                        </h5>

                        <small class="text-secondary">
                            Galeri Investasi
                        </small>
                    </div>

                </div>

                <p class="text-secondary mb-0">

                    Galeri Investasi KSPM STMIK Adhi Guna
                    merupakan media informasi, edukasi,
                    dan dokumentasi kegiatan seputar pasar
                    modal dan investasi.

                </p>

            </div>


            {{-- Navigasi --}}
            <div class="col-lg-3 col-md-6">

                <h6 class="fw-bold mb-3">
                    Navigasi
                </h6>

                <ul class="list-unstyled">

                    <li class="mb-2">
                        <a href="{{ url('/') }}" class="text-secondary text-decoration-none">
                            <i class="bi bi-chevron-right me-1"></i>
                            Beranda
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ url('/berita') }}" class="text-secondary text-decoration-none">
                            <i class="bi bi-chevron-right me-1"></i>
                            Berita & Artikel
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ url('/materi') }}" class="text-secondary text-decoration-none">
                            <i class="bi bi-chevron-right me-1"></i>
                            Materi Investasi
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ url('/kegiatan') }}" class="text-secondary text-decoration-none">
                            <i class="bi bi-chevron-right me-1"></i>
                            Kegiatan
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ url('/galeri') }}" class="text-secondary text-decoration-none">
                            <i class="bi bi-chevron-right me-1"></i>
                            Galeri
                        </a>
                    </li>

                </ul>

            </div>


            {{-- Informasi --}}
            <div class="col-lg-4 col-md-12">

                <h6 class="fw-bold mb-3">
                    Informasi
                </h6>

                <ul class="list-unstyled text-secondary">

                    <li class="mb-3">

                        <i class="bi bi-building me-2"></i>

                        STMIK Adhi Guna

                    </li>

                    <li class="mb-3">

                        <i class="bi bi-geo-alt me-2"></i>

                        Palu, Sulawesi Tengah

                    </li>

                    <li class="mb-3">

                        <i class="bi bi-envelope me-2"></i>

                        KSPM STMIK Adhi Guna

                    </li>

                </ul>


                {{-- Social Media --}}

                <div class="d-flex gap-2">

                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle" aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle" aria-label="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle" aria-label="YouTube">
                        <i class="bi bi-youtube"></i>
                    </a>

                </div>

            </div>

        </div>


        {{-- Garis --}}
        <hr class="border-secondary my-4">


        {{-- Copyright --}}
        <div class="row align-items-center">

            <div class="col-md-6">

                <p class="text-secondary mb-0 small">

                    &copy; {{ date('Y') }}
                    KSPM STMIK Adhi Guna.
                    All Rights Reserved.

                </p>

            </div>


            <div class="col-md-6 text-md-end mt-2 mt-md-0">

                <span class="text-secondary small">
                    Galeri Investasi KSPM
                </span>

            </div>

        </div>

    </div>

</footer>
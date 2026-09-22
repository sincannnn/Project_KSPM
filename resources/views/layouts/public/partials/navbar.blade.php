<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">

    <div class="container">

        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">

            <img src="{{ asset('images/logo/logo.png') }}" width="45" height="45" alt="Logo">

            <div>

                <div class="fw-bold text-success">
                    KSPM STMIK Adhi Guna
                </div>

                <small class="text-secondary">
                    Galeri Investasi
                </small>

            </div>

        </a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">

            <span class="navbar-toggler-icon"></span>

        </button>


        <div class="collapse navbar-collapse" id="navbarMenu">

            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">

                <li class="nav-item">

                    <a class="nav-link active" href="{{ url('/') }}">
                        Beranda
                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link" href="/berita">
                        Berita
                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link" href="/materi">
                        Materi
                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link" href="/kegiatan">
                        Kegiatan
                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link" href="/galeri">
                        Galeri
                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link" href="/chatbot">
                        Chatbot
                    </a>

                </li>


                <li class="nav-item ms-lg-2">

                    <a href="/login" class="btn btn-success px-4">

                        <i class="bi bi-box-arrow-in-right me-1"></i>

                        Login

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>
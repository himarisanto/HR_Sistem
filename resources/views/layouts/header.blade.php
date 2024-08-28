<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block" style="text-align: center;"></span>
            <img src="/template/assets/img/logohrsbn.png" alt="">
            <img src="/template/assets/img/hrslogo.png" alt="">
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <style>
        .logo {
            text-decoration: none;
            /* Menghilangkan garis bawah pada link */
            color: #333;
            /* Warna teks, bisa disesuaikan */
            font-weight: bold;
            /* Menebalkan teks */
            display: flex;
            align-items: center;
        }

        .logo img {
            max-height: 40px;
            /* Atur ukuran maksimum gambar logo */
            margin-right: 10px;
            /* Spasi antara gambar dan teks */
        }

        .logo span {
            font-size: 1.5rem;
            /* Ukuran font untuk teks logo */
            color: #007bff;
            /* Warna teks logo, bisa disesuaikan */
        }

        .logo:hover {
            color: #0056b3;
            /* Warna teks saat di-hover */
        }

        @media (max-width: 992px) {
            .logo span {
                display: none;
                /* Sembunyikan teks logo di layar kecil */
            }
        }
    </style>
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li>
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ url('profil_user/' . (Auth::user()->profil->foto_profil ?? 'profile-img.jpg')) }}" alt="Profil" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->username ?? '-' }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ Auth::user()->profil->nama_lengkap ?? '-'}}</h6>
                        <span>{{ Auth::user()->profil->job ?? '-'}}</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>

                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>

                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li>

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
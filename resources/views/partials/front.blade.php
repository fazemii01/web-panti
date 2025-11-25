<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>@yield('title')</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="/asset/img/apple-touch-icon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('asset/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/vendor/remixicon/remixicon.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet" />

    <!-- Bootstrap CSS (sudah ada) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header transparent-header">
        <div class="tw-head">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand tw-nav-brand d-flex align-items-center" href="{{ route('beranda') }}">
                        <img src="{{ asset('/asset/img/LKSA_logo_putih.png') }}" width="70" height="70" alt="Muhammadiyyah Centre Children">
                        <div class="ms-2">
                            <span class="d-block fw-bold" style="font-size: 20px;">LKSA PUTRI MUHAMMADIYAH</span>
                            <span class="d-block" style="font-size: 16px; text-transform: uppercase; letter-spacing: 1px;">
                                Darul Istiqomah Pasirian
                            </span>
                        </div>
                    </a>
                    

                    <nav id="navbar" class="navbar">
                        <ul>
                            <li><a class="nav-link scrollto " href="{{ route('beranda') }}">Beranda</a></li>
                            <hr>
                            <li><a class="nav-link scrollto" href="{{ url('/tentang-kami') }}">Tentang Kami</a></li>                
                            <hr>
                            <li><a class="nav-link" href="{{ route('anak-asuh') }}">Anak Asuh</a></li>
                            <hr>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Donasi
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('rekening_donasi') }}">Rekening Donasi</a></li>
                                    <li><a class="dropdown-item" href="{{ route('front.donasi.form') }}">Form Donasi</a></li>
                                    <li><a class="dropdown-item" href="{{ route('laporan_donasi') }}">Laporan Donasi</a></li>
                                </ul>
                            </li>
                            <hr>
                            <li><a class="nav-link" href="{{ route('kepengurusan') }}">Kepengurusan</a></li>
                            <hr>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Konten
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('show-blog') }}">Blog</a></li>
                                    <li><a class="dropdown-item" href="{{ route('galeri') }}">Galeri</a></li>
                                </ul>
                            </li>
                            <hr>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Kontak
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ url('/contact') }}">Kontak</a></li>
                                    <li><a class="dropdown-item" href="{{ route('login') }}" style="color: blue;">Login admin</a></li>
                                </ul>
                            </li>
                            <hr>

                        </ul>

                        <i class="bi bi-list mobile-nav-toggle"></i>
                    </nav>
                </nav>
                <!-- .navbar -->
            </div>
    </header>

    <style>
.dropdown-menu {
    background-color: #fff !important;
    z-index: 1050 !important;
    border: 1px solid #ddd;
}
.dropdown-menu .dropdown-item {
    color: #333 !important;
}
.dropdown-menu .dropdown-item:hover {
    background-color: #f8f9fa !important;
    color: #000 !important;
}
</style>

    <!-- End Header -->
    <div class="content">
        @yield('content')
    </div>

    <!-- ======= Footer ======= -->
<footer class="footer text-center text-white" style="background-color: #000;">
    <div class="container py-5">
        <img src="{{ asset('/asset/img/LKSA_logo_putih.png') }}"alt="Logo" style="height: 100px;" class="mb-3">
        <p class="mt-3">ALAMAT</p>
        <p class="fw-bold">Jl. Raya Pasirian No.88, Kec. Pasirian, Kabupaten Lumajang, Jawa Timur</p>
        <p>CP : 0857-7123-8693</p>
        <p>Email : pasdarulistiqomah@gmail.com</p>


        <div class="d-flex justify-content-center gap-3">
            <a href="#" class="text-white fs-5"><i class="bi bi-instagram"></i></a>
            <a href="#" class="text-white fs-5"><i class="bi bi-youtube"></i></a>
            <a href="#" class="text-white fs-5"><i class="bi bi-envelope-fill"></i></a>
            <a href="#" class="text-white fs-5"><i class="bi bi-geo-alt-fill"></i></a>
        </div>

        <hr class="my-4" style="border-top: 1px solid gold; width: 100%;">
        <p class="text-center">&copy; {{ date('Y') }} LKSA Putri Muhammadiyah Darul Istiqomah Pasirian</p>
    
    </div>
</footer>
<!-- End Footer -->



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('asset/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('asset/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('asset/js/main.js') }}"></script>
    @stack('style')
    @stack('js')
</body>

</html>

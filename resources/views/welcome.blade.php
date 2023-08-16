<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> Welcome</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <!-- Google Fonts --><link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('Gp/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('Gp/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Gp/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('Gp/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Gp/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Gp/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('Gp/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('Gp/assets/css/style.css') }}" rel="stylesheet">

        <link rel="icon" type="image/png" href="path/to/my-icon.png">


</head>

<body>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

        <h1><a href="index.html"><span></span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <a href="{{route('view.login')}}" class="get-started-btn scrollto">Get Started</a>

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
            <div class="col-xl-6 col-lg-8">
                <h1>Manage your school easily with our control panel</h1>
            </div>
        </div>

        <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
            <div class="col-xl-2 col-md-4">
                <div class="icon-box">
                    <i  class="ri-user-line"></i>
                    <h3><a >Student Data Management</a></h3>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="icon-box">
                    <i class="ri-team-fill"></i>
                    <h3><a >User Data Management</a></h3>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="icon-box">
                    <i class="ri-time-fill"></i>
                    <h3><a >Timetable Data Management</a></h3>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="icon-box">
                    <i class="ri-money-dollar-circle-fill"></i>
                    <h3><a>Fees Data Management</a></h3>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="icon-box">
                    <i class="ri-book-open-fill"></i>
                    <h3><a >Library Data Management</a></h3>
                </div>
            </div>
        </div>

    </div>
</section><!-- End Hero -->

<main id="main">


    <!-- Vendor JS Files --><script src="{{ asset('Gp/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('Gp/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('Gp/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Gp/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('Gp/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('Gp/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('Gp/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('Gp/assets/js/main.js') }}"></script>
    <link href="{{ asset('Gp/assets/css/style.css') }}" rel="stylesheet">

</body>

</html>
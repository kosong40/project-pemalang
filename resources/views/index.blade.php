<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistem Informasi Pelayanan Publik Online Kecamatan Pemalang">
    <meta name="author" content="Muchammad Dwi Cahyo Nugroho">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Sistem Informasi Pelayanan Publik Online Kecamatan Pemalang </title>

    <!-- Bootstrap core CSS -->
    <link href="{{url('landing/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{url('img/logo_pemalang_lg.png')}}" sizes="32x32">

    <!-- Custom fonts for this template -->
    <link href="{{url('landing/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('landing/vendor/simple-line-icons/css/simple-line-icons.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="device-mockups/device-mockups.min.css">

    <!-- Custom styles for this template -->
    <link href="{{url('landing/css/new-age.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Beranda</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#download">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#features">Pelayanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact">Alamat</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('login')}}" class="nav-link">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-7 my-auto">
                    <div class="header-content mx-auto">
                        <h1 class="mb-5">Sistem Informasi Pelayanan Publik Online (SIPPOL) <br>Kecamatan Pemalang</h1>
                        <a href="#download" class="btn btn-outline btn-xl js-scroll-trigger">Lihat Selengkapnya</a>
                    </div>
                </div>
                <div class="col-lg-5 my-auto">
                    <div class="device-container">
                        <div class="device-mockup iphone6_plus portrait white">
                            <div class="device">
                                <div class="screen">
                                    <img src="{{url('img/logo_pemalang_lg.png')}}" class="img-fluid" alt="">
                                </div>
                                <div class="button">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="download bg-tentang bg-primary text-center" style="color:black;" id="download">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <h2 class="section-heading">Sistem Informasi Pelayanan Publik Online (SIPPOL)</h2>
                    <p>Merupakan sistem informasi yang menghimpun pelayanan administrasi yang ada di Kecamatan Pemalang</p>
                </div>
            </div>
        </div>
    </section>

    <section class="features" id="features">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Pelayanan</h2>
                <p class="text-muted">Terdapat beberapa Pelayanan antara lain</p>
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-12 my-auto">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="feature-item">
                                    <i class="icon-home text-primary"></i>
                                    <h4>Izin Mendirikan Bangunan</h4>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="feature-item">
                                    <i class="icon-bubble text-primary"></i>
                                    <h4>Izin Reklame</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="feature-item">
                                    <i class="icon-basket text-primary"></i>
                                    <h4>Izin Usaha Mikro dan Kecil</h4>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="feature-item">
                                    <i class="icon-map text-primary"></i>
                                    <h4>Izin Pariwisata</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact bg-primary" id="contact">
        <div class="container">
            <h3 class="center-text"> Jl. DI Panjaitan Nomor 205 Pemalang Telp/Fax (0284) 321004</h3>
        </div>
    </section>

    <footer>
        <div class="container">
        <p>© Sistem Informasi Pelayanan Publik Online ( SIPPOL ) Kecamatan Pemalang Tahun {{date('Y')}}</p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{url('landing/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('landing/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{url('landing/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{url('landing/js/new-age.min.js')}}"></script>

</body>

</html>
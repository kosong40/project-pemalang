<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistem Informasi Pelayanan Publik Kecamatan Pemalang">
    <meta name="author" content="Muchammad Dwi Cahyo Nugroho">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('img/logo_pemalang_lg.png')}}">
    <title>@yield('title')</title>
    <!-- Custom CSS -->
    <link href="{{url('adminbite/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{url('adminbite/assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{url('adminbite/assets/libs/morris.js/morris.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{url('adminbite/dist/css/style.min.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body data-theme="light" onload="startTime()">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full"
        data-navbarbg="skin2">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin2">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin2">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="#">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            {{-- <img src="{{url('adminbite/assets/images/logo-icon.png')}}" alt="homepage"
                            class="dark-logo" /> --}}
                            <!-- Light Logo icon -->
                            {{-- <img src="{{url('adminbite/assets/images/logo-light-icon.png')}}" alt="homepage"
                            class="light-logo" /> --}}
                            {{-- <i class="wi wi-sunset"></i> --}}
                            <img src="{{url('img/logo_pemalang_lg.png')}}" style="width:30px;height:37px" alt="homepage"
                                class="light-logo">
                            <img src="{{url('img/logo_pemalang_lg.png')}}" style="width:30px;height:37px" alt="homepage"
                                class="dark-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            {{-- <img src="{{url('adminbite/assets/images/logo-text.png')}}" alt="homepage"
                            class="dark-logo" /> --}}
                            <!-- Light Logo text -->
                            {{-- <img src="{{url('adminbite/assets/images/logo-light-text.png')}}" class="light-logo"
                            alt="homepage" /> --}}
                            SIPPOL
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar">
                                <i class="sl-icon-menu font-20"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <i class="ti-search font-16"></i>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{-- <img src="../../assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"> --}}
                                <i class="ti-user font-16"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-warning"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-danger text-white m-b-10">
                                    <div class="m-l-10">
                                        <h4 class="m-b-0">{{session('nama')}}</h4>
                                        <p class=" m-b-0">{{session('username')}}</p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="{{route('akunDaerah')}}">
                                    <i class="ti-settings m-r-5 m-l-5"></i> Pengaturan Akun</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('keluar')}}">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin2">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark"
                                href="{{route('desa-home')}}" aria-expanded="false"><i class="icon-Home"></i><span
                                    class="hide-menu">Beranda</span></a></li>
                        {{-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark"
                                href="{{route('desa-formulir')}}" aria-expanded="false"><i
                                    class="icon-Printer"></i><span class="hide-menu">Formulir</span></a></li> --}}
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark"
                                href="{{url('desa/v2/data-pemohon')}}" aria-expanded="false"><i
                                    class="icon-File"></i><span class="hide-menu">Data Pemohon</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title"></h4>
                        <div class="d-flex align-items-center">
                            @yield('title')
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    @yield('breadcrumb')
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                © Sistem Informasi Pelayanan Publik Online ( SIPPOL ) Kecamatan Pemalang Tahun {{date('Y')}}
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->

    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{url('adminbite/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{url('adminbite/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{url('adminbite/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- apps -->
    <script src="{{url('adminbite/dist/js/app.min.js')}}"></script>
    <script src="{{url('adminbite/dist/js/app.init.horizontal.js')}}"></script>
    <script src="{{url('adminbite/dist/js/app-style-switcher.horizontal.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{url('adminbite/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{url('adminbite/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{url('adminbite/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{url('adminbite/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{url('adminbite/dist/js/custom.min.js')}}"></script>
    @yield('js')
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{url('adminbite/assets/libs/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{url('adminbite/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}">
    </script>
    <!--c3 charts -->
    <script src="{{url('adminbite/assets/extra-libs/c3/d3.min.js')}}"></script>
    <script src="{{url('adminbite/assets/extra-libs/c3/c3.min.js')}}"></script>
    <!--chartjs -->
    <script src="{{url('adminbite/assets/libs/raphael/raphael.min.js')}}"></script>
    <script src="{{url('adminbite/assets/libs/morris.js/morris.min.js')}}"></script>

    <script src="{{url('adminbite/dist/js/pages/dashboards/dashboard1.js')}}"></script>
</body>

</html>
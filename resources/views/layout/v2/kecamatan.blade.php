
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistem Informasi Pelayanan Publik Kecamatan Pemalang">
    <meta name="author" content="Muchammad Dwi Cahyo Nugroho">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('img/logo_pemalang_lg.png')}}">
    <title>@yield('title')</title>
    <link href="{{url('adminbite/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{url('adminbite/assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{url('adminbite/assets/libs/morris.js/morris.css')}}" rel="stylesheet">
    <link href="{{url('adminbite/dist/css/style.min.css')}}" rel="stylesheet">
    @yield('css')
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
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="#">
                        <b class="logo-icon">
                            <img src="{{url('img/logo_pemalang_lg.png')}}" style="width:30px;height:37px" alt="homepage" class="light-logo">
                            <img src="{{url('img/logo_pemalang_lg.png')}}" style="width:30px;height:37px" alt="homepage" class="dark-logo" />
                        </b>
                        <span class="logo-text text-white">
                            SIPPOL
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
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
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="sl-icon-menu font-20"></i>
                            </a>
                        </li>
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
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile dropdown m-t-20">
                                <div class="user-content hide-menu m-t-10">
                                    <h5 class="m-b-10 user-name font-medium">
                                        {{session('username')}}
                                    </h5>
                                    <a href="javascript:void(0)" class="btn btn-circle btn-sm m-r-5" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="ti-settings"></i>
                                    </a>
                                    <div class="dropdown-menu animated flipInY" aria-labelledby="Userdd">
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{route('pengaturanAkunKec')}}">
                                            <i class="ti-settings m-r-5 m-l-5"></i> Pengaturan Akun</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{route('keluar')}}">
                                            <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('kecamatan/v2/')}}" aria-expanded="false">
                                <i class="sl-icon-home"></i>
                                <span class="hide-menu">Beranda</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('kecamatan/v2/data-layanan')}}" aria-expanded="false">
                                <i class="icon-File"></i>
                                <span class="hide-menu">Data Layanan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('kecamatan/v2/admin-desa')}}" aria-expanded="false">
                                <i class="icon-User"></i>
                                <span class="hide-menu">Admin Desa</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('kecamatan/v2/pengaturan-layanan')}}
                                   " aria-expanded="false">
                                <i class="icon-Pencil"></i>
                                <span class="hide-menu">Pengaturan Layanan</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </aside>
        <div class="page-wrapper">
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
                                <ol class="breadcrumb" >
                                    @yield('breadcrumb')
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                @yield('content')
            </div>
            <footer class="footer text-center">
                © Sistem Informasi Pelayanan Publik Online ( SIPPOL ) Kecamatan Pemalang Tahun {{date('Y')}}. Designed and Developed by 
            <a href="https://wrappixel.com">WrapPixel</a>.
             </footer>
        </div>
    </div>
    <div class="chat-windows"></div>
    
    <script src="{{url('adminbite/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{url('adminbite/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{url('adminbite/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- apps -->
    <script src="{{url('adminbite/dist/js/app.min.js')}}"></script>
    <script src="{{url('adminbite/dist/js/app.init.js')}}"></script>
    <script src="{{url('adminbite/dist/js/app-style-switcher.js')}}"></script>
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
</body>

</html>

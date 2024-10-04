<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Deco-Vista | Admin Panel</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- font Awsome cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('Asset/Admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('Asset/Admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{asset('Asset/Admin/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('Asset/Admin/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('Asset/Admin/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('Asset/Admin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('Asset/Admin/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('Asset/Admin/js/dropzone/dropzone.css')}}">

    <!-- Template Main CSS File -->
    <link href="{{asset('Asset/Admin/css/style.css')}}" rel="stylesheet">

    <meta name="csrf-token" content="{{csrf_token()}}">
    <style>
        .form-check-input:checked + .form-check-label::before {
            content: '';
            position: absolute;
            left: 5px;
            top: 50%;
            transform: translateY(-50%);
            width: 18px;
            height: 18px;
            background-color: #007bff;
            border-radius: 3px;
            border: 2px solid #007bff;
        }
    
        .form-check-input:checked + .form-check-label {
            font-weight: bold;
            color: #007bff;
        }
    
        .form-check:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }
    </style>

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{route('designer.dashboard')}}" class="logo d-flex align-items-center">
                <img src="{{ asset('Asset/Admin/img/logo.png') }}" alt="">
                <span class="d-none d-lg-block">Decor Vista</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->



        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">






                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="{{ route('designer.dashboard') }}" data-bs-toggle="dropdown">
                        <img src="{{asset('Asset/Admin/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }}</h6>
                            <span>Designer</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('designer.profile') }}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>





                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item d-flex align-items-center"  href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span>
                                </a>
                            </form>

                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->


    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{ route('designer.dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('Designer.project') }}">
                    <i class="bi bi-person"></i>
                    <span>Projects</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link collapsed dropdown-toggle" href="#" id="consultationsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person"></i>
                    <span>Portfolio</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="consultationsDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('Designer.Portfolio.create') }}">
                            Create Portfolio
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('portfolio.index') }}">
                            View Portfolio
                        </a>
                    </li>
                    <!-- Add more dropdown items as needed -->
                </ul>
            </li>
           
            <li class="nav-item dropdown">
                <a class="nav-link collapsed dropdown-toggle" href="#" id="consultationsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person"></i>
                    <span>Consultations</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="consultationsDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('consultations.create') }}">
                            Create Consultation
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('consultations.index') }}">
                            View Consultations
                        </a>
                    </li>
                    <!-- Add more dropdown items as needed -->
                </ul>
            </li>
            
            



        </ul>

    </aside><!-- End Sidebar-->


    @yield('content')


    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>DecorVista</span></strong>. All Rights Reserved
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('Asset/Admin/js/jquery/jquery.js')}}"></script>
    <script src="{{asset('Asset/Admin/js/dropzone/dropzone.js')}}"></script>
    <script src="{{asset('Asset/Admin/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('Asset/Admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('Asset/Admin/vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('Asset/Admin/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{ asset('Asset/Admin/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('Asset/Admin/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{asset('Asset/Admin/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{ asset('Asset/Admin/vendor/php-email-form/validate.js') }}"></script>

    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>


    <!-- Template Main JS File -->
    <script src="{{asset( 'Asset/Admin/js/main.js' )}}"></script>

    <script>
    @yield('js')
    </script>


</body>

</html>
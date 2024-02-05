<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MM-StoryTeller - Dashboard</title>
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/backend/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');
        @import url('https://fonts.cdnfonts.com/css/source-sans-pro');
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        *{
            font-family: 'Poppins', sans-serif;
        }
        table{
            font-size: 14px;
        }
        .logo-name{
            color: #FFF;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            text-transform: capitalize;
        }
        .sub-name{
            color: #FFF;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 10px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            text-transform: capitalize;
        }
        .scroll-to-bottom{
            position: fixed;
            right: 17px;
            bottom: 80px;
            background: rgba(0,0,0,0.2);
            padding: 10px 15px;
            color: #fff;
        }
        .scroll-to-bottom:hover{
            background: rgba(0,0,0,0.5);
            color: #fff;
        }
    </style>
    @yield('css')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand text-center" href="{{ url('/') }}" style="height: 150px; padding-top:24px;">
                <img src="{{ asset('assets/img/logo.png') }}" width="72px" class="mb-2" alt="">
                <div class="sidebar-brand-text mx-2">
                    <p class="logo-name pb-0 mb-0">MM Storyteller</p>
                    <span class="sub-name">Webnovel Translations</span>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/admin') }}">
                    {{-- <i class="fas fa-fw fa-tachometer-alt"></i> --}}
                    <img class="mr-1" src="{{ asset('assets/img/Icons/Dashboard.svg') }}" width="18px" alt="">
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <img src="{{ asset('assets/img/Icons/User Management.svg') }}" class="mr-1 mb-1" width="18px" alt="">
                    {{-- <i class="fas fa-fw fa-cog"></i> --}}
                    <span>User Management</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">User Components:</h6>
                        <a class="collapse-item" href="{{ url('/admin/superAdmins/') }}"><img class="mr-1 text-dark" src="{{ asset('assets/img/Icons/Super Admins.svg') }}" width="18px" alt="">Super Admins</a>
                        <a class="collapse-item" href="{{ url('/admin/authors/') }}"><img class="mr-1 text-dark" src="{{ asset('assets/img/Icons/Author.svg') }}" width="18px" alt="">Authors</a>
                        <a class="collapse-item" href="{{ url('/admin/users/') }}"><img class="mr-1 text-dark" src="{{ asset('assets/img/Icons/user lists.svg') }}" width="18px" alt="">Users</a>
                        <a class="collapse-item" href="{{ url('/admin/pending-list/') }}"><img class="mr-1 text-dark" src="{{ asset('assets/img/Icons/Pending List.svg') }}" width="18px" alt="">Pending List</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-home text-white"></i>
                    <span>Home Page</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">HomePage Components:</h6>
                        <a class="collapse-item" href="{{ url('/admin/homebanner/') }}"><img class="mr-1" src="{{ asset('assets/img/Icons/Home Banner.svg') }}" width="18px" alt="">Home Banners</a>
                        <a class="collapse-item" href="{{ url('/admin/events/') }}"><img class="mr-1" src="{{ asset('assets/img/Icons/Events.svg') }}" width="18px" alt="">Events</a>
                        <a class="collapse-item" href="{{ url('/admin/category/') }}"><img class="mr-1" src="{{ asset('assets/img/Icons/Categories.svg') }}" width="18px" alt="">Categories</a>
                        <a class="collapse-item" href="{{ url('/admin/genre/') }}"><img class="mr-1" src="{{ asset('assets/img/Icons/Genre.svg') }}" width="18px" alt="">Genre</a>
                        <a class="collapse-item" href="{{ url('/admin/book/') }}"><img class="mr-1" src="{{ asset('assets/img/Icons/Book List.svg') }}" width="18px" alt="">Novel List</a>
                        {{-- <a class="collapse-item" href="{{ url('/admin/chapter/') }}"><img class="mr-1 text-dark" src="{{ asset('assets/img/Icons/Chapter List.svg') }}" width="18px" alt="">Chapter List</a> --}}
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <img src="{{ asset('assets/img/Icons/Orders.svg') }}" class="mr-1 mb-1" width="18px" alt="">
                    {{-- <i class="fas fa-fw fa-folder"></i> --}}
                    <span>Orders</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Order Management:</h6>
                        <a class="collapse-item" href="{{ url('/admin/orders/') }}"><img class="mr-1 text-dark" src="{{ asset('assets/img/Icons/Order.svg') }}" width="18px" alt=""> Order List</a>
                        <a class="collapse-item" href="{{ url('/admin/gem_order/') }}"><img class="mr-1 text-dark" src="{{ asset('assets/img/Icons/Gem.svg') }}" width="18px" alt=""> Gem Orders</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Account Setting
            </div>



            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/profile/') }}">
                    <i class="fas fa-fw fa-user text-white"></i>
                    <span>Profile</span></a>
            </li>


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <form method="POST" class="d-inline" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link" style="font-size: 14px;">
                        <img class="mr-1" src="{{ asset('assets/img/Icons/logout.png') }}" width="21px" alt="">
                        <span>Logout</span>
                    </button>
                </form>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            {{-- <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="{{ asset('assets/backend/img/undraw_rocket.svg') }}" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> --}}

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar static-top">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <span class="fw-bold text-dark pl-3" style="color: #666;">Hello, MM Storyteller Team!</span>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        {{-- <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li> --}}

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            {{-- <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">5+</span>
                            </a> --}}
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        {{-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li> --}}

                        {{-- <div class="topbar-divider d-none d-sm-block"></div> --}}

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline" style="color: #666;">{{ Auth::user()->name }}</span>
                                @if (!Auth::user()->profile)
                                <img class="img-profile rounded-circle" src="{{ asset('assets/img/profile/profile.png') }}">
                                @else
                                <img class="img-profile rounded-circle" src="{{ asset('assets/img/profile/'.Auth::user()->profile) }}">
                                @endif

                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in text-left"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item text-secondary" href="{{ url('/profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item text-secondary" href="https://ps01.zwhhosting.com:2096/cpsess7441895783/" target="__blank">
                                    <i class="fas fa-envelope fa-sm fa-fw mr-2"></i>
                                    Webmail
                                </a>

                                <a class="dropdown-item text-secondary" href="" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                                    Logout
                                </a>
                                <form method="POST" class="d-none" id="logout" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Created By <a href="https://myanmaronlinetechnology.com/" target="__blank" class="text-decoration-none">MOT</a></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <button class="scroll-to-bottom rounded btn" id="scrollDown">
        <i class="fas fa-angle-down"></i>
    </button>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/backend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/b829c5162c.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/backend/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    {{-- <script src="{{ asset('assets/backend/vendor/chart.js/Chart.min.js') }}"></script> --}}

    <!-- Page level custom scripts -->
    {{-- <script src="{{ asset('assets/backend/js/demo/chart-area-demo.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/backend/js/demo/chart-pie-demo.js') }}"></script> --}}

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        $(document).ready(function(){
            var scrollDownButton = $("#scrollDown");
            var body = $("body,html");

            $(window).on("scroll", function(){
                if ($(window).scrollTop() + $(window).height() === $(document).height()) {
                    scrollDownButton.style.display = "block";
                } else {
                    scrollDownButton.style.display = "none";
                }
            });

            scrollDownButton.on("click", function(){
                body.animate({scrollTop: body[0].scrollHeight}, 1000, function(){
                    // scrollDownButton.style.display = "none";
                });
            });
        });
    </script>
    @if (Session::has('error'))
        <script>
            Toastify({
                text:"{{Session::get('error')}}",
                className:"text-white",
                style: {
                    background: "#cc2900",
                },
                position:'center'
            }).showToast();
        </script>
    @endif
    @if (Session::has('success'))
        <script>
            Toastify({
                text:"{{Session::get('success')}}",
                className:"text-white",
                style: {
                    background: "#38d100",
                },
                position:'center'
            }).showToast();
        </script>
    @endif

    @yield('script')

</body>

</html>

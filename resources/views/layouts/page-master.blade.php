<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MM Story Teller - @yield('title')</title>
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    {{-- jquery link --}}
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>

    @yield('css')
    <style>
        #main-container{
            /* background-color: #000; */
            background-image: url('assets/img/gradient.png') !important;
            background-repeat: no-repeat !important;
            padding: 0px 32px !important;
        }
        html{
            scroll-behavior: smooth;
        }
        .toastify{
            background-image: unset !important;
        }
        .form-input{
            height: 50px;
        }
        .form-input:focus{
            border: 1px solid #FF3C86;
            box-shadow: none;
        }
        .login-password{
            position: relative;
        }
        .eye{
            position: absolute;
            top: 15px;
            right: 15px;
        }
        .close-btn{
            background-color: #ffffff;
            position: absolute;
            top: -10px;
            right: -10px;
            color: #FF3C86;
            padding: 5px 10px;
            z-index: 1;
        }
        .close-btn:hover{
            background-color: #F2F1F1;
            color: #FF3C86;
        }
        /* Scroll to top button for index.html*/
        #myBtn {
            display: none; /* Hidden by default */
            position: fixed; /* Fixed/sticky position */
            bottom: 30px; /* Place the button at the bottom of the page */
            right: 20px; /* Place the button 30px from the right */
            z-index: 99; /* Make sure it does not overlap */
            border: none; /* Remove borders */
            outline: none; /* Remove outline */
            background-color: rgba(255, 179, 255, 0.5); /* Set a background color */
            color: #cc0000; /* Text color */
            cursor: pointer; /* Add a mouse pointer on hover */
            padding: 10px; /* Some padding */
            /* width: 40px;
            height: 40px; */
            border-radius: 50%; /* Rounded corners */
            font-size: 18px; /* Increase font size */
            box-shadow: 1px 2px 3px black;
        }
        #myBtn:hover {
            background-color: rgba(255, 179, 255, 0.8); /* Add a dark-grey background on hover */
        }
        /* Scroll to top button for room.html*/
        .dropdown-text{
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            font-weight: 500;
            line-height: 17px;
            letter-spacing: 0em;
            text-align: left;
            color: #787878;

        }
        .header1{
            color: #222;
            font-family: Montserrat;
            font-size: 12px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            text-transform: uppercase;
        }
        .link1{
            display: block;
            text-decoration: none;
            margin-bottom: 12px;
            color: #222;
            font-size: 8px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            font-family: Montserrat;
            text-transform: uppercase;
        }
        .mail{
            display: block;
            color: #222;
            text-align: center;
            font-family: Montserrat;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            margin-top: 12px;
        }
        #navbar{
            padding: 26px 32px 16px 32px;
            height: 96px;
            background-color: transparent;
        }
        .search-icon{
            width: 25px;
            margin-bottom: 15px;
        }
        .login-icon{
            width: 34px;
        }
        .logo-pic{
            width: 54px;
        }
        .logo-text{
            margin-top: 1%;
        }
        .footer-logo-name{
            color: #18222B;
            font-family: Source Sans Pro;
            font-size: 6px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            text-transform: capitalize;
            margin: 4px 0;
            padding: 0;
        }
        .footer-contact-text1{
            color: #FE5092;
            font-family: Montserrat;
            font-size: 8px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            text-transform: capitalize;
            margin-bottom: 4px;
        }
        .footer-contact-text2{
            color: #222;
            font-family: Montserrat;
            font-size: 8px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            margin-top:4px;
        }
        .nav-container{
            display: grid;
            grid-template-columns: auto auto auto auto auto;
            /* grid-column-gap: 46px; */
            justify-content: space-between;
            padding: 116px 178px 80px 178px;
        }
        .nav-box{
            justify-content: center;
            align-items: center;
            width: 130px;
            height: 130px;
            border-radius: 30px;
            background: #FFF;
            box-shadow: 4px 4px 10px 0px rgba(255, 140, 185, 0.30);
        }
        .nav-box:hover{
            transform: scale(0.9);
            transition-duration: .6s;
        }
        .nav-content{
            text-align: center;
            margin-top: 20%;
        }
        .nav-icon{
            width: 45px;
            height: 45px;
        }
        .nav-text{
            color: #3E3E3E;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 18px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            text-transform: capitalize;
            margin-top: 20px;
        }
        @media only screen and (max-width:1267px){
            .nav-container{
                display: grid;
                grid-template-columns: auto auto auto auto auto;
                /* grid-column-gap: 46px; */
                justify-content: space-between;
                padding: 116px 100px 80px 100px;
            }
        }
        @media only screen and (max-width:1120px){
            .nav-container{
                display: grid;
                grid-template-columns: auto auto auto auto auto;
                /* grid-column-gap: 46px; */
                justify-content: space-between;
                padding: 116px 50px 80px 50px;
            }
        }
        @media only screen and (max-width:1020px){
            .nav-container{
                display: grid;
                grid-template-columns: auto auto auto auto auto;
                /* grid-column-gap: 46px; */
                justify-content: space-between;
                padding: 120px 100px 50px 100px;
            }
            .nav-box{
                justify-content: center;
                align-items: center;
                width: 90px;
                height: 84px;
                border-radius: 20px;
                background: #FFF;
                box-shadow: 2px 2px 6px 0px rgba(255, 140, 185, 0.20);
            }
            .nav-box:hover{
                transform: scale(0.9);
                transition-duration: .6s;
            }
            .nav-content{
                text-align: center;
                margin-top: 15%;
            }
            .nav-icon{
                width: 22px;
                height: 22px;
            }
            .nav-text{
                color: #515151;
                text-align: center;
                font-family: Source Sans Pro;
                font-size: 12px;
                font-style: normal;
                font-weight: 600;
                line-height: normal;
                text-transform: capitalize;
                margin-top: 10px;
                padding-top: 0px;
            }
        }
        @media only screen and (max-width:992px){
            #main-container{
                background-image: url('assets/img/gradient.png');
                background-repeat: no-repeat;
                padding: 0px 16px;
            }
            .title{
                color: #222;
                text-align: left;
                font-family: Source Sans Pro;
                font-size: 20px;
                font-style: normal;
                font-weight: 700;
                line-height: normal;
                text-transform: capitalize;
            }
            .nav-container{
                display: grid;
                grid-template-columns: auto auto auto auto auto;
                /* grid-column-gap: 46px; */
                justify-content: space-between;
                padding: 90px 100px 50px 100px;
            }
            .nav-box{
                justify-content: center;
                align-items: center;
                width: 80px;
                height: 80px;
                border-radius: 20px;
                background: #FFF;
                box-shadow: 2px 2px 6px 0px rgba(255, 140, 185, 0.20);
            }
            .nav-box:hover{
                transform: scale(0.9);
                transition-duration: .6s;
            }
            .nav-content{
                text-align: center;
                margin-top: 15%;
            }
            .nav-icon{
                width: 22px;
                height: 22px;
            }
            .nav-text{
                color: #515151;
                text-align: center;
                font-family: Source Sans Pro;
                font-size: 12px;
                font-style: normal;
                font-weight: 600;
                line-height: normal;
                text-transform: capitalize;
            }
            #navbar{
                padding: 20px 16px 16px 16px;
                height: 75px;
            }
            .search-icon{
                display: block;
                width: 16px;
                margin: 0;
                padding: 0px;
                margin-top: 15px;

            }
            .login-icon{
                display: block;
                width: 19px;
                margin-top: 20px;
                margin-left: 0px;
                padding-left: 0px;
            }
            .logo-pic{
                width: 46px;
                margin-right: 11px;
            }
            .logo{
                color: #FE5092;
                font-family: Source Sans Pro;
                font-size: 18px;
                font-style: normal;
                font-weight: 600;
                line-height: normal;
            }
            .sub-logo{
                color: #685A5F;
                font-family: Source Sans Pro;
                font-size: 10px;
                font-style: normal;
                font-weight: 400;
                line-height: normal;
            }
            .social i{
                font-size: 8px;
                color: #FF8CB9;
            }
            .rememberMe{
                font-size: 14px;
            }
            .forgot{
                font-size: 14px;
            }
        }
        @media only screen and (max-width:680px){
            .nav-container{
                display: grid;
                grid-template-columns: auto auto auto auto auto;
                /* grid-column-gap: 46px; */
                justify-content: space-around;
                padding: 100px 50px 50px 50px;
            }
            .nav-box{
                justify-content: center;
                align-items: center;
                width: 70px;
                height: 70px;
                border-radius: 20px;
                background: #FFF;
                box-shadow: 2px 2px 6px 0px rgba(255, 140, 185, 0.20);
            }
            .nav-box:hover{
                transform: scale(0.9);
                transition-duration: .6s;
            }
            .nav-content{
                text-align: center;
                margin-top: 15%;
            }
            .nav-icon{
                width: 22px;
                height: 22px;
            }
            .nav-text{
                color: #515151;
                text-align: center;
                font-family: Source Sans Pro;
                font-size: 8px;
                font-style: normal;
                font-weight: 600;
                line-height: normal;
                text-transform: capitalize;
            }
        }
        @media only screen and (max-width:576px){
            .nav-container{
                display: grid;
                grid-template-columns: auto auto auto auto auto;
                /* grid-column-gap: 46px; */
                justify-content: space-around;
                padding: 80px 25px 32px 25px;
            }
            .nav-box{
                justify-content: center;
                align-items: center;
                width: 50px;
                height: 46px;
                border-radius: 10px;
                background: #FFF;
                box-shadow: 2px 2px 6px 0px rgba(255, 140, 185, 0.20);
            }
            .nav-box:hover{
                transform: scale(0.9);
                transition-duration: .6s;
            }
            .nav-content{
                text-align: center;
                margin-top: 1%;
            }
            .nav-icon{
                width: 14px;
                height: 14px;
            }
            .nav-text{
                margin: 0;
                padding: 0;
                color: #515151;
                text-align: center;
                font-family: Source Sans Pro;
                font-size: 8px;
                font-style: normal;
                font-weight: 600;
                line-height: normal;
                text-transform: capitalize;
            }
        }
        @media only screen and (max-width:335px){
            .nav-container{
                display: grid;
                grid-template-columns: auto auto auto auto auto;
                /* grid-column-gap: 46px; */
                justify-content: space-around;
                padding: 80px 16px 32px 16px;
                /* padding: 32px 16px; */
            }
            .nav-box{
                justify-content: center;
                align-items: center;
                width: 47px;
                height: 36px;
                border-radius: 8px;
                background: #FFF;
                box-shadow: 2px 2px 6px 0px rgba(255, 140, 185, 0.20);
            }
            .nav-box:hover{
                transform: scale(0.9);
                transition-duration: .6s;
            }
            .nav-content{
                text-align: center;
                margin-top: 1%;
            }
            .nav-icon{
                width: 14px;
                height: 14px;
            }
            .nav-text{
                margin: 0;
                padding: 0;
                color: #515151;
                text-align: center;
                font-family: Source Sans Pro;
                font-size: 6px;
                font-style: normal;
                font-weight: 600;
                line-height: normal;
                text-transform: capitalize;
            }
        }


        .search-box{
            position: relative;
        }
        .input-search{
            padding-left: 50px;
            color: #FF8CB9;
        }

        .input-search:focus{
            border: 1px solid #FF3C86;
            box-shadow: none;
        }
        .input-search:focus .search-btn{
            z-index: 1;
            display: block;
        }
        .input-search::placeholder{
            color: #FF8CB9;
        }
        .close-icon{
            position: absolute;
            top:10px;
            right: 20px;
            z-index: 1;
        }
        .search-btn{
            position: absolute;
            top: 1px;
            left: 45px;
            z-index: 1;
            color: #FF8CB9;
        }
        .search-btn:hover{
            color: #FF8CB9;
        }

        .login, .signup{
            position: relative;
            padding-top: 40px;
            padding-bottom: 32px;
            padding-left: 30px;
            padding-right: 30px;
            /* box-shadow: 2px 3px 4px #fa90b9; */
        }
        .login label, .signup label{
            color: #626262 !important;
            text-align: center;
            font-family: Montserrat;
            font-size: 14px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            text-transform: capitalize;
        }
        .login input, .signup input{
            border: none;
            box-shadow: 0px 0px 12px 0px rgba(255, 140, 185, 0.50);
        }
        .login input::placeholder, .signup input::placeholder{
            color: #909090;
            text-align: left;
            font-family: Montserrat;
            font-size: 14px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            text-transform: capitalize;
        }
        .login-header{
            color: #FE5092;
            text-align: center;
            font-family: Montserrat;
            font-size: 18px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            text-transform: capitalize;
            margin-bottom: 10px;
            margin-top: 8px;
        }
        .circle_gradient{
            position: absolute;
            top: 0;
            right: 0;
            width: 70%;
            z-index: 0.5;
        }
        .modal-close-btn{
            position: absolute;
            top: 0;
            right: 0;
        }
    </style>
</head>
<body onload="loadSavedLogin()">
    {{-- nav start --}}
    <nav class="navbar navbar-expand fixed-top" style="" id="navbar">
        <div class="container-fluid mx-0 px-0">
        <a class="navbar-brand" href="{{ url('/') }}">
            <div class="d-flex mb-0">
                <div class="me-2">
                    <img class="logo-pic" src="{{ asset('assets/img/logo.png') }}" alt="">
                </div>
                <div class="logo-text">
                    <p class="mb-0 logo" >MM Storyteller</p>
                    <p class="sub-logo mt-0 pt-0">Webnoval Translations</p>
                </div>
            </div>
        </a>
        <div class="navbar-collapse" id="navbarSupportedContent">
            <div class="input-group mb-3 search-box">
                <i class="fas fa-xmark bg-light text-secondary close-icon" style="cursor: pointer;" id="close-search"></i>
                <button class="btn search-btn" type="button" id="button-addon2"><i class="fas fa-magnifying-glass"></i></button>
                <input type="text" class="form-control rounded input-search" placeholder="Search" id="input-search">
            </div>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item nav-spacing" >
                <a class="nav-link search" href="#"><img class="search-icon" src="{{ asset('assets/img/Icons/Search.png') }}" alt=""></a>
            </li>
            @auth
            <li class="nav-item dropstart">
                <span class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="login-icon" src="{{ asset('assets/img/profile/'.Auth::user()->profile) }}" alt="">
                </span>
                <ul class="dropdown-menu shadow" style="font-size:14px;color:#424242; font-family: 'Montserrat', sans-serif; border-radius:0; border:none;">
                    <li class="">
                    <a class="dropdown-item dropdown-text mb-2" href="{{ url('/profile')}}"><i class="fas fa-user me-2"></i>Profile</a>
                    </li>
                    @if(Auth::user()->role == "Super Admin")
                    <li class="">
                    <a class="dropdown-item dropdown-text mb-2" href="{{ url('/admin')}}"><i class="fas fa-dashboard me-2"></i>Admin Dashboard</a>
                    </li>
                    @endif
                    <li class="">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item dropdown-text mb-2">
                            <i class="fas fa-right-from-bracket me-2"></i>{{ __('Log Out') }}
                        </button>
                    </form>
                    </li>
                </ul>
                </li>
            @endauth
            @guest
            <a href="" data-bs-target="#loginModal" data-bs-toggle="modal"><img class="login-icon" src="{{ asset('assets/img/Icons/login.png') }}" alt=""></a>
            @endguest
            </ul>

        </div>
        </div>
    </nav>
    {{-- nav end --}}

    <div id="main-container">
        {{-- inner navbar --}}
        <div class="bg-transparent" style="overflow: hidden;">
            <div class="nav-container">
                <a href="{{ url('/genre') }}" class="nav-box d-block text-decoration-none">
                    <div class="nav-content">
                        <img class="nav-icon" src="{{ asset('assets/img/Icons/genre.png') }}" alt="">
                        <p class="nav-text p-0">Genre</p>
                    </div>
                </a>
                <a href="{{ url('/own-creation') }}" class="nav-box d-block text-decoration-none">
                    <div class="nav-content">
                        <img class="nav-icon" src="{{ asset('assets/img/Icons/own_creation.png') }}" alt="">
                        <p class="nav-text p-0">Own Creation</p>
                    </div>
                </a>
                <a href="{{ url('/translation') }}" class="nav-box d-block text-decoration-none">
                    <div class="nav-content">
                        <img class="nav-icon" src="{{ asset('assets/img/Icons/translation.png') }}" alt="">
                        <p class="nav-text p-0">Translation</p>
                    </div>
                </a>
                <a href="{{ url('/gem') }}" class="nav-box d-block text-decoration-none">
                    <div class="nav-content">
                        <img class="nav-icon" src="{{ asset('assets/img/Icons/gem.png') }}" alt="">
                        <p class="nav-text p-0">Gem</p>
                    </div>
                </a>
                <a href="{{ url('/events') }}" class="nav-box d-block text-decoration-none">
                    <div class="nav-content">
                        <img class="nav-icon" src="{{ asset('assets/img/Icons/event.png') }}" alt="">
                        <p class="nav-text p-0">Events</p>
                    </div>
                </a>
            </div>
        </div>
        {{-- inner navbar --}}

        @yield('content')
    </div>


    {{-- scroll to top --}}
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa-solid fa-angle-up"></i></button>
    {{-- scroll to top --}}





    {{-- footer --}}
    <footer class="bg-white text-dark mb-0 pb-0" style="overflow: hidden">
        {{-- Desktop view --}}
        <div class="container-fluid d-none d-lg-block" style="padding: 64px 190px 64px 190px">
            <div class="d-flex justify-content-between">
                <div class="text-center">
                    <a class="text-decoration-none text-dark" href="{{ url('/') }}">
                        <img src="{{ asset('assets/img/Icons/footer.png') }}" width="112px" alt="">
                        <p class="fw-bold" style="margin-top: 12px;">MM Storyteller</p>
                    </a>
                    <div class="social">
                        <a href="https://www.facebook.com/profile.php?id=100082977590554" target="__blank" class="btn btn-sm"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://www.facebook.com/messages/t/107092781982092" target="__blank" class="btn btn-sm"><i class="fa-brands fa-facebook-messenger"></i></a>

                    </div>
                </div>
                <div class="text-center">
                    <p class="fw-bold header">QUICK LINKS</p>
                    <a href="{{ url('/genre') }}" class="link">GENRE</a>
                    <a href="{{ url('/own_creation') }}" class="link">OWN CREATION</a>
                    <a href="{{ url('/translation') }}" class="link">TRANSLATION</a>
                    <a href="{{ url('/events') }}" class="link">EVENTS</a>
                    <a href="{{ url('/contact') }}" class="link">CONTACT</a>
                </div>
                <div class="text-center">
                    <p class="fw-bold header">EXPLORE</p>
                    <a href="" class="link">POPULAR</a>
                    <a href="" class="link">NEW</a>
                    <a href="" class="link">FANFIC</a>
                    <a href="" class="link">GEM</a>
                    <a href="" class="link">LATEST</a>
                </div>
                <div class="text-start">
                    <p class="fw-bold header" style="margin-bottom: 16px !important;">CONTACT US</p>
                    <span class="subscribe-link" style="margin-bottom: 20px !important;">WE'D LOVE TO HEAR FROM YOU!</span>
                    <span class="mail">EMAIL: admin@mmstoryteller.com</span>
                </div>
            </div>
        </div>
        {{-- Desktop view --}}
        {{-- tablet view --}}
        <div class="container d-lg-none d-md-block" style="padding: 24px 16px 49px 16px;">
            <div class="d-flex justify-content-between mb-0 pb-0" >
                <div class="text-start">
                    <p class="fw-bold header1">QUICK LINKS</p>
                    <a href="" class="link1">GENRE</a>
                    <a href="" class="link1">OWN CREATION</a>
                    <a href="{{ url('/translation') }}" class="link1">TRANSLATION</a>
                    <a href="{{ url('/events') }}" class="link1">EVENTS</a>
                    <a href="{{ url('/contact') }}" class="link1">CONTACT</a>
                </div>
                <div class="text-start">
                    <p class="fw-bold header1">EXPLORE</p>
                    <a href="" class="link1">POPULAR</a>
                    <a href="" class="link1">NEW</a>
                    <a href="" class="link1">FANFIC</a>
                    <a href="" class="link1">GEM</a>
                    <a href="" class="link1">LATEST</a>
                </div>
                <div class="text-start">
                    <p class="fw-bold header1">CONTACT US</p>
                    <div class="social text-left">
                        <a class="text-decoration-none text-dark mb-0 pb-0" href="{{ url('/') }}">
                            <img src="{{ asset('assets/img/Icons/footer.png') }}" width="38px" alt="">
                            <span class="fw-bold d-block footer-logo-name mb-0 pb-0">MM Storyteller</span>
                        </a>
                        <div class="ms-2 mb-1">
                            <a href="https://www.facebook.com/profile.php?id=100082977590554" target="__blank" class="text-decoration-none"><i class="fa-brands fa-facebook" style="font-size: 8px;"></i></a>
                            <a href="https://www.facebook.com/messages/t/107092781982092" target="__blank" class="text-decoration-none"><i class="fa-brands fa-facebook-messenger" style="font-size: 8px;"></i></a>
                        </div>
                        <span class="d-block footer-contact-text1 mb-2">WE'D LOVE TO HEAR FROM YOU!</span>
                        <span class="d-block footer-contact-text2">EMAIL: admin@mmstoryteller.com</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- tablet view --}}
        <p class="footer mb-0 pb-0 mt-0">Copyright &copy; 2023, MM Storyteller | Created By <a href="https://myanmaronlinetechnology.com/" target="__blank" class="text-decoration-none text-white fw-bold" style="font-weight: 600; text-shadow: 1px 2px 3px #FF3C86;">MOT</a></p>
    </footer>
    {{-- footer --}}

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" style="font-family: 'Montserrat', sans-serif;">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content p-0 m-0" style="border-radius: 5px;">
            <div class="modal-body p-0 m-0" style="background-color: rgba(0,0,0,0); position: relative;">
                <button type="button" class="btn rounded-circle close-btn d-none d-md-block" data-bs-dismiss="modal"><i class="fas fa-xmark" style="font-size: 18px;font-weight:600;"></i></button>
                <div style="background: linear-gradient(180deg, #F5D8E3 0%, #FFF3F8 70.31%);">
                    <img src="{{ asset('assets/img/circle_gradient.png') }}" class="circle_gradient" alt="">
                    <div class=" login" style="color: #626262">
                        <div class="text-end d-md-none d-sm-block p-3 modal-close-btn">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="text-center">
                            <img src="{{ asset('assets/img/Icons/footer.png') }}" width="112px" alt="">
                            <p class="login-header">Welcome To MM Storyteller</p>
                            <p class="text-center fw-bold mb-3 pt-0 mt-0" style="font-size: 20px; font-weight: 600;">LOGIN</p>
                        </div>

                        <form action="{{ url('/login') }}" method="post">
                            @csrf
                            <div class="mb-4">
                                <label for="" class="form-label">Email Address</label>
                                <input type="email" class="form-control form-input" id="email" name="email" placeholder="Enter Your Email">
                                {{-- @error('email')
                                    <script>
                                        const loginModal = new bootstrap.Modal('#loginModal');
                                        window.addEventListener('DOMContentLoaded', ()=>{
                                            loginModal.show();
                                        })
                                    </script>
                                    <p class="text-danger" id="">{{ $message }}</p>
                                @enderror
                                @if (Session::has('emailError'))
                                    <script>
                                        const loginModal = new bootstrap.Modal('#loginModal');
                                        window.addEventListener('DOMContentLoaded', ()=>{
                                            loginModal.show();
                                        })
                                    </script>
                                    <p class="text-danger" id="">{{ "*The email is not registered yet!." }}</p>
                                @endif --}}
                                <p class="text-danger" id="emailError"></p>
                            </div>
                            <div class="mb-4">
                                <label for="" class="form-label">Password</label>
                                <div class="login-password">
                                    <input type="password" id="login-password" class="form-control pass-input form-input" name="password" placeholder="Enter Your Password">
                                    <img class="eye" id="eye1" src="{{ asset('assets/img/Icons/Opened Eye.png')}}" style="cursor:pointer" onclick="loginPwdView()" width="20px" alt="">
                                    {{-- @error('password')
                                        <script>
                                            const loginModal = new bootstrap.Modal('#loginModal');
                                            window.addEventListener('DOMContentLoaded', ()=>{
                                                loginModal.show();
                                            })
                                        </script>
                                        <p class="text-danger" id="">{{ $message }}</p>
                                    @enderror
                                    @if (Session::has('passwordError'))
                                        <script>
                                            const loginModal = new bootstrap.Modal('#loginModal');

                                            window.addEventListener('DOMContentLoaded', ()=>{
                                                loginModal.show();

                                            })
                                        </script>
                                        <p class="text-danger" id="emailError">{{ "*Wrong Password!." }}</p>
                                    @endif --}}
                                    <p class="text-danger" id="passwordError"></p>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <input type="checkbox" name="" id="rememberMe" >
                                        <label for="rememberMe" class="form-label rememberMe">Remember Me</label>
                                    </div>
                                    <div>
                                        @if (Route::has('password.request'))
                                            <a class="text-decoration-none text-secondary forgot" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit" id="login" class="btn btn-pink w-100" style="height:50px; font-size: 16px;" onclick="saveLogin()">Log In</button>
                            </div>
                            <div class="text-center mb-0">
                                <p>OR</p>
                                <p>Don't have an account?</p>
                                <a href="" class="text-decoration-none" style="font-family: 'Montserrat', sans-serif; color:#222; border-bottom: 1px solid #FF3C86" data-bs-target="#signupModal" data-bs-toggle="modal">REGISTER</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    {{-- register Modal --}}
    <div class="modal fade" id="signupModal" data-bs-backdrop="static"  style="font-family: 'Montserrat', sans-serif;">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content p-0 m-0" style="border-radius: 5px;">
            <div class="modal-body p-0 m-0" style="background-color: rgba(0,0,0,0);">
                <button type="button" class="btn rounded-circle close-btn d-none d-md-block" data-bs-dismiss="modal"><i class="fas fa-xmark" style="font-size: 18px;"></i></button>
                <img src="{{ asset('assets/img/circle_gradient.png') }}" class="circle_gradient" alt="">
                <div style="background: linear-gradient(180deg, #F5D8E3 0%, #FFF3F8 70.31%);">
                    <div class="signup" style="color: #626262">
                        <div class="text-end d-md-none d-sm-block p-3 modal-close-btn">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="text-center">
                            <img src="{{ asset('assets/img/Icons/footer.png') }}" width="112px" alt="">
                        </div>
                        <p class="login-header">Welcome To MM Storyteller</p>
                        <p class="text-center fw-bold pt-0 mt-0" style="font-size: 20px; font-weight: 600;">SIGN UP</p>
                        <form action="{{ url('/register') }}" method="post">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="form-label">Username</label>
                                <input type="text" class="form-control form-input" name="name" id="name" placeholder="Enter Your Name">
                                @error('name')
                                    <script>
                                        const signupModal = new bootstrap.Modal('#signupModal');
                                        window.addEventListener('DOMContentLoaded', ()=>{
                                            signupModal.show();
                                        })
                                    </script>
                                    <p class="text-danger" id="name-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="signup-email" class="form-label">Email Address</label>
                                <input type="email" class="form-control form-input" name="email" id="signup-email" placeholder="Enter Your Email">
                                @error('email')
                                    <script>
                                        const signupModal = new bootstrap.Modal('#signupModal');
                                        window.addEventListener('DOMContentLoaded', ()=>{
                                            signupModal.show();
                                        })
                                    </script>
                                    <p class="text-danger" id="name-error">{{ $message }}</p>
                                @enderror
                                @if(Session::has('emailError'))
                                    <script>
                                        const signupModal = new bootstrap.Modal('#signupModal');
                                        window.addEventListener('DOMContentLoaded', ()=>{
                                            signupModal.show();
                                        })
                                    </script>
                                    <span class="text-danger">{{ "*Email has already taken!" }}</span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label for="signup-password" class="form-label">Password</label>
                                <div class="login-password">
                                    <input type="password" id="signup-password" class="form-control pass-input form-input" name="password" placeholder="Enter Your Password">
                                    <img class="eye" id="eye2" src="{{ asset('assets/img/Icons/Opened Eye.png')}}" style="cursor:pointer" onclick="signUpPwdView()" width="20px" alt="">
                                    {{-- <p class="text-danger" id="signup-password-error"></p> --}}
                                    @error('password')
                                        <script>
                                            const signupModal = new bootstrap.Modal('#signupModal');
                                            window.addEventListener('DOMContentLoaded', ()=>{
                                                signupModal.show();
                                            })
                                        </script>
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-pink w-100" style="height:50px; font-size: 16px;">Register</button>
                            </div>
                            <div class="text-center mb-0">
                                <p>OR</p>
                                <p>Already have an account?</p>
                                <a href="" class="text-decoration-none" style="font-family: 'Montserrat', sans-serif; color:#222; border-bottom: 1px solid #FF3C86" data-bs-target="#loginModal" data-bs-toggle="modal">LOGIN</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>



    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/b829c5162c.js" crossorigin="anonymous"></script>

    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    @if (Session::has('error'))
        <script>
            Toastify({
                text:"{{Session::get('error')}}",
                className:"bg-danger text-white",
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

    <script>
        //ajax validation for signup
        // $(document).ready(function() {
        //     $("#signup").click(function(e) {
        //         e.preventDefault(); // Prevent form submission

        //         let name = $("#name").val();
        //         let email = $("#signup-email").val();
        //         let password = $("#signup-password").val();

        //         let $nameError = $("#name-error");
        //         let $emailError = $("#signup-email-error");
        //         let $passwordError = $("#signup-password-error");

        //         // Reset error messages
        //         $nameError.html("");
        //         $emailError.html("");
        //         $passwordError.html("");

        //         // Client-side validation
        //         if(name.length === 0 || email.length === 0 || password.length === 0){
        //             if (name.length === 0) {
        //                 $nameError.html("*Username must be filled out!");
        //             }
        //             if (email.length === 0) {
        //                 $emailError.html("*Email must be filled out!");
        //             }
        //             if (password.length === 0) {
        //                 $passwordError.html("*Password must be filled out!");
        //             }
        //             return false;
        //         }


        //         // AJAX request to check email
        //         $.ajax({
        //         type: "post",
        //         url: "{{ url('/login/signupCheck') }}",
        //         data: {
        //             name: name,
        //             email: email,
        //             password: password,
        //             _token: "{{ csrf_token() }}"
        //         },
        //         success: function(data) {
        //             if (data.success === false) {
        //                 if (data.message.email) {
        //                     $emailError.html(data.message.email);
        //                 }
        //                 return false;
        //             }

        //             // top.location.href = "{{ url('/home') }}"

        //             // AJAX request for register
        //             $.ajax({
        //             type: "post",
        //             url: "{{ url('/register') }}",
        //             data: {
        //                 name: name,
        //                 email: email,
        //                 password: password,
        //                 _token: "{{ csrf_token() }}"
        //             },
        //             // success: function(data) {
        //             //     console.log(data);
        //             //     // location.reload();
        //             //     top.location.href = "";
        //             // }
        //             });
        //         }
        //         });
        //     });
        // });
        //ajax validation for signup

        //ajax validation for login
        $(document).ready(function() {
            $("#login").click(function(e) {
                e.preventDefault(); // Prevent form submission

                let email = $("#email").val();
                let password = $("#login-password").val();
                let $emailError = $("#emailError");
                let $passwordError = $("#passwordError");

                // Reset error messages
                $emailError.html("");
                $passwordError.html("");

                // Client-side validation
                if(email.length === 0 || password.length === 0){
                    if (email.length === 0) {
                        $emailError.html("*Email must be filled out!");
                    }
                    if (password.length === 0) {
                        $passwordError.html("*Password must be filled out!");
                    }
                    return false;
                }


                // AJAX request to check email
                $.ajax({
                type: "post",
                url: "{{ url('/login/loginCheck') }}",
                data: {
                    email: email,
                    password: password,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.success === false) {
                    if (data.message.email) {
                        $emailError.html(data.message.email);
                    }

                    if (data.message.password) {
                        $passwordError.html(data.message.password);
                    }

                    return false;
                    }

                    // AJAX request for login
                    $.ajax({
                    type: "post",
                    url: "{{ url('/login') }}",
                    data: {
                        email: email,
                        password: password,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        console.log(data);
                        top.location.href = "{{ url('/admin') }}";

                    }
                    });
                }
                });
            });
        });
        //ajax validation for login

        //ajax validation for login
    </script>

    {{-- remember me codes --}}
    <script>
        function saveLogin() {
          var emailInput = document.getElementById("email");
          var passwordInput = document.getElementById("login-password");
          var rememberMeCheckbox = document.getElementById("rememberMe");

          if (rememberMeCheckbox.checked) {
            var email = emailInput.value.trim();
            var password = passwordInput.value.trim();

            // Save the login details in a cookie or local storage
            // Note: Here, we are using local storage as an example
            localStorage.setItem("rememberedEmail", email);
            localStorage.setItem("rememberedPassword", password);
          } else {
            // Clear the saved login details from the cookie or local storage
            localStorage.removeItem("rememberedEmail");
            localStorage.removeItem("rememberedPassword");
          }
        }

        function loadSavedLogin() {
          var emailInput = document.getElementById("email");
          var passwordInput = document.getElementById("login-password");
          var rememberMeCheckbox = document.getElementById("rememberMe");

          // Check if there are saved login details in the cookie or local storage
          var savedEmail = localStorage.getItem("rememberedEmail");
          var savedPassword = localStorage.getItem("rememberedPassword");

          if (savedEmail && savedPassword) {
            // Set the saved login details in the input fields
            emailInput.value = savedEmail;
            passwordInput.value = savedPassword;
            rememberMeCheckbox.checked = true;
          }
        }
    </script>
    {{-- remember me codes --}}

    {{-- password view codes --}}
    <script>
        function loginPwdView() {
            var x = document.getElementById("login-password");
            var y = document.getElementById("eye1");
            if (x.type === "password") {
            x.type = "text";
            y.src = "{{ asset('assets/img/Icons/Closed Eye.png') }}";
            } else {
            x.type = "password";
            y.src = "{{ asset('assets/img/Icons/Opened Eye.png') }}";
            }
        }
        function signUpPwdView(){
            var x = document.getElementById("signup-password");
            var y = document.getElementById("eye2");
            if (x.type === "password") {
            x.type = "text";
            y.src = "{{ asset('assets/img/Icons/Closed Eye.png') }}";
            } else {
            x.type = "password";
            y.src = "{{ asset('assets/img/Icons/Opened Eye.png') }}";
            }
        }
    </script>
    {{-- password view codes --}}

    {{-- scroll to top --}}
    <script>
        let mybutton = document.getElementById("myBtn");
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
            }
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>
    {{-- scroll to top --}}

    {{-- search box hide/show --}}
    <script>
        $(".search-box").hide();
        $(".search").click(function(){
            $('.navbar-nav').fadeOut();
            $('.search-box').fadeIn('slow');
        })
        $("#close-search").click(function(){
            $('.search-box').fadeOut('slow');
            $('.navbar-nav').fadeIn('slow');
        })
    </script>
    <script>
        var input = document.getElementById("input-search");

        input.addEventListener("input", function() {
        if (input.value.length > 0) {
            input.style.color = "#FF8CB9"; // Change text color to red when there is text
        } else {
            input.style.color = "black"; // Change text color back to black when there is no text
        }
        });
    </script>
    {{-- search box hide/show --}}

    {{-- scroll effect codes --}}
    <script>
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos || currentScrollPos <= 0) {
            document.getElementById("navbar").style.top = "0";
            if(prevScrollpos > 100){
                $('#navbar').addClass('bg-light');
                $('#navbar').addClass('shadow');
            }else{
                $('#navbar').removeClass('bg-light');
                $('#navbar').removeClass('shadow');
            }
        } else {
            document.getElementById("navbar").style.top = "-96px"; // Adjust the value based on your navbar height
        }
        prevScrollpos = currentScrollPos;
        }

    </script>
    {{-- scroll effect codes --}}
</body>
</html>




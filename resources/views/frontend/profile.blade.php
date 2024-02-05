@extends('layouts.f-master')

@section('title', 'Profile')

@section('css')
<style>
    .nav-container{
        display: grid;
        grid-template-columns: auto auto auto auto auto;
        /* grid-column-gap: 46px; */
        justify-content: space-between;
        padding: 116px 178px 48px 178px;
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
    #profile{
        padding: 30px 32px;
        background: #FFF;
        box-shadow: 1px 0px 0px 0px rgba(0, 0, 0, 0.15);
        height: 734px;
        margin-bottom: 20px;
        position: relative;
    }
    .title{
        color: #222;
        font-family: Source Sans Pro;
        font-size: 24px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        text-transform: uppercase;
    }
    .user-img{
        width: 80px;
        height: 80px;
        border-radius: 50%;
    }
    .profile-container{
        margin-top: 32px;
    }
    .profile-img-container{
        margin-right: 28px;
    }
    .diamond{
        width: 14px;
        height: 14px;
        margin-right: 4px;
    }
    .gem_amount{
        border-radius: 16px;
        border: 1px solid #FDD7E6;
        background: #FEE5EF;
        padding: 2px 12px;
        color: #FF3C86;
        text-align: left;
        font-family: Montserrat;
        font-size: 12px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }
    .username{
        color: #222;
        text-align: left;
        font-family: Source Sans Pro;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }
    .user_mail{
        color: #666;
        text-align: left;
        font-family: Source Sans Pro;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        margin-bottom: 10px;
    }
    .btn-container{
        margin-top: 40px;
    }
    .profile-btn{
        text-decoration: none;
        color: #666;
        text-align: left;
        font-family: Source Sans Pro;
        font-size: 18px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        padding: 14px 24px;
        border-radius: 12px;
        display: block;
        margin-bottom: 12px;
        cursor: pointer;
    }
    .fa-circle-user{
        margin-right: 12px;
    }
    .profile-btn-icon{
        width: 24px;
        height: 24px;
        margin-right: 12px;
    }
    .active{
        background: #FF3C86;
        color: #FFF;
    }

    /* myAccount */
    #profile-tabs{
        background: transparent;
        overflow: hidden;
    }
    .myAccount, .library, .history{
        padding: 32px;
        height: 734px;
        margin-left: 32px;
        background: #fff;
        width: 100%;
    }
    .frame{
        width: 550px;
    }
    .header{
        color: #222;
        text-align: left;
        font-family: Source Sans Pro;
        font-size: 26px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }
    .edit_profile{
        text-align: right;
        font-family: Source Sans Pro;
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }
    .user_information, .user_info_change, .update_profile, .change_password{
        margin-top: 32px;
        height: 100vh;
    }
    .label{
        color: #222;
        text-align: left;
        font-family: Source Sans Pro;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        margin-top: 10px;
    }
    .input{
        border-radius: 4px;
        border: 1px solid #E9EAEC;
        background: #F2F1F1;
        color: #222;
        text-align: left;
        font-family: Source Sans Pro;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        padding: 12px 20px;
    }
    .input:focus{
        border: 1px solid #FF3C86;
        box-shadow: none;
    }
    .input-row{
        margin-bottom: 24px;
    }
    .dropdown{
        color: #222;
        text-align: left;
        font-family: Source Sans Pro;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        cursor: pointer;
    }
    .btn{
        text-align: left;
        font-family: Source Sans Pro;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
    }
    .log-out-btn{
        color: #FF1A1A;
        text-align: center;
        font-family: Source Sans Pro;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        position: absolute;
        bottom: 37px;
        height: 0px;
    }
    .error{
        text-align: left;
        font-family: Source Sans Pro;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
    }
    /* myAccount */

    /* library */
    .library-frame, .history-frame{
        width: 100%;
        height: 734px;
        overflow: scroll;
    }
    .library-tabs, .history-tabs{
        margin-top: 16px;
    }
    .library-tab, .history-tab{
        color: #222;
        text-align: center;
        font-family: Source Sans Pro;
        font-size: 20px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        margin-right: 44px;
        padding-bottom: 5px;
        cursor: pointer;
    }
    .click{
        border-bottom: 2px solid #FF3C86;
    }
    .book-text{
        font-family: Source Sans Pro;
        font-size: 12px;
        font-weight: 600;
        line-height: 22px;
        letter-spacing: 0em;
        text-align: left;
    }
    .book-list{
        margin-top: 12px;
        margin-bottom: 8px;
        color: #4D4D4D;
        font-size: 14px;
        font-family: Source Sans Pro;
    }
    .img-container{
        position: relative;
    }
    .img-container img{
        width: 100%;
    }
    .ongoing-status{
        position: absolute;
        top: 8px;
        right: 8px;
        background-color: #FE5092;
        border-radius: 16px;
        padding: 1px 2px;
        color: #FFF;
        text-align: center;
        font-size: 10px;
        font-family: 'Source Sans Pro', sans-serif;
        font-weight: 600;
    }
    .completed-status{
        position: absolute;
        top: 8px;
        right: 8px;
        background-color: #fed2e3;
        border-radius: 16px;
        border: 1px solid #FE5092;
        padding: 1px 2px;
        color: #FE5092;
        text-align: center;
        font-size: 10px;
        font-family: 'Source Sans Pro', sans-serif;
        font-weight: 600;
    }
    .book-container {
        display: grid;
        grid-template-columns: 120px 120px 120px 120px 120px 120px;
        grid-column-gap: 24px;
    }
    .book {
        width: 100%;
        box-sizing: border-box;
        margin-bottom: 0px;
    }
    .preview{
        /* aspect-ratio: 3 / 4; */
        width: 100%;
        border-radius: 5px;
    }
    /* library */

    /* history */
    .touch{
        border-bottom: 2px solid #FF3C86;
    }
    .history-profile{
        width: 56px;
        height: 56px;
        border-radius: 10px;
    }
    .history-text{
        color: #222;
        font-family: Source Sans Pro;
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: 120%; /* 21.6px */
        margin-left: 24px;
    }
    .time{
        color: #787878;
        font-family: Source Sans Pro;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }
    .history-line{
        border: 1px solid #eee;
        margin: 16px 0;
    }

    @media only screen and (max-width:1267px){
        .nav-container{
            display: grid;
            grid-template-columns: auto auto auto auto auto;
            /* grid-column-gap: 46px; */
            justify-content: space-between;
            padding: 116px 100px 48px 100px;
        }
        .book-container {
            display: grid;
            grid-template-columns: 120px 120px 120px 120px 120px;
            grid-column-gap: 24px;
        }
        #profile{
            padding: 30px 16px;
            background: #FFF;
            box-shadow: 1px 0px 0px 0px rgba(0, 0, 0, 0.15);
            height: 734px;
            margin-bottom: 20px;
            position: relative;
        }
        .myAccount, .library, .history{
            padding: 32px;
            height: 734px;
            margin-left: 8px;
            background: #fff;
            width: 100%
        }
    }
    @media only screen and (max-width:1120px){
        .nav-container{
            display: grid;
            grid-template-columns: auto auto auto auto auto;
            /* grid-column-gap: 46px; */
            justify-content: space-between;
            padding: 116px 50px 48px 50px;
        }
        .book-container {
            display: grid;
            grid-template-columns: 120px 120px 120px 120px;
            grid-column-gap: 24px;
        }
    }
    @media only screen and (max-width:1020px){
        .nav-container{
            display: grid;
            grid-template-columns: auto auto auto auto auto;
            /* grid-column-gap: 46px; */
            justify-content: space-between;
            padding: 120px 100px 48px 100px;
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
        .nav-container{
            display: grid;
            grid-template-columns: auto auto auto auto auto;
            /* grid-column-gap: 46px; */
            justify-content: space-between;
            padding: 90px 100px 48px 100px;
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
        #profile{
            padding: 30px 16px;
            background: #FFF;
            box-shadow: 1px 0px 0px 0px rgba(0, 0, 0, 0.15);
            height: auto;
            margin-bottom: 20px;
            position: relative;
        }
        .log-out-btn{
            color: #FF1A1A;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            position: absolute;
            top: 90px;
            right: 10px;
        }
        .btn-container{
            margin-top: 40px;
            display: grid;
            grid-template-columns: auto auto auto;
            z-index: 1;
        }
        .profile-btn{
            text-decoration: none;
            color: #666;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 18px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            padding: 14px 24px;
            border-radius: 12px;
            margin-bottom: 12px;
            cursor: pointer;
        }
        .fa-circle-user{
            margin-right: 12px;
        }
        .profile-btn-icon{
            width: 24px;
            height: 24px;
            margin-right: 12px;
        }
        .active{
            background: #FF3C86;
            color: #FFF;
        }
        .myAccount, .library, .history{
            margin: 0;
            width: 100%;
            height: auto;
            box-shadow: none;
        }
        #profile-tabs{
            background: #FFF;
        }
        .user_information, .user_info_change, .update_profile, .change_password{
            margin-top: 32px;
            height: auto;
            padding-bottom: 20px;
        }

    }
    @media only screen and (max-width:680px){
        .nav-container{
            display: grid;
            grid-template-columns: auto auto auto auto auto;
            /* grid-column-gap: 46px; */
            justify-content: space-around;
            padding: 100px 50px 30px 50px;
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
        #profile{
            padding: 30px 16px;
            background: #FFF;
            box-shadow: 1px 0px 0px 0px rgba(0, 0, 0, 0.15);
            height: auto;
            margin-bottom: 20px;
            position: relative;
        }
        .profile-btn{
            text-decoration: none;
            color: #666;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            padding: 14px 24px;
            border-radius: 12px;
            display: block;
            margin-bottom: 12px;
            cursor: pointer;
        }
        .active{
            background: #FF3C86;
            color: #FFF;
        }
        .myAccount, .library, .history{
            padding: 32px 0px;
            background: #fff;
            width: 100%;
        }
        .frame{
            width: 100%;
            padding-right: 15px;
        }
    }
    @media only screen and (max-width:576px){
        .nav-container{
            display: grid;
            grid-template-columns: auto auto auto auto auto;
            /* grid-column-gap: 46px; */
            justify-content: space-around;
            padding: 80px 25px 20px 25px;
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
        .title{
            display: none;
        }
        #profile{
            padding: 0px 0px;
            background: transparent;
            height: auto;
            margin-bottom: 0px;
            position: relative;
        }
        .btn-container{
            padding: 0px 8px;
        }
        .gem_amount{
            border-radius: 16px;
            border: 1px solid #FDD7E6;
            background: #FEE5EF;
            padding: 6px 12px;
            color: #FF3C86;
            text-align: center;
            font-family: Montserrat;
            font-size: 12px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
        }
        .username{
            color: #222;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 20px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
        }
        .user_mail{
            color: #666;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            margin-bottom: 10px;
        }
        .user-img{
            margin-top: 0px;
            padding-top: 0px;
            width: 80px;
            height: 80px;
            margin-bottom: 8px;
        }
        .profile-img-container{
            margin-right: 0px;
        }
        .log-out-btn{
            color: #FF1A1A;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 14px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            position: absolute;
            top: 30px;
        }
        .profile-btn{
            padding: 10px 16px;
            font-size: 16px;
            border-radius: 20px;
        }
        .myAccount{
            position: relative;
        }
        #profile-tabs{
            background: transparent;
        }
        .myAccount, .library, .history{
            background: transparent;
            padding: 0px 8px;
        }
        .dropdown{
            position: absolute;
            top: 20px;
            right: 10px;
        }
        .dropdown .edit_profile{
            color: #FE5092;
        }
        .library-tabs, .history-tabs{
            justify-content: space-around;
        }
        .library-tab, .history-tab{
            margin-right: 0px;
            font-size: 16px;
        }
        .history-profile{
            width: 48px;
            height: 48px;
        }
        .history-text{
            font-size: 15px;
        }
        .time{
            font-size: 13px;
        }
        .book-container{
            grid-template-columns: auto auto;
        }

    }
    @media only screen and (max-width:335px){
        .nav-container{
            display: grid;
            grid-template-columns: auto auto auto auto auto;
            /* grid-column-gap: 46px; */
            justify-content: space-around;
            padding: 80px 16px 20px 16px;
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
</style>
@endsection

@section('content')
<div class="container-fluid">
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
    <div class="row">
        <div class="col-xl-3 col-lg-4" id="profile">
            <h1 class="title">USER PROFILE</h1>
            <div class="d-none d-sm-block">
                <div class="d-flex profile-container">
                    <div class="profile-img-container">
                        @if (Auth::user()->profile == NULL)
                        <img class="user-img" src="{{ asset('assets/img/profile/profile.png') }}" alt="">
                        @else
                        <img class="user-img" src="{{ asset('assets/img/profile/'.Auth::user()->profile) }}" alt="">
                        @endif
                    </div>
                    <div class="userInfo">
                        <h3 class="username">{{ Auth::user()->name }}</h3>
                        <p class="user_mail">{{ Auth::user()->email }}</p>
                        <span class="gem_amount">
                            <img src="{{ asset("assets/img/Icons/diamond.png") }}" class="diamond" alt="">
                            <span>Gems: {{ Auth::user()->gem }}</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="d-sm-none d-block">
                <div class="profile-container text-center">
                    <div class="profile-img-container">
                        @if (Auth::user()->profile == NULL)
                        <img class="user-img" src="{{ asset('assets/img/profile/profile.png') }}" alt="">
                        @else
                        <img class="user-img" src="{{ asset('assets/img/profile/'.Auth::user()->profile) }}" alt="">
                        @endif
                    </div>
                    <div class="userInfo">
                        <h3 class="username">{{ Auth::user()->name }}</h3>
                        <p class="user_mail">{{ Auth::user()->email }}</p>
                        <span class="gem_amount">
                            <img src="{{ asset("assets/img/Icons/diamond.png") }}" class="diamond" alt="">
                            <span>Gems: {{ Auth::user()->gem }}</span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="btn-container">
                <a class="profile-btn active" id="myAccount"><i class="fa-regular fa-circle-user d-none d-sm-inline-block"></i> My Account</a>
                <a class="profile-btn" id="library">
                    <img src="{{ asset('assets/img/Icons/book.png') }}" class="profile-btn-icon book-icon d-none d-sm-inline-block" alt="">
                    Library
                </a>
                <a class="profile-btn" id="history"><img src="{{ asset('assets/img/Icons/history.png') }}" class="profile-btn-icon active_history d-none d-sm-inline-block" alt=""> History</a>
            </div>
            <hr class="d-block d-sm-none m-0 p-0" style="border: 1px solid lightgrey">
            <form id="logout" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn log-out-btn">
                    <i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180 me-2 d-none d-sm-inline-block"></i>{{ __('Sign Out') }}
                </button>
            </form>
        </div>
        <div class="col-xl-9 col-lg-8" id="profile-tabs">
            <div class="myAccount">
                <div class="frame">
                    <div class="d-flex justify-content-between">
                        <h1 class="header d-none d-sm-block">My Account</h1>
                        <div class="mt-1">
                            <div class="dropdown ms-2">
                                <a class="edit_profile" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="d-none d-sm-block">Edit Profile</span>
                                    <i class="fas fa-pen-to-square d-sm-none d-block"></i>
                                </a>
                                <ul class="dropdown-menu border border-none shadow" style="border-radius: 1px;">
                                  <li><a class="dropdown-item" id="update_profile"><i class="fas fa-user-pen me-1" ></i>Update Profile</a></li>
                                  <li><a class="dropdown-item" id="user_info_change"><i class="fas fa-user-pen me-1" ></i>Update User Info</a></li>
                                  <li><a class="dropdown-item" id="change_password" href="#"><i class="fas fa-key me-1"></i>Change Password</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="user_information">
                        <div class="row input-row">
                            <div class="col-md-3 mb-1">
                                <label for="" class="label">Username</label>
                            </div>
                            <div class="col-md-9 mb-1">
                                <input type="text" name="name" class="form-control input w-100" disabled value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <div class="row input-row">
                            <div class="col-md-3 mb-1">
                                <label for="" class="label">Email</label>
                            </div>
                            <div class="col-md-9 mb-1">
                                <input type="email" name="email" class="form-control input w-100" disabled value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="update_profile">
                        <form action="{{ url('/profile/update_profile/'.Auth::user()->email) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row input-row">
                                <div class="col-md-3 mb-1">
                                    <label for="image" class="label">Change Profile</label>
                                </div>
                                <div class="col-md-9 mb-1">
                                    <input type="file" name="profile" id="image" class="form-control input w-100" accept="image/jpg, image/jpeg, image/png">
                                    @error('profile')
                                        <p class="text-danger error">*{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary"><i class="fas fa-user-pen me-1"></i>Change Profile</button>
                            </div>
                        </form>
                    </div>
                    <div class="user_info_change">
                        <form action="{{ url('/profile/user_info/'.Auth::user()->email) }}" method="post">
                            @csrf
                            <div class="row input-row">
                                <div class="col-md-3 mb-1">
                                    <label for="name" class="label">Username</label>
                                </div>
                                <div class="col-md-9 mb-1">
                                    <input type="text" name="name" id="name" class="form-control input w-100" value="{{ Auth::user()->name }}">
                                    @error('name')
                                    <p class="text-danger error">*{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary"><i class="fas fa-pen-to-square me-1"></i>Edit</button>
                            </div>
                        </form>
                    </div>
                    <div class="change_password">
                        <form action="{{ url('/profile/change_password/'.Auth::user()->email) }}" method="post">
                            @csrf
                            <div class="row input-row">
                                <div class="col-md-3 mb-1">
                                    <label for="old_password" class="label">Old Password</label>
                                </div>
                                <div class="col-md-9 mb-1">
                                    <input type="password" name="oldpassword" id="old_password" class="form-control input w-100" value="">
                                </div>
                            </div>
                            <div class="row input-row">
                                <div class="col-md-3 mb-1">
                                    <label for="new_password" class="label">New Password</label>
                                </div>
                                <div class="col-md-9 mb-1">
                                    <input type="password" name="password" id="new_password" class="form-control input w-100" value="">
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary"><i class="fas fa-key me-1"></i>Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="library">
                <div class="library-frame">
                    <h1 class="header d-none d-sm-block">Library</h1>
                    <div class="d-flex library-tabs">
                        <div>
                            <p class="library-tab click" id="bookmark">Bookmarks</p>
                        </div>
                        <div>
                            <p class="library-tab" id="purchase">Purchased</p>
                        </div>
                    </div>
                    <div class="bookmark">
                        <div class="book-container">
                            @foreach ($bookmarks as $book)
                            <a href="{{ url('/novel-'.$book->id) }}" class="book text-decoration-none text-dark">
                                <div class="img-container">
                                    <img src="{{ asset('assets/img/book/'.$book->image) }}" class="preview shadow-sm" alt="">
                                    @if ($book->status == "ONGOING")
                                    <span class="ongoing-status badge">ONGOING</span>
                                    @elseif($book->status == "COMPLETED")
                                    <span class="completed-status badge">COMPLETED</span>
                                    @endif
                                </div>
                                <div class="book-list">
                                    <small><i class="fas fa-list me-2"></i> Chapters: {{ $book->chapter->count() }}</small><br>
                                    <small><img src="{{ asset('assets/img/Icons/Opened Eye.png') }}" class="d-inline me-2" width="10px" alt="">
                                        @php
                                            $views = $book->chapter->sum('view_count');
                                        @endphp
                                        @if ($views >= 1000 && $views < 1000000)
                                            {{ number_format($views / 1000, 0) . 'k' }}
                                        @elseif ($views >= 1000000)
                                            {{ number_format($views / 1000000, 0) . 'm' }}
                                        @else
                                            {{ $views }}
                                        @endif
                                    </small>
                                </div>
                                <p class="book-text">
                                    {{ Str::limit($book->title, 30) }}
                                </p>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="purchase">
                        <div class="book-container">
                            @foreach ($purchase as $book)
                            <a href="{{ url('/novel-'.$book->id) }}" class="book text-decoration-none text-dark">
                                <div class="img-container">
                                    <img src="{{ asset('assets/img/book/'.$book->image) }}" class="preview shadow-sm" alt="">
                                    @if ($book->status == "ONGOING")
                                    <span class="ongoing-status badge">ONGOING</span>
                                    @elseif($book->status == "COMPLETED")
                                    <span class="completed-status badge">COMPLETED</span>
                                    @endif
                                </div>
                                <div class="book-list">
                                    <small><i class="fas fa-list me-2"></i> Chapters: {{ $book->chapter->count() }}</small><br>
                                    <small><img src="{{ asset('assets/img/Icons/Opened Eye.png') }}" class="d-inline me-2" width="10px" alt="">
                                        @php
                                            $views = $book->chapter->sum('view_count');
                                        @endphp
                                        @if ($views >= 1000 && $views < 1000000)
                                            {{ number_format($views / 1000, 0) . 'k' }}
                                        @elseif ($views >= 1000000)
                                            {{ number_format($views / 1000000, 0) . 'm' }}
                                        @else
                                            {{ $views }}
                                        @endif
                                    </small>
                                </div>
                                <p class="book-text">
                                    {{ Str::limit($book->title, 30) }}
                                </p>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="history">
                <div class="history-frame">
                    <h1 class="header d-none d-sm-block">History</h1>
                    <div class="d-flex history-tabs">
                        <div>
                            <p class="history-tab touch" id="novel_order">Novel Order</p>
                        </div>
                        <div>
                            <p class="history-tab" id="gem_order">Gem Order</p>
                        </div>
                    </div>
                    <div class="novel_order">
                        @foreach ($orders as $order)
                        <div class="d-flex history-data">
                            <div>
                                @if ($order->user->profile == NULL)
                                <img class="history-profile" src="{{ asset('assets/img/profile/profile.png') }}" alt="">
                                @else
                                <img class="history-profile" src="{{ asset('assets/img/profile/'.$order->user->profile) }}" alt="">
                                @endif
                            </div>
                            <div class="history-text">
                                <p class="p-0 m-0">You bought the chapter ({{ $order->chapter->name ?? "..."  }}) from the ({{ $order->book->title }}) novel.</p>
                                <small class="time">{{ date('D, M d, Y, h:m A', strtotime($order->created_at)) }}</small>
                            </div>
                        </div>
                        <hr class="history-line">
                        @endforeach
                    </div>
                    <div class="gem_order">
                        @foreach ($gem_orders as $order)
                        <div class="d-flex history-data">
                            <div>
                                @if ($order->user->profile == NULL)
                                <img class="history-profile" src="{{ asset('assets/img/profile/profile.png') }}" alt="">
                                @else
                                <img class="history-profile" src="{{ asset('assets/img/profile/'.$order->user->profile) }}" alt="">
                                @endif
                            </div>
                            <div class="history-text">
                                <p class="p-0 m-0">You ordered <i class="fas fa-gem ms-1" style="color: #FE5092"></i> ({{ $order->gem_amount }}) Gems from Super Admin.</p>
                                <small class="time">{{ date('D, M d, Y, h:m A', strtotime($order->created_at)) }}</small>
                            </div>
                        </div>
                        <hr class="history-line">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
{{-- my account tabs --}}
<script>
    $(document).ready(function(){
        $(".update_profile").hide();
        $(".user_info_change").hide();
        $(".change_password").hide();
        $("#update_profile").click(function(){
            $(".update_profile").show();
            $(".user_info_change").hide();
            $(".change_password").hide();
            $(".user_information").hide();
        })
        $("#user_info_change").click(function(){
            $(".update_profile").hide();
            $(".user_info_change").show();
            $(".change_password").hide();
            $(".user_information").hide();
        })
        $("#change_password").click(function(){
            $(".update_profile").hide();
            $(".user_info_change").hide();
            $(".change_password").show();
            $(".user_information").hide();
        })

    })
</script>
{{-- my account tabs --}}

{{-- library tabs --}}
<script>
    $(document).ready(function(){
        $(".purchase").hide();
        $("#bookmark").click(function(){
            $(".bookmark").show();
            $(".purchase").hide();

            $("#bookmark").addClass("click");
            $("#purchase").removeClass("click");
        })
        $("#purchase").click(function(){
            $(".bookmark").hide();
            $(".purchase").show();

            $("#bookmark").removeClass("click");
            $("#purchase").addClass("click");
        })
    })
</script>
{{-- library tabs --}}

{{-- history tabs --}}
<script>
    $(document).ready(function(){
        $(".gem_order").hide();
        $("#novel_order").click(function(){
            $(".novel_order").show();
            $(".gem_order").hide();

            $("#novel_order").addClass("touch");
            $("#gem_order").removeClass("touch");
        })
        $("#gem_order").click(function(){
            $(".novel_order").hide();
            $(".gem_order").show();

            $("#novel_order").removeClass("touch");
            $("#gem_order").addClass("touch");
        })
    })
</script>
{{-- history tabs --}}

{{-- sidebar tabs --}}
<script>
    $(document).ready(function(){
        $(".library").hide();
        $(".history").hide();
        $("#myAccount").click(function(){
            $(".myAccount").show();
            $(".library").hide();
            $(".history").hide();

            $("#myAccount").addClass('active');
            $("#library").removeClass('active');
            $('.book-icon').attr("src", "{{ asset('assets/img/Icons/book.png') }}")
            $("#history").removeClass('active');
            $('.active_history').attr("src", "{{ asset('assets/img/Icons/history.png') }}")
        })
        $("#library").click(function(){
            $(".myAccount").hide();
            $(".library").show();
            $(".history").hide();

            $("#myAccount").removeClass('active');
            $("#library").addClass('active');
            $('.book-icon').attr("src", "{{ asset('assets/img/Icons/active_book.png') }}")
            $("#history").removeClass('active');
            $('.active_history').attr("src", "{{ asset('assets/img/Icons/history.png') }}")
        })
        $("#history").click(function(){
            $(".myAccount").hide();
            $(".library").hide();
            $(".history").show();

            $("#myAccount").removeClass('active');
            $("#library").removeClass('active');
            $('.book-icon').attr("src", "{{ asset('assets/img/Icons/book.png') }}")
            $("#history").addClass('active');
            $('.active_history').attr("src", "{{ asset('assets/img/Icons/active_history.png') }}")
        })
    })
</script>
{{-- sidebar tabs --}}
@endsection

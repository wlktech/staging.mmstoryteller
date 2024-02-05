@extends('layouts.f-master')

@section('title', 'Home')

@section('css')
<style>
    /* home banner */
    #home-banner {
        padding-top: 96px;
    }
    .responsive{
        padding: 0 32px;
    }
    /* .slick-dots li button{

    } */
    /* .slick-dots li button:hover{
        opacity: 1;
    } */
    .slick-dots li button:before{
        width: 12px;
        height: 12px;
        background-color: #FF73A8;
        border-radius: 50%;
        opacity: 0.3;
    }
    .slick-dots li.slick-active button:before
    {
        opacity: 1;
        background-color: #FF73A8;
    }

    .slick-dots{
        bottom: -40px !important;
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
            padding: 64px 100px;
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
        #home-banner{
            padding-top: 75px;
        }
        .responsive{
            padding: 0 16px;
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
    }
    @media only screen and (max-width:680px){
        .nav-container{
            display: grid;
            grid-template-columns: auto auto auto auto auto;
            /* grid-column-gap: 46px; */
            justify-content: space-around;
            padding: 64px 50px;
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
            padding: 32px 25px;
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
            padding: 32px 16px;
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
    /* home banner */

    /* popular, latest, new, fanfic */
    #popular, #new, #latest, #fanfic{
        padding: 48px 32px;
        overflow: hidden;
    }
    .book-text{
        font-family: Source Sans Pro;
        font-size: 18px;
        font-weight: 600;
        line-height: 22px;
        letter-spacing: 0em;
        text-align: left;
    }
    .book-text1{
        color: #222;
        font-family: Source Sans Pro;
        font-size: 12px;
        font-style: normal;
        font-weight: 600;
        line-height: 20px;
        margin-top: 0px;
        padding-top: 0px;
    }
    .book-list{
        margin-top: 12px;
        margin-bottom: 8px;
        color: #4D4D4D;
        font-size: 14px;
        font-family: Source Sans Pro;
    }
    .book-list1{
        margin-top: 12px;
        margin-bottom: 4px;
        color: #4D4D4D;
        font-size: 14px;
        font-family: Source Sans Pro;
    }
    .title{
        color: #222;
        font-size: 32px;
        font-family: 'Source Sans Pro', sans-serif;
        font-weight: 700;
        margin-bottom: 32px;
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
        padding: 4px 10px;
        color: #FFF;
        text-align: center;
        font-size: 12px;
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
        padding: 4px 10px;
        color: #FE5092;
        text-align: center;
        font-size: 12px;
        font-family: 'Source Sans Pro', sans-serif;
        font-weight: 600;
    }
    .ongoing-status1{
        position: absolute;
        top: 8px;
        right: 8px;
        background-color: #FE5092;
        border-radius: 16px;
        padding: 4px 10px;
        color: #FFF;
        text-align: center;
        font-size: 7px;
        font-family: 'Source Sans Pro', sans-serif;
        font-weight: 600;
    }
    .completed-status1{
        position: absolute;
        top: 8px;
        right: 8px;
        background-color: #fed2e3;
        border-radius: 16px;
        border: 1px solid #FE5092;
        padding: 4px 10px;
        color: #FE5092;
        text-align: center;
        font-size: 7px;
        font-family: 'Source Sans Pro', sans-serif;
        font-weight: 600;
    }
    .book-container {
        display: grid;
        grid-column-gap: 29px;
        /* grid-template-columns: auto auto auto auto auto; */

    }
    .book {
        width: 100%;
        box-sizing: border-box;
        margin-bottom: 32px;
    }
    .preview{
        /* aspect-ratio: 4 / 6; */
        width: 100%;
        /* height: 312px; */
        border-radius: 5px;
    }
    .preview1{
        /* aspect-ratio: 4 / 5; */
        width: 100%;
        /* height: 133px; */
        border-radius: 5px;
    }
    .viewAll{
        padding: 8px 16px;
        background-color: #FE5092;
        color: #fff;
        border-radius: 4px;
        color: #FFF;
        text-align: center;
        font-family: Montserrat;
        font-size: 12px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        text-transform: capitalize;
    }
    .viewAll:hover{
        background-color: #FE5092;
        color: #fff;
        box-shadow: 1px 2px 3px #FF73A8;
    }
    .viewAll1{
        padding: 4px 11px;
        color: #FFF;
        text-align: center;
        font-family: Source Sans Pro;
        font-size: 8px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        text-transform: capitalize;
        border-radius: 4px;
        background: #FF3C86;
    }
    .viewAll1:hover{
        background-color: #FE5092;
        color: #fff;
        box-shadow: 1px 2px 3px #FF73A8;
    }
    .title1{
        color: #222;
        text-align: center;
        font-family: Source Sans Pro;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        text-transform: capitalize;
    }
    .heading{
        margin-bottom: 16px;
    }
    /* book container only */
    @media only screen and (max-width:1920px){
        .book-container {
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }
    }
    @media only screen and (max-width:1440px){
        .book-container {
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        }
    }
    @media only screen and (max-width:1379px){
        .book-container {
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
        }
    }
    @media only screen and (max-width:1329px){
        .book-container {
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        }
    }
    @media only screen and (max-width:1279px){
        .book-container {
            grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
        }
    }
    @media only screen and (max-width:1229px){
        .book-container {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        }
    }
    @media only screen and (max-width:1179px){
        .book-container {
            grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
        }
    }
    @media only screen and (max-width:1129px){
        .book-container {
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        }
    }
    @media only screen and (max-width:1079px){
        .book-container {
            grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
        }
    }
    @media only screen and (max-width:1029px){
        .book-container {
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        }
    }
    @media only screen and (max-width:992px){
        .book-container {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        }
    }
    @media only screen and (max-width:897px){
        .book-container {
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        }
    }
    @media only screen and (max-width:847px){
        .book-container {
            grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
        }
    }
    @media only screen and (max-width:797px){
        .book-container {
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        }
    }
    /* book container only */
    /* popular, latest, new, fanfic */
</style>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-E9F15MS6BV"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-E9F15MS6BV');
</script>
@endsection


@section('content')
{{-- Home Banner --}}
<div class="" style="overflow: hidden;" id="home-banner">
    <div class="responsive">
        @foreach ($banners as $banner)
        <div>
            <img src="{{ asset('assets/img/homebanner/'.$banner->image) }}" class="w-100" style="border-radius: 8px;" alt="">
        </div>
        @endforeach
    </div>
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
{{-- Home Banner --}}

{{-- Popular Series --}}
{{-- Desktop view --}}
<div class="container-fluid d-none d-md-block bg-light" id="popular" style="">
    <div class="d-flex justify-content-between">
        <h1 class="title">Popular Series</h1>
        <div>
            <a href="{{ url('/popular_series') }}" class="btn viewAll">VIEW ALL</a>
        </div>
    </div>

    <div class="book-container">
        @foreach ($popularBooks as $popular)
        <a href="{{ url('/novel-'.$popular->id) }}" class="book text-decoration-none text-dark">
            <div class="img-container">
                <img src="{{ asset('assets/img/book/'.$popular->image) }}" class="preview shadow-sm" alt="">
                @if ($popular->status == "ONGOING")
                <span class="ongoing-status badge">ONGOING</span>
                @elseif($popular->status == "COMPLETED")
                <span class="completed-status badge">COMPLETED</span>
                @endif
            </div>
            <div class="book-list">
                <small><i class="fas fa-list me-2"></i> Chapters: {{ $popular->chapter->count() }}</small><br>
                <small><img src="{{ asset('assets/img/Icons/Opened Eye.png') }}" class="d-inline me-2" width="10px" alt="">
                    @php
                        $views = $popular->chapter->sum('view_count');
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
                {{ Str::limit($popular->title, 30) }}
            </p>
        </a>
        @endforeach
    </div>
</div>
{{-- Desktop view --}}
{{-- Mobile View --}}
<div class="container-fluid d-md-none d-sm-block" style="overflow: hidden; padding: 0px 16px 32px 16px;">
    <div class="d-flex justify-content-between heading">
        <h1 class="title1">Popular Series</h1>
        <div>
            <a href="{{ url('/popular_series') }}" class="btn viewAll1">VIEW ALL</a>
        </div>
    </div>
    <div class="row">
        @foreach ($popularMobile as $popular)
        <div class="col-4 mb-3">
            <a href="{{ url('/novel-'.$popular->id) }}" class="text-decoration-none text-dark">
                <div class="img-container">
                    <img src="{{ asset('assets/img/book/'.$popular->image) }}" class="preview1 w-100 shadow" alt="">
                    @if ($popular->status == "ONGOING")
                    <span class="ongoing-status1 badge">ONGOING</span>
                    @elseif($popular->status == "COMPLETED")
                    <span class="completed-status1 badge">COMPLETED</span>
                    @endif
                </div>
                <div class="book-list1">
                    <small><i class="fas fa-list me-2"></i> Chapters: {{ $popular->chapter->count() }}</small><br>
                    <small><img src="{{ asset('assets/img/Icons/Opened Eye.png') }}" class="d-inline me-2" width="10px" alt="">
                        @php
                            $views = $popular->chapter->sum('view_count');
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
                <p class="book-text1 pt-0 mt-0">
                    {{ Str::limit($popular->title, 30) }}
                </p>
            </a>
        </div>
        @endforeach
    </div>
    <hr style="border: 1px solid #d3d3d3; margin:0;">
</div>
{{-- Mobile View --}}
{{-- Popular Series --}}

{{-- New Series --}}
{{-- Desktop view --}}
<div class="container-fluid d-none d-sm-block" style="padding: 48px 32px; overflow: hidden;background: linear-gradient(180deg, #FFF 0%, #F8F8F8 100%);">
    <div class="d-flex justify-content-between">
        <h1 class="title">New Series</h1>
        <div>
            <a href="{{ url('/new_series') }}" class="btn viewAll">VIEW ALL</a>
        </div>
    </div>
    <div class="book-container">
        @foreach ($newBooks as $new)
        <a href="{{ url('/novel-'.$new->id) }}" class="book text-decoration-none text-dark">
            <div class="img-container">
                <img src="{{ asset('assets/img/book/'.$new->image) }}" class="preview shadow-sm" alt="">
                @if ($new->status == "ONGOING")
                <span class="ongoing-status badge">ONGOING</span>
                @elseif($new->status == "COMPLETED")
                <span class="completed-status badge">COMPLETED</span>
                @endif
            </div>
            <div class="book-list">
                <small><i class="fas fa-list me-2"></i> Chapters: {{ $new->chapter->count() }}</small><br>
                <small><img src="{{ asset('assets/img/Icons/Opened Eye.png') }}" class="d-inline me-2" width="10px" alt="">
                    @php
                        $views = $new->chapter->sum('view_count');
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
                {{ Str::limit($new->title, 30) }}
            </p>
        </a>
        @endforeach
    </div>
</div>
{{-- Desktop view --}}
{{-- Mobile View --}}
<div class="container-fluid d-sm-none d-block bg-white" style="overflow: hidden; padding: 0px 16px 32px 16px;">
    <div class="d-flex justify-content-between heading">
        <h1 class="title1">New Series</h1>
        <div>
            <a href="{{ url('/new_series') }}" class="btn viewAll1">VIEW ALL</a>
        </div>
    </div>
    <div class="row">
        @foreach ($newMobile as $new)
        <div class="col-4 mb-3">
            <a href="{{ url('/novel-'.$new->id) }}" class="text-decoration-none text-dark">
                <div class="img-container">
                    <img src="{{ asset('assets/img/book/'.$new->image) }}" class="preview1 w-100 shadow" alt="">
                    @if ($new->status == "ONGOING")
                    <span class="ongoing-status1 badge">ONGOING</span>
                    @elseif($new->status == "COMPLETED")
                    <span class="completed-status1 badge">COMPLETED</span>
                    @endif
                </div>
                <div class="book-list1">
                    <small><i class="fas fa-list me-2"></i> Chapters: {{ $new->chapter->count() }}</small><br>
                    <small><img src="{{ asset('assets/img/Icons/Opened Eye.png') }}" class="d-inline me-2" width="10px" alt="">
                        @php
                            $views = $new->chapter->sum('view_count');
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
                <p class="book-text1">
                    {{ Str::limit($new->title, 30) }}
                </p>
            </a>
        </div>
        @endforeach
    </div>
    <hr style="border: 1px solid #d3d3d3; margin:0;">
</div>
{{-- Mobile View --}}
{{-- New Series --}}

{{-- Fanfic --}}
{{-- Desktop view --}}
<div class="container-fluid d-none d-sm-block" style="padding: 48px 32px; overflow: hidden;background: linear-gradient(180deg, #FFF 0%, #F8F8F8 100%);">
    <div class="d-flex justify-content-between">
        <h1 class="title">Fanfic</h1>
        <div>
            <a href="{{ url('/fanfic') }}" class="btn viewAll">VIEW ALL</a>
        </div>
    </div>
    <div class="book-container">
        @foreach ($fanBooks as $fan)
        <a href="{{ url('/novel-'.$fan->id) }}" class="book text-decoration-none text-dark">
            <div class="img-container">
                <img src="{{ asset('assets/img/book/'.$fan->image) }}" class="preview shadow-sm" alt="">
                @if ($fan->status == "ONGOING")
                <span class="ongoing-status badge">ONGOING</span>
                @elseif($fan->status == "COMPLETED")
                <span class="completed-status badge">COMPLETED</span>
                @endif
            </div>
            <div class="book-list">
                <small><i class="fas fa-list me-2"></i> Chapters: {{ $fan->chapter->count() }}</small><br>
                <small><img src="{{ asset('assets/img/Icons/Opened Eye.png') }}" class="d-inline me-2" width="10px" alt="">
                    @php
                        $views = $fan->chapter->sum('view_count');
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
                {{ Str::limit($fan->title, 30) }}
            </p>
        </a>
        @endforeach
    </div>
</div>
{{-- Desktop view --}}
{{-- Mobile View --}}
<div class="container-fluid d-sm-none d-block bg-white" style="overflow: hidden; padding: 0px 16px 32px 16px;">
    <div class="d-flex justify-content-between heading">
        <h1 class="title1">Fanfic</h1>
        <div>
            <a href="{{ url('/fanfic') }}" class="btn viewAll1">VIEW ALL</a>
        </div>
    </div>
    <div class="row">
        @foreach ($fanMobile as $fan)
        <div class="col-4 mb-3">
            <a href="{{ url('/novel-'.$fan->id) }}" class="text-decoration-none text-dark">
                <div class="img-container">
                    <img src="{{ asset('assets/img/book/'.$fan->image) }}" class="preview1 w-100 shadow" alt="">
                    @if ($fan->status == "ONGOING")
                    <span class="ongoing-status1 badge">ONGOING</span>
                    @elseif($fan->status == "COMPLETED")
                    <span class="completed-status1 badge">COMPLETED</span>
                    @endif
                </div>
                <div class="book-list1">
                    <small><i class="fas fa-list me-2"></i> Chapters: {{ $fan->chapter->count() }}</small><br>
                    <small><img src="{{ asset('assets/img/Icons/Opened Eye.png') }}" class="d-inline me-2" width="10px" alt="">
                        @php
                            $views = $fan->chapter->sum('view_count');
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
                <p class="book-text1">
                    {{ Str::limit($fan->title, 30) }}
                </p>
            </a>
        </div>
        @endforeach
    </div>
    <hr style="border: 1px solid #d3d3d3; margin:0;">
</div>
{{-- Mobile View --}}
{{-- Fanfic --}}

{{-- Latest Releases --}}
{{-- Desktop view --}}
<div class="container-fluid d-none d-sm-block" style="padding: 48px 32px; overflow: hidden;background: linear-gradient(180deg, #FFF 0%, #F8F8F8 100%);">
    <div class="d-flex justify-content-between">
        <h1 class="title">Latest Releases</h1>
        <div>
            <a href="{{ url('/latest_releases') }}" class="btn viewAll">VIEW ALL</a>
        </div>
    </div>
    <div class="book-container">
        @foreach ($latestBooks as $latest)
        <a href="{{ url('/novel-'.$latest->id) }}" class="book text-decoration-none text-dark">
            <div class="img-container">
                <img src="{{ asset('assets/img/book/'.$latest->image) }}" class="preview shadow-sm" alt="">
                @if ($latest->status == "ONGOING")
                <span class="ongoing-status badge">ONGOING</span>
                @elseif($latest->status == "COMPLETED")
                <span class="completed-status badge">COMPLETED</span>
                @endif
            </div>
            <div class="book-list">
                <small><i class="fas fa-list me-2"></i> Chapters: {{ $latest->chapter->count() }}</small><br>
                <small><img src="{{ asset('assets/img/Icons/Opened Eye.png') }}" class="d-inline me-2" width="10px" alt="">
                    @php
                        $views = $latest->chapter->sum('view_count');
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
                {{ Str::limit($latest->title, 30) }}
            </p>
        </a>
        @endforeach
    </div>
</div>
{{-- Desktop view --}}
{{-- Mobile View --}}
<div class="container-fluid d-sm-none d-block bg-white" style="overflow: hidden; padding: 0px 16px 32px 16px;">
    <div class="d-flex justify-content-between heading">
        <h1 class="title1">Latest Releases</h1>
        <div>
            <a href="{{ url('/latest_releases') }}" class="btn viewAll1">VIEW ALL</a>
        </div>
    </div>
    <div class="row">
        @foreach ($latestMobile as $latest)
        <div class="col-4 mb-3">
            <a href="{{ url('/novel-'.$latest->id) }}" class="text-decoration-none text-dark">
                <div class="img-container">
                    <img src="{{ asset('assets/img/book/'.$latest->image) }}" class="preview1 w-100 shadow" alt="">
                    @if ($latest->status == "ONGOING")
                    <span class="ongoing-status1 badge">ONGOING</span>
                    @elseif($latest->status == "COMPLETED")
                    <span class="completed-status1 badge">COMPLETED</span>
                    @endif
                </div>
                <div class="book-list1">
                    <small><i class="fas fa-list me-2"></i> Chapters: {{ $latest->chapter->count() }}</small><br>
                    <small><img src="{{ asset('assets/img/Icons/Opened Eye.png') }}" class="d-inline me-2" width="10px" alt="">
                        @php
                            $views = $latest->chapter->sum('view_count');
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
                <p class="book-text1">
                    {{ Str::limit($latest->title, 30) }}
                </p>
            </a>
        </div>
        @endforeach
    </div>
</div>
{{-- Mobile View --}}
{{-- Latest Releases --}}

@endsection

@section('script')
{{-- Home Banner Slick --}}
<script>
    $('.responsive').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    responsive: [
        {
        breakpoint: 1024,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true
        }
        },
        {
        breakpoint: 600,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
        },
        {
        breakpoint: 480,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
    });
</script>
{{-- Home Banner Slick --}}

{{-- Popular Series Slick --}}
<script>
    $('.responsive1').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    responsive: [
        {
        breakpoint: 1024,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true,
        }
        },
        {
        breakpoint: 600,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
        },
        {
        breakpoint: 480,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
    });
</script>
<script>
    $('.responsive2').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    prevArrow: '<i class="fas fa-arrow-left left_arrow1">',
    nextArrow: '<i class="fas fa-arrow-right right_arrow1">',
    // rtl: true,
    responsive: [
        {
        breakpoint: 1024,
        settings: {
            slidesToShow: 3.5,
            slidesToScroll: 1,
            infinite: true,
            dots: false,
        }
        },
        {
        breakpoint: 600,
        settings: {
            slidesToShow: 2.5,
            slidesToScroll: 1
        }
        },
        {
        breakpoint: 480,
        settings: {
            slidesToShow: 2.5,
            slidesToScroll: 1
        }
        }
    ]
    });

</script>
{{-- Popular Series Slick --}}


@endsection

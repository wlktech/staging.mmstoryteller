@extends('layouts.f-master')

@section('title', 'Category')

@section('css')
<style>
    #main{
        background-image: url('assets/img/Icons/gradient-background.png');
        background-repeat: no-repeat;
        padding: 0px 32px;
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
        #main{
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
            padding: 10px 100px 50px 100px;
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
            padding: 10px 50px 50px 50px;
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
            padding: 5px 25px 32px 25px;
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
            padding: 0px 16px 32px 16px;
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

    /* popular, latest, new, fanfic */
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
    .book-container {
        display: grid;
        /* grid-template-columns: auto auto auto auto auto; */
        grid-column-gap: 29px;
    }
    .book{
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
    .heading{
        margin-bottom: 16px;
    }
    .sortBy{
        color: #222;
        font-family: Source Sans Pro;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        margin-top: 3px;
    }
    .sortBy-text{
        color: #222;
        font-family: Source Sans Pro;
        font-size: 14px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }
    @media only screen and (max-width:992px){
        .title{
            color: #222;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 20px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            text-transform: capitalize;
            padding-bottom: 0px;
            margin-bottom: 0px;
        }
        .book-text{
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
            margin-bottom: 4px;
            color: #4D4D4D;
            font-size: 14px;
            font-family: Source Sans Pro;
        }
        #main{
            background-image: url('assets/img/gradient.png');
            background-repeat: no-repeat;
            padding: 96px 16px 32px 16px;
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
            font-size: 7px;
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
            font-size: 7px;
            font-family: 'Source Sans Pro', sans-serif;
            font-weight: 600;
        }
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
    @media only screen and (max-width:768px){
        .book-container {
            grid-column-gap: 8px;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            padding: 0px;
        }
    }
    @media only screen and (max-width:647px){
        .book-container {
            grid-column-gap: 8px;
            grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
            padding: 0px;
        }
    }
    @media only screen and (max-width:617px){
        .book-container {
            grid-column-gap: 8px;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            padding: 0px;
        }
    }
    @media only screen and (max-width:587px){
        .book-container {
            grid-column-gap: 8px;
            grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
            padding: 0px;
        }
    }
    @media only screen and (max-width:557px){
        .book-container {
            grid-column-gap: 8px;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            padding: 0px 0px;
        }
    }
    @media only screen and (max-width:527px){
        .book-container {
            grid-column-gap: 8px;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            padding: 0px 0px;
        }
    }
    @media only screen and (max-width:497px){
        .book-container {
            grid-column-gap: 8px;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            padding: 0px 0px;
        }
    }
    @media only screen and (max-width:467px){
        .book-container {
            grid-column-gap: 8px;
            grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
            padding: 0px 0px;
        }
    }
    @media only screen and (max-width:437px){
        .book-container {
            grid-column-gap: 8px;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            padding: 0px 0px;
        }
    }
    @media only screen and (max-width:407px){
        .book-container {
            grid-column-gap: 8px;
            grid-template-columns: repeat(auto-fit, minmax(110px, 1fr));
            padding: 0px 0px;
        }
    }
    @media only screen and (max-width:377px){
        .book-container {
            grid-column-gap: 8px;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            padding: 0px 0px;
        }
    }
    /* book container only */
    /* popular, latest, new, fanfic */
    .pagination > .active > a,
    .pagination > .active > a:focus,
    .pagination > .active > a:hover,
    .pagination > li > a:hover,
    .pagination > li > span:hover,
    .pagination > .active > span,
    .pagination > .active > span:focus,
    .pagination > .active > span:hover {
        background-color: #FF3C86;
        border: none;
        color: #fff;
        border-radius: 5px;
    }
    .pagination li a{
        color: #000;
        border-radius: 5px;
    }
    .pagination li{
        margin: 4px;
    }
    .sort-menu{
        border: none;
        box-shadow: 1px 2px 3px #000;
        border-radius: 3px;
    }

</style>
@endsection


@section('content')
<div class="container-fluid" style=" overflow: hidden;" id="main">
    <div class="" style="overflow: hidden;">
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
    <div class="d-flex justify-content-between">
        <h1 class="title">Fanfic</h1>

        <div class="d-flex justify-content-end">
            <div>
                <span class="fw-bold sortBy-text d-none d-md-block mt-1">Sort by: </span>
                <span class="fw-bold sortBy-text d-md-none d-sm-block"><img src="{{ asset('assets/img/Icons/switch.png') }}" width="18px" alt=""> </span>
            </div>
            <div class="dropdown-center sortBy mt-1 ms-2">
                <span type="button" class="dropdown-toggle" id="filter" data-bs-toggle="dropdown" aria-expanded="false">
                    All
                </span>
                <ul class="dropdown-menu sort-menu">
                    <li><a class="dropdown-item" href="{{ url('/fanfic') }}" id="all">All</a></li>
                    <li><a class="dropdown-item" href="{{ url('/fanfic-popular') }}" id="popular">Popular</a></li>
                    <li><a class="dropdown-item" href="{{ url('/fanfic-complete') }}" id="complete">Completed</a></li>
                    <li><a class="dropdown-item" href="{{ url('/fanfic-newest') }}" id="newest">Newest</a></li>
                    <li><a class="dropdown-item" href="{{ url('/fanfic-oldest') }}" id="oldest">Oldest</a></li>
                </ul>
            </div>
        </div>
    </div>
    <hr class="d-lg-none d-md-block" style="border: 1px solid #fc0865; padding:0; margin:0; margin-bottom: 24px; margin-top: 16px;">
{{-- Desktop view --}}
    <div class="d-none d-md-block">
        <div class="book-container" @if ($books->count() < 5)
            style="grid-template-columns: 252px 252px 252px 252px 252px;"
        @endif>
            @foreach ($books as $book)
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
                    {{ $book->title }}
                </p>
            </a>
            @endforeach
        </div>
        <div class="d-flex justify-content-between">
            <div>

            </div>
            <div>
                {{ $books->links() }}
            </div>
        </div>
    </div>
{{-- Desktop view --}}

{{-- Mobile view --}}
    <div class="d-md-none d-sm-block">
        <div class="book-container" @if ($books->count() < 3)
            style="grid-template-columns: 104px 104px 104px;"
        @endif>
            @foreach ($mobilebooks as $book)
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
                    {{ $book->title }}
                </p>
            </a>
            @endforeach
        </div>
        <div class="d-flex justify-content-between">
            <div>

            </div>
            <div>
                {{ $mobilebooks->links() }}
            </div>
        </div>
    </div>
{{-- Mobile view --}}
</div>

@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('#all').click(function(){
            $("#filter").html("All");
        })
        $('#popular').click(function(){
            $("#filter").html("Popular");
        })
        $('#complete').click(function(){
            $("#filter").html("Completed");
        })
        $('#newest').click(function(){
            $("#filter").html("Newest");
        })
        $('#oldest').click(function(){
            $("#filter").html("Oldest");
        })
    })
</script>
@endsection

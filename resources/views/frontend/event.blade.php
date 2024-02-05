@extends('layouts.f-master')

@section('title', 'Events')

@section('css')
<style>
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
            /* padding: 0px 16px; */
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
    /* desktop view */
    #event{
        height: 332px;
        padding-top: 60px;
        border-radius: 0px 0px 8px 8px;
    }
    .header{
        color: #000;
        text-align: center;
        font-size: 72px;
        font-family: Source Sans Pro;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        text-transform: capitalize;
    }
    /* desktop view */
    /* mobile view */
    #event1{
        /* background-color: #FEE5EF; */
        height: 170px;
        padding-top: 60px;
        border-radius: 0px 0px 8px 8px;
    }
    .header-mobile{
        color: #000;
        text-align: center;
        font-size: 40px;
        font-family: Source Sans Pro;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        text-transform: capitalize;
    }
    /* mobile view */
    .img-container{
        overflow: hidden;
    }
    .img-container img{
        aspect-ratio: 16 / 9;
        width: 100%;
        border-radius: 4px;
    }
    .img-container img:hover{
        transform: scale(1.2);
        transition-duration: .6s;
        border-radius: 4px;
    }
    .video-container video{
        aspect-ratio: 16 / 9;
        width: 100%;
        border-radius: 4px;
    }
    .text-box{
        margin-top: 16px;
    }
    .text-box-date{
        color: #787878;
        font-family: Montserrat;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        letter-spacing: 1.2px;
        text-transform: uppercase;
    }
    .text-box-title{
        margin-top: 8px;
        color: #222;
        font-family: Source Sans Pro;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }
    .text-box-text{
        color: #787878;
        font-family: Source Sans Pro;
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: 28px;
        margin-top: 8px;
    }
</style>
@endsection

@section('content')
<div class="" style="overflow: hidden;" id="main">
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
        <a href="{{ url('/events') }}" class="nav-box d-block text-decoration-none" style="box-shadow: 2px 3px 4px #fc0865; border:1px solid #fc0865">
            <div class="nav-content">
                <img class="nav-icon" src="{{ asset('assets/img/Icons/event.png') }}" alt="">
                <p class="nav-text p-0">Events</p>
            </div>
        </a>
    </div>
    {{-- Desktop view --}}
    {{-- <div class="container-fluid d-none d-lg-block" id="event">
        <p class="header">Events</p>
    </div> --}}
    <div class="container-fluid d-none d-lg-block" style="padding: 64px 32px 0px 32px;">
        <div class="row">
            @foreach ($events as $event)
                <div class="col-lg-4" style="margin-bottom: 64px;">
                    <a href="{{ url('/events-'.$event->id) }}" class="text-decoration-none">
                        @if ($event->image)
                        <div class="img-container">
                            <img src="{{ asset('assets/img/events/'.$event->image) }}" alt="">
                        </div>
                        @endif
                        @if($event->video)
                        <div class="video-container">
                            <video class="" controls>
                                <source src="{{ asset('assets/img/events/'.$event->video) }}" type="video/mp4">
                                <source src="{{ asset('assets/img/events/'.$event->video) }}" type="video/quicktime">
                                <source src="{{ asset('assets/img/events/'.$event->video) }}" type="video/x-msvideo">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        @endif
                        <div class="text-box">
                            <p class="text-box-date mb-0 pb-0">{{ date('M d, Y', strtotime($event->created_at)) }}</p>
                            <h4 class="text-box-title mb-0 pb-0">{{ $event->title }}</h4>
                            <p class="text-box-text">{{ $event->preview }} ...</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    {{-- Desktop view --}}
    {{-- Mobile View --}}
    {{-- <div class="container-fluid d-lg-none d-md-block" id="event1">
        <p class="header-mobile">Events</p>
    </div> --}}
    <div class="container-fluid d-lg-none d-md-block" style="padding: 16px 18px 0px 18px;">
        <div class="row">
            @foreach ($events as $event)
                <div class="col-lg-4" style="margin-bottom: 21px;">
                    <a href="{{ url('/events-'.$event->id) }}" class="text-decoration-none">
                        @if ($event->image)
                        <div class="img-container">
                            <img src="{{ asset('assets/img/events/'.$event->image) }}" alt="">
                        </div>
                        @endif
                        @if($event->video)
                        <div class="video-container">
                            <video class="" controls>
                                <source src="{{ asset('assets/img/events/'.$event->video) }}" type="video/mp4">
                                <source src="{{ asset('assets/img/events/'.$event->video) }}" type="video/quicktime">
                                <source src="{{ asset('assets/img/events/'.$event->video) }}" type="video/x-msvideo">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        @endif
                        <div class="text-box">
                            <p class="text-box-date mb-0 pb-0">{{ date('M d, Y', strtotime($event->created_at)) }}</p>
                            <h4 class="text-box-title mb-0 pb-0">{{ $event->title }}</h4>
                            <p class="text-box-text">{{ $event->preview }}...</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    {{-- Mobile View --}}
</div>

@endsection

@section('script')

@endsection

@extends('layouts.f-master')

@section('title', 'Event-Detail')

@section('css')
<style>
    #event{
        /* background-image: url('assets/img/gradient.png'); */
        /* background-repeat: no-repeat; */
        padding: 96px 32px 0px 32px;
    }
    #event1{
        background-image: url('assets/img/gradient.png');
        background-repeat: no-repeat;
        /* background-color: #FEE5EF; */
        height: 170px;
        padding-top: 60px;
        border-radius: 0px 0px 8px 8px;
    }
    #detail{
        margin-top: 0px;
    }
    .more-news{
        color: #222;
        font-family: Source Sans Pro;
        font-size: 18px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }
    .view-all{
        color: #222;
        text-align: right;
        font-family: Source Sans Pro;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-decoration-line: underline;
    }
    .main-text-box{
        margin-top: 16px;
    }
    .main-text-box-date{
        color: #787878;
        font-family: Montserrat;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        letter-spacing: 1.2px;
        text-transform: uppercase;
    }
    .main-text-box-title{
        color: #342626;
        font-family: Source Sans Pro;
        font-size: 32px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        margin-top: 8px;
    }
    .main-text-box-text{
        color: #787878;
        font-family: Source Sans Pro;
        font-size: 20px;
        font-style: normal;
        font-weight: 400;
        line-height: 28px;
        margin-top: 8px;
        text-align: justify;
        text-indent: 50px;
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
    .img-container{
        overflow: hidden;
    }
    .img-container img{
        aspect-ratio: 16 / 9;
        width: 100%;
    }
    .img-container img:hover{
        transform: scale(1.2);
        transition-duration: .6s;
        border-radius: 4px;
    }
    .video-container video{
        aspect-ratio: 16 / 9;
        width: 100%;
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
    #half-text, #full-text{
        line-height: 45px;
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
        #half-text, #full-text{
            line-height: 30px;
        }
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
        #event{
            padding: 0px 16px;
        }
        #detail{
            margin-top: 16px;
        }
        .main-text-box-date{
            color: #787878;
            font-family: Montserrat;
            font-size: 10px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .main-text-box-title{
            color: #222;
            font-family: Source Sans Pro;
            font-size: 20px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            margin-top: 8px;
        }
        .main-text-box-text{
            color: #787878;
            font-family: Source Sans Pro;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 28px;
            text-align: justify;
            text-indent: 50px;
        }
        .text-box{
            margin-top: 8px;
        }
        .text-box-date{
            color: #787878;
            font-family: Montserrat;
            font-size: 10px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .text-box-title{
            margin-top: 4px;
            color: #222;
            font-family: Source Sans Pro;
            font-size: 18px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
        }
        .text-box-text{
            color: #787878;
            font-family: Source Sans Pro;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: 22px;
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
</style>
@endsection

@section('content')
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
        <a href="{{ url('/events') }}" class="nav-box d-block text-decoration-none" style="box-shadow: 2px 3px 4px #fc0865; border:1px solid #fc0865">
            <div class="nav-content">
                <img class="nav-icon" src="{{ asset('assets/img/Icons/event.png') }}" alt="">
                <p class="nav-text p-0">Events</p>
            </div>
        </a>
    </div>
</div>
{{-- Mobile View --}}
{{-- <div class="container-fluid d-lg-none d-md-block" id="event1">
    <p class="header-mobile">Events</p>
</div> --}}
{{-- Mobile View --}}

<div class="container-fluid" id="event" style="">
    <div class="row" id="detail">
        <div class="col-lg-9">
            <div>
                @if($event->image)
                <img src="{{ asset('assets/img/events/'.$event->image) }}" class="w-100 rounded" alt="">
                @endif
                @if($event->video)
                <video class="w-100 rounded" controls>
                    <source src="{{ asset('assets/img/events/'.$event->video) }}" type="video/mp4">
                    <source src="{{ asset('assets/img/events/'.$event->video) }}" type="video/quicktime">
                    <source src="{{ asset('assets/img/events/'.$event->video) }}" type="video/x-msvideo">
                    Your browser does not support the video tag.
                </video>
                @endif
            </div>
            <div class="main-text-box">
                <p class="main-text-box-date mb-0 pb-0">{{ date('M d, Y', strtotime($event->created_at)) }}</p>
                <h4 class="main-text-box-title mb-4 pb-0">{{ $event->title }}</h4>
                <p class="main-text-box-text pt-0 mt-0 mb-0 pb-0" id="half-text">{!! $subString !!} <a class="text-decoration-none text-dark" style="font-size: 16px; font-weight: 700;" id="seemore" href="">See More...</a></p>
                <p class="main-text-box-text pt-0 mt-0 d-none" id="full-text">{!! $event->description !!} <a class="text-decoration-none text-dark" style="font-size: 16px; font-weight: 700" id="seeless" href="">See Less...</a></p></p>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="d-flex justify-content-between mb-3">
                <div class="more-news">
                    More News >>
                </div>
                <div>
                    <a class="view-all" href="{{ url('/events') }}">View All</a>
                </div>
            </div>
            @foreach ($events as $event)
            <a class="text-decoration-none d-block mb-4" href="{{ url('/events-'.$event->id) }}">
                @if($event->image)
                <div class="img-container">
                    <img src="{{ asset('assets/img/events/'.$event->image) }}" class="rounded" alt="">
                </div>
                @endif
                @if($event->video)
                <div class="video-container">
                    <video class="rounded" controls>
                        <source src="{{ asset('assets/img/events/'.$event->video) }}" type="video/mp4">
                        <source src="{{ asset('assets/img/events/'.$event->video) }}" type="video/quicktime">
                        <source src="{{ asset('assets/img/events/'.$event->video) }}" type="video/x-msvideo">
                        Your browser does not support the video tag.
                    </video>
                </div>
                @endif
                <div class="text-box pt-0 mt-2">
                    <p class="text-box-date mb-0 pb-0">{{ date('M d, Y', strtotime($event->created_at)) }}</p>
                    <h4 class="text-box-title mb-0 pb-0">{{ $event->title }}</h4>
                    <p class="text-box-text pt-0 mt-0">{{ $event->preview }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>




@endsection

@section('script')
<script>
    $("#seemore").click(function(e){
        e.preventDefault()
        $("#full-text").removeClass('d-none')
        $("#half-text").addClass('d-none')
    })
    $("#seeless").click(function(e){
        e.preventDefault()
        $("#full-text").addClass('d-none')
        $("#half-text").removeClass('d-none')
    })
</script>
@endsection

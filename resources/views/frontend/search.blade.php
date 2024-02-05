@extends('layouts.f-master')

@section('title', 'Category')

@section('css')
<style>
    .title{
        color: #222;
        font-family: Source Sans Pro;
        font-size: 24px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-align: center;
        padding-bottom: 32px;
    }
    .search-data{
        color: #FE5092;
        font-family: Source Sans Pro;
        font-size: 24px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        text-align: center;
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

    /* books */
    .book-text{
        font-family: Source Sans Pro;
        font-size: 18px;
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
        text-align: left;
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
        grid-column-gap: 29px;
        /* grid-template-columns: auto auto auto auto auto; */
        padding: 0px 16px;

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
        .title{
            color: #222;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 18px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
        }
        .search-data{
            font-size: 18px;
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
            padding: 80px 16px 32px 16px;
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
    @media only screen and (max-width:992px){
        .book-container {
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        }
    }
    @media only screen and (max-width:768px){
        .book-container {
            grid-column-gap: 8px;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            padding: 0px;
        }
    }
    @media only screen and (max-width:576px){
        .book-container {
            grid-column-gap: 8px;
            grid-template-columns: repeat(auto-fit, minmax(104px, 1fr));
            padding: 0px 0px;
        }
    }

</style>
@endsection


@section('content')
<div class="container-fluid" style="overflow: hidden;" id="main">
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
    <div class="text-center" id="search">
        <p class="title">Showing results for <span class="search-data">"{{ $name }}"</span></p>
        <div class="book-container" @if ($searchNovel->count() < 3)
            style="grid-template-columns: auto auto auto auto auto;"
        @endif>
            @foreach ($searchNovel as $book)
                <a href="{{ url('/novel-'.$book->id) }}" class="book text-decoration-none text-dark">
                    <div class="novel-container">
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
                    </div>
                </a>
            @endforeach

        </div>
        @if ($searchNovel->count() == 0)
            <p class="title text-center" style="color:#FE5092;">Sorry, No Result Found!</p>
        @endif
    </div>
</div>
@endsection

@section('script')

@endsection

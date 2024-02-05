@extends('layouts.f-master')

@section('title', 'Category')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style>
    /* #main{
        background-image: url('assets/img/gradient.png');
        background-repeat: no-repeat;
        padding: 0px 0px;
    } */
    #novel{
        border-radius: 16px;
        background-color: #fff;
        margin: 120px 178px 0 178px;
        padding: 32px;
        border-radius: 8px;
    }
    .heading{
        margin-bottom: 35px;
    }
    .book-img{
        margin-right: 48px;
    }
    .book-img img{
        width: 100%;
        max-height: 400px;
    }
    .text-book{
        text-align: left;
    }
    .book-btn{
        margin-top: 20px;
    }
    .on-status{
        background-color: #FE5092;
        border-radius: 16px;
        padding: 4px 10px;
        color: #FFF;
        text-align: center;
        font-size: 12px;
        font-family: 'Source Sans Pro', sans-serif;
        font-weight: 600;
    }
    .com-status{
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
    .book-title{
        color: #222;
        font-family: Source Sans Pro;
        font-size: 28px;
        font-style: normal;
        font-weight: 700;
        line-height: 55px; /* 142.857% */
        text-transform: capitalize;
        padding: 20px 0px 16px 0px;
        width: 100%;
        height: auto;
    }
    .author{
        color: #222;
        text-align: center;
        font-family: Source Sans Pro;
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        margin-bottom: 16px;
    }
    .viewers, .chapters{
        color: #787878;
        text-align: center;
        font-family: Source Sans Pro;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }
    .viewers{
        margin-right: 32px;
    }
    .count{
        color: #222;
        text-align: center;
        font-family: Source Sans Pro;
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }
    .reading{
        border-radius: 4px;
        background: #FF3C86;
        color: #FFF;
        text-align: center;
        font-family: Source Sans Pro;
        font-size: 18px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        text-transform: capitalize;
        padding: 16px 112px;
    }
    .reading:hover{
        background: #FF3C86;
        color: #FFF;
        box-shadow: 1px 2px 3px #222;
    }
    .library{
        background: #fff;
        border: 1px solid #FF3C86;
        color: #FF3C86;
        text-align: center;
        font-family: Source Sans Pro;
        font-size: 18px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        padding: 16px 24px;
        margin-left: 16px;
    }
    .library:hover{
        box-shadow: 1px 2px 3px #FF3C86;
        border: 1px solid #FF3C86;
        color: #FF3C86;
    }
    .counting{
        margin-top: 20px;
    }

    #desc, #chapter{
        color: #222;
        font-family: Source Sans Pro;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        margin-right: 48px;
        padding-bottom: 12px;
        margin-bottom: 0px;
        cursor: pointer;
    }
    .active{
        border-bottom: 2px solid #FF3C86;
    }
    .desc{
        margin-bottom: 24px;
    }
    .desc-text{
        color: #222;
        font-family: Source Sans Pro;
        font-size: 20px;
        font-style: normal;
        font-weight: 400;
        line-height: 180%; /* 36px */
        text-align: left;
    }
    .divider{
        border: 1px solid #fed2e3;
    }
    .review-title{
        color: #222;
        font-family: Source Sans Pro;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        text-align: left;
        margin-bottom: 16px;
    }
    .review-profile{
        margin-right: 16px;
    }
    .review-text{
        display: block;
        border-radius: 40px;
        border: 1px solid #C5C8CB;
        width: 100%;
    }
    .review-text::placeholder{
        color: #787878;
        text-align: left;
        font-family: Source Sans Pro;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }
    .review{
        width: 75%;
        margin-bottom: 16px;
        position: relative;
    }
    .review-btn{
        position: absolute;
        top: 4px;
        right: 10px;
        z-index: 1;
        color: #222;
        text-align: center;
        font-family: Source Sans Pro;
        font-size: 14px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }
    .review-card{
        padding: 16px 156px 16px 16px;
        border-radius: 8px;
        background: #F6F6F6;
        text-align: left;
        margin-bottom: 16px;
    }
    .review-box{
        overflow: scroll;
        width: 100%;
        height: 500px;
    }
    .user-profile{
        margin-right: 16px;
        margin-top: 5px;
    }
    .user-name{
        color: #222;
        text-align: center;
        font-family: Source Sans Pro;
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }
    .comment-box{
        color: #787878;
        font-family: Source Sans Pro;
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: 26px; /* 144.444% */
    }
    .comment{
        margin-bottom: 0px;
    }
    .created_at{
        color: #222;
        font-family: Source Sans Pro;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px; /* 166.667% */
    }


    /* related novel */
    .related-novel{
        text-align: left;
        padding: 24px 0px 0px 0px;
    }
    .related-novel-title{
        color: #222;
        font-family: Source Sans Pro;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }
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
        grid-template-columns: auto auto auto auto;
        grid-column-gap: 24px;
    }
    .book {
        width: 100%;
        box-sizing: border-box;
        margin-bottom: 0px;
    }
    .preview{
        /* aspect-ratio: 4 / 6; */
        width: 100%;
        /* height: 312px; */
        border-radius: 5px;
    }
    /* related novel */

    /* Chapter lists */
    .chapter-card{
        padding: 16px 32px;
        background: #f6f6f6;
        margin-bottom: 8px;
    }
    .chapter-title{
        color: #222;
        text-align: center;
        font-family: Source Sans Pro;
        font-size: 19px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }
    .chapter-btn{
        color: #222;
        text-align: center;
        font-family: Source Sans Pro;
        font-size: 19px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        margin-top: 5px;
    }
    .release-date{
        color: #787878;
        font-family: Source Sans Pro;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }
    .all-btn{
        color: #FF3C86;
        font-family: Source Sans Pro;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }
    .sort{
        color: #FF3C86;
        font-family: Source Sans Pro;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }
    /* Chapter lists */
    .exchange-btn{
        background: #FF3C86;
        color: #FFF;
        border-radius: 2px;
    }
    .exchange-btn:hover{
        background: #FF3C86;
        color: #fff;
        box-shadow: 1px 2px 3px #000;
    }
    .modal-content{
        border-radius: 3px !important;
        font-family: Source Sans Pro !important;
    }
    .btn-outline-secondary{
        border-radius: 2px !important;
    }



    @media only screen and (max-width:1267px){
        #novel{
            border-radius: 16px;
            background-color: #fff;
            margin: 120px 50px 0 50px;
        }
    }
    @media only screen and (max-width:1120px){
        #novel{
            border-radius: 16px;
            background-color: #fff;
            margin: 120px 25px 0 25px;
        }
        .reading{
            border-radius: 4px;
            background: #FF3C86;
            color: #FFF;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 18px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            text-transform: capitalize;
            padding: 16px 80px;
        }
        .reading:hover{
            background: #FF3C86;
            color: #FFF;
            box-shadow: 1px 2px 3px #222;
        }
        .library{
            background: #fff;
            border: 1px solid #FF3C86;
            color: #FF3C86;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 18px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            padding: 16px 18px;
            margin-left: 8px;
        }
        .library:hover{
            background: #FF3C86;
            color: #fff;
        }

    }
    @media only screen and (max-width:1020px){
        #novel{
            border-radius: 16px;
            background-color: #fff;
            margin: 120px 100px 0 100px;
        }
        .reading{
            border-radius: 4px;
            background: #FF3C86;
            color: #FFF;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 14px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            text-transform: capitalize;
            padding: 8px 30px;
        }
        .library{
            background: #fff;
            border: 1px solid #FF3C86;
            color: #FF3C86;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 14px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            padding: 8px 12px;
            margin-left: 8px;
        }
        .book-btn{
            margin-top: 0px;
        }
    }
    @media only screen and (max-width:992px){
        #main{
            background-image: url('assets/img/gradient.png');
            background-repeat: no-repeat;
            padding: 0px 8px;
        }
        #novel{
            border-radius: 16px;
            background-color: #fff;
            margin: 120px 25px 0 25px;
        }
        .heading{
            padding: 16px 0px;
            text-align: center;
            margin: auto;
        }
        .book-title{
            color: #222;
            font-family: Source Sans Pro;
            font-size: 25px;
            font-style: normal;
            font-weight: 700;
            line-height: 55px; /* 142.857% */
            text-transform: capitalize;
            padding: 20px 0px 16px 0px;
            width: 100%;
            height: auto;
        }
        .author{
            color: #222;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 14px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            margin-bottom: 16px;
        }
        .viewers, .chapters{
            color: #787878;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }
        .viewers{
            margin-right: 32px;
        }
        .count{
            color: #222;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 14px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
        }
        #desc, #chapter{
            color: #222;
            font-family: Source Sans Pro;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            margin-right: 48px;
            padding-bottom: 12px;
            margin-bottom: 0px;
            cursor: pointer;
        }
        .desc-text{
            color: #222;
            font-family: Source Sans Pro;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 180%; /* 36px */
            text-align: left;
        }
        .review-title{
            color: #222;
            font-family: Source Sans Pro;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            text-align: left;
            margin-bottom: 16px;
        }
        .review-text::placeholder{
            color: #787878;
            text-align: left;
            font-family: Source Sans Pro;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }
        .review-card{
            padding: 8px 10px 8px 10px;
            border-radius: 8px;
            background: #F6F6F6;
            text-align: left;
            margin-bottom: 8px;
        }
        .review{
            width: 100%;
            margin-bottom: 16px;
            position: relative;
        }
        .review-btn{
            position: absolute;
            top: 4px;
            right: 10px;
            z-index: 1;
            color: #222;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 14px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
        }
        .user-name{
            color: #222;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
        }
        .comment-box{
            color: #787878;
            font-family: Source Sans Pro;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: 26px; /* 144.444% */
        }
        .created_at{
            color: #222;
            font-family: Source Sans Pro;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 20px; /* 166.667% */
        }
    }
    @media only screen and (max-width:768px){
        #main{
            background-image: url('assets/img/gradient.png');
            background-repeat: no-repeat;
            padding: 0px 8px;
        }
        #novel{
            border-radius: 16px;
            background-color: #fff;
            margin: 120px 25px 0 25px;
        }
        .heading{
            padding: 16px 0px;
            text-align: center;
            margin: auto;
        }
        .book-title{
            color: #222;
            font-family: Source Sans Pro;
            font-size: 19px;
            font-style: normal;
            font-weight: 700;
            line-height: 40px; /* 142.857% */
            text-transform: capitalize;
            width: 100%;
            height: auto;
            margin-top: 0px;
        }
        .author{
            color: #222;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 14px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            margin-bottom: 16px;
        }
        .viewers, .chapters{
            color: #787878;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }
        .viewers{
            margin-right: 32px;
        }
        .count{
            color: #222;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 14px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
        }
        .on-status{
            background-color: #FE5092;
            border-radius: 16px;
            padding: 2px 8px;
            color: #FFF;
            text-align: center;
            font-size: 9px;
            font-family: 'Source Sans Pro', sans-serif;
            font-weight: 600;
        }
        .com-status{
            background-color: #fed2e3;
            border-radius: 16px;
            border: 1px solid #FE5092;
            padding: 2px 8px;
            color: #FE5092;
            text-align: center;
            font-size: 9px;
            font-family: 'Source Sans Pro', sans-serif;
            font-weight: 600;
        }
        .book-img{
            margin-right: 20px;
        }
        /* related novel */
        .related-novel{
            text-align: left;
            padding: 24px 0px 0px 0px;
        }
        .related-novel-title{
            color: #222;
            font-family: Source Sans Pro;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
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
            font-size: 12px;
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
            padding: 2px 8px;
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
            padding: 2px 8px;
            color: #FE5092;
            text-align: center;
            font-size: 7px;
            font-family: 'Source Sans Pro', sans-serif;
            font-weight: 600;
        }
        .book-container {
            display: grid;
            grid-template-columns: auto auto auto auto;
            grid-column-gap: 24px;
        }
        .book {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 0px;
        }
        .preview{
            /* aspect-ratio: 4 / 6; */
            width: 100%;
            /* height: 312px; */
            border-radius: 5px;
        }
        /* related novel */

        /* Chapter lists */
        .chapter-card{
            padding: 8px 16px;
            background: #f6f6f6;
            margin-bottom: 8px;
        }
        .chapter-title{
            color: #222;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }
        .chapter-btn{
            color: #222;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            margin-top: 5px;
        }
        .release-date{
            color: #787878;
            font-family: Source Sans Pro;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }
        /* Chapter lists */

    }
    @media only screen and (max-width:680px){
        #novel{
            border-radius: 8px;
            background-color: #fff;
            padding: 16px;
            margin: 100px 0 0 0;
        }

    }
    @media only screen and (max-width:576px){
        #novel{
            border-radius: 4px;
            background-color: #fff;
            margin: 90px 0 0 0;
            text-align: center;
        }
        .book-img{
            margin: 0;
            padding: 0;
            margin: 0px 108px;
            position: relative;
        }
        .com-status{
            position: absolute;
            top: 8px;
            right: 8px;
            z-index: 1;
        }
        .on-status{
            position: absolute;
            top: 8px;
            right: 8px;
            z-index: 1;
        }
        .book-title{
            font-size: 19px;
            text-align: center;
            line-height: 40px;
            width: 100%;
            height: auto;
        }
        .author{
            margin: 0;
            padding: 0;
            font-weight: 400;
        }
        .counting{
            margin-top: 10px;
        }
        .book-btn{
            text-align: center;
            margin-bottom: 28px;
        }
        .reading{
            padding: 12px 56px;
        }
        .library{
            font-size: 20px;
            padding: 8px 12px;
        }


    }
    @media only screen and (max-width:335px){
        #novel{
            border-radius: 4px;
            background-color: #fff;
            margin: 90px 0 0 0;
            padding: 16px 108px;
        }

    }

</style>
@endsection


@section('content')
<div class="container-fluid" style="overflow: hidden;" id="main">
    @if(!$book->chapter->count())
    <h3 class="text-center" style="padding: 200px 0; font-family: Source Sans Pro;">There is no chapter yet!</h3>

    @endif

    @if($book->chapter->count())
        <div class="text-center" id="novel">
            {{-- Desktop Heading --}}
            <div class="d-none d-sm-block">
                <div class="d-flex heading">
                    <div class="book-img">
                        <img src="{{ asset('assets/img/book/'.$book->image) }}" class="rounded w-100" alt="">
                    </div>
                    <div class="text-book mt-0 pt-0">
                        @if ($book->status == "ONGOING")
                            <span class="on-status badge">ONGOING</span>
                        @elseif($book->status == "COMPLETED")
                            <span class="com-status badge">COMPLETED</span>
                        @endif
                        <p class="book-title">{{ $book->title }}</p>
                        <p class="author text-start">Author: {{ $book->user->name }}</p>
                        <div class="d-flex counting">
                            <div class="viewers">
                                <i class="fas fa-eye me-1"></i>
                                Viewers
                                <p class="count mt-2">
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
                                </p>
                            </div>
                            <div class="chapters">
                                <i class="fas fa-list me-1"></i>
                                Chapters
                                <p class="count mt-2">{{ $book->chapter_count }}</p>
                            </div>
                        </div>
                        <div class="book-btn">
                            <a href="{{ url('/chapter-'.$book->chapter[0]->id) }}" class="btn reading">Start Reading</a>
                            @auth
                                @if ($bookmark)
                                    <form class="d-inline" action="{{ url('/novel/bookmark/remove/'.$bookmark->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn library">Add to library <i class="fa-solid fa-bookmark ms-1"></i></button>
                                    </form>
                                @elseif(!$bookmark)
                                    <form class="d-inline" action="{{ url('/novel/bookmark/') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                                        <button type="submit" class="btn library">Add to library <i class="fa-regular fa-bookmark ms-1"></i></button>
                                    </form>
                                @endif
                            @endauth
                            @guest
                            <a href="" class="btn library" data-bs-target="#loginModal" data-bs-toggle="modal">Add to library <img src="{{ asset('assets/img/Icons/bookmark.png') }}" alt=""></a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
            {{-- Desktop Heading --}}
            {{-- Mobile Heading --}}
            <div class="d-sm-none d-block">
                <div class="heading">
                    <div class="book-img">
                        <img src="{{ asset('assets/img/book/'.$book->image) }}" class="rounded w-100" alt="">
                        @if ($book->status == "ONGOING")
                            <span class="on-status badge">ONGOING</span>
                        @elseif($book->status == "COMPLETED")
                            <span class="com-status badge">COMPLETED</span>
                        @endif
                    </div>

                    <div class="text-book mt-0 pt-0">
                        <p class="book-title">{{ $book->title }}</p>
                        <p class="author">Author: {{ $book->user->name }}</p>
                        <div class="counting">
                            <div class="d-flex justify-content-center">
                                <div class="viewers">
                                    <div class="d-flex">
                                        <div class="me-1">
                                            <i class="fas fa-eye me-1"></i>
                                            Viewers:
                                        </div>
                                        <p class="count">
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
                                        </p>
                                    </div>
                                </div>
                                <div class="chapters">
                                    <div class="d-flex">
                                        <div class="me-1">
                                            <i class="fas fa-list me-1"></i>
                                            Chapters
                                        </div>
                                        <p class="count">{{ $book->chapter_count }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="book-btn">
                            <a href="{{ url('/chapter-'.$book->chapter[0]->id) }}" class="btn reading">Start Reading</a>
                            @auth
                                @if ($bookmark)
                                    <form class="d-inline" action="{{ url('/novel/bookmark/remove/'.$bookmark->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn library"><i class="fa-solid fa-bookmark"></i></button>
                                    </form>
                                @elseif(!$bookmark)
                                    <form class="d-inline" action="{{ url('/novel/bookmark/') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                                        <button type="submit" class="btn library"><i class="fa-regular fa-bookmark"></i></button>
                                    </form>
                                @endif
                            @endauth
                            @guest
                            <a href="" class="btn library" data-bs-target="#loginModal" data-bs-toggle="modal"><img src="{{ asset('assets/img/Icons/bookmark.png') }}" alt=""></a>
                            @endguest
                        </div>


                    </div>
                </div>
            </div>
            {{-- Mobile Heading --}}

            {{-- novel navigation --}}
            @include('frontend.novelLayout.novel-nav')
            {{-- novel navigation --}}

            @include('frontend.novelLayout.novel-desc')

            @include('frontend.novelLayout.novel-chapter')


            {{-- Desktop view --}}
            <div class="related-novel d-none d-md-block">
                <p class="related-novel-title">Related Novels</p>
                <div class="book-container">
                    @foreach ($relatedBooks as $book)
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
            {{-- Desktop view --}}
            {{-- mobile view --}}
            <div class="related-novel d-md-none d-sm-block">
                <p class="related-novel-title">Related Novels</p>
                <div class="book-container">
                    @foreach ($mobileBooks as $book)
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
            {{-- mobile view --}}
        </div>
    @endif

</div>

<!-- Buy All Chapters modal -->
@auth
<div class="modal fade" id="buyAll">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body text-center">
            <div class="text-end">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
          <i class="fas fa-gem fa-2x mb-3" style="color:#FE5092;"></i><br>
          <p class="modal-title fs-5 fw-bold" id="deleteModalLabel">You have {{ Auth::user()->gem }} Gems.</p>
          <span class="">Will you exchange for All Chapters?</span>
          <div class="m-auto mt-3">
            <form action="{{ url('/book/chapter/exchangeAllChapter/') }}" method="post" id="">
                @csrf
                <div class="d-flex justify-content-around">
                    <input type="text" class="form-control" name="status" id="total" value="">
                    <input type="text" class="form-control" disabled value="Gems">
                </div>

                <input type="hidden" name="book_id" id="novel_id" value="">
          </div>
            <div class="d-flex justify-content-center mt-4">
                <div class="me-2">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fas fa-xmark me-2"></i>Cancle</button>
                </div>
                <div>
                    <button class="btn exchange-btn" type="submit"><i class="fas fa-check me-2"></i>Confirm</button>
                </div>
            </div>
        </form>
        </div>
      </div>
    </div>
</div>
@endauth
{{-- Buy All Chapters modal --}}

<!-- Exchange Modal -->
@auth
<div class="modal fade" id="exchange">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <div class="modal-body text-center">
            <div class="text-end">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
          <i class="fas fa-gem fa-2x mb-3" style="color:#FE5092;"></i><br>
          <p class="modal-title fs-5 fw-bold" id="deleteModalLabel">You have {{ Auth::user()->gem }} Gems.</p>
          <span class="">Will you exchange?</span>
          <div class="m-auto mt-3">
            <form>
                @csrf
                <div class="d-flex justify-content-around">
                    <input type="text" class="form-control" name="status" id="status" value="">
                    <input type="text" class="form-control" disabled value="Gems">
                </div>

                <input type="hidden" name="chapter_id" id="chapter_id" value="">
                <input type="hidden" name="book_id" id="book_id" value="">
          </div>
            <div class="d-flex justify-content-center mt-4">
                <div class="me-2">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fas fa-xmark me-2"></i>Cancle</button>
                </div>
                <div>
                    <button id="confirm" class="btn exchange-btn"><i class="fas fa-check me-2"></i>Confirm</button>
                </div>
            </div>
        </form>
        </div>
      </div>
    </div>
</div>
@endauth
{{-- exchange modal --}}

<!-- Edit Modal -->
<div class="modal fade" id="editReview">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-comment me-2"></i>Edit Comment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"></span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/review/edit/') }}" method="post">
                @csrf
                <div class="mb-3">
                    {{-- <label for="" class="form-label">Comment</label> --}}
                    <input type="text" id="comment" name="comment" class="form-control" placeholder="Enter Category Name">
                </div>
                <input type="hidden" name="id" id="edit_id">
                <div class="d-flex justify-content-end">
                    <div class="me-1">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-pen-to-square me-2"></i>Edit</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteReview">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body text-center">
            <div class="text-end">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
          <i class="fas fa-warning text-danger fa-2x mb-3"></i>
          <p class="modal-title fs-5" id="deleteModalLabel">Are you sure "Delete"?</p>
          <div class="d-flex justify-content-around mt-4">
            <div>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fas fa-xmark me-2"></i>Cancle</button>
            </div>
            <form action="{{ url('/review/delete/') }}" method="post">
                @csrf
                <input type="hidden" name="id" id="delete_id" value="">
                <button class="btn exchange-btn" type="submit"><i class="fas fa-check me-2"></i>Confirm</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $("#payment").submit(function() {
            $("#confirm").attr("disabled", true);
            setTimeout(function() {
            $("#confirm").attr("disabled", false); // Remove the "disabled" attribute to enable the button again
            }, 2000); // Simulating a 2-second delay before re-enabling the button
        });
    });
</script>
<script>
    $(document).ready(function(){
        $(".seeless").hide();
        $(".allview").hide();
        $("#descending").hide();
        $('.ascending').hide();
        $(".seemore").click(function(e){
            e.preventDefault();
            $(".allview").show();
            $(".limit").remove();
            $(".seemore").hide();
            $(".seeless").show();
        })
        $(".seeless").click(function(e){
            e.preventDefault();
            $(".allview").remove();
            $(".limit").show();
            $(".seemore").show();
            $(".seeless").hide();
        })
        $("#ascending").click(function(e){
            e.preventDefault();
            $('.ascending').show();
            $('.descending').hide();
            $("#ascending").hide();
            $("#descending").show();
        })
        $("#descending").click(function(e){
            e.preventDefault();
            $('.ascending').hide();
            $('.descending').show();
            $('#descending').hide();
            $('#ascending').show();
        })
    })
</script>
<script>
    $(document).ready(function () {
        $(".exchange").click(function(){
            $chapter_id = $(this).data('chapter_id');
            $book_id = $(this).data('book_id');
            $status = $(this).data('status');
            $("#chapter_id").val($chapter_id);
            $("#book_id").val($book_id);
            $("#status").val($status);
        })
        $("#confirm").click(function(e){
            e.preventDefault();
            let status = $("#status").val();
            let chapter_id = $("#chapter_id").val();
            let book_id = $("#book_id").val();

            $.ajax({
                    url:"{{url('/book/chapter/purchase')}}",
                    type:"POST",
                    data:{
                        chapter_id: chapter_id,
                        book_id: book_id,
                        status: status,
                        _token: "{{ csrf_token() }}"
                    },
                    success:function(data)
                    {
                        if(data.success === true){
                            console.log(data);
                            $('#exchange').modal('hide');
                            $('.beforeExchange-' + chapter_id).replaceWith("<a href='/chapter-" + chapter_id + "' class='btn chapter-btn'>Open</a>");
                        }else{
                            console.log(data);
                        }
                    }
                })
        })

        $(".exchangeAll").click(function(){
            $book_id = $(this).data('book_id');
            $status = $(this).data('status');
            $("#novel_id").val($book_id);
            $("#total").val($status);
        })
    });
</script>
<script>
    $(document).ready(function () {
        $(".edit").click(function(){
            $id = $(this).data('id');
            $comment = $(this).data('comment');
            $("#edit_id").val($id);
            $("#comment").val($comment);
        })
        $(".delete").click(function(){
            $id = $(this).data('id');
            $("#delete_id").val($id);
        })
    });
</script>
<script type="text/javascript">

    $(document).ready(function() {
        $('body').bind('cut copy paste', function (e) {
            e.preventDefault();
        })
        $(".code").on("contextmenu", function(e) {
            return false;
        })
    })

</script>


@endsection

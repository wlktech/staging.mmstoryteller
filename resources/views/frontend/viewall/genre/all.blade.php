@extends('layouts.f-master')

@section('title', 'Category')

@section('css')
<style>
    #main{
        background-image: url('assets/img/Icons/gradient-background.png');
        background-repeat: no-repeat;
        padding: 0px 32px;
    }
    .title{
        color: #222;
        font-family: Source Sans Pro;
        font-size: 32px;
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
    .genre-card{
        display: block;
        margin-bottom: 16px;
        border-radius: 5px;
        background: #EEE;
        box-shadow: 0px 2px 4px 0px rgba(254, 168, 202, 0.40);
        position: relative;
    }
    .genre-card-img{
        margin-right: 32px;
    }
    .genre-card-text{
        margin-top: 42px;
    }
    .genre-card-text h4{
        color: #222;
        font-family: Source Sans Pro;
        font-size: 30px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        text-transform: capitalize;
        margin-bottom: 18px;
    }
    .genre-card-text p{
        color: #424242;
        font-family: Source Sans Pro;
        font-size: 30px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-transform: capitalize;
    }
    .arrow{
        position: absolute;
        top: 70px;
        right: 90px;
        font-size: 30px;
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
            padding: 0px 8px;
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
        .genre-card{
            display: block;
            margin-bottom: 6px;
            border-radius: 5px;
            background: #EEE;
            box-shadow: 0px 2px 4px 0px rgba(254, 168, 202, 0.40);
            position: relative;
            height: 58px;
        }
        .genre-card-img{
            margin-right: 12px;
        }
        .genre-card-img img{
            height: 58px;
        }
        .genre-card-text{
            margin-top: 10px;
        }
        .genre-card-text h4{
            color: #222;
            text-align: left;
            font-family: Source Sans Pro;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            text-transform: capitalize;
            margin-bottom: 0px;
            padding-bottom: 0px;
        }
        .genre-card-text p{
            color: #A5A5A5;
            text-align: left;
            font-family: Source Sans Pro;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            text-transform: capitalize;
        }
        .arrow{
            position: absolute;
            top: 20px;
            right: 22px;
            font-size: 15px;
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

</style>
@endsection


@section('content')


{{-- Popular Series --}}
{{-- Desktop view --}}
<div class="container-fluid" style="overflow: hidden;" id="main">
    <div class="" style="overflow: hidden;">
        <div class="nav-container">
            <a href="{{ url('/genre') }}" class="nav-box d-block text-decoration-none" style="box-shadow: 2px 3px 4px #fc0865; border:1px solid #fc0865">
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
    <div class="container-fluid">
        <h1 class="title mb-0 pb-0">Genre</h1>
        <hr style="border: 1px solid #fc0865">
        @foreach ($genres as $genre)
        <a href="{{ url('/genre-'.$genre->id) }}" class="genre-card text-decoration-none">
            <div class="d-flex">
                <div class="genre-card-img">
                    <img src="{{ asset('assets/img/genre/'.$genre->image) }}" style="border-radius: 5px 0 0 5px" alt="">
                </div>
                <div class="genre-card-text-box">
                    <div class="genre-card-text">
                        <h4>{{ $genre->name }}</h4>
                        <p>({{ $genre->book_count }})</p>
                        <i class="fas fa-angle-right text-secondary arrow"></i>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
{{-- Desktop view --}}
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

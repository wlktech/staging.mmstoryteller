@extends('layouts.f-master')

@section('title', 'Category')

@section('css')
<style>
    /* #main{
        background-image: url('assets/img/gradient.png');
        background-repeat: no-repeat;
        padding: 0px 32px;
    } */
    .title{
        color: #222;
        font-family: Source Sans Pro;
        font-size: 32px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        text-transform: capitalize;
        text-align: left;
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
    #gem{
        border-radius: 16px;
        background-color: #fff;
        margin: 0px 178px 0 178px;
        padding: 24px 62px 81px 62px;
    }
    .text-chat{
        padding: 0;
        margin: 0;
        color: #222;
        text-align: left;
        font-family: Source Sans Pro;
        font-size: 18px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        margin-top: 13px;
    }
    .sub-text-chat{
        padding: 0;
        margin: 0;
        color: #666;
        font-family: Source Sans Pro;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-align: left;
        margin-top: 4px;
    }
    .gem-btn{
        border-radius: 8px;
        background: #FF3C86;
        color: white;
        color: #FFF;
        text-align: center;
        font-family: Source Sans Pro;
        font-size: 18px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        padding: 12px 20px;
    }
    .gem-btn:hover{
        background-color: #FF3C86;
        color: #fff;
        box-shadow: 1px 2px 3px #fc0865;
    }
    .gem-text{
        margin-bottom: 16px;
    }
    .pricing{
        border-radius: 8px;
        border: 1px solid #E4E6E7;
        background: #FFF;
        padding: 18px 32px;
        margin-bottom: 8px;
    }
    .diamond{
        width: 24px;
        margin-bottom: 10px;
    }
    .price-tag{
        color: #222;
        font-family: Source Sans Pro;
        font-size: 24px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        padding-bottom: 5px;
    }
    .unit{
        color: #666;
        font-family: Source Sans Pro;
        font-size: 24px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }
    .badge{
        border-radius: 16px;
        background: #EE5691;
        padding: 4px 8px;
        color: #FFF;
        text-align: center;
        font-family: Montserrat;
        font-size: 12px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        margin-left: 30px;
        margin-bottom: 0px;
    }
    .promo{
        color: #FF3C86;
        font-family: Source Sans Pro;
        font-size: 24px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        margin-left: 30px;
    }

    @media only screen and (max-width:1267px){
        .nav-container{
            display: grid;
            grid-template-columns: auto auto auto auto auto;
            /* grid-column-gap: 46px; */
            justify-content: space-between;
            padding: 116px 100px 80px 100px;
        }
        #gem{
            border-radius: 16px;
            background-color: #fff;
            margin: 0px 100px 0 100px;
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
        #gem{
            border-radius: 16px;
            background-color: #fff;
            margin: 0px 50px 0 50px;
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
        #gem{
            border-radius: 16px;
            background-color: #fff;
            margin: 0px 100px 0 100px;
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
        #gem{
            border-radius: 16px;
            background-color: #fff;
            margin: 0px 100px 0 100px;
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
    @media only screen and (max-width:768px){
        #gem{
            border-radius: 16px;
            /* background-color: #fff; */
            background: transparent;
            /* margin: 0px 16px; */
            padding: 0;
        }
        .gem-btn{
            border-radius: 8px;
            background: #FF3C86;
            color: white;
            color: #FFF;
            text-align: center;
            font-family: Source Sans Pro;
            font-size: 12px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            padding: 6px 10px;
            margin-top: 20px;
        }

        .text-chat{
            padding: 0;
            margin: 0;
            color: #222;
            text-align: left;
            font-family: Source Sans Pro;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            margin-top: 10px;
        }
        .sub-text-chat{
            padding: 0;
            margin: 0;
            color: #666;
            font-family: Source Sans Pro;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            text-align: left;
            margin-top: 5px;
        }
        .gem-text{
            margin-bottom: 24px;
        }
        .pricing{
            border-radius: 8px;
            border: 1px solid #E4E6E7;
            background: #FFF;
            padding: 14px 24px 18px 24px;
            margin-bottom: 4px;
        }
        .diamond{
            width: 20px;
            margin-bottom: 0px;
        }
        .price-tag{
            color: #222;
            font-family: Source Sans Pro;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;2
            line-height: normal;
        }
        .unit{
            color: #666;
            font-family: Source Sans Pro;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }
        .badge{
            border-radius: 16px;
            background: #EE5691;
            padding: 3px 8px;
            color: #FFF;
            text-align: center;
            font-family: Montserrat;
            font-size: 10px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            margin-left: 30px;
        }
        .promo{
            color: #FF3C86;
            font-family: Source Sans Pro;
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            margin-left: 30px;
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
        #gem{
            /* border-radius: 16px; */
            /* background-color: #fff; */
            margin: 0px 50px 0 50px;
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
        #gem{
            border-radius: 16px;
            /* background-color: #fff; */
            margin: 0px 8px 32px 8px;
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
        #gem{
            /* border-radius: 16px; */
            /* background-color: #fff; */
            margin: 0px 16px 0 16px;
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
{{-- Desktop view --}}
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
            <a href="{{ url('/gem') }}" class="nav-box d-block text-decoration-none" style="box-shadow: 2px 3px 4px #fc0865; border:1px solid #fc0865">
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
    <div class="text-center" id="gem">
        <h1 class="title mb-0 pb-0">Gem</h1>
        <div class="d-flex justify-content-between gem-text">
            <div>
                <p class="text-chat">Chat with us</p>
                <p class="sub-text-chat">Typically replies within a few minutes</p>
            </div>
            <div>
                <a href="https://m.me/109659598791246/" target="__blank" class="btn gem-btn"><i class="fa-brands fa-facebook-messenger me-2"></i>Buy Gems</a>
            </div>
        </div>

        {{-- 50 --}}
        <div class="pricing">
            <div class="d-flex justify-content-between">
                <div>
                    <img class="me-2 diamond" src="{{ asset('assets/img/Icons/diamond.png') }}" alt="">
                    <span class="price-tag">50</span>
                </div>
                <div>
                    <span class="me-2 price-tag">500</span>
                    <span class="unit">MMK</span>
                </div>
            </div>
        </div>
        {{-- 100 --}}
        <div class="pricing">
            <div class="d-flex justify-content-between">
                <div class="d-flex justify-items-center">
                    <div>
                        <img class="me-2 diamond" src="{{ asset('assets/img/Icons/diamond.png') }}" alt="">
                    </div>
                    <div class="ms-1">
                        <span class="price-tag">100 </span>
                    </div>
                    <div>
                        <span class="badge"><img class="me-1" src="{{ asset('assets/img/Icons/fire.png') }}" width="18px" alt="">HOT</span>
                    </div>
                </div>
                <div>
                    <span class="me-2 price-tag">1,000</span>
                    <span class="unit">MMK</span>
                </div>
            </div>
        </div>
        {{-- 200 --}}
        <div class="pricing">
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <div>
                        <img class="me-2 diamond" src="{{ asset('assets/img/Icons/diamond.png') }}" alt="">
                    </div>
                    <div class="ms-1">
                        <span class="price-tag">200</span>
                    </div>
                    <div>
                        <span class="badge"><img class="me-1" src="{{ asset('assets/img/Icons/fire.png') }}" width="18px" alt="">HOT</span>
                    </div>
                </div>
                <div>
                    <span class="me-2 price-tag">2,000</span>
                    <span class="unit">MMK</span>
                </div>
            </div>
        </div>
        {{-- 500 --}}
        <div class="pricing">
            <div class="d-flex justify-content-between">
                <div>
                    <img class="me-2 diamond" src="{{ asset('assets/img/Icons/diamond.png') }}" alt="">
                    <span class="price-tag">500</span>
                </div>
                <div>
                    <span class="me-2 price-tag">5,000</span>
                    <span class="unit">MMK</span>
                </div>
            </div>
        </div>
        {{-- 1000 --}}
        <div class="pricing">
            <div class="d-flex justify-content-between">
                <div>
                    <img class="me-2 diamond" src="{{ asset('assets/img/Icons/diamond.png') }}" alt="">
                    <span class="price-tag">1000</span>
                </div>
                <div>
                    <span class="me-2 price-tag">10,000</span>
                    <span class="unit">MMK</span>
                </div>
            </div>
        </div>
        {{-- 2000 --}}
        <div class="pricing">
            <div class="d-flex justify-content-between">
                <div>
                    <img class="me-2 diamond" src="{{ asset('assets/img/Icons/diamond.png') }}" alt="">
                    <span class="price-tag">2000</span>
                </div>
                <div>
                    <span class="me-2 price-tag">20,000</span>
                    <span class="unit">MMK</span>
                </div>
            </div>
        </div>

    </div>
</div>
{{-- Desktop view --}}
@endsection

@section('script')

@endsection

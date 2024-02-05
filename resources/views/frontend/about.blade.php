@extends('layouts.f-master')

@section('title', 'About-Us')

@section('css')
<style>
    #about{
        background-color: #FEE5EF;
        height: 510px;
        padding-top: 120px;
        position: relative;
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
    .text-box{
        position: absolute;
        top: 427px;
        left: 32px;
        right:32px;
        padding: 118px 47px 56px 47px;
        flex-shrink: 0;
        border-radius: 40px;
        border: 1px solid #F0D771;
        background: #FFF;
    }
    .text-box-text{
        color: #54636B;
        font-size: 20px;
        font-family: Source Sans Pro;
        font-style: normal;
        font-weight: 400;
        line-height: 36px;
    }
    .about-logo{
        position: absolute;
        top: -100px;
    }
    .review{
        padding-top: 385px;
        padding-left: 32px;
        padding-right: 11px;
        padding-bottom: 120px;
    }
    .review-box{
        text-align: center;
        padding: 24px;
        border-radius: 16px;
        border: 1px solid #EEE;
        background: #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.15);
        margin-right: 21px;
    }
    .review-box-text{
        color: #54636B;
        text-align: center;
        font-size: 15px;
        font-family: Montserrat;
        font-style: normal;
        font-weight: 400;
        line-height: 28px;
    }
    .review-box-text h4{
        margin: 8px 0 12px 0;
        color: #FF3C86;
        text-align: center;
        font-size: 16px;
        font-family: Montserrat;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }
    .slick-dots li button{
        width: 12px;
        height: 12px;
        background-color: #FF73A8;
        border-radius: 50%;
        opacity: 0.7;
    }
    .slick-dots li button:hover{
        opacity: 1;
    }
    .slick-dots{
        bottom: -40px !important;
    }
    .right_arrow{
        position: absolute;
        z-index: 1;
        top: 40%;
        right: 30px;
        background-color: #fff;
        padding: 10px;
        border: 1px solid #222;
        border-radius: 50%;
        color: #222;
        cursor: pointer;
    }
    .right_arrow:hover{
        position: absolute;
        z-index: 1;
        top: 40%;
        right: 30px;
        background-color: #222;
        padding: 10px;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
    }
    .left_arrow{
        position: absolute;
        z-index: 1;
        top: 40%;
        left: 10px;
        background-color: #fff;
        padding: 10px;
        border: 1px solid #222;
        border-radius: 50%;
        color: #222;
        cursor: pointer;
    }
    .left_arrow:hover{
        position: absolute;
        z-index: 1;
        top: 40%;
        left: 10px;
        background-color: #222;
        padding: 10px;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
    }
</style>
@endsection

@section('content')
<div class="container-fluid" id="about">
    <p class="header">About Us</p>
</div>
<div class="text-box">
    <p class="text-box-text">
        Porem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus.
        Curabitur tempor quis eros tempus lacinia. Nam bibendum pellentesque quam a convallis. Sed ut vulputate nisi. Integer in felis sed leo vestibulum venenatis. Suspendisse quis arcu sem. Aenean feugiat ex eu vestibulum vestibulum. Morbi a eleifend magna. Nam metus lacus, porttitor eu mauris a, blandit ultrices nibh.
        Nam pulvinar blandit velit, id condimentum diam faucibus at. Aliquam lacus nisi, sollicitudin at nisi nec, fermentum congue felis. Quisque mauris dolor, fringilla sed tincidunt ac, finibus non odio.
    </p>
    <img class="about-logo" src="{{ asset('assets/img/logo.png') }}" width="204px" height="204px" alt="">
</div>
<div class="review">
    <div class="responsive">
        <div class="review-box">
            <img src="{{ asset('assets/img/logo.png') }}" class="rounded-circle m-auto" width="26px" height="26px" alt="">
            <div class="review-box-text">
                <h4>Sakura</h4>
                <p>
                    Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu. Worem ipsum dolor sit amet, consectetur adipiscing elit
                </p>
            </div>
        </div>
        <div class="review-box">
            <img src="{{ asset('assets/img/logo.png') }}" class="rounded-circle m-auto" width="26px" height="26px" alt="">
            <div class="review-box-text">
                <h4>Sakura</h4>
                <p>
                    Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu. Worem ipsum dolor sit amet, consectetur adipiscing elit
                </p>
            </div>
        </div>
        <div class="review-box">
            <img src="{{ asset('assets/img/logo.png') }}" class="rounded-circle m-auto" width="26px" height="26px" alt="">
            <div class="review-box-text">
                <h4>Sakura</h4>
                <p>
                    Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu. Worem ipsum dolor sit amet, consectetur adipiscing elit
                </p>
            </div>
        </div>
        <div class="review-box">
            <img src="{{ asset('assets/img/logo.png') }}" class="rounded-circle m-auto" width="26px" height="26px" alt="">
            <div class="review-box-text">
                <h4>Sakura</h4>
                <p>
                    Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu. Worem ipsum dolor sit amet, consectetur adipiscing elit
                </p>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $('.responsive').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    prevArrow: '<i class="fas fa-arrow-left left_arrow">',
    nextArrow: '<i class="fas fa-arrow-right right_arrow">',
    responsive: [
        {
        breakpoint: 1024,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            dots: false,
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
@endsection

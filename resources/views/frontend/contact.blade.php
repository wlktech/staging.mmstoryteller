@extends('layouts.f-master')

@section('title', 'Contact-Us')

@section('css')
<style>
    #contact1{
        /* background-color: #FEE5EF; */
        height: 525px;
        padding-top: 0px;
        border-radius: 0px 0px 8px 8px;
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
        top: 500px;
        left: 31px;
        right: 31px;
        border-radius: 8px;
        border: 1px solid #F0D771;
        background: #FFF;
        padding: 50px 118px;
    }
    .text-box-text{
        color: #222;
        font-size: 18px;
        font-family: Source Sans Pro;
        font-style: normal;
        line-height: normal;
    }
    .icon{
        color: #FF8CB9;
        font-size: 24px;
    }
    .form{
        padding: 97px 148px;
    }
    .title{
        color: #342626;
        font-size: 40px;
        font-family: Source Sans Pro;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
    }
    .label{
        color: #8F8F8F;
        font-size: 18px;
        font-family: Source Sans Pro;
        font-style: normal;
        font-weight: 400;
        line-height: 32px;
    }
    .form-input{
        border: 1px solid #E4E2E2;
    }
    .btn-pinky{
        background-color: #FF5595;
        color: #fff;
        height: 48px;
        padding: 8px;
        width: 199px;
        border-radius: 0;
    }
    .btn-pinky:hover{
        background-color: #FF5595;
        color: #fff;
        box-shadow: 1px 2px 3px #222;
    }
    /* mobile view */
    #contact2{
        height: 358px;
        padding-top: 0px;
        position: relative;
        border-radius: 0px 0px 8px 8px;
    }
    .header2{
        color: #000;
        text-align: center;
        font-size: 40px;
        font-family: Source Sans Pro;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        text-transform: capitalize;
    }
    .text-box2{
        position: absolute;
        top: 300px;
        left: 16px;
        right: 16px;
        border-radius: 16px;
        border: 1px solid #F0D771;
        background: #FFF;
        padding: 40px 28px;
    }
    .form1{
        padding: 129px 16px 40px 16px;
    }
    .title2{
        color: #342626;
        font-size: 24px;
        font-family: Source Sans Pro;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
    }
    .btn-pinky1{
        background-color: #FF5595;
        color: #fff;
        height: 48px;
        padding: 8px;
        width: 199px;
        border-radius: 4px;
    }
    .btn-pinky1:hover{
        background-color: #FF5595;
        color: #fff;
        box-shadow: 1px 2px 3px #222;
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
        <a href="{{ url('/events') }}" class="nav-box d-block text-decoration-none">
            <div class="nav-content">
                <img class="nav-icon" src="{{ asset('assets/img/Icons/event.png') }}" alt="">
                <p class="nav-text p-0">Events</p>
            </div>
        </a>
    </div>
    <div>
        {{-- Desktop View --}}
        <div class="d-none d-lg-block">
            <div class="container-fluid" id="contact1">
                <p class="header">Contact Us</p>
            </div>
            <div class="text-box">
                <div class="d-flex justify-content-around">
                    <div class="d-flex">
                        <div class="text-box-text">
                            <p class="fw-bold">Email:</p>
                            <span>
                                <img src="{{ asset('assets/img/Icons/mail.svg') }}" width="32px" alt=""> iqteam@mmstoryteller.com
                            </span>
                        </div>
                        <span class="d-block" style="border-right: 1px solid #ccc; height: 88px; margin-left: 96px;"></span>
                    </div>
                    <div class="d-flex">
                        <div class="text-box-text">
                            <p class="fw-bold">Phone:</p>
                            <span>
                                <img src="{{ asset('assets/img/Icons/phone.svg') }}" width="32px" alt=""> 09 770 856529
                            </span>
                        </div>
                        <span class="d-block" style="border-right: 1px solid #ccc; height: 88px; margin-left: 96px;"></span>
                    </div>
                    <div class="text-box-text">
                        <p class="fw-bold">Social:</p>
                        <div class="d-flex">
                            <a href="https://www.facebook.com/70wife?mibextid=LQQJ4d" target="__blank" class="d-block text-decoration-none me-3" style="color: #222">
                                <img class="me-2" src="{{ asset('assets/img/Icons/facebook.svg') }}" width="32px" alt="">
                                Facebook
                            </a>
                            <a href="https://m.me/109659598791246/" target="__blank" class="d-block text-decoration-none" style="color: #222">
                                <img class="me-2" src="{{ asset('assets/img/Icons/messenger.svg') }}" width="32px" alt="">
                                Messenger
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Desktop View --}}
        {{-- Tablet View --}}
        <div class="d-lg-none d-none d-md-block">
            <div class="container-fluid" id="contact1">
                <p class="header">Contact Us</p>
            </div>
            <div class="text-box">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="text-box-text">
                            <p class="fw-bold">Email:</p>
                            <span>
                                <img src="{{ asset('assets/img/Icons/mail.svg') }}" width="32px" alt=""> iqteam@mmstoryteller.com
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="text-box-text">
                            <p class="fw-bold">Phone:</p>
                            <span>
                                <img src="{{ asset('assets/img/Icons/phone.svg') }}" width="32px" alt=""> 09 770 856529
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="text-box-text">
                            <p class="fw-bold">Social:</p>
                            <div class="d-flex">
                                <a href="https://www.facebook.com/70wife?mibextid=LQQJ4d" target="__blank" class="d-block text-decoration-none me-3" style="color: #222">
                                    <img class="me-2" src="{{ asset('assets/img/Icons/facebook.svg') }}" width="32px" alt="">
                                    Facebook
                                </a>
                                <a href="https://m.me/109659598791246/" target="__blank" class="d-block text-decoration-none" style="color: #222">
                                    <img class="me-2" src="{{ asset('assets/img/Icons/messenger.svg') }}" width="32px" alt="">
                                    Messenger
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Tablet View --}}
        {{-- Mobile View --}}
        <div class="d-md-none d-sm-block">
            <div class="container-fluid" id="contact2">
                <p class="header2">Contact Us</p>
            </div>
            <div class="text-box2">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="text-box-text">
                            <p class="fw-bold">Email:</p>
                            <span>
                                <img src="{{ asset('assets/img/Icons/mail.svg') }}" width="24px" alt=""> iqteam@mmstoryteller.com
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="text-box-text">
                            <p class="fw-bold">Phone:</p>
                            <span>
                                <img src="{{ asset('assets/img/Icons/phone.svg') }}" width="24px" alt=""> 09 770 856529
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="text-box-text">
                            <p class="fw-bold">Social:</p>
                            <div class="d-flex">
                                <a href="https://www.facebook.com/70wife?mibextid=LQQJ4d" target="__blank" class="d-block text-decoration-none me-4" style="color: #222">
                                    <img class="me-2" src="{{ asset('assets/img/Icons/facebook.svg') }}" width="24px" alt="">
                                    Facebook
                                </a>
                                <a href="https://m.me/109659598791246/" target="__blank" class="d-block text-decoration-none" style="color: #222">
                                    <img class="me-2" src="{{ asset('assets/img/Icons/messenger.svg') }}" width="24px" alt="">
                                    Messenger
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Mobile View --}}
    </div>
</div>


<div class="container-fluid">
    {{-- Desktop View --}}
    <div class="form d-none d-lg-block">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="title" style="margin-bottom: 45px">Contact with us</h3>
                <form action="{{ url('/contact/sendmail/') }}" method="get">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control form-input" required>
                        <p class="text-danger" id="errorName"></p>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" class="form-control form-input" required>
                        <p class="text-danger" id="errorEmail"></p>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label label">Message <span class="text-danger">*</span></label>
                        <textarea class="form-control" style="border: 1px solid #E4E2E2;" name="message" id="message" cols="20" rows="5" required></textarea>
                        <p class="text-danger" id="errorMessage"></p>
                    </div>
                    <button type="submit" class="btn btn-pinky">Send Message</button>
                </form>
            </div>
            <div class="col-lg-6" style="margin-top: 115px; padding-left:40px;">
                <img src="{{ asset('assets/img/Icons/Reading Time.svg') }}" alt="" class="w-100">
            </div>
        </div>
    </div>
    {{-- Desktop View --}}
    {{-- Mobile View --}}
    <div class="form1 d-lg-none d-md-block">
        <h3 class="title2" style="margin-bottom: 16px">Contact with us</h3>
        <form action="{{ url('/contact/sendmail') }}" name="validate1" onsubmit="return validateForm1()" method="get">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label label">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control form-input" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label label">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control form-input" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label label">Message <span class="text-danger">*</span></label>
                <textarea class="form-control" style="border: 1px solid #E4E2E2;" name="message" cols="20" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-pinky1">Send Message</button>
        </form>
    </div>
    {{-- Mobile View --}}
</div>

@endsection

@section('script')
<script>
    //Validation
    // function validateForm() {
    //         let name = document.forms["validate"]["name"].value;
    //         let email = document.forms["validate"]["email"].value;
    //         let message = document.forms["validate"]["message"].value;
    //         if (name =="" || email =="" || message=="") {
    //             if(name==""){
    //                 document.getElementById('errorName').innerHTML = "*Name must be filled out";
    //             }else{
    //                 document.getElementById('errorName').innerHTML = " ";
    //             }
    //             if(email==""){
    //                 document.getElementById('errorEmail').innerHTML = "*Email must be filled out";
    //             }else{
    //                 document.getElementById('errorEmail').innerHTML = " ";
    //             }
    //             if(message == ""){
    //                 document.getElementById('errorMessage').innerHTML = "*Message must be filled out";
    //             }else{
    //                 document.getElementById('errorMessage').innerHTML = " ";
    //             }
    //             return false;
    //         }
    // }
</script>
@endsection

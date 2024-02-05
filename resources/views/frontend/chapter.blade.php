@extends('layouts.f-master')

@section('title', 'Chapter')

@section('css')
<style>
    #body{
        padding: 100px 178px;
        background-image: url('/assets/img/Icons/gradient-background.png') !important;
        background-repeat: no-repeat;
    }
    #chapter{
        padding: 26px 32px;
        border-radius: 8px;
        background: #FFF;
    }
    .chapter-header{
        color: #222;
        text-align: center;
        font-family: Source Sans Pro;
        font-size: 28px;
        font-style: normal;
        font-weight: 700;
        line-height: 40px; /* 142.857% */
        text-transform: capitalize;
    }

    .views, .lists{
        color: #787878;
        text-align: center;
        font-family: Source Sans Pro;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }
    .line{
        padding: 1px 1px;
        background: #cacaca;
        margin: 0 5px;
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
    .btn-prev, .btn-next{
        padding: 12px 24px;
        border-radius: 4px;
        background: #FF3C86;
        color: #fff;
    }
    .btn-prev:hover, .btn-next:hover{
        background-color: #FF3C86;
        color: #fff;
        color: #FFF;
        text-align: center;
        font-family: Source Sans Pro;
        font-size: 18px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        text-transform: capitalize;
    }
    .btn-prev{
        margin-right: 16px;
    }
    /* display for lg */
    @media only screen and (max-width:992px){
        #body{
            padding: 100px 100px;
        }
        .chapter-header{
            font-size: 26px;
        }
        .btn-prev, .btn-next{
            padding: 10px 20px;
            font-size: 16px;
        }
        .btn-prev{
            margin-right: 16px;
        }
    }
    /* display for md */
    @media only screen and (max-width:768px){
        #body{
            padding: 100px 0px;
        }
        #chapter{
            padding: 10px 16px;
            border-radius: 4px;
        }
        .chapter-header{
            font-size: 20px;
        }
        .btn-prev, .btn-next{
            padding: 6px 12px;
            font-size: 14px;
        }
        .btn-prev{
            margin-right: 16px;
        }
    }

</style>
@endsection

@section('content')
<div class="container-fluid" id="body">
    <div id="chapter">
        <h6 class="chapter-header">{{ $chapter->name }}</h6>
        <div class="chapter-small">
            <div class="d-flex justify-content-center">
                <div class="views">
                    <i class="fas fa-eye"></i>
                    Viewers
                    <span class="count ms-1">
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
                    </span>
                </div>
                <span class="line"></span>
                <div class="lists">
                    <a class="text-decoration-none text-secondary" href="{{ url('/novel-'.$book->id.'-chapters') }}">
                        <i class="fas fa-list"></i>
                        Chapters
                        <span class="count ms-1">
                            {{ $book->chapter_count }}
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <p class="chapter-text code" style="text-align: justify; line-height: 50px;">
            {!! $chapter->full_text !!}
        </p>
        <div class="text-end">
            @foreach ($book->chapter as $key => $value)
                @if ($value->id === $chapter->id)
                    @if ($key > 0)
                        <a href="{{ url('/chapter-' . $book->chapter[$key-1]->id) }}" class="btn btn-prev">
                            <i class="fas fa-angle-left me-2"></i>Prev
                        </a>
                    @endif
                    @if ($key < $totalArray)
                        <a href="{{ url('/chapter-' . $book->chapter[$key + 1]->id) }}" class="btn btn-next">
                            Next<i class="fas fa-angle-right ms-2"></i>
                        </a>
                    @endif
                @endif
            @endforeach



        </div>
    </div>
</div>

@endsection

@section('script')
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

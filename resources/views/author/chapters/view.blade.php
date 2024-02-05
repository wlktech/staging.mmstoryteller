@extends('layouts.author')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .title{
        color: #222;
        font-family: Source Sans Pro;
        font-size: 28px;
        font-style: normal;
        font-weight: 700;
        line-height: 40px; /* 142.857% */
        text-transform: capitalize;
        width: 100%;
    }
    .chapter{
        font-size: 20px;
        font-weight: 700;
    }
    .bg-pink{
        background: #fff1f6;
    }
    .book-text{
        padding: 0;
        margin: 0;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card bg-white p-4">
        <div class="d-flex justify-content-between">
            <h3 class="title">{{ $chapter->name }}</h3>
            <div>
                <a href="{{ url('/author/novels/view/'.$chapter->book_id) }}" class="btn btn-outline-pink"><i class="fas fa-arrow-left mr-2 d-inline"></i>Back</a>
            </div>
        </div>
        <div class="para">
            <p>{!! $chapter->full_text !!}</p>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $(".select-genre").select2({
            placeholder: 'Choose Genre',
            // maximumSelectionLength: 4
        });
    });
</script>
@endsection

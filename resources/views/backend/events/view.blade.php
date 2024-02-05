@extends('layouts.b-master')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="card p-4">
        <div class="d-flex justify-content-between mb-3">
            <div>
                <h4><i class="fas fa-blog mr-2"></i>Event</h4>
            </div>
            <div>
                <a href="{{ url('/admin/events/') }}" class="btn btn-outline-primary"><i class="fas fa-arrow-left mr-2"></i>Back</a>
            </div>
        </div>
        <div class="">
            <h4>Title - {{ $event->title }}</h4>
            @if ($event->image)
            <img src="{{ asset('assets/img/events/'.$event->image) }}" class="img-thumbnail" alt="">
            @endif
            @if ($event->video)
                <video width="600" height="400" controls>
                    <source src="{{ asset('assets/img/events/'.$event->video) }}" type="video/mp4">
                    <source src="{{ asset('assets/img/events/'.$event->video) }}" type="video/quicktime">
                    <source src="{{ asset('assets/img/events/'.$event->video) }}" type="video/x-msvideo">
                    Your browser does not support the video tag.
                </video>
            @endif
            <p>
                {!! $event->description !!}
            </p>
        </div>

    </div>
</div>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $('#description').summernote({
      placeholder: 'Enter News Text',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        // ['insert', ['link', 'picture', 'video']],
        // ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>
<script>
    $(".video").hide();
    // $(".image").hide();
    $("#image").click(function(){
        $('.image').show('slow');
        $('.video').hide('slow');
    })
    $("#video").click(function(){
        $('.image').hide('slow');
        $('.video').show('slow');
    })
</script>
@endsection

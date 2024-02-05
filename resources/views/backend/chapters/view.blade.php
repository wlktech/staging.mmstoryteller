@extends('layouts.b-master')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="card p-4">
        <div class="">
            <div class="mb-3 text-end">
                <a href="{{ url('/admin/book/view/'.$chapter->book_id) }}" class="btn btn-outline-primary mb-3"><i class="fas fa-arrow-left me-2"></i>Back</a>
            </div>
        </div>
        <div class="">
            <h4><span class="text-primary">Novel Title</span>  - {{ $chapter->book->title }}</h4>
            <h4><span class="text-primary">Chapter Name</span> - {{ $chapter->name }}</h4>
            <p style="text-align: justify">
                {!! $chapter->full_text !!}
            </p>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $('#full_text').summernote({
      placeholder: 'Write Down Full Text',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        // ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>
@endsection


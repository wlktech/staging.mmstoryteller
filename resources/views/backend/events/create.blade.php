@extends('layouts.b-master')

@section('css')
{{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet"> --}}
@endsection

@section('content')
<div class="container-fluid">
    <div class="card p-4">
        <div class="d-flex justify-content-between mb-3">
            <div>
                <h4><i class="fas fa-blog mr-2"></i>Create Event</h4>
            </div>
            <div class="mt-3">


            </div>
        </div>
        <div class="">
            <form action="{{ url('/admin/events/create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Title">
                            @error('title')
                            <p class="text-danger">*{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label mr-3">
                                Choose Image or Video (1920x1080px or 16:9)
                            </label>
                            <input type="file" class="form-control" id="file" name="file" placeholder="Enter Title">
                            @error('file')
                            <p class="text-danger mt-0 pt-0">*The image or video is required</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                            @error('description')
                            <p class="text-danger">*{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="{{ url('/admin/events/') }}" class="btn btn-outline-primary"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Create</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>

@endsection

@section('script')
{{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> --}}
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

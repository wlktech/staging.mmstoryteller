@extends('layouts.b-master')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="card p-4">
        <div class="d-flex justify-content-between">
            <div class="mb-3">
                <h4><i class="fas fa-pen-to-square mr-2"></i>Create Book</h4>
            </div>
            <div class=" mb-3">
                {{-- <button class="btn btn-primary" data-target="#createBook" data-toggle="modal"><i class="fas fa-plus-circle mr-2"></i>Create</button> --}}
                <a href="{{ url('/admin/book/') }}" class="btn btn-outline-primary"><i class="fas fa-arrow-left mr-2"></i>Back</a>
            </div>
        </div>
        <div class="container">
            <form action="{{ url('/admin/book/create/') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Book Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter Book Title">
                    @error('title')
                    <p class="text-danger">*{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Choose Image (1050x1650px)</label>
                    <input type="file" name="image" class="form-control">
                    @error('image')
                    <p class="text-danger">*{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Choose Category</label>
                    <select name="category_id" id="category_id" class="form-select">
                        <option value="">Choose Category</option>
                        @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <p class="text-danger">*{{ "The category field is required." }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Choose Genre</label>
                    <select name="genre_id[]" id="genre_id" style="width: 100%;" class="select-genre" multiple="multiple">
                        <option value="">Choose Genre</option>
                        @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                    @error('genre_id')
                    <p class="text-danger">*{{ "The genre field is required." }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <textarea name="description" id="desc" cols="30" rows="10" class="form-control" placeholder="Enter Description"></textarea>
                    @error('description')
                    <p class="text-danger">*{{ $message }}</p>
                    @enderror
                </div>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="text-end">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $('#desc').summernote({
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
<script>
    $(document).ready(function () {
        $(".select-genre").select2({
            placeholder: 'Choose Genre',
            // maximumSelectionLength: 4
        });
    });
</script>
@endsection

@extends('layouts.b-master')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="card p-4">
        <div class="d-flex justify-content-between">
            <div class="mb-3">
                <h4><i class="fas fa-file mr-2"></i>Create Chapter</h4>
            </div>
            <div class=" mb-3">
                {{-- <button class="btn btn-primary" data-target="#createChapter" data-toggle="modal"><i class="fas fa-plus-circle mr-2"></i>Create</button> --}}
                <a href="{{ url('/admin/book/view/'.$novel->id) }}" class="btn btn-outline-primary"><i class="fas fa-arrow-left mr-2"></i>Back</a>
            </div>
        </div>

        <div>
            <form action="{{ url('/admin/chapter/create') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Chapter Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Chapter Name">
                            @error('name')
                            <span class="text-danger">*Chapter name must not be empty!</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="book_id" class="form-label">Book Title</label>
                            <select name="book_id" id="" class="form-select">
                                <option value="">Choose Book Title</option>
                                @foreach ($books as $book)
                                <option value="{{ $book->id }}" {{ $novel->id == $book->id ? 'selected' : '' }}>{{ $book->title }}</option>
                                @endforeach
                            </select>
                            @error('book_id')
                            <span class="text-danger">*Book name must not be empty!</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="full_text" class="form-label">Write The Full Chapter</label>
                    <textarea class="form-control" name="full_text" id="full_text" cols="30" rows="10" placeholder="Enter Your Text"></textarea>
                    @error('full_text')
                        <span class="text-danger">*Full text must not be empty!</span>
                    @enderror
                </div>
                <div class="mb-3 text-end">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <button type="submit" class="btn btn-primary">Create Chapter</button>
                </div>
            </form>
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


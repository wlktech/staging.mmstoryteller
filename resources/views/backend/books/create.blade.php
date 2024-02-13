@extends('layouts.b-master')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css"> --}}
<link rel="stylesheet" href="{{ asset('assets/css/cropper/crop.css') }}">
<style>
    .img-container {
    margin-bottom: 10px;
    }
    .cropped-container {
        width: 400px;
        margin: auto;
        text-align: center;
        justify-content: center;
        background-color: ghostwhite;
        padding: 20px 20px;
        display: none;
        margin-top: 10px;
    }
    #output {
        margin: 0 5px;
        display: block;
        max-width: 100%;
    }
</style>
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
                    <label for="imageInput" class="form-label">Choose Image</label>
                    <input type="file" name="image" id="imageInput" class="form-control" accept="image/*">
                    @error('image')
                    <p class="text-danger">*{{ $message }}</p>
                    @enderror
                    <div class="img-container">
                        <img id="image" style="display: none; min-width: 75%; height: auto;">
                    </div>
                    <div>
                        <button class="btn btn-sm btn-dark" id="btn-crop">Crop</button>
                    </div>
                    <div class="cropped-container">
                        <img src="" id="output">
                    </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="{{ asset("assets/js/cropper/crop.js") }}"></script>
{{-- cropjs --}}
<script>
    $(document).ready(function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
          }
        });
        
        let cropper;
    
        const imageInput = $('#imageInput');
        const imageElement = $('#image');
        const outputElement = $('#output');
        const croppedContainer = $('.cropped-container');
    
        imageInput.change(function(event) {
            const file = event.target.files[0];
            if (!file) {
                return; // Exit if no file is selected
            }
    
            const reader = new FileReader();
            reader.onload = function(e) {
                if (cropper) {
                    cropper.destroy(); // Clean up any existing cropper instance
                }
                imageElement.attr('src', e.target.result).show();
                // Reinitialize the cropper with the new image
                cropper = new Cropper(imageElement[0], {
                    aspectRatio: 2 / 3,
                    viewMode: 1,
                });
            };
            reader.onerror = function(e) {
                console.error("Error reading file: ", e.target.error);
            };
            reader.readAsDataURL(file);
        });
    
        $('#btn-crop').click(function(e) {
            e.preventDefault();
            if (!cropper) {
                return; // Exit if cropper is not initialized
            }
    
            cropper.getCroppedCanvas().toBlob(function(blob) {
                const formData = new FormData();
                formData.append('croppedImage', blob);
    
                const url = URL.createObjectURL(blob);
                outputElement.attr('src', url).show();
                croppedContainer.css('display', 'flex');
                console.log(outputElement[0].src);

                $.ajax({
                    url: '{{ route("imgStore") }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(data) {
                        console.log(data);
                        Toastify({
                            text: "Image Uploaded Successfully.",
                            className: "text-white",
                            style: {
                                background: "#38d100",
                            },
                            position: 'center',
                        }).showToast();
                    },
                    error: function(xhr, status, error) {
                        console.error("Upload failed:", status, error);
                    },
                });
            }, 'image/png');
        });
    });
</script>
{{-- cropjs --}}
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

@extends('layouts.b-master')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css"> --}}
<link rel="stylesheet" href="{{ asset('assets/css/cropper/crop.css') }}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="card p-4">
        <div class="d-flex justify-content-between">
            <div class="mb-3">
                <h4><i class="fas fa-pen-to-square mr-2"></i>Edit Book</h4>
            </div>
            <div class=" mb-3">
                {{-- <button class="btn btn-primary" data-target="#createBook" data-toggle="modal"><i class="fas fa-plus-circle mr-2"></i>Create</button> --}}
                <a href="{{ url('/admin/book/') }}" class="btn btn-outline-primary"><i class="fas fa-arrow-left mr-2"></i>Back</a>
            </div>
        </div>
        <div class="container">
            <form action="{{ url('/admin/book/edit/'.$book->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Book Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter Book Title" value="{{ $book->title }}">
                    @error('title')
                    <p class="text-danger">*{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="imageInput" class="form-label">Choose Image</label>
                    <input type="file" name="before_crop_image" id="imageInput" class="form-control" accept="image/*">
                    @error('image')
                    <p class="text-danger">*{{ $message }}</p>
                    @enderror
                    <div class="img-container">
                        <img id="image" style="display: none; max-width: 100%; height: auto;">
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
                        <option value="{{ $cat->id }}"
                            @if ($cat->id == $book->category_id)
                            @selected(true)
                            @endif>{{ $cat->name }}</option>
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
                        <option value="{{ $genre->id }}"
                            @foreach($book->genre as $g)
                                @if ($genre->id == $g->id)
                                @selected(true)
                                @endif
                            @endforeach
                        >{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label d-block">Choose Status</label>
                    <label for="ongoing" class="form-label mr-3">
                        <input type="radio" name="status" id="ongoing" value="ONGOING" @if ($book->status == "ONGOING")
                        {{ "checked" }}
                        @endif> Ongoing
                    </label>
                    <label for="completed" class="form-label">
                        <input type="radio" name="status" id="completed" value="COMPLETED" @if ($book->status == "COMPLETED")
                        {{ "checked" }}
                        @endif> Completed
                    </label>
                    @error('status')
                    <p class="text-danger">*{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <textarea name="description" id="desc" cols="30" rows="10" class="form-control" placeholder="Enter Description">{{ $book->description }}</textarea>
                    @error('description')
                    <p class="text-danger">*{{ $message }}</p>
                    @enderror
                </div>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="text-end">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-pen-to-square mr-2"></i>Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="{{ asset("assets/js/cropper/crop.js") }}"></script>
<script>
    $(document).ready(function() {
        var cropper;
        $('#imageInput').change(function(event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    if (cropper) {
                        cropper.destroy(); // Destroy the old cropper instance if it exists
                    }
                    $('#image').attr('src', e.target.result).show();
                    // Initialize Cropper.js on the image
                    cropper = new Cropper(document.getElementById('image'), {
                        aspectRatio: 2 / 3, // Set the aspect ratio to 2:3
                        viewMode: 1, // Restrict the crop box to not exceed the size of the canvas
                    });
                };
                reader.readAsDataURL(file); // Convert image file to base-64 string
            }
        });
    
        $('#btn-crop').click(function(e) {
            e.preventDefault();
            if (cropper) {
                // Get the cropped image data
                cropper.getCroppedCanvas().toBlob(function(blob) {
                    var formData = new FormData();
                    formData.append('croppedImage', blob, 'croppedImage.png');
    
                    // Display the cropped image on the page
                    var url = URL.createObjectURL(blob);
                    $('#image').attr('src', url).hide();
                    $('#output').attr('src', url).show();

                    $('.cropped-container').css('display', 'flex');
                    $.ajax({
                        url: '{{ route('imgStore') }}',
                        type:'POST',
                        data: {'_token': $('meta[name="csrf-token"]').attr('content'), 'image': response},
                        success:function(data){
                            // alert('Crop image has been uploaded');
                            Toastify({
                                text:"Image Uploaded Successfully.",
                                className:"text-white",
                                style: {
                                    background: "#38d100",
                                },
                                position:'center'
                            }).showToast();
                        }
                    })
                }, 'image/png');
            }
        });
    });
</script>
{{-- <script>  
    $(document).ready(function(){
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
          }
        });
         
        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
                width:200,
                height:300,
                type:'square' //circle
            },
            boundary:{
                width:400,
                height:400
            }    
        });
        $('#before_crop_image').on('change', function(){
            var reader = new FileReader();
            reader.onload = function (event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#imageModel').modal('show');
           
        });
        $('.crop_image').click(function(event){
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response){
                $.ajax({
                    url: '{{ url("admin/book/image/edit/$book->id") }}',
                    type:'POST',
                    data: {'_token': $('meta[name="csrf-token"]').attr('content'), 'image': response},
                    success:function(data){
                        $('#imageModel').modal('hide');
                        // alert('Crop image has been uploaded');
                        Toastify({
                            text:"Image Uploaded Successfully.",
                            className:"text-white",
                            style: {
                                background: "#38d100",
                            },
                            position:'center'
                        }).showToast();
                    }
                })
            });
        });
    });  
</script> --}}
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

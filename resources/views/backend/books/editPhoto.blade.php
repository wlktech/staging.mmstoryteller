@extends('layouts.b-master')

@section('css')
<meta name="_token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
<style type="text/css">
    body{
        background:#f6d352; 
    }
   h2{
        font-weight: bold;
        font-size:20px;
    }
    #image {
        display: block;
        max-width: 100%;
    }
    .preview {
        text-align: center;
        overflow: hidden;
        width: 160px; 
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }
    .section{
        margin-top:150px;
        background:#fff;
        padding:50px 30px;
    }
    .modal-lg{
        max-width: 1000px !important;
    }
</style>
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
            <div class="mb-3">
                <label for="imageInput" class="form-label">Choose Image</label>
                <input type="file" name="image" id="imageInput" class="form-control image" accept="image/*">
                @error('image')
                <p class="text-danger">*{{ $message }}</p>
                @enderror
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary"><i class="fas fa-pen-to-square mr-2"></i>Edit</button>
            </div>
        </div>
    </div>
</div>



{{-- modal --}}
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="modalLabel">How to crop image before upload image in laravel 9 CodingSeeker</h5> --}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="image" src="">
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="crop">
                    <div class="spinner-border spinner-border-sm d-none" id="spinner" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    Crop
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
{{-- cropjs --}}
<script>
    var $modal = $('#modal');
    var image = document.getElementById('image');
    var cropper;

    $("body").on("change", ".image", function(e){
        var files = e.target.files;
        var done = function (url) {
            image.src = url;
            $modal.modal('show');
        };

        var reader;
        var file;
        var url;

        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
            reader.readAsDataURL(file);
            }
        }
    });

    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio: 2 / 3,
            viewMode: 3,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });

    $("#crop").click(function(){
        canvas = cropper.getCroppedCanvas({
            width: 160,
            height: 160,
            minWidth: 256,
            minHeight: 256,
            maxWidth: 4096,
            maxHeight: 4096,
            fillColor: '#fff',
            imageSmoothingEnabled: true,
            imageSmoothingQuality: 'high',
        });

        $("#spinner").removeClass('d-none');

        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result; 
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ url('/admin/book/image/edit/'.$book->id) }}",
                    data: {'_token': $('meta[name="_token"]').attr('content'), 'image': base64data},
                    success: function(data){
                        console.log(data);
                        $modal.modal('hide');
                        $("#spinner").addClass('d-none');
                        Toastify({
                            text:"Image Uploaded Successfully.",
                            className:"text-white",
                            style: {
                                background: "#38d100",
                            },
                            position:'center'
                        }).showToast();
                    }
                });
            }
        });
    });
</script>
{{-- cropjs --}}
@endsection

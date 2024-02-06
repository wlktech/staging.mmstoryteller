@extends('layouts.b-master')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">
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
            {{-- <form action="{{ url('/admin/book/edit/'.$book->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Choose Image (1050x1650px)</label>
                    <input type="file" name="image" class="form-control">
                    @error('image')
                    <p class="text-danger">*{{ $message }}</p>
                    @enderror
                    <img src="{{ asset('assets/img/book/'.$book->image) }}" class="mt-2" width="200px" alt="">
                </div>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="text-end">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-pen-to-square mr-2"></i>Edit</button>
                </div>
            </form> --}}
            <div class="mb-3">
                <label for="before_crop_image" class="form-label">Choose Image</label>
                <input type="file" name="before_crop_image" id="before_crop_image" class="form-control" accept="image/*">
                @error('image')
                <p class="text-danger">*{{ $message }}</p>
                @enderror
                {{-- <img src="{{ asset('assets/img/book/'.$book->image) }}" class="mt-2" width="200px" alt=""> --}}
            </div>
        </div>
    </div>
</div>
{{-- modal --}}
<div id="imageModel" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Novel Cover</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div id="image_demo" style="width:350px; margin-top:30px"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary crop_image">Save changes</button>
        </div>
      </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>  
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
                        setTimeout(function() {
                            window.location.href = '/admin/public/admin/book';
                        }, 2000);


                    }
                })
            });
        });
    });  
</script>
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

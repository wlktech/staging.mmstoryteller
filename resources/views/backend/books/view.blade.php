@extends('layouts.b-master')

@section('css')
<style>

</style>
<style>
    .btn-pink{
        background: #F54487;
        color: #FFF;
    }
    .btn-pink:hover{
        background: #F54487;
        color: #FFF;
    }
    .badge-pink{
        background: #ffe6ff;
        color: #F54487;
        text-align: center;
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        border-radius: 24px;
        padding: 6px 16px;
    }
    .badge-green{
        background: #C5F8C7;
        color: #31AA07;
        text-align: center;
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        border-radius: 24px;
        padding: 6px 16px;
    }
    .pen{
        padding: 5px;
        background: #E7E7EA;
        border-radius: 8px;
        cursor: pointer;
    }
    .popup{
        padding: 40px 48px 24px 48px;
        background: #fff;
        border-radius: 16px;
    }
    .popup-header{
        color: #222;
        font-family: Poppins;
        font-size: 20px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        letter-spacing: -0.2px;
    }
    .popup-text{
        color: #898B92;
        font-family: Poppins;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px; /* 171.429% */
    }
    .chapter{
        color: #4D4D4D;
        font-family: Poppins;
        font-size: 15px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }
    .status{
        color: #4D4D4D;
        font-family: Poppins;
        font-size: 15px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        padding-left: 65px;
    }
    @media only screen and (max-width:992px){
        .title{
            font-size: 12px;
        }
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card p-4">
        <div class="d-flex justify-content-between">
            <div class="mb-3">
                <a href="{{ url('/admin/book/') }}" class="btn btn-outline-primary d-none d-md-block"><i class="fas fa-arrow-left"></i></a>
                <a href="{{ url('/admin/book/') }}" class="btn btn-sm btn-outline-primary d-block d-md-none"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="mb-3">
                <h4 class="title">Chapter List</h4>
            </div>
            <div class=" mb-3">
                {{-- <button class="btn btn-primary" data-target="#createChapter" data-toggle="modal"><i class="fas fa-plus-circle mr-2"></i>Create</button> --}}
                <a href="{{ url('/admin/book/'.$book->id.'/chapter/create/') }}" class="btn btn-primary d-none d-md-block"><i class="fas fa-plus-circle mr-2"></i>Create</a>
                <a href="{{ url('/admin/book/'.$book->id.'/chapter/create/') }}" class="btn btn-primary btn-sm d-block d-md-none">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Chapter</th>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Published</th>
                        <th>View Counts</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chapters as $chapter)
                    <tr style="height: 46px;">
                        <td>{{ $no++ }}</td>
                        <td style="width: 160px;">{{ $chapter->name ?? '' }}</td>
                        <td>
                            {{ mb_strimwidth($chapter->book->title, 0, 20, '...') }}
                        </td>
                        <td style="width: 160px;">{{ $chapter->user->name ?? '' }}</td>
                        <td>
                            @if ($chapter->status == "Free")
                            <span class="badge-green mb-3">{{ "FREE" }}</span>
                            @else
                            <span class="badge-pink mb-3">{{ $chapter->status }}</span>
                            @endif
                            <img src="{{ asset('assets/img/Icons/edit.png') }}" class="pen" alt="" data-id="{{ $chapter->id }}" data-name="{{ $chapter->name }}" data-target="#paid" data-toggle="modal">
                        </td>
                        <td>
                            {{ $chapter->created_at->format('d/m/Y') }}
                        </td>
                        <td class="text-center">{{ $chapter->view_count }}</td>
                        <td>
                            <a href="{{ url('/admin/chapter/view/'.$chapter->id) }}" data-chapterId="{{ $chapter->id }}" class="btn btn-sm btn-warning views"><i class="fas fa-eye"></i></a>
                            <a href="{{ url('/admin/chapter/edit/'.$chapter->id) }}" class="btn btn-sm btn-success"><i class="fas fa-pen-to-square"></i></a>
                            <button class="btn btn-sm btn-danger delete_id" data-id="{{ $chapter->id }}" data-target="#deleteModal" data-toggle="modal"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-between mt-4">
                <div>
                    @if ($chapters->count())
                        @if ($chapters->count() == 10)
                        Showing {{ $no-10 }} to {{ $no-1 }} of {{ $all->count() }} entries
                        @elseif ($chapters->count() < 10)
                        Showing {{ $all->count()-$chapters->count()+1 }} to {{ $no-1 }} of {{ $all->count() }} entries
                        @endif
                    @endif
                </div>
                <div>
                    {{ $chapters->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Paid or Free -->
<div class="modal fade" id="paid">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body popup">
            <h3 class="popup-header">Do you want to change the status?</h3>
            <p class="popup-text">You can change the price status for each chapter and regard it as free or the amount as much as you want.</p>
            <h5 class="chapter">Chapter Name:  <span id="chapter_name" class="chapter ml-3"></span></h5>
            <h5 class="status">Status:
                <span id="freeBtn" class="btn btn-sm btn-success ml-3">FREE</span>
                <span id="paidBtn" class="btn btn-sm btn-outline-secondary ml-2">PAID</span></h5>

            <form class="freeForm" action="{{ url('/admin/chapter/status/') }}" method="post">
                <hr>
                @csrf
                <div class="">
                    <input type="hidden" name="status" value="Free" class="form-control">
                    <input type="hidden" name="id" class="chapter_id">
                    <div class="text-end">
                        <button class="btn mr-2" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Change</button>
                    </div>
                </div>
            </form>
            <form class="paidForm d-none" action="{{ url('/admin/chapter/status/') }}" method="post">

                @csrf
                <div class="d-flex justify-content-end">
                    <input type="number" name="status" value="" class="form-control" style="width: 268px;" placeholder="Fill in the number of gems">
                    <input type="hidden" name="id" class="chapter_id">
                </div>
                    <hr>
                    <div class="text-end">
                        <button class="btn mr-2" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Change</button>
                    </div>
            </form>
        </div>
      </div>
    </div>
</div>

<!-- Edit Home Banner Modal -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-pen-to-square mr-2"></i>Edit chapter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/admin/chapter/edit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">chapter Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter chapter Title">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Choose Image (204x312px)</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="id" value="" id="edit_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-pen-to-square mr-2"></i>Edit</button>
        </form>
        </div>
      </div>
    </div>
</div>



<!-- Delete Modal -->
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-dismiss="modal"></button>
        </div>
        <div class="modal-body text-center">
          <i class="fas fa-warning text-danger fa-2x mb-3"></i>
          <p class="modal-title fs-5" id="deleteModalLabel">Are you sure "Delete"?</p>
        </div>
        <div class="modal-footer m-auto">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fas fa-xmark me-2"></i>Cancle</button>
          <form action="{{ url('/admin/chapter/delete/'.$book->id) }}" method="post">
            @csrf
            <input type="hidden" name="id" id="delete_id" value="">
            <button class="btn btn-success" type="submit"><i class="fas fa-check me-2"></i>Confirm</button>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $(".edit_id").click(function(){
            $id = $(this).data('id');
            $title = $(this).data('title');
            $("#edit_id").val($id);
            $("#title").val($title);
        })
        $(".delete_id").click(function(){
            $id = $(this).data('id');
            $("#delete_id").val($id);
        })
        $(".pen").click(function(){
            $id = $(this).data('id');
            $name = $(this).data('name');
            $(".chapter_id").val($id);
            $("#chapter_name").html($name);
        })
        $("#paidBtn").click(function(){
            $("#paidBtn").removeClass('btn-outline-secondary')
            $("#paidBtn").addClass('btn-pink')
            $("#freeBtn").removeClass('btn-success')
            $("#freeBtn").addClass('btn-outline-secondary')

            $(".paidForm").removeClass('d-none')
            $(".freeForm").addClass('d-none')
        })
        $("#freeBtn").click(function(){
            $("#freeBtn").addClass('btn-success')
            $("#freeBtn").removeClass('btn-outline-secondary')
            $("#paidBtn").addClass('btn-outline-secondary')
            $("#paidBtn").removeClass('btn-pink')

            $(".paidForm").addClass('d-none')
            $(".freeForm").removeClass('d-none')
        })
    });
</script>

@endsection

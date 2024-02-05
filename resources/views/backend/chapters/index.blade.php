@extends('layouts.b-master')

@section('content')
<div class="container-fluid">
    <div class="card p-4">
        <div class="d-flex justify-content-between">

            <div class="mb-3">
                <h4>Chapter List</h4>
            </div>
            <div class=" mb-3">
                {{-- <button class="btn btn-primary" data-target="#createChapter" data-toggle="modal"><i class="fas fa-plus-circle mr-2"></i>Create</button> --}}
                <a href="{{ url('/admin/chapter/create/') }}" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Create</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Chapter</th>
                        <th>Book</th>
                        <th>Author By</th>
                        <th>Status</th>
                        <th>View Count</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chapters as $chapter)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $chapter->name }}</td>
                        <td>{{ $chapter->book->title }}</td>
                        <td>{{ $chapter->user->name }}</td>
                        <td>
                            @if ($chapter->status == "Free")
                            <span class="badge badge-primary mb-3">{{ $chapter->status }}</span>
                            <form action="{{ url('/admin/chapter/status/'.$chapter->id) }}" method="post">
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="status" value="" class="form-control">
                                    <button type="submit" class="btn btn-sm btn-success">Paid</button>
                                </div>
                            </form>
                            @else
                            <span class="badge badge-primary mb-3">
                                @if ($chapter->status !== "Free")
                                {{ $chapter->status }} coins
                                @else
                                {{ $chapter->status }}
                                @endif
                            </span>
                            <form action="{{ url('/admin/chapter/status/'.$chapter->id) }}" method="post">
                                @csrf
                                <div class="">
                                    <input type="hidden" name="status" value="Free" class="form-control">
                                    <button type="submit" class="btn btn-sm btn-success">Free</button>
                                </div>
                            </form>
                            @endif
                        </td>
                        <td>{{ $chapter->view_count }}</td>
                        <td>
                            <a href="{{ url('/admin/chapter/view/'.$chapter->id) }}" data-chapterId="{{ $chapter->id }}" class="btn btn-sm btn-warning views"><i class="fas fa-eye"></i></a>
                            @if ($chapter->user_id == Auth::user()->id)
                            <a href="{{ url('/admin/chapter/edit/'.$chapter->id) }}" class="btn btn-sm btn-success"><i class="fas fa-pen-to-square"></i></a>
                            <button class="btn btn-sm btn-danger delete_id" data-id="{{ $chapter->id }}" data-target="#deleteModal" data-toggle="modal"><i class="fas fa-trash"></i></button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $chapters->links() }}
        </div>
    </div>
</div>

<!-- Create Home Banner Modal -->
<div class="modal fade" id="createchapter">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus mr-2"></i>Create chapter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/admin/chapter/create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">chapter Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter chapter Title">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Choose Image (204x312px)</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Create</button>
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
          <form action="{{ url('/admin/chapter/delete/') }}" method="post">
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
    });
</script>

@endsection

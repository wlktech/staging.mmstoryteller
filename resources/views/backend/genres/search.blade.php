@extends('layouts.b-master')

@section('content')
<div class="container-fluid">
    <div class="card p-4">
        <div class="d-flex justify-content-between">
            <div class="mb-3">
                <h4 class="mb-3">Genre List</h4>
                @isset($name)
                <p class="text-primary">Search Result for "{{ $name }}"</p>
                @endisset
                @isset($start)
                <p class="text-primary mb-1 pb-1"><span class="fw-bold">Start Date: </span> {{ date('M d, Y', strtotime($start)) }} </p>
                <p class="text-primary mt-0 pt-0"><span class="fw-bold">End Date: </span>{{ date('M d, Y', strtotime($end)) }}</p>
                @endisset
                <p class="text-secondary">Total Genre - {{ $all->count() }} genre{{ $all->count() > 1 ? "s" : "" }}</p>
            </div>
            <div class=" mb-3">
                <div class="text-end">
                    <button class="btn btn-primary" data-target="#createCategory" data-toggle="modal"><i class="fas fa-plus-circle mr-2"></i>Create</button>
                </div>
                {{-- <a href="{{ url('/admin/book/create/') }}" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Create</a> --}}
                <form class="mt-3" action="{{ url('/admin/genre/searchByName') }}" method="get">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="name" placeholder="Search By Name" class="form-control">
                        <button class="btn btn-primary"><i class="fas fa-magnifying-glass"></i></button>
                    </div>
                </form>
                <form class="mt-3" action="{{ url('/admin/genre/searchByDate') }}" method="get">
                    @csrf
                    <div class="d-flex">
                        <div>
                            <label for="start" class="form-label">Start Date</label>
                            <input type="date" name="start" id="start" class="form-control">
                        </div>
                        <div>
                            <label for="end" class="form-label">End Date</label>
                            <input type="date" name="end" id="end" class="form-control">
                        </div>
                        <div>
                            <label for="" class="form-label">&ThinSpace;</label>
                            <button class="btn btn-primary d-block"><i class="fas fa-magnifying-glass"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($genres as $genre)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td><img src="{{ asset('assets/img/genre/'.$genre->image) }}" class="img-thumbnail" width="80px" alt=""></td>
                        <td>{{ $genre->name }}</td>
                        <td>
                            {{ date('M d, Y', strtotime($genre->created_at)) }}
                        </td>
                        <td>
                            <button class="btn btn-sm btn-success edit_id" data-id="{{ $genre->id }}" data-name="{{ $genre->name }}" data-category_id="{{ $genre->category_id }}" data-target="#editModal" data-toggle="modal"><i class="fas fa-pen-to-square"></i></button>
                            <button class="btn btn-sm btn-danger delete_id" data-id="{{ $genre->id }}" data-target="#deleteModal" data-toggle="modal"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-between mt-4">
                <div>
                    @if ($genres->count())
                        @if ($genres->count() == 10)
                        Showing {{ $no-10 }} to {{ $no-1 }} of {{ $all->count() }} entries
                        @elseif ($genres->count() < 10)
                        Showing {{ $all->count()-$genres->count()+1 }} to {{ $no-1 }} of {{ $all->count() }} entries
                        @endif
                    @endif
                </div>
            </div>
            @if (!$genres->count())
                <div class="bg-light text-center py-3 my-2">
                    <h5 class="text-center">Data Not Found!</h5>
                    <p>Go To <a href="{{ url('/admin/genre/') }}" class="btn btn-sm btn-primary">Previous Page</a></p>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Create Genre Modal -->
<div class="modal fade" id="createCategory">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus mr-2"></i>Create Genre</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/admin/genre/create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Genre Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Genre Name">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Choose Image (200x180px)</label>
                    <input type="file" name="image" class="form-control" placeholder="Enter Genre Name">
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Create</button>
        </form>
        </div>
      </div>
    </div>
</div>

<!-- Edit Genre Modal -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-pen-to-square mr-2"></i>Edit Genre</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/admin/genre/edit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Genre Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter Genre Name">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Choose Image (200x180px)</label>
                    <input type="file" id="image" name="image" class="form-control" placeholder="Enter Genre Name">
                </div>
                <input type="hidden" name="id" id="edit_id">
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
          <form action="{{ url('/admin/genre/delete/') }}" method="post">
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
            $name = $(this).data('name');

            $("#edit_id").val($id);
            $("#name").val($name);

        })
        $(".delete_id").click(function(){
            $id = $(this).data('id');
            $("#delete_id").val($id);
        })
    });
</script>
@endsection

@extends('layouts.author')

@section('css')
{{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"> --}}
<style>
    /* Styles for active and hovered pagination buttons */
    .pagination > .active > a,
    .pagination > li > a:hover,
    .pagination > li > span:hover {
        background-color: #FF3C86;
        border: none;
        color: #fff;
    }
    /* Default color for pagination buttons */
    .pagination li a {
        color: #000;
    }
    /* Styles for active pagination span (if applicable) */
    .pagination > .active > span,
    .pagination > .active > span:focus,
    .pagination > .active > span:hover {
        background: #FF3C86;
    }
    /* Styles for active pagination button */
    .pagination > .active > a,
    .pagination > .active > a:focus,
    .pagination > .active > a:hover {
        background-color: #FF3C86;
        border: none;
        color: #fff; /* Change to the desired text color for active state */
    }
    /* Styles for active pagination span (if applicable) */
    .pagination > .active > span,
    .pagination > .active > span:focus,
    .pagination > .active > span:hover {
        background: #FF3C86 !important;
        border: 1px solid #FF3C86 !important;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card bg-white p-4">
        <div class="d-flex justify-content-between mb-3">
            <div class="mb-3">
                <h3 class="mb-3">Novel List</h3>
                @isset($title)
                <p class="text-primary">Search Result for "{{ $title }}"</p>
                @endisset
                @isset($start)
                <p class="text-primary mb-1 pb-1"><span class="fw-bold">Start Date: </span> {{ date('M d, Y', strtotime($start)) }} </p>
                <p class="text-primary mt-0 pt-0"><span class="fw-bold">End Date: </span>{{ date('M d, Y', strtotime($end)) }}</p>
                @endisset
                <p class="text-secondary">Total Book - {{ $all->count() }} book{{ $all->count() > 1 ? "s" : "" }}</p>
            </div>
            <div>
                <div class="text-end mb-2">
                    <a href="{{ url('/author/novels/create') }}" class="btn btn-pink"><i class="fas fa-plus-circle mr-2"></i>Create</a>
                </div>
                <div>
                    <form class="mb-2" action="{{ url('/author/novels/searchByTitle') }}" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="title" placeholder="Search By Title" class="form-control">
                            <button class="btn btn-pink" type="submit"><i class="fas fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
                <div>
                    <form class="mt-3" action="{{ url('/author/novels/searchByDate') }}" method="get">
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
                                <button class="btn btn-pink d-block"><i class="fas fa-magnifying-glass"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th style="text-align: center">Total Chapters</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($novels as $novel)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td><img src="{{ asset('assets/img/book/'.$novel->image) }}" class="img-thumbnail" width="48px" alt=""></td>
                        <td style="width: 300px;">{{ $novel->title }}</td>
                        <td style="text-align: center">
                            {{ $novel->chapter->count() }}
                            {{-- @if ($novel->genre->count() > 1)
                            <span class="badge badge-pink">{{ $novel->genre[0]->name }}</span><br>
                            <span class="badge badge-pink">{{ $novel->genre[1]->name }}</span><br>
                            @else
                            <span class="badge badge-pink">{{ $novel->genre[0]->name }}</span><br>
                            @endif --}}
                            {{-- @foreach ($novel->genre as $genre)
                            <span class="badge badge-pink">{{ $genre->name }}</span><br>
                            @endforeach --}}
                        </td>
                        <td>{{ $novel->category->name }}</td>
                        <td>
                            @if ($novel->status == "ONGOING")
                                <span class="badge badge-warning">{{ $novel->status }}</span>
                            @elseif($novel->status == "COMPLETED")
                                <span class="badge badge-success">{{ $novel->status }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('/author/novels/view/'.$novel->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a>
                            <a href="{{ url('/author/novels/edit/'.$novel->id) }}" class="btn btn-sm btn-success"><i class="fas fa-pen-to-square"></i></a>
                            <button class="btn btn-sm btn-danger delete" data-id="{{ $novel->id }}" data-target="#deleteModal" data-toggle="modal"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-between mt-4">
                <div>
                    @if ($novels->count())
                        @if ($novels->count() == 10)
                        Showing {{ $no-10 }} to {{ $no-1 }} of {{ $all->count() }} entries
                        @elseif ($novels->count() < 10)
                        Showing {{ $all->count()-$novels->count()+1 }} to {{ $no-1 }} of {{ $all->count() }} entries
                        @endif
                    @endif
                </div>

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
          <span class="badge badge-danger">*All chapters in the Book will be removed!.</span>
        </div>
        <div class="modal-footer m-auto">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fas fa-xmark me-2"></i>Cancle</button>
          <form action="{{ url('/author/novels/delete/') }}" method="post">
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
        $(".delete").click(function(){
            $id = $(this).data('id');
            $("#delete_id").val($id);
        })
    });
</script>
@endsection

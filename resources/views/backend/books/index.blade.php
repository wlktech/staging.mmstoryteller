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
                <h4 class="mb-3">Novel List</h4>
                @isset($title)
                <p class="text-primary">Search Result for "{{ $title }}"</p>
                @endisset
                @isset($start)
                <p class="text-primary mb-1 pb-1"><span class="fw-bold">Start Date: </span> {{ date('M d, Y', strtotime($start)) }} </p>
                <p class="text-primary mt-0 pt-0"><span class="fw-bold">End Date: </span>{{ date('M d, Y', strtotime($end)) }}</p>
                @endisset
                <p class="text-secondary">Total Novel - {{ $all->count() }} novel{{ $all->count() > 1 ? "s" : "" }}</p>
            </div>
            <div class=" mb-3">
                <div class="text-end">
                    {{-- <button class="btn btn-primary" data-target="#createBook" data-toggle="modal"><i class="fas fa-plus-circle mr-2"></i>Create</button> --}}
                    <a href="{{ url('/admin/book/create') }}" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Create</a>
                </div>
                <form class="mt-3" action="{{ url('/admin/book/searchByTitle') }}" method="get">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="title" placeholder="Search By Title" class="form-control">
                        <button class="btn btn-primary"><i class="fas fa-magnifying-glass"></i></button>
                    </div>
                </form>
                <form class="mt-3" action="{{ url('/admin/book/searchByDate') }}" method="get">
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
                <form class="mt-3" action="{{ url('/admin/book/searchByAuthor') }}" method="get">
                    @csrf
                    <div class="input-group">
                        <select name="user_id" id="" class="form-select">
                            <option value="">Choose Author</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary"><i class="fas fa-magnifying-glass"></i></button>
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
                        <th>Title</th>
                        <th>Total Chapters</th>
                        <th>Category</th>
                        <th>Author By</th>
                        <th>Status(1)</th>
                        <th>Published</th>
                        <th class="text-center">
                            <small>New</small>, <small>Popular</small>, <small>Latest</small><br>
                            Status(2)
                        </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td><img src="{{ asset('assets/img/book/'.$book->image) }}" width="48px" alt="" class="img-thumbnail"></td>
                        <td style="width: 180px;">{{ $book->title }}</td>
                        <td style="text-align: center">
                            {{ $book->chapter->count() }}
                            {{-- @if ($book->genre->count() > 1)
                            <span class="badge badge-primary">{{ $book->genre[0]->name }}</span><br>
                            <span class="badge badge-primary">{{ $book->genre[1]->name }}</span><br>
                            @else
                            <span class="badge badge-primary">{{ $book->genre[0]->name }}</span><br>
                            @endif --}}
                            {{-- @foreach ($book->genre as $genre)
                            <span class="badge badge-primary">{{ $genre->name }}</span><br>
                            @endforeach --}}
                        </td>
                        <td>{{ $book->category->name ?? "" }}</td>
                        <td style="width: 160px;">{{ $book->user->name }}</td>
                        <td>
                            @if ($book->status == "ONGOING")
                                <span class="badge badge-warning">{{ $book->status }}</span>
                            @elseif($book->status == "COMPLETED")
                                <span class="badge badge-success">{{ $book->status }}</span>
                            @endif
                        </td>
                        <td>
                            {{ $book->created_at->format('d/m/Y') }}
                        </td>
                        <td>
                            <div class="d-flex">
                                @if($book->new == 0)
                                <form action="{{ url('/admin/book/new/'.$book->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="new" value="1">
                                    <button class="btn btn-sm"><i class="fa-solid fa-toggle-off" style="font-size: 20px; color: #cfd1d0"></i></button>
                                </form>
                                @elseif($book->new == 1)
                                <form action="{{ url('/admin/book/new/'.$book->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="new" value="0">
                                    <button class="btn btn-sm"><i class="fa-solid fa-toggle-on" style="font-size: 20px; color: #ff85ec"></i></button>
                                </form>
                                @endif
                                @if($book->popular == 0)
                                <form action="{{ url('/admin/book/popular/'.$book->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="popular" value="1">
                                    <button class="btn btn-sm"><i class="fa-solid fa-toggle-off" style="font-size: 20px; color: #cfd1d0"></i></button>
                                </form>
                                @elseif($book->popular == 1)
                                <form action="{{ url('/admin/book/popular/'.$book->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="popular" value="0">
                                    <button class="btn btn-sm"><i class="fa-solid fa-toggle-on" style="font-size: 20px; color: #ff85ec;"></i></button>
                                </form>
                                @endif
                                @if($book->latest == 0)
                                <form action="{{ url('/admin/book/latest/'.$book->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="latest" value="1">
                                    <button class="btn btn-sm"><i class="fa-solid fa-toggle-off" style="font-size: 20px; color: #cfd1d0"></i></button>
                                </form>
                                @elseif($book->latest == 1)
                                <form action="{{ url('/admin/book/latest/'.$book->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="latest" value="0">
                                    <button class="btn btn-sm"><i class="fa-solid fa-toggle-on" style="font-size: 20px; color: #ff85ec"></i></button>
                                </form>
                                @endif
                            </div>
                        </td>
                        <td>
                            <a href="{{ url('/admin/book/view/'.$book->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a>
                            <a href="{{ url('/admin/book/edit/'.$book->id) }}" class="btn btn-sm btn-success"><i class="fas fa-pen-to-square"></i></a>
                            <button class="btn btn-sm btn-danger delete_id" data-id="{{ $book->id }}" data-target="#deleteModal" data-toggle="modal"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-between mt-4">
                <div>
                    @if ($books->count())
                        @if ($books->count() == 10)
                        Showing {{ $no-10 }} to {{ $no-1 }} of {{ $all->count() }} entries
                        @elseif ($books->count() < 10)
                        Showing {{ $all->count()-$books->count()+1 }} to {{ $no-1 }} of {{ $all->count() }} entries
                        @endif
                    @endif
                </div>
                <div>
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Home Banner Modal -->
<div class="modal fade" id="createBook">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus mr-2"></i>Create Book</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/admin/book/create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Book Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Book Title">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Choose Image (252x312px)</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Choose Category</label>
                    <select name="category_id" id="" class="form-select">
                        <option value="" selected>Choose Category</option>
                        @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Choose Genre</label><br>
                    <select name="genre_id[]" id="" class="select-genre" style="width: 100%;" multiple="multiple">
                        <option value="">Choose Genre</option>
                        @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <textarea name="description" id="desc" cols="30" rows="10" class="form-control" placeholder="Enter Description"></textarea>
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
          <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-pen-to-square mr-2"></i>Edit Book</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/admin/book/edit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Book Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter Book Title">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Choose Image (252x312px)</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Choose Category</label>
                    <select name="category_id" id="category_id" class="form-select">
                        <option value="">Choose Category</option>
                        @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Choose Genre</label>
                    <select name="genre_id[]" id="genre_id" style="width: 100%;" class="select-genre" multiple="multiple">
                        <option value="">Choose Genre</option>
                        @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <textarea name="description" id="desc" cols="30" rows="10" class="form-control" placeholder="Enter Description"></textarea>
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
          <span class="badge badge-danger">*All chapters in the Book will be removed!.</span>
        </div>
        <div class="modal-footer m-auto">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fas fa-xmark me-2"></i>Cancle</button>
          <form action="{{ url('/admin/book/delete/') }}" method="post">
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
        $(".edit_id").click(function(){
            $id = $(this).data('id');
            $title = $(this).data('title');
            $genre_id = $(this).data('genre_id');
            $category_id = $(this).data('category_id');
            $("#edit_id").val($id);
            $("#title").val($title);
            $("#genre_id").val($genre_id);
            $("#category_id").val($category_id);
        })
        $(".delete_id").click(function(){
            $id = $(this).data('id');
            $("#delete_id").val($id);
        })
        $(".select-genre").select2({
            placeholder: 'Choose Genre',
            // maximumSelectionLength: 4
        });
    });
</script>
@endsection

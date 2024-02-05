@extends('layouts.b-master')

@section('content')
<div class="container-fluid">
    <div class="card p-4">
        <div class="d-flex justify-content-between mb-3">
            <div>
                <h4 class="fw-bold mb-3">Events</h4>
                @isset($title)
                <p class="text-primary">Search Result for "{{ $title }}"</p>
                @endisset
                @isset($start)
                <p class="text-primary mb-1 pb-1"><span class="fw-bold">Start Date: </span> {{ date('M d, Y', strtotime($start)) }} </p>
                <p class="text-primary mt-0 pt-0"><span class="fw-bold">End Date: </span>{{ date('M d, Y', strtotime($end)) }}</p>
                @endisset
                <p class="text-secondary">Total Event - {{ $all->count() }} event{{ $all->count() > 1 ? "s" : "" }}</p>
            </div>
            <div class="">
                <div class="text-end">
                    <a href="{{ url('/admin/events/create/') }}" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Create</a>
                </div>
                <form class="mt-3" action="{{ url('/admin/events/searchByTitle') }}" method="get">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="title" placeholder="Search By Title" class="form-control">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-magnifying-glass"></i></button>
                    </div>
                </form>
                <form class="mt-3" action="{{ url('/admin/events/searchByDate') }}" method="get">
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
                        <th>Title</th>
                        <th>Image/Video</th>
                        <th>Posted Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $event->title }}</td>
                        <td>
                            @if ($event->image)
                            <img src="{{ asset('assets/img/events/'.$event->image) }}" width="100px" class="img-thumbnail" alt="">
                            @endif
                            @if ($event->video)
                            <video width="100" height="50" controls>
                                <source src="{{ asset('assets/img/events/'.$event->video) }}" type="video/mp4">
                                <source src="{{ asset('assets/img/events/'.$event->video) }}" type="video/quicktime">
                                <source src="{{ asset('assets/img/events/'.$event->video) }}" type="video/x-msvideo">
                                Your browser does not support the video tag.
                            </video>
                            @endif
                        </td>
                        <td>
                            {{ date('M d, Y', strtotime($event->created_at)) }}
                        </td>
                        <td>
                            <a href="{{ url('/admin/events/view/'.$event->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a>
                            <a href="{{ url('/admin/events/edit/'.$event->id) }}" class="btn btn-sm btn-success"><i class="fas fa-pen-to-square"></i></a>
                            <button class="btn btn-sm btn-danger delete_id" data-id="{{ $event->id }}" data-target="#deleteModal" data-toggle="modal"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-between mt-4">
                <div>
                    @if ($events->count())
                        @if ($events->count() == 10)
                        Showing {{ $no-10 }} to {{ $no-1 }} of {{ $all->count() }} entries
                        @elseif ($events->count() < 10)
                        Showing {{ $all->count()-$events->count()+1 }} to {{ $no-1 }} of {{ $all->count() }} entries
                        @endif
                    @endif
                </div>
                <div>
                    {{ $events->links() }}
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
        </div>
        <div class="modal-footer m-auto">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fas fa-xmark me-2"></i>Cancle</button>
          <form action="{{ url('/admin/events/delete/') }}" method="post">
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
        $(".delete_id").click(function(){
            $id = $(this).data('id');
            $("#delete_id").val($id);
        })
    });
</script>
@endsection

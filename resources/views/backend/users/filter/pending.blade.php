@extends('layouts.b-master')

@section('content')
<div class="container-fluid">
    <div class="card p-4">
        <div class="d-flex justify-content-between mb-3">
            <div>
                <h4 class="fw-bold mb-3">Pending List</h4>
                @isset($email)
                <p class="text-primary">Search Result for "{{ $email }}"</p>
                @endisset
                @isset($start)
                <p class="text-primary mb-1 pb-1"><span class="fw-bold">Start Date: </span> {{ date('M d, Y', strtotime($start)) }} </p>
                <p class="text-primary mt-0 pt-0"><span class="fw-bold">End Date: </span>{{ date('M d, Y', strtotime($end)) }}</p>
                @endisset
                <p class="text-secondary">Total User - {{ $all->count() }} person{{ $all->count() > 1 ? "s" : "" }}</p>
            </div>
            <div>
                <form action="{{ url('/admin/pending/search/') }}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search By Email" name="email">
                        <button class="btn btn-primary"><i class="fas fa-magnifying-glass"></i></button>
                    </div>
                </form>
                <form class="mt-3" action="{{ url('/admin/pending/search/date') }}" method="get">
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
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Joined Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            @if (!$user->profile)
                            <img src="{{ asset('assets/img/profile/profile.png') }}" width="50px" class="rounded-circle" alt="">
                            @else
                            <img src="{{ asset('assets/img/profile/'.$user->profile) }}" width="50px" class="rounded-circle" alt="">
                            @endif
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>
                            {{ $user->email }}
                            @if ($user->email_verified_at === null)
                            <span class="badge badge-warning">pending</span>
                            @else
                            <span class="badge badge-primary">verified</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge badge-primary mb-2">{{ $user->role }}</span><span class="text-decoration-underline text-primary ms-1" style="cursor: pointer;" id="role-{{ $user->id }}">Edit</span>
                            <form id="form-{{ $user->id }}" class="d-none" action="{{ url('/admin/roleChange/'.$user->id) }}" method="post">
                                @csrf
                                <select name="role" id="" class="form-select mb-2 pb-0">
                                    <option value="Super Admin">Super Admin</option>
                                    <option value="Author">Author</option>
                                    <option value="User" selected>User</option>
                                </select>
                                <button class="btn btn-sm btn-primary" type="submit">Change</button>
                            </form>
                        </td>
                        <td>
                            {{ date('M d, Y', strtotime($user->created_at)) }}
                        </td>
                        <td>
                            {{-- <a href="{{ url('/admin/profile/'.$user->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a> --}}
                            <button data-target="#deleteModal" data-toggle="modal" data-id="{{ $user->id }}" class="btn btn-sm btn-danger delete_id"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-between mt-4">
                <div>
                    @if ($users->count())
                        @if ($users->count() == 10)
                        Showing {{ $no-10 }} to {{ $no-1 }} of {{ $all->count() }} entries
                        @elseif ($users->count() < 10)
                        Showing {{ $all->count()-$users->count()+1 }} to {{ $no-1 }} of {{ $all->count() }} entries
                        @endif
                    @endif
                </div>

            </div>
            @if (!$users->count())
                <div class="bg-light text-center py-3 my-2">
                    <h5 class="text-center">Data Not Found!</h5>
                    <p>Go To <a href="{{ url('/admin/pending-list/') }}" class="btn btn-sm btn-primary">Go To Previous</a></p>
                </div>
            @endif
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
          <form action="{{ url('/admin/users/delete/') }}" method="post">
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
        var $roles = $('[id^="role-"]');
        var $forms = $('[id^="form-"]').addClass('d-none');

        $roles.on('click', function() {
        var id = this.id.substring(5);
        $("#form-" + id).toggleClass('d-none');
        });
    });
</script>
@endsection

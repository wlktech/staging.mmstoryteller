@extends('layouts.b-master')

@section('content')
<div class="container-fluid">
    <div class="card p-4">
        <div class="d-flex justify-content-between mb-3">
            <div>
                <h4>Gem Orders</h4>
                <p class="text-secondary">Total Gem Order - {{ $all->count() }} order{{ $all->count() > 1 ? "s" : "" }}</p>
                @isset($start)
                <p class="text-primary mb-1 pb-1" style="font-size: 14px;"><span class="fw-bold">Start Date: </span> {{ date('M d, Y', strtotime($start)) }} </p>
                <p class="text-primary mt-0 pt-0" style="font-size: 14px;"><span class="fw-bold">End Date: </span>{{ date('M d, Y', strtotime($end)) }}</p>
                @endisset
            </div>

            <div class="">
                <form class="mt-3" action="{{ url('/admin/gems/searchByDate') }}" method="get">
                    @csrf
                    <div class="d-flex">
                        <div>
                            <label for="start" class="form-label" style="font-size: 14px;">Start Date</label>
                            <input type="date" name="start" id="start" class="form-control form-control-sm">
                        </div>
                        <div>
                            <label for="end" class="form-label" style="font-size: 14px;">End Date</label>
                            <input type="date" name="end" id="end" class="form-control form-control-sm">
                        </div>
                        <div>
                            <label for="" class="form-label" style="font-size: 14px;">&ThinSpace;</label>
                            <button class="btn btn-sm btn-primary d-block"><i class="fas fa-magnifying-glass"></i></button>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gem Amount</th>
                        <th>Added By</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gem_orders as $order)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $order->user->name ?? '' }}</td>
                        <td>{{ $order->user->email ?? '' }}</td>
                        <td><i class="fas fa-gem mr-2"></i>{{ $order->gem_amount }}</td>
                        <td>{{ $order->name ?? '' }}</td>
                        <td>{{ date('M d, Y', strtotime($order->created_at)) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-between mt-4">
                <div>
                    @if ($gem_orders->count())
                        @if ($gem_orders->count() == 10)
                        Showing {{ $no-10 }} to {{ $no-1 }} of {{ $all->count() }} entries
                        @elseif ($gem_orders->count() < 10)
                        Showing {{ $all->count()-$gem_orders->count()+1 }} to {{ $no-1 }} of {{ $all->count() }} entries
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

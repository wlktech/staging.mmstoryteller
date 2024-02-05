@extends('layouts.b-master')

@section('css')
<style>
    .text-pink{
        color: #ff8cb9;
    }
    .btn-pink{
        background: #ff8cb9;
        color: #fff;
    }
    .btn-pink:hover{
        background: #ff8cb9;
        color: #fff;
    }
    .search{
        cursor: pointer;
        font-size: 14px;
    }
    .total-gem{
        font-size: 14px;
    }

</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card p-4">
        <div class="d-flex justify-content-between mb-3">
            <div>
                <h4 class="mb-3">Order List</h4>
                @isset($start)
                <p class="text-primary mb-0 pb-0">Start Date : {{ $start }}</p>
                @endisset
                @isset($end)
                <p class="text-primary mb-0 pb-0">End Date : {{ $end }}</p>
                @endisset
                @isset ($user)
                <p class="text-primary mb-0 pb-0">Author : {{ $user->name }}</p>
                @endisset
                @isset ($month)
                <p class="text-primary mb-0 pb-0">Month :
                @if ($month == 1)
                {{ "January" }}
                @elseif($month == 2)
                {{ "February" }}
                @elseif($month == 3)
                {{ "March" }}
                @elseif($month == 4)
                {{ "April" }}
                @elseif($month == 5)
                {{ "May" }}
                @elseif($month == 6)
                {{ "June" }}
                @elseif($month == 7)
                {{ "July" }}
                @elseif($month == 8)
                {{ "August" }}
                @elseif($month == 9)
                {{ "September" }}
                @elseif($month == 10)
                {{ "October" }}
                @elseif($month == 11)
                {{ "November" }}
                @elseif($month == 2)
                {{ "December" }}
                @endif
                </p>
                @endisset
                @isset($year)
                <p class="text-primary">Year : {{ $year }}</p>
                @endisset
                @isset($novel)
                <p class="text-primary mb-0 pb-0">Novel Title : {{ $novel->title }}</p>
                @endisset
            </div>
            <div class="">
                <div class="d-flex justify-content-end">
                    <div>
                        <div class="text-right">
                            <p class="btn btn-primary mb-2 total-gem">Total Gems - {{ $totalOrders->sum('gem') }} Gems</p>
                        </div>
                        <div class="text-right">
                            <label for="filter" class="form-label mr-3">
                                <input type="radio" name="check" id="filter"> Filter
                            </label>
                            <label for="report" class="form-label">
                                <input type="radio" name="check" id="report"> Report
                            </label>
                        </div>
                        <div class="d-none report">
                            <form class="mb-2 text-left" action="{{ url('/date_between_report') }}" method="GET">
                                @csrf
                                <div class="d-flex justify-content-end">
                                    <div class="mr-3">
                                        <label for="" class="form-label">&ThinSpace;</label>
                                        <small class="d-block text-pink fw-bold">Date Between</small>
                                    </div>
                                    <div>
                                        <label for="start" class="form-label fw-bold" style="font-size: 12px;">Start Date</label>
                                        <input type="date" name="start" id="start" class="form-control form-control-sm">
                                    </div>
                                    <div>
                                        <label for="end" class="form-label fw-bold" style="font-size: 12px;">End Date</label>
                                        <input type="date" name="end" id="end" class="form-control form-control-sm">
                                    </div>
                                    <div>
                                        <label for="" class="form-label" style="font-size: 12px;">&ThinSpace;</label>
                                        <button class="btn btn-sm btn-pink d-block"><i class="fas fa-magnifying-glass"></i></button>
                                    </div>
                                </div>
                            </form>
                            <form class="mb-2" action="{{ url('/author_date_between_report') }}" method="GET">
                                @csrf
                                <div class="d-flex justify-content-end">
                                    <div>
                                        <label for="" style="font-size: 12px;" class="form-label">&ThinSpace;</label>
                                        <select name="user_id" id="" class="form-select form-select-sm">
                                            <option value="">Choose Author</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="start" class="form-label fw-bold" style="font-size: 12px;">Start Date</label>
                                        <input type="date" name="start" id="start" class="form-control form-control-sm">
                                    </div>
                                    <div>
                                        <label for="end" class="form-label fw-bold" style="font-size: 12px;">End Date</label>
                                        <input type="date" name="end" id="end" class="form-control form-control-sm">
                                    </div>
                                    <div>
                                        <label for="" class="form-label" style="font-size: 12px;">&ThinSpace;</label>
                                        <button class="btn btn-sm btn-pink d-block"><i class="fas fa-magnifying-glass"></i></button>
                                    </div>
                                </div>
                            </form>
                            <form class="mb-2" action="{{ url('/author_title_date_between_report') }}" method="GET">
                                @csrf
                                <div class="d-flex justify-content-end">
                                    <div>
                                        <label for="" style="font-size: 12px;" class="form-label">&ThinSpace;</label>
                                        <select name="novel_id" id="" class="form-select form-select-sm">
                                            <option value="">Choose Title</option>
                                            @foreach ($novels as $novel)
                                            <option value="{{ $novel->id }}">{{ $novel->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="" style="font-size: 12px;" class="form-label">&ThinSpace;</label>
                                        <select name="user_id" id="" class="form-select form-select-sm">
                                            <option value="">Choose Author</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="start" class="form-label fw-bold" style="font-size: 12px;">Start Date</label>
                                        <input type="date" name="start" id="start" class="form-control form-control-sm">
                                    </div>
                                    <div>
                                        <label for="end" class="form-label fw-bold" style="font-size: 12px;">End Date</label>
                                        <input type="date" name="end" id="end" class="form-control form-control-sm">
                                    </div>
                                    <div>
                                        <label for="" class="form-label" style="font-size: 12px;">&ThinSpace;</label>
                                        <button class="btn btn-sm btn-pink d-block"><i class="fas fa-magnifying-glass"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="d-none filter">
                            <form class="mb-2" action="{{ url('/admin/orders/dateBetween') }}" method="POST">
                                @csrf
                                <div class="d-flex justify-content-end">
                                    <div class="mr-3">
                                        <label for="" class="form-label">&ThinSpace;</label>
                                        <small class="d-block text-primary fw-bold">Date Between</small>
                                    </div>
                                    <div>
                                        <label for="start" class="form-label fw-bold" style="font-size: 12px;">Start Date</label>
                                        <input type="date" name="start" id="start" class="form-control form-control-sm">
                                    </div>
                                    <div>
                                        <label for="end" class="form-label fw-bold" style="font-size: 12px;">End Date</label>
                                        <input type="date" name="end" id="end" class="form-control form-control-sm">
                                    </div>
                                    <div>
                                        <label for="" class="form-label" style="font-size: 12px;">&ThinSpace;</label>
                                        <button class="btn btn-sm btn-primary d-block"><i class="fas fa-magnifying-glass"></i></button>
                                    </div>
                                </div>
                            </form>
                            <form class="mb-2" action="{{ url('/admin/orders/authorDateBetween') }}" method="POST">
                                @csrf
                                <div class="d-flex justify-content-end">
                                    <div>
                                        <label for="" style="font-size: 12px;" class="form-label">&ThinSpace;</label>
                                        <select name="user_id" id="" class="form-select form-select-sm">
                                            <option value="">Choose Author</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="start" class="form-label fw-bold" style="font-size: 12px;">Start Date</label>
                                        <input type="date" name="start" id="start" class="form-control form-control-sm">
                                    </div>
                                    <div>
                                        <label for="end" class="form-label fw-bold" style="font-size: 12px;">End Date</label>
                                        <input type="date" name="end" id="end" class="form-control form-control-sm">
                                    </div>
                                    <div>
                                        <label for="" class="form-label" style="font-size: 12px;">&ThinSpace;</label>
                                        <button class="btn btn-sm btn-primary d-block"><i class="fas fa-magnifying-glass"></i></button>
                                    </div>
                                </div>
                            </form>
                            <form class="mb-2" action="{{ url('/admin/orders/titleDateBetween') }}" method="POST">
                                @csrf
                                <div class="d-flex justify-content-end">
                                    <div>
                                        <label for="" style="font-size: 12px;" class="form-label">&ThinSpace;</label>
                                        <select name="novel_id" id="" class="form-select form-select-sm">
                                            <option value="">Choose Title</option>
                                            @foreach ($novels as $novel)
                                            <option value="{{ $novel->id }}">{{ $novel->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="" style="font-size: 12px;" class="form-label">&ThinSpace;</label>
                                        <select name="user_id" id="" class="form-select form-select-sm">
                                            <option value="">Choose Author</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="start" class="form-label fw-bold" style="font-size: 12px;">Start Date</label>
                                        <input type="date" name="start" id="start" class="form-control form-control-sm">
                                    </div>
                                    <div>
                                        <label for="end" class="form-label fw-bold" style="font-size: 12px;">End Date</label>
                                        <input type="date" name="end" id="end" class="form-control form-control-sm">
                                    </div>
                                    <div>
                                        <label for="" class="form-label" style="font-size: 12px;">&ThinSpace;</label>
                                        <button class="btn btn-sm btn-primary d-block"><i class="fas fa-magnifying-glass"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Novel</th>
                        <th>Chapter</th>
                        <th>Author</th>
                        <th>Customer</th>
                        <th>Gems</th>
                        <th>Cost(MMK)</th>
                        <th>Author(%)</th>
                        <th>Admin(%)</th>
                        <th>Remarks</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $order->book->title }}</td>
                        <td>
                            {{ $order->chapter->name ?? '' }}
                        </td>
                        <td>
                            {{ $order->chapter->user->name ?? '' }}
                        </td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->gem }}</td>
                        <td>{{ $order->cost }}</td>
                        <td>{{ $order->author_percent }}</td>
                        <td>{{ $order->admin_percent }}</td>
                        <td>{{ $order->remark }}</td>
                        <td>{{ date('M d, Y', strtotime($order->created_at)) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="5">Total Amount</th>
                        <td>{{ $totalOrders->sum('gem') }} Gem{{ $totalOrders->count() > 1 ? "s" : "" }}</td>
                        <td>{{ $totalOrders->sum('cost') }} MMK</td>
                        <td>{{ $totalOrders->sum('author_percent') }} MMK</td>
                        <td>{{ $totalOrders->sum('admin_percent') }} MMK</td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            <div class="d-flex justify-content-between mt-4">
                <div>
                    @if ($orders->count())
                        @if ($orders->count() == 10)
                        Showing {{ $no-10 }} to {{ $no-1 }} of {{ $totalOrders->count() }} entries
                        @elseif ($orders->count() < 10)
                        Showing {{ $totalOrders->count()-$orders->count()+1 }} to {{ $no-1 }} of {{ $totalOrders->count() }} entries
                        @endif
                    @endif
                </div>
            </div>
            @if (!$orders->count())
                <div class="bg-light text-center py-3 my-2">
                    <h5 class="text-center">Data Not Found!</h5>
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
          <form action="{{ url('/admin/order/delete/') }}" method="post">
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
            $("#edit_id").val($id);
        })
        $(".delete_id").click(function(){
            $id = $(this).data('id');
            $("#delete_id").val($id);
        })
        $("#author").click(function(){
            $(".authorfilter").removeClass('d-none');
            $(".monthfilter").addClass('d-none');
            $(".multi").addClass('d-none');
        })
        $("#month").click(function(){
            $(".authorfilter").addClass('d-none');
            $(".monthfilter").removeClass('d-none');
            $(".multi").addClass('d-none');
        })
        $("#multi").click(function(){
            $(".authorfilter").addClass('d-none');
            $(".monthfilter").addClass('d-none');
            $(".multi").removeClass('d-none');
        })
        $("#filter").click(function(){
            $(".filter").removeClass('d-none');
            $(".report").addClass('d-none');
        })
        $("#report").click(function(){
            $(".report").removeClass('d-none');
            $(".filter").addClass('d-none');
        })
        $("#overall").click(function(){
            $(".overall").removeClass('d-none');
            $(".monthly").addClass('d-none');
            $(".yearly").addClass('d-none');
        })
        $("#monthly").click(function(){
            $(".overall").addClass('d-none');
            $(".monthly").removeClass('d-none');
            $(".yearly").addClass('d-none');
        })
        $("#yearly").click(function(){
            $(".overall").addClass('d-none');
            $(".monthly").addClass('d-none');
            $(".yearly").removeClass('d-none');
        })
    });
</script>
@endsection

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
    .text-pink{
        color: #FF3C86;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card bg-white p-4">
        <div class="d-flex justify-content-between mb-3">

            <div>
                <h3>Order List</h3>
                @isset($novel)
                <p class="text-pink mb-0">Novel - {{ $novel->title }}</p>
                @endisset
                @isset($start)
                <p class="text-pink">{{ date('d M, Y', strtotime($start)) }} to {{ date('d M, Y', strtotime($end)) }}</p>
                @endisset
            </div>
            <div>
                <div class="text-end mb-3">
                    <button class="btn btn-sm btn-pink"><i class="fas fa-gem mr-2"></i>{{ $all->sum('gem') }} Gems</button>
                </div>
                <div class="filter">
                    <form class="mb-2" action="{{ url('/author/orders/dateBetween') }}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-end">
                            <div class="mr-3">
                                <label for="" class="form-label">&ThinSpace;</label>
                                <small class="d-block text-pink fw-bold">Filter</small>
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
                                <button class="btn btn-sm btn-outline-pink d-block"><i class="fas fa-magnifying-glass"></i></button>
                            </div>
                        </div>
                    </form>
                    <form class="mb-2" action="{{ url('/author/orders/titleDateBetween') }}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-end">
                            <div>
                                <label for="" style="font-size: 12px;" class="form-label">&ThinSpace;</label>
                                <select name="novel_id" id="" class="form-select form-select-sm">
                                    <option value="">Choose Title</option>
                                    @foreach ($books as $novel)
                                    <option value="{{ $novel->id }}">{{ $novel->title }}</option>
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
                                <button class="btn btn-sm btn-outline-pink d-block"><i class="fas fa-magnifying-glass"></i></button>
                            </div>
                        </div>
                    </form>
                    <form class="mb-2" action="{{ url('/author/orders/dateBetweenRecord') }}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-end">
                            <div class="mr-3">
                                <label for="" class="form-label">&ThinSpace;</label>
                                <small class="d-block text-pink fw-bold">Report</small>
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
                                <button class="btn btn-sm btn-outline-pink d-block"><i class="fas fa-magnifying-glass"></i></button>
                            </div>
                        </div>
                    </form>
                    <form class="mb-2" action="{{ url('/author/orders/titleDateBetweenRecord') }}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-end">
                            <div>
                                <label for="" style="font-size: 12px;" class="form-label">&ThinSpace;</label>
                                <select name="novel_id" id="" class="form-select form-select-sm">
                                    <option value="">Choose Title</option>
                                    @foreach ($books as $novel)
                                    <option value="{{ $novel->id }}">{{ $novel->title }}</option>
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
                                <button class="btn btn-sm btn-outline-pink d-block"><i class="fas fa-magnifying-glass"></i></button>
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
                        <th>Novel</th>
                        <th>Chapter</th>
                        <th>Customer</th>
                        <th>Gems</th>
                        <th>Author(%)</th>
                        <th>Buy-Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $order->book->title }}</td>
                        <td>{{ $order->chapter->name ?? '' }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->gem }}</td>
                        <td>{{ $order->author_percent }}</td>
                        <td>{{ date('d M, Y', strtotime($order->created_at)) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Amount</th>
                        <th>{{ $all->sum('gem') }} Gem{{ $all->sum('gem') > 1 ? "s" : "" }}</th>
                        <th>{{ $all->sum('author_percent') }} MMK</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
            <div class="d-flex justify-content-between mt-4">
                <div>
                    @if ($orders->count())
                        @if ($orders->count() == 10)
                        Showing {{ $no-10 }} to {{ $no-1 }} of {{ $all->count() }} entries
                        @elseif ($orders->count() < 10)
                        Showing {{ $all->count()-$orders->count()+1 }} to {{ $no-1 }} of {{ $all->count() }} entries
                        @endif
                    @endif
                </div>
                <div>
                    {{ $orders->links() }}
                </div>
            </div>
            @if (!$orders->count())
                <div class="bg-light text-center py-3 my-2">
                    <h5 class="text-center">Data Not Found!</h5>
                    {{-- <p>Go To <a href="{{ url('/admin/orders/') }}" class="btn btn-sm btn-primary">Previous Page</a></p> --}}
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

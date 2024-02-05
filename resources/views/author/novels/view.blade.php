@extends('layouts.author')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .title{
        color: #323955;
        font-family: Poppins;
        font-size: 24px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }
    .chapter{
        font-size: 20px;
        font-weight: 700;
    }
    .bg-pink{
        background: #fff1f6;
    }
    .book-text{
        padding: 0;
        margin: 0;
    }
    .img-container{
        position: relative;
    }
    .img-container img{
        width: 100%;
    }
    .ongoing-status{
        position: absolute;
        top: 8px;
        right: 8px;
        background-color: #FE5092;
        border-radius: 16px;
        padding: 4px 10px;
        color: #FFF;
        text-align: center;
        font-size: 12px;
        font-family: 'Source Sans Pro', sans-serif;
        font-weight: 600;
    }
    .viewers, .chapters{
        color: #787878;
        text-align: center;
        font-family: Source Sans Pro;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }
    .viewers{
        margin-right: 32px;
    }
    .count{
        color: #222;
        text-align: center;
        font-family: Source Sans Pro;
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }
    .btn-pink{
        background: #F54487;
        color: #FFF;
    }
    .btn-pink:hover{
        background: #F54487;
        color: #FFF;
    }
    .badge-pink{
        background: #ffe3fa !important;
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
        background: #C5F8C7 !important;
        color: #31AA07 !important;
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

    @media only screen and (max-width:992px){
        .title{
            font-size: 12px;
        }
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card bg-white p-4">
        <div class="d-flex justify-content-between">
            <div class="mb-3">
                <a href="{{ url('/author/novels/') }}" class="btn btn-outline-pink d-none d-md-block"><i class="fas fa-arrow-left"></i></a>
                <a href="{{ url('/author/novels/') }}" class="btn btn-sm btn-outline-pink d-block d-md-none"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h3 class="title">Chapters "{{ $novel->title }}"</h3>
            <div>
                <a href="{{ url('/author/novels/'.$novel->id.'/chapters/create/') }}" class="btn btn-pink d-none d-md-block">
                    <i class="fas fa-plus"></i>
                    <span class="ml-2">Create</span>
                </a>
                <a href="{{ url('/author/novels/'.$novel->id.'/chapters/create/') }}" class="btn btn-pink btn-sm d-block d-md-none">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <div class="img-container">
                    <img src="{{ asset('assets/img/book/'.$novel->image) }}" class="preview shadow-sm" alt="">
                    @if ($novel->status == "ONGOING")
                    <span class="ongoing-status badge">ONGOING</span>
                    @elseif($novel->status == "COMPLETED")
                    <span class="completed-status badge">COMPLETED</span>
                    @endif
                </div>
                <div class="d-flex counting justify-content-center mt-4">
                    <div class="viewers">
                        <i class="fas fa-eye me-1"></i>
                        Viewers
                        <p class="count mt-2">
                            @php
                                $views = $novel->chapter->sum('view_count');
                            @endphp
                            @if ($views >= 1000 && $views < 1000000)
                                {{ number_format($views / 1000, 0) . 'k' }}
                            @elseif ($views >= 1000000)
                                {{ number_format($views / 1000000, 0) . 'm' }}
                            @else
                                {{ $views }}
                            @endif
                        </p>
                    </div>
                    <div class="chapters">
                        <i class="fas fa-list me-1"></i>
                        Chapters
                        <p class="count mt-2">{{ $novel->chapter->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="text-dark">
                                <th>No</th>
                                <th>Chapter</th>
                                <th>Uploaded Date</th>
                                <th>Pricing(Gems)</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chapters as $chapter)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $chapter->name }}</td>
                                <td>{{ date('d M, Y', strtotime($chapter->created_at)) }}</td>
                                <td>
                                    @if ($chapter->status == "Free")
                                    <span class="badge-green mb-3">{{ "FREE" }}</span>
                                    @else
                                    <span class="badge-pink mb-3">{{ $chapter->status }}</span>
                                    @endif
                                    <img src="{{ asset('assets/img/Icons/edit.png') }}" class="pen" alt="" data-id="{{ $chapter->id }}" data-name="{{ $chapter->name }}" data-target="#paid" data-toggle="modal">
                                </td>
                                <td>
                                    <a href="{{ url('/author/novels/chapters/view/'.$chapter->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a>
                                    <a href="{{ url('/author/novels/chapters/edit/'.$chapter->id) }}" class="btn btn-sm btn-success"><i class="fas fa-pen-to-square"></i></a>
                                    <button class="btn btn-sm btn-danger delete" data-id="{{ $chapter->id }}" data-target="#deleteModal" data-toggle="modal"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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

            <form class="freeForm" action="{{ url('/author/novels/chapters/status/') }}" method="post">
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
            <form class="paidForm d-none" action="{{ url('/author/novels/chapters/status/') }}" method="post">
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
          <form action="{{ url('/author/novels/chapters/delete/'.$novel->id) }}" method="post">
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
<script>
    $(document).ready(function () {
        $(".delete").click(function(){
            $id = $(this).data('id');
            $("#delete_id").val($id);
        })
        $(".select-genre").select2({
            placeholder: 'Choose Genre',
            // maximumSelectionLength: 4
        });
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

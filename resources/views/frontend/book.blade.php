@extends('layouts.f-master')

@section('title', 'Book')

@section('css')

@endsection

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-6 my-3">
            <img src="{{ asset('assets/img/book/'.$book->image) }}" alt="" class="img-thumbnail">
        </div>
        <div class="col-md-6 my-3">
            <p class="fw-bold">Book Name - <span class="text-secondary">{{ $book->title }}</span></p>
            <p class="fw-bold">Total Chapters - <span class="text-secondary">{{ $book->chapter->count() }}</span></p>
            <p class="fw-bold">Genres -
                @foreach ($book->genre as $genre)
                <span class="badge text-bg-secondary">
                    {{ $genre->name }}
                </span>
                @endforeach
            </p>
            <p class="fw-bold">Views -
                <span class="text-secondary">
                @php
                $views = $book->chapter->sum('view_count');
                @endphp
                @if ($views >= 1000 && $views < 1000000)
                    {{ number_format($views / 1000, 0) . 'k' }}
                @elseif ($views >= 1000000)
                    {{ number_format($views / 1000000, 0) . 'm' }}
                @else
                    {{ $views }}
                @endif
                </span>
            </p>
            <hr>
            <p class="fw-bold">Chapter Lists</p>
            @foreach ($book->chapter as $chapter)
            <div class="d-flex justify-content-between">
                <div>
                    <p>{{ $chapter->name }}
                        @if ($chapter->status == "Free")
                        <span class="badge text-bg-primary">{{ $chapter->status }}</span></p>
                        @else
                        <span class="badge text-bg-warning text-white">{{ $chapter->status }} Coins</span></p>
                        @endif
                </div>
                <div>
                    @if ($chapter->status == "Free")
                        <a href="{{ url('/book/chapter/'.$chapter->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-eye text-white"></i></a>
                    @else
                        @guest
                            <button class="btn btn-sm btn-secondary exchange_unauth" data-bs-target="#loginAlert" data-bs-toggle="modal"><i class="fas fa-lock"></i></button>
                        @endguest
                        @auth
                            @php
                                $orderExists = false;
                            @endphp

                            @foreach ($orders as $order)
                                @if ($order->chapter_id == $chapter->id && $order->user_id == Auth::user()->id)
                                    @php
                                        $orderExists = true;
                                    @endphp
                                    <a href="{{ url('/book/chapter/'.$order->chapter_id) }}" class="btn btn-sm btn-warning"><i class="fas fa-eye text-white"></i></a>
                                    @break
                                @endif
                            @endforeach

                            @if (!$orderExists)
                                <button class="btn btn-sm btn-secondary exchange" data-chapter_id="{{ $chapter->id }}" data-book_id="{{ $chapter->book_id }}" data-status="{{ $chapter->status }}" data-bs-target="#exchange" data-bs-toggle="modal"><i class="fas fa-lock"></i></button>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>



<!-- Exchange Modal -->
@auth
<div class="modal fade" id="exchange">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <div class="modal-body text-center">
            <div class="text-end">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
          <i class="fas fa-coins text-warning fa-2x mb-3"></i><br>
          <p class="modal-title fs-5 fw-bold" id="deleteModalLabel">You have {{ Auth::user()->coin }} coins.</p>
          <span class="">Will you exchange?</span>
          <div class="m-auto mt-3">
            <form action="{{ url('/book/chapter/exchange/') }}" method="post">
                @csrf
                <div class="d-flex justify-content-around">
                    <input type="text" class="form-control" name="status" id="status" value="">
                    <input type="text" class="form-control" disabled value="Coins">
                </div>

                <input type="hidden" name="chapter_id" id="chapter_id" value="">
                <input type="hidden" name="book_id" id="book_id" value="">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
          </div>
        </div>
        <div class="modal-footer d-flex justify-content-between">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fas fa-xmark me-2"></i>Cancle</button>
            <button class="btn btn-success" type="submit"><i class="fas fa-check me-2"></i>Confirm</button>
          </form>
        </div>
      </div>
    </div>
</div>
@endauth
{{-- exchange modal --}}
<!-- login alert -->
<div class="modal fade" id="loginAlert">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body text-center">
            <div class="text-end">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
          <i class="fas fa-warning text-warning fa-2x mb-3"></i>
          <p class="modal-title fs-5" id="deleteModalLabel">Please Login First!</p>
        </div>
      </div>
    </div>
</div>
{{-- Login Alert --}}
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $(".exchange").click(function(){
            $chapter_id = $(this).data('chapter_id');
            $book_id = $(this).data('book_id');
            $status = $(this).data('status');
            $("#chapter_id").val($chapter_id);
            $("#book_id").val($book_id);
            $("#status").val($status);
        })
    });
</script>
@endsection

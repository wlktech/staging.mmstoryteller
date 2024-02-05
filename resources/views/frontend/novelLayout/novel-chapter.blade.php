<div class="chapter-lists {{ request()->path() == "novel-$book->id-chapters" ? '' : 'd-none' }}">
    <div class="d-flex justify-content-between">
        <div class="mb-3 me-2">
            @auth
            <button class="btn btn-sm btn-outline-pink exchangeAll" data-book_id="{{ $book->id }}" data-status="{{ $unorderChapters->sum('status') }}" data-bs-target="#buyAll" data-bs-toggle="modal">Buy All</button>
            @endauth
            @guest
            <button class="btn btn-sm btn-outline-pink" data-bs-target="#loginModal" data-bs-toggle="modal">Buy All</button>
            @endguest
        </div>
        <div class="mb-3">
            <a href="" class="text-decoration-none m-0 p-0" id="descending"><i class="fa-solid fa-right-left fa-rotate-90 sort"></i></a>
            <a href="" class="text-decoration-none m-0 p-0" id="ascending"><i class="fa-solid fa-right-left fa-rotate-90 sort"></i></a>
        </div>
    </div>


    {{-- descending order --}}
    <div class="descending">
        {{-- Desktop View with limit 50 --}}
        <div class="d-none d-md-block limit">
            @foreach ($desktopChapters as $chapter)
            <div class="chapter-card">
                <div class="d-flex justify-content-between">
                    <div class="text-start">
                        <span class="chapter-title">{{ $chapter->name }}</span><br>
                        <small class="release-date">{{ date('d M, Y', strtotime($chapter->created_at)) }}</small>
                    </div>
                    <div class="">
                        <div>
                            @if ($chapter->status == "Free")
                                <a href="{{ url('/chapter-'.$chapter->id) }}" class="btn chapter-btn">Open</a>
                            @else
                                @guest
                                    <button class="btn btn-sm mt-1" data-bs-target="#loginModal" data-bs-toggle="modal"><img class="me-1" src="{{ asset('assets/img/Icons/diamond.png') }}" alt="">{{ $chapter->status }}</button>
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
                                            <a href="{{ url('/chapter-'.$order->chapter_id) }}" class="btn chapter-btn">Open</a>
                                            @break
                                        @endif
                                    @endforeach

                                    @if (!$orderExists)
                                        <button class="btn btn-sm mt-1 exchange beforeExchange-{{ $chapter->id }}" data-chapter_id="{{ $chapter->id }}" data-book_id="{{ $chapter->book_id }}" data-status="{{ $chapter->status }}" data-bs-target="#exchange" data-bs-toggle="modal"><img class="me-1" src="{{ asset('assets/img/Icons/diamond.png') }}" alt="">{{ $chapter->status }}</button>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @if ($all->count() > 50)
            {{-- All View Btn --}}
            <div class="text-end">
                <a href="" class="all-btn seemore">See More</a>
                <a href="" class="all-btn seeless">See Less</a>
            </div>
            {{-- All View Btn --}}
            @endif
        </div>
        {{-- Desktop View with limit 50 --}}

        {{-- Mobile View with limit 20 --}}
        <div class="d-md-none d-sm-block limit">
            @foreach ($mobileChapters as $chapter)
            <div class="chapter-card">
                <div class="d-flex justify-content-between">
                    <div class="text-start">
                        <span class="chapter-title">{{ $chapter->name }}</span><br>
                        <small class="release-date">{{ date('d M, Y', strtotime($chapter->created_at)) }}</small>
                    </div>
                    <div class="">
                        <div>
                            @if ($chapter->status == "Free")
                                <a href="{{ url('/chapter-'.$chapter->id) }}" class="btn chapter-btn">Open</a>
                            @else
                                @guest
                                    <button class="btn btn-sm mt-1" data-bs-target="#loginModal" data-bs-toggle="modal"><img class="me-1" src="{{ asset('assets/img/Icons/diamond.png') }}" alt="">{{ $chapter->status }}</button>
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
                                            <a href="{{ url('/chapter-'.$order->chapter_id) }}" class="btn chapter-btn">Open</a>
                                            @break
                                        @endif
                                    @endforeach

                                    @if (!$orderExists)
                                        <button class="btn btn-sm mt-1 exchange beforeExchange-{{ $chapter->id }}" data-chapter_id="{{ $chapter->id }}" data-book_id="{{ $chapter->book_id }}" data-status="{{ $chapter->status }}" data-bs-target="#exchange" data-bs-toggle="modal"><img class="me-1" src="{{ asset('assets/img/Icons/diamond.png') }}" alt="">{{ $chapter->status }}</button>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @if ($all->count() > 20)
            {{-- All View Btn --}}
            <div class="text-end">
                <a href="" class="all-btn seemore">See More</a>
                <a href="" class="all-btn seeless">See Less</a>
            </div>
            {{-- All View Btn --}}
            @endif
        </div>
        {{-- Mobile View with limit 20 --}}

        {{-- All View with unlimited --}}
        <div class="allview">
            @foreach ($all as $chapter)
            <div class="chapter-card">
                <div class="d-flex justify-content-between">
                    <div class="text-start">
                        <span class="chapter-title">{{ $chapter->name }}</span><br>
                        <small class="release-date">{{ date('d M, Y', strtotime($chapter->created_at)) }}</small>
                    </div>
                    <div class="">
                        <div>
                            @if ($chapter->status == "Free")
                                <a href="{{ url('/chapter-'.$chapter->id) }}" class="btn chapter-btn">Open</a>
                            @else
                                @guest
                                    <button class="btn btn-sm mt-1" data-bs-target="#loginModal" data-bs-toggle="modal"><img class="me-1" src="{{ asset('assets/img/Icons/diamond.png') }}" alt="">{{ $chapter->status }}</button>
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
                                            <a href="{{ url('/chapter-'.$order->chapter_id) }}" class="btn chapter-btn">Open</a>
                                            @break
                                        @endif
                                    @endforeach

                                    @if (!$orderExists)
                                        <button class="btn btn-sm mt-1 exchange beforeExchange-{{ $chapter->id }}" data-chapter_id="{{ $chapter->id }}" data-book_id="{{ $chapter->book_id }}" data-status="{{ $chapter->status }}" data-bs-target="#exchange" data-bs-toggle="modal"><img class="me-1" src="{{ asset('assets/img/Icons/diamond.png') }}" alt="">{{ $chapter->status }}</button>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- All View with unlimited --}}
    </div>
    {{-- descending order --}}

    {{-- ascending order --}}
    <div class="ascending">
        {{-- Desktop View with limit 50 --}}
        <div class="d-none d-md-block limit">
            @foreach ($desktopAsc as $chapter)
            <div class="chapter-card">
                <div class="d-flex justify-content-between">
                    <div class="text-start">
                        <span class="chapter-title">{{ $chapter->name }}</span><br>
                        <small class="release-date">{{ date('d M, Y', strtotime($chapter->created_at)) }}</small>
                    </div>
                    <div class="">
                        <div>
                            @if ($chapter->status == "Free")
                                <a href="{{ url('/chapter-'.$chapter->id) }}" class="btn chapter-btn">Open</a>
                            @else
                                @guest
                                    <button class="btn btn-sm mt-1" data-bs-target="#loginModal" data-bs-toggle="modal"><img class="me-1" src="{{ asset('assets/img/Icons/diamond.png') }}" alt="">{{ $chapter->status }}</button>
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
                                            <a href="{{ url('/chapter-'.$order->chapter_id) }}" class="btn chapter-btn">Open</a>
                                            @break
                                        @endif
                                    @endforeach

                                    @if (!$orderExists)
                                        <button class="btn btn-sm mt-1 exchange beforeExchange-{{ $chapter->id }}" data-chapter_id="{{ $chapter->id }}" data-book_id="{{ $chapter->book_id }}" data-status="{{ $chapter->status }}" data-bs-target="#exchange" data-bs-toggle="modal"><img class="me-1" src="{{ asset('assets/img/Icons/diamond.png') }}" alt="">{{ $chapter->status }}</button>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @if ($allAsc->count() > 50)
            {{-- All View Btn --}}
            <div class="text-end">
                <a href="" class="all-btn seemore">See More</a>
                <a href="" class="all-btn seeless">See Less</a>
            </div>
            {{-- All View Btn --}}
            @endif
        </div>
        {{-- Desktop View with limit 50 --}}

        {{-- Mobile View with limit 20 --}}
        <div class="d-md-none d-sm-block limit">
            @foreach ($mobileAsc as $chapter)
            <div class="chapter-card">
                <div class="d-flex justify-content-between">
                    <div class="text-start">
                        <span class="chapter-title">{{ $chapter->name }}</span><br>
                        <small class="release-date">{{ date('d M, Y', strtotime($chapter->created_at)) }}</small>
                    </div>
                    <div class="">
                        <div>
                            @if ($chapter->status == "Free")
                                <a href="{{ url('/chapter-'.$chapter->id) }}" class="btn chapter-btn">Open</a>
                            @else
                                @guest
                                    <button class="btn btn-sm mt-1" data-bs-target="#loginModal" data-bs-toggle="modal"><img class="me-1" src="{{ asset('assets/img/Icons/diamond.png') }}" alt="">{{ $chapter->status }}</button>
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
                                            <a href="{{ url('/chapter-'.$order->chapter_id) }}" class="btn chapter-btn">Open</a>
                                            @break
                                        @endif
                                    @endforeach

                                    @if (!$orderExists)
                                        <button class="btn btn-sm mt-1 exchange beforeExchange-{{ $chapter->id }}" data-chapter_id="{{ $chapter->id }}" data-book_id="{{ $chapter->book_id }}" data-status="{{ $chapter->status }}" data-bs-target="#exchange" data-bs-toggle="modal"><img class="me-1" src="{{ asset('assets/img/Icons/diamond.png') }}" alt="">{{ $chapter->status }}</button>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @if ($allAsc->count() > 20)
            {{-- All View Btn --}}
            <div class="text-end">
                <a href="" class="all-btn seemore">See More</a>
                <a href="" class="all-btn seeless">See Less</a>
            </div>
            {{-- All View Btn --}}
            @endif
        </div>
        {{-- Mobile View with limit 20 --}}

        {{-- All View with unlimited --}}
        <div class="allview">
            @foreach ($allAsc as $chapter)
            <div class="chapter-card">
                <div class="d-flex justify-content-between">
                    <div class="text-start">
                        <span class="chapter-title">{{ $chapter->name }}</span><br>
                        <small class="release-date">{{ date('d M, Y', strtotime($chapter->created_at)) }}</small>
                    </div>
                    <div class="">
                        <div>
                            @if ($chapter->status == "Free")
                                <a href="{{ url('/chapter-'.$chapter->id) }}" class="btn chapter-btn">Open</a>
                            @else
                                @guest
                                    <button class="btn btn-sm mt-1" data-bs-target="#loginModal" data-bs-toggle="modal"><img class="me-1" src="{{ asset('assets/img/Icons/diamond.png') }}" alt="">{{ $chapter->status }}</button>
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
                                            <a href="{{ url('/chapter-'.$order->chapter_id) }}" class="btn chapter-btn">Open</a>
                                            @break
                                        @endif
                                    @endforeach

                                    @if (!$orderExists)
                                        <button class="btn btn-sm mt-1 exchange beforeExchange-{{ $chapter->id }}" data-chapter_id="{{ $chapter->id }}" data-book_id="{{ $chapter->book_id }}" data-status="{{ $chapter->status }}" data-bs-target="#exchange" data-bs-toggle="modal"><img class="me-1" src="{{ asset('assets/img/Icons/diamond.png') }}" alt="">{{ $chapter->status }}</button>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- All View with unlimited --}}
    </div>
    {{-- ascending order --}}
</div>

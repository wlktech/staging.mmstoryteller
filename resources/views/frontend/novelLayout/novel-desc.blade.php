<div class="description {{ request()->path() == "novel-$book->id" ? '' : 'd-none' }}">
    <div class="desc">
        <p class="desc-text code" style="text-align: left;">{!! $book->description !!}</p>
    </div>
    <hr class="mt-0 pt-0 divider">
    <div id="review">
        <p class="review-title">Reviews</p>
        <div class="review-input d-flex">
            @auth
            <div class="review-profile mt-1">
                @if(Auth::user()->profile == NULL)
                <img src="{{ asset('assets/img/profile/profile.png') }}" class="rounded-circle" width="32px" height="32px" alt="">
                @else
                <img src="{{ asset('assets/img/profile/'.Auth::user()->profile) }}" class="rounded-circle" width="32px" height="32px" alt="">
                @endif
            </div>
            <div class="review">
                <form action="{{ url('/review/create') }}" method="post">
                    @csrf
                    <input type="text" name="comment" class="form-control review-text w-100" placeholder="Write a review">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <button type="submit" class="btn review-btn">Comment</button>
                </form>
            </div>
            @endauth
        </div>
    </div>
    @if ($reviews->count() > 0)
    <div class="review-box">
        @foreach ($reviews as $review)
        <div class="review-card d-flex">
            <div class="user-profile">
                @if ($review->user->profile == NULL)
                <img class="rounded-circle" src="{{ asset('assets/img/profile/profile.png') }}" width="32px" alt="">
                @else
                <img class="rounded-circle" src="{{ asset('assets/img/profile/'.$review->user->profile) }}" width="32px" alt="">
                @endif
            </div>
            <div class="comment-box w-100">
                <div class="d-flex">
                    <div>
                        <span class="user-name">{{ $review->user->name }}</span>
                    </div>
                    @auth
                    @if ($review->user->id === Auth::user()->id)
                    <div class="dropdown ms-2">
                        <a class="text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-caret-down" style="color:#FF3C86; cursor:pointer;"></i>
                        </a>
                        <ul class="dropdown-menu border border-none shadow" style="border-radius: 1px;">
                        <li><a class="dropdown-item edit" data-id="{{ $review->id }}" data-comment="{{ $review->comment }}" data-bs-target="#editReview" data-bs-toggle="modal"><i class="fas fa-pen-to-square me-1" ></i>Edit</a></li>
                        <li><a class="dropdown-item delete" data-bs-target="#deleteReview" data-bs-toggle="modal" data-id="{{ $review->id }}" href="#"><i class="fas fa-trash me-1"></i>Delete</a></li>
                        </ul>
                    </div>
                    @endif
                    @endauth
                </div>

                <p class="comment">
                    {{ $review->comment }}
                </p>
                <span class="created_at">
                    @php
                        $targetTime = $review->created_at;
                        $now = \Carbon\Carbon::now();
                        $timeDiff = $now->diffInSeconds($targetTime);

                        if ($timeDiff < 60) {
                            echo "Now";
                        } elseif ($timeDiff < 120) {
                            echo "1 min ago";
                        } elseif ($timeDiff < 3600) {
                            echo floor($timeDiff / 60) . " mins ago";
                        } elseif ($timeDiff < 7200) {
                            echo "1 hour ago";
                        } elseif ($timeDiff < 86400) {
                            echo floor($timeDiff / 3600) . ' hours ago';
                        } elseif ($timeDiff < 172800) {
                            echo "1 day ago";
                        } else {
                            echo floor($timeDiff / 86400) . ' days ago';
                        }
                    @endphp
                </span>
            </div>
        </div>
        @endforeach
    </div>
    @endif

</div>

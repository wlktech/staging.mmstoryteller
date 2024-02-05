<div class="d-flex">
    <a href="{{ url('/novel-'.$book->id) }}" id="desc" class="text-decoration-none text-dark {{ request()->path() == "novel-$book->id" ? "active" : "" }}">
        <p class="nav-head">Description</p>

    </a>
    <a href="{{ url('novel-'.$book->id.'-chapters') }}" id="chapter" class="nav-head text-decoration-none text-dark {{ request()->path() == "novel-$book->id-chapters" ? "active" : "" }}">
        <p class="nav-head">Chapters</p>
    </a>
</div>

<hr class="divider mt-0 pt-0">
